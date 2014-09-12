<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Burndown extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

     public function getDetails(){
        $this->load->view('header');
        $this->load->view('getChartData');
        $this->load->view('footer');
    }
    public function get_it_burndown(){
       
        $this->load->view('header');
        $this->load->model('model_burndown','',TRUE);  
        
        $data['userStory_qry'] = $this->model_burndown->getUserStories($_POST)->result_array();
        $data['days'] = $this->model_burndown->getDuration($_POST)->result_array();
        $data['end_dates'] = $this->model_burndown->getEndDates($_POST);
        $data['start_date'] = $this->model_burndown->getStartDate($_POST)->result_array();        
        
        $this->load->view('it_burndown', $data);
        $this->load->view('footer');
    }
    
    public function get_r_details(){
        $this->load->view('header');
        $this->load->view('getrData');
        $this->load->view('footer');
    }

   public function get_release_burndown(){
       
        $this->load->view('header');
        $this->load->model('model_burndown','',TRUE);  
        
        $data['planEstimation'] = $this->model_burndown->getPlanEst($_POST)->result_array();
        $data['iterations'] = $this->model_burndown->getIterations($_POST)->result_array();
              
        $this->load->view('it_burndown', $data);
        $this->load->view('footer');
    }
    
    public function release(){       
        
        $this->load->view('header');
        $this->load->view('add_release');
        $this->load->view('footer');
    }
    
}