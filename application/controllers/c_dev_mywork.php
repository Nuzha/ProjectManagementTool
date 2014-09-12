<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_dev_mywork extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
function index() {
          $this->load->view('dev_mywork');
//        $this->load->model('dev_model');
//        $data['userStory_qry'] = $this->dev_model->get();
//        $data['userStory_qry1'] = $this->dev_model->getdefects();
//        $this->load->view('dev_mywork',$data);
    
}


public function timerdis(){
        $this->load->model('dev_model');
        $data['userStory_qry'] = $this->dev_model->get();
        $data['userStory_qry1'] = $this->dev_model->getdefects();
        return $data;
}


}