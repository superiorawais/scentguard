<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfume extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user/Perfume_model');
    }

    public function search() {
        $query = $this->input->get('query');
        $results = $this->Perfume_model->searchPerfumes($query);
        echo json_encode($results);
    }

    public function details($id) {
        $data['perfume'] = $this->Perfume_model->getPerfumeDetails($id);
        
        if (!$data['perfume']) {
            show_404();
        }
    
        $this->template->set_layout('userTemplate')->build('user/perfume_details_view', $data);
  
    }
    

    public function submit_rating() {
        $perfumeID = $this->input->post('perfumeID');
        $rating = $this->input->post('rating');
        $userID = $this->session->userdata('userId');
    
        $this->Perfume_model->addRating($perfumeID, $userID, $rating);
        echo "success";
    }
    
    public function submit_comment() {
        $perfumeID = $this->input->post('perfumeID');
        $comment = $this->input->post('comment');
        $userID = $this->session->userdata('userId');
    
        $this->Perfume_model->addComment($perfumeID, $userID, $comment);
        echo "success";
    }
    
    public function get_comments($perfumeID) {
        $comments = $this->Perfume_model->getComments($perfumeID);
        foreach ($comments as $comment) {
            echo "<p><strong>".$comment['firstName'] .' ' .$comment['lastName'] . ":</strong> " . $comment['CommentText'] . " <em>(" . $comment['CreatedAt'] . ")</em></p>";
        }
    }
    


    public function get_average_rating($perfumeID) {
        $averageRating = $this->Perfume_model->getAverageRating($perfumeID);
        echo $averageRating ? number_format($averageRating, 1) : "No ratings yet";
    }
    


    public function index() {
        $this->load->view('search_view');
    }
}
?>
