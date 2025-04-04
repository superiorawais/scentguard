<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfume_model extends CI_Model {

    // public function searchPerfumes($query) {
    //     $this->db->select('p.PerfumeID, p.Name, p.Image,
    //                       GROUP_CONCAT(DISTINCT i.IngredientID) AS IngredientIDs, 
    //                       GROUP_CONCAT(DISTINCT i.IngredientName SEPARATOR ", ") AS Ingredients, 
    //                       GROUP_CONCAT(DISTINCT d.RiskID) AS RiskIDs, 
    //                       GROUP_CONCAT(DISTINCT d.RiskDescription SEPARATOR ", ") AS DiseaseRisks, 
    //                       GROUP_CONCAT(DISTINCT a.AlternativeID) AS AlternativeIDs, 
    //                       GROUP_CONCAT(DISTINCT am.AlternativeName SEPARATOR ", ") AS AlternativeNames');
    //     $this->db->from('perfumes p');
    //     $this->db->join('perfume_ingredients pi', 'p.PerfumeID = pi.PerfumeID', 'left');
    //     $this->db->join('ingredients_master i', 'pi.IngredientID = i.IngredientID', 'left');
    //     $this->db->join('perfume_risks pr', 'p.PerfumeID = pr.PerfumeID', 'left');
    //     $this->db->join('risks_master d', 'pr.RiskID = d.RiskID', 'left');
    //     $this->db->join('perfume_alternatives a', 'p.PerfumeID = a.PerfumeID', 'left');
    //     $this->db->join('alternatives_master am', 'a.AlternativeID = am.AlternativeID', 'left');
        
    //     $this->db->group_start();
    //     $this->db->like('p.Name', $query);
    //     $this->db->or_like('i.IngredientName', $query);
    //     $this->db->or_like('d.RiskDescription', $query);
    //     $this->db->or_like('am.AlternativeName', $query);
    //     $this->db->group_end();
        
    //     $this->db->group_by('p.PerfumeID, p.Name, p.Image');
    
    //     return $this->db->get()->result();
    // }
    
    public function searchPerfumes($query) {
        // Get user risks from session
        $userRisks = $this->session->userdata('user_risks');
        $hasUserRisks = !empty($userRisks); // Flag to check if user has any risks
        
        $this->db->select('p.PerfumeID, p.Name, p.Image,
                          GROUP_CONCAT(DISTINCT i.IngredientID) AS IngredientIDs, 
                          GROUP_CONCAT(DISTINCT i.IngredientName SEPARATOR ", ") AS Ingredients, 
                          GROUP_CONCAT(DISTINCT d.RiskID) AS RiskIDs, 
                          GROUP_CONCAT(DISTINCT d.RiskDescription SEPARATOR ", ") AS DiseaseRisks, 
                          GROUP_CONCAT(DISTINCT a.AlternativeID) AS AlternativeIDs, 
                          GROUP_CONCAT(DISTINCT am.AlternativeName SEPARATOR ", ") AS AlternativeNames');
        $this->db->from('perfumes p');
        $this->db->join('perfume_ingredients pi', 'p.PerfumeID = pi.PerfumeID', 'left');
        $this->db->join('ingredients_master i', 'pi.IngredientID = i.IngredientID', 'left');
        $this->db->join('perfume_risks pr', 'p.PerfumeID = pr.PerfumeID', 'left');
        $this->db->join('risks_master d', 'pr.RiskID = d.RiskID', 'left');
        $this->db->join('perfume_alternatives a', 'p.PerfumeID = a.PerfumeID', 'left');
        $this->db->join('alternatives_master am', 'a.AlternativeID = am.AlternativeID', 'left');
        
        $this->db->group_start();
        $this->db->like('p.Name', $query);
        $this->db->or_like('i.IngredientName', $query);
        $this->db->or_like('d.RiskDescription', $query);
        $this->db->or_like('am.AlternativeName', $query);
        $this->db->group_end();
        
        $this->db->group_by('p.PerfumeID, p.Name, p.Image');
    
        $perfumes = $this->db->get()->result_array();
    
        // Only process risk percentages if user has risks
        if ($hasUserRisks) {
            foreach ($perfumes as &$perfume) {
                // Get all risk IDs and names for this perfume
                $perfumeRiskIds = isset($perfume['RiskIDs']) ? explode(',', $perfume['RiskIDs']) : [];
                $perfumeRiskNames = isset($perfume['DiseaseRisks']) ? explode(',', $perfume['DiseaseRisks']) : [];
                
                // Convert all IDs to integers
                $perfumeRiskIds = array_map('intval', $perfumeRiskIds);
                $userRiskIds = array_map('intval', $userRisks);
                
                // Find matching risks between user and perfume
                $commonRisks = array_intersect($userRiskIds, $perfumeRiskIds);
                $totalUserRisks = count($userRiskIds);
                
                // Calculate safety percentage
                $safePercentage = ($totalUserRisks > 0)
                    ? (1 - (count($commonRisks) / $totalUserRisks)) * 100
                    : 100;
                
                // Store calculated values
                $perfume['SafePercentage'] = round($safePercentage, 2);
                $perfume['DangerPercentage'] = round(100 - $safePercentage, 2);
                
                // Create risk mapping (ID => Name)
                $riskMap = [];
                foreach ($perfumeRiskIds as $index => $riskId) {
                    if (isset($perfumeRiskNames[$index])) {
                        $riskMap[$riskId] = trim($perfumeRiskNames[$index]);
                    }
                }
                
                // Categorize risks as dangerous or safe for this user
                $perfume['DangerRisks'] = [];
                $perfume['SafeRisks'] = [];
                
                foreach ($perfumeRiskIds as $riskId) {
                    $riskName = $riskMap[$riskId] ?? '';
                    if (in_array($riskId, $userRiskIds)) {
                        $perfume['DangerRisks'][] = $riskName;
                    } else {
                        $perfume['SafeRisks'][] = $riskName;
                    }
                }
                
                // Remove empty risk names
                $perfume['DangerRisks'] = array_filter($perfume['DangerRisks']);
                $perfume['SafeRisks'] = array_filter($perfume['SafeRisks']);
            }
        }
        
        // Add the flag to each perfume result
        foreach ($perfumes as &$perfume) {
            $perfume['hasUserRisks'] = $hasUserRisks;
            
            // Set default values if no user risks exist
            if (!$hasUserRisks) {
                $perfume['SafePercentage'] = null;
                $perfume['DangerPercentage'] = null;
                $perfume['DangerRisks'] = [];
                $perfume['SafeRisks'] = isset($perfume['DiseaseRisks']) ? explode(',', $perfume['DiseaseRisks']) : [];
            }
        }
        
        return $perfumes;
    }
    


    public function getPerfumeDetails($id) {
        // Get user risks from session
        $userRisks = $this->session->userdata('user_risks');
        $hasUserRisks = !empty($userRisks); // Flag to check if user has any risks
        
        $this->db->select('p.PerfumeID, p.Name, p.Image,
                          GROUP_CONCAT(DISTINCT i.IngredientID) AS IngredientIDs, 
                          GROUP_CONCAT(DISTINCT i.IngredientName SEPARATOR ", ") AS Ingredients, 
                          GROUP_CONCAT(DISTINCT d.RiskID) AS RiskIDs, 
                          GROUP_CONCAT(DISTINCT d.RiskDescription SEPARATOR ", ") AS DiseaseRisks, 
                          GROUP_CONCAT(DISTINCT a.AlternativeID) AS AlternativeIDs, 
                          GROUP_CONCAT(DISTINCT am.AlternativeName SEPARATOR ", ") AS AlternativeNames');
        $this->db->from('perfumes p');
        $this->db->join('perfume_ingredients pi', 'p.PerfumeID = pi.PerfumeID', 'left');
        $this->db->join('ingredients_master i', 'pi.IngredientID = i.IngredientID', 'left');
        $this->db->join('perfume_risks pr', 'p.PerfumeID = pr.PerfumeID', 'left');
        $this->db->join('risks_master d', 'pr.RiskID = d.RiskID', 'left');
        $this->db->join('perfume_alternatives a', 'p.PerfumeID = a.PerfumeID', 'left');
        $this->db->join('alternatives_master am', 'a.AlternativeID = am.AlternativeID', 'left');
        
        $this->db->where('p.PerfumeID', $id);
        $this->db->group_by('p.PerfumeID');
    
        $perfume = $this->db->get()->row_array();
        
        if ($perfume && $hasUserRisks) {
            // Process risk percentages if user has risks
            $perfumeRiskIds = isset($perfume['RiskIDs']) ? explode(',', $perfume['RiskIDs']) : [];
            $perfumeRiskNames = isset($perfume['DiseaseRisks']) ? explode(',', $perfume['DiseaseRisks']) : [];
            
            $perfumeRiskIds = array_map('intval', $perfumeRiskIds);
            $userRiskIds = array_map('intval', $userRisks);
            
            $commonRisks = array_intersect($userRiskIds, $perfumeRiskIds);
            $totalUserRisks = count($userRiskIds);
            
            $safePercentage = ($totalUserRisks > 0)
                ? (1 - (count($commonRisks) / $totalUserRisks)) * 100
                : 100;
            
            $perfume['SafePercentage'] = round($safePercentage, 2);
            $perfume['DangerPercentage'] = round(100 - $safePercentage, 2);
            
            // Map risk ID => risk name
            $riskMap = [];
            foreach ($perfumeRiskIds as $index => $riskId) {
                if (isset($perfumeRiskNames[$index])) {
                    $riskMap[$riskId] = trim($perfumeRiskNames[$index]);
                }
            }
            
            // Categorize risks
            $perfume['DangerRisks'] = [];
            $perfume['SafeRisks'] = [];
            
            foreach ($perfumeRiskIds as $riskId) {
                if (in_array($riskId, $userRiskIds)) {
                    $perfume['DangerRisks'][] = $riskMap[$riskId] ?? '';
                } else {
                    $perfume['SafeRisks'][] = $riskMap[$riskId] ?? '';
                }
            }
            
            // Remove empty values
            $perfume['DangerRisks'] = array_filter($perfume['DangerRisks']);
            $perfume['SafeRisks'] = array_filter($perfume['SafeRisks']);
        } else {
            // Set default values if no user risks exist
            $perfume['hasUserRisks'] = false;
            $perfume['SafePercentage'] = null;
            $perfume['DangerPercentage'] = null;
            $perfume['DangerRisks'] = [];
            $perfume['SafeRisks'] = isset($perfume['DiseaseRisks']) ? explode(',', $perfume['DiseaseRisks']) : [];
        }
        
        return $perfume;
    }

    // public function getPerfumeDetails($id) {
    //     $this->db->select('p.PerfumeID, p.Name, p.Image,
    //                        GROUP_CONCAT(DISTINCT i.IngredientID) AS IngredientIDs, 
    //                        GROUP_CONCAT(DISTINCT i.IngredientName SEPARATOR ", ") AS Ingredients, 
    //                        GROUP_CONCAT(DISTINCT d.RiskID) AS RiskIDs, 
    //                        GROUP_CONCAT(DISTINCT d.RiskDescription SEPARATOR ", ") AS DiseaseRisks, 
    //                        GROUP_CONCAT(DISTINCT a.AlternativeID) AS AlternativeIDs, 
    //                        GROUP_CONCAT(DISTINCT am.AlternativeName SEPARATOR ", ") AS AlternativeNames');
    //     $this->db->from('perfumes p');
    //     $this->db->join('perfume_ingredients pi', 'p.PerfumeID = pi.PerfumeID', 'left');
    //     $this->db->join('ingredients_master i', 'pi.IngredientID = i.IngredientID', 'left');
    //     $this->db->join('perfume_risks pr', 'p.PerfumeID = pr.PerfumeID', 'left');
    //     $this->db->join('risks_master d', 'pr.RiskID = d.RiskID', 'left');
    //     $this->db->join('perfume_alternatives a', 'p.PerfumeID = a.PerfumeID', 'left');
    //     $this->db->join('alternatives_master am', 'a.AlternativeID = am.AlternativeID', 'left');
        
    //     $this->db->where('p.PerfumeID', $id);
    //     $this->db->group_by('p.PerfumeID');
    
    //     return $this->db->get()->row_array();
    // }
    
    


    public function addRating($perfumeID, $userID, $rating) {
        $data = [
            'PerfumeID' => $perfumeID,
            'UserID' => $userID,
            'Rating' => $rating
        ];
        return $this->db->insert('PerfumeRatings', $data);
    }
    
    public function addComment($perfumeID, $userID, $comment) {
        $data = [
            'PerfumeID' => $perfumeID,
            'UserID' => $userID,
            'CommentText' => $comment
        ];
        return $this->db->insert('PerfumeComments', $data);
    }
    

    public function getComments($perfumeID) {
        $this->db->select('u.firstName, u.lastName, c.UserID, c.CommentText, c.CreatedAt');
        $this->db->from('PerfumeComments c');
        $this->db->join('user u', 'c.UserID = u.id', 'left'); // Join users table to get name
        $this->db->where('c.PerfumeID', $perfumeID);
        $this->db->order_by('c.CreatedAt', 'DESC');
        return $this->db->get()->result_array();
    }
    

    public function getAverageRating($perfumeID) {
        $this->db->select_avg('Rating');
        $this->db->where('PerfumeID', $perfumeID);
        $query = $this->db->get('PerfumeRatings');
        return $query->row()->Rating;
    }
    
    
    

}
?>
