<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perfume extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Perfume_model');
    }

    function index()
    {
        if (isUserLogin()) {
            $this->loadProductView();
        }
    }

    function loadProductView()
    {
        if (isUserLogin()) {
            $this->template->set_layout('adminTemplate')->build('admin/perfume_view', '');
        }
    }

    public function getPerfumeDetails() {
        $this->load->model('admin/Perfume_model');
    
        $perfumeId = $this->input->post('id');
        $result = $this->Perfume_model->fetchPerfumeDetails($perfumeId);
    
        if ($result) {
            echo json_encode(['success' => true, 'data' => $result]);
        } else {
            echo json_encode(['success' => false]);
        }
    }
    

    // ✅ Get Dropdown Data
    public function getDropdownData()
    {
        $data = [
            'ingredients' => $this->Perfume_model->getAllIngredients(),
            'risks' => $this->Perfume_model->getAllRisks(),
            'alternatives' => $this->Perfume_model->getAllAlternatives()
        ];

        echo json_encode($data);
    }

    // ✅ Add Perfume
    public function add()
    {
        $name = $this->input->post('name');

        // ✅ Handle Image Upload
        $image = $this->uploadImage();

        // ✅ Decode JSON arrays
        $ingredients = json_decode($this->input->post('ingredients'), true);
        $risks = json_decode($this->input->post('risks'), true);
        $alternatives = json_decode($this->input->post('alternatives'), true);

        // ✅ Validate Input
        if (!$name || !$image || !is_array($ingredients) || !is_array($risks) || !is_array($alternatives)) {
            echo json_encode(["status" => "error", "message" => "Invalid data provided."]);
            return;
        }

        // ✅ Insert Perfume
        $result = $this->Perfume_model->addPerfume($name, $image, $ingredients, $risks, $alternatives);

        echo json_encode(["status" => $result ? "success" : "error", "message" => $result ? "Perfume added successfully!" : "Error inserting perfume."]);
    }

    // ✅ Image Upload Helper
    private function uploadImage()
    {
        if (!empty($_FILES['image']['name'])) {
            $config['upload_path']   = './uploads/perfume/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 2048;
            $config['file_name']     = time() . '_' . $_FILES['image']['name'];

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                return   $this->upload->data('file_name');
            }
        }
        return null;
    }

    // ✅ Get All Perfumes
    public function getAllPerfumes()
    {
        $perfumes = $this->Perfume_model->getAllPerfumes();
        echo json_encode($perfumes);
    }

    // ✅ Edit Perfume
    public function editPerfume()
    {
        $perfumeId = $this->input->post('id');
        $name = $this->input->post('name');
        $ingredients = json_decode($this->input->post('ingredients'), true);
        $risks = json_decode($this->input->post('risks'), true);
        $alternatives = json_decode($this->input->post('alternatives'), true);
        $image = !empty($_FILES['image']['name']) ? $this->uploadImage() : $this->input->post('image2');

        if (!$perfumeId || !$name || !is_array($ingredients) || !is_array($risks) || !is_array($alternatives)) {
            echo json_encode(["status" => "error", "message" => "Invalid input data."]);
            return;
        }

        $result = $this->Perfume_model->updatePerfume($perfumeId, $name, $image, $ingredients, $risks, $alternatives);

        echo json_encode(["status" => $result ? "success" : "error", "message" => $result ? "Perfume updated successfully!" : "Failed to update perfume."]);
    }

    // ✅ Delete Perfume
    function deletePerfume()
    {
        $id = $this->input->post('ID');
        $response = $this->Perfume_model->deletePerfume($id);
        echo json_encode($response);
    }
}
