<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perfume_model extends CI_Model
{
    public function getAllPerfumes()
{
    $perfumes = $this->db->order_by('PerfumeID', 'DESC')->get('perfumes')->result_array();

    foreach ($perfumes as &$perfume) {
        $perfumeID = $perfume['PerfumeID'];

        // Get ingredients
        $perfume['ingredients'] = $this->db->select('i.IngredientID as id, i.IngredientName as name')
            ->from('perfume_ingredients pi')
            ->join('ingredients_master i', 'pi.IngredientID = i.IngredientID')
            ->where('pi.PerfumeID', $perfumeID)
            ->get()
            ->result_array();

        // Get risks
        $perfume['risks'] = $this->db->select('r.RiskID as id, r.RiskDescription as name')
            ->from('perfume_risks pr')
            ->join('risks_master r', 'pr.RiskID = r.RiskID')
            ->where('pr.PerfumeID', $perfumeID)
            ->get()
            ->result_array();

        // Get alternatives
        $perfume['alternatives'] = $this->db->select('a.AlternativeID as id, a.AlternativeName as name')
            ->from('perfume_alternatives pa')
            ->join('alternatives_master a', 'pa.AlternativeID = a.AlternativeID')
            ->where('pa.PerfumeID', $perfumeID)
            ->get()
            ->result_array();
    }

    return $perfumes;
}


    public function getAllIngredients()
    {
        return $this->db->select('IngredientID as id, IngredientName as name')->from('ingredients_master')->get()->result_array();
    }

    public function getAllRisks()
    {
        return $this->db->select('RiskID as id, RiskDescription as name')->from('risks_master')->get()->result_array();
    }

    public function getAllAlternatives()
    {
        return $this->db->select('AlternativeID as id, AlternativeName as name')->from('alternatives_master')->get()->result_array();
    }

    public function addPerfume($name, $image, $ingredients, $risks, $alternatives)
    {
        $this->db->trans_start();

        $this->db->insert('perfumes', ['Name' => $name, 'Image' => $image]);
        $perfumeId = $this->db->insert_id();

        $this->insertIngredients($perfumeId, $ingredients);
        $this->insertRisks($perfumeId, $risks);
        $this->insertAlternatives($perfumeId, $alternatives);

        $this->db->trans_complete();

        return $this->db->trans_status() ? $perfumeId : false;
    }

    private function insertIngredients($perfumeId, $ingredients)
    {
        if (!empty($ingredients)) {
            foreach ($ingredients as $ingredient) {
                $this->db->insert('perfume_ingredients', ['PerfumeID' => $perfumeId, 'IngredientID' => $ingredient]);
            }
        }
    }

    private function insertRisks($perfumeId, $risks)
    {
        if (!empty($risks)) {
            foreach ($risks as $risk) {
                $this->db->insert('perfume_risks', ['PerfumeID' => $perfumeId, 'RiskID' => $risk]);
            }
        }
    }

    private function insertAlternatives($perfumeId, $alternatives)
    {
        if (!empty($alternatives)) {
            foreach ($alternatives as $alternative) {
                $this->db->insert('perfume_alternatives', ['PerfumeID' => $perfumeId, 'AlternativeID' => $alternative]);
            }
        }
    }

    public function updatePerfume($perfumeId, $name, $image, $ingredients, $risks, $alternatives)
    {
        // Update the perfume details in the perfumes table
        $this->db->where('PerfumeID', $perfumeId);
        $this->db->update('perfumes', [
            'Name' => $name,
            'Image' => $image
        ]);
    
        // ✅ Fix: Check if ingredients are provided
        if (!empty($ingredients)) {
            // Delete old ingredients
            $this->db->where('PerfumeID', $perfumeId);
            $this->db->delete('perfume_ingredients');
    
            // Insert new ingredients
            $ingredientData = []; // ✅ Fixed variable overwriting
            foreach ($ingredients as $ingredientId) {
                $ingredientData[] = [
                    'PerfumeID' => $perfumeId,
                    'IngredientID' => $ingredientId
                ];
            }
            if (!empty($ingredientData)) {
                $this->db->insert_batch('perfume_ingredients', $ingredientData);
            }
        }
    
        // ✅ Fix: Check if risks are provided
        if (!empty($risks)) {
            // Delete old risks
            $this->db->where('PerfumeID', $perfumeId);
            $this->db->delete('perfume_risks');
    
            // Insert new risks
            $riskData = []; // ✅ Fixed variable overwriting
            foreach ($risks as $riskId) {
                $riskData[] = [
                    'PerfumeID' => $perfumeId,
                    'RiskID' => $riskId
                ];
            }
            if (!empty($riskData)) {
                $this->db->insert_batch('perfume_risks', $riskData);
            }
        }
    
        // ✅ Fix: Check if alternatives are provided
        if (!empty($alternatives)) {
            // Delete old alternatives
            $this->db->where('PerfumeID', $perfumeId);
            $this->db->delete('perfume_alternatives');
    
            // Insert new alternatives
            $alternativeData = []; // ✅ Fixed variable overwriting
            foreach ($alternatives as $alternativeId) {
                $alternativeData[] = [
                    'PerfumeID' => $perfumeId,
                    'AlternativeID' => $alternativeId
                ];
            }
            if (!empty($alternativeData)) {
                $this->db->insert_batch('perfume_alternatives', $alternativeData);
            }
        }
    
        return true;
    }
    
    

    public function fetchPerfumeDetails($perfumeId)
    {
        // Fetch perfume details
        $this->db->select('p.PerfumeID, p.Name, p.Image');
        $this->db->from('perfumes p'); // Keeping the table name as "perfumes" as per the new structure
        $this->db->where('p.PerfumeID', $perfumeId);
        $perfume = $this->db->get()->row_array();
    
        if (!$perfume) {
            return null; // Return null if the perfume does not exist
        }
    
        // Fetch related ingredients
        $this->db->select('i.IngredientID as id, i.IngredientName as name');
        $this->db->from('perfume_ingredients pi');
        $this->db->join('ingredients_master i', 'pi.IngredientID = i.IngredientID', 'left');
        $this->db->where('pi.PerfumeID', $perfumeId);
        $perfume['ingredients'] = $this->db->get()->result_array();
    
        // Fetch related risks
        $this->db->select('r.RiskID as id, r.RiskDescription as name');
        $this->db->from('perfume_risks pr');
        $this->db->join('risks_master r', 'pr.RiskID = r.RiskID', 'left');
        $this->db->where('pr.PerfumeID', $perfumeId);
        $perfume['risks'] = $this->db->get()->result_array();
    
        // Fetch related alternatives
        $this->db->select('a.AlternativeID as id, a.AlternativeName as name');
        $this->db->from('perfume_alternatives pa');
        $this->db->join('alternatives_master a', 'pa.AlternativeID = a.AlternativeID', 'left');
        $this->db->where('pa.PerfumeID', $perfumeId);
        $perfume['alternatives'] = $this->db->get()->result_array();
    
        return $perfume;
    }
    

    public function deletePerfume($id)
    {
        $this->db->where('PerfumeID', $id)->delete('perfumes');
        return ['message' => 'Deleted Successfully', 'status' => 'success'];
    }
}
