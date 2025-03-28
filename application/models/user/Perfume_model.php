<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfume_model extends CI_Model {

    public function searchPerfumes($query) {
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
    
        return $this->db->get()->result();
    }
    
    


    public function getPerfumeDetails($id) {
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
    
        return $this->db->get()->row_array();
    }
    
    


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
