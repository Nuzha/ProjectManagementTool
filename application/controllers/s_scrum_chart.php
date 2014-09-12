<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');

class S_scrum_chart extends CI_Controller {

    
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url'); 
        $this->load->helper('form'); 
        
//        $this->load->model('chart', '', TRUE);
//        $data['project_name']=$this->chart->get_projectname();
//   
//       $this->load->view('SV_scrum_chart',$data);
        
    }
    
    function index(){
        
        
//        $this->load->model('Add_userstory_model', '', TRUE);
//        $data['email_list']=$this->Add_userstory_model->get_mail();
//        $this->load->view('add_userstory_view',$data);
        
//         $this->load->model('chart', '', TRUE);
////        $data['project_name']=$this->chart->get_projectname();
////   
////       $this->load->view('SV_scrum_chart',$data);
        
         $this->load->view('dev_header');
        //$this->load->view('dev_leftside');
         $this->load->view('SV_scrm_dev_chart');
        $this->load->view('dev_header');
         
        
        
    }
    
    public function drop_select(){
        
        $this->load->view('dev_header');
        $this->load->view('dev_leftside');
         $this->load->view('SV_scrm_dev_chart');
         
     if($this->input->post('project')){
        $data['selected']=  $this->input->post('project');
       // var_dump($data);
        $this->session->set_flashdata('set_selected',$data['selected']);
        
        $this->load->view('testing',$data);
       
     }
     else{
         echo 'hello';
     }
    }
    
    function update_db(){
       
            //$id = $this->uri->segment(3);
         $this->load->view('dev_header');
        $this->load->view('dev_leftside');
         $this->load->view('SV_scrum_chart');
          $this->load->view('footer');
        
        
        
        $this->load->model('Chart','',TRUE);
        $this->Chart->update( $_POST); //
        
        
        
       // redirect('S_scrum_chart/index','refresh');
//        $ee['selected']=  $this->session->flashdata('set_selected');
//           $this->load->view('SV_scrum_chart',$ee);
         
      
    }
    
    function getchart(){
        $this->load->view('dev_header');
        $this->load->view('dev_leftside');
        $this->load->view('getchart');
        $this->load->view('footer');
        
    }
    
     
    //----------------------------scrum master chart--------------------------------------------
    
       function scrum_master_chk_u_status(){
           $this->load->view('header');
        //$this->load->view('dev_leftside');
         $this->load->view('SV_scrm_master_chart');
        // $this->load->view('left_side');
       }
       
       
       public function drop_select_sm(){
        
        $this->load->view('header');
        //$this->load->view('left_side');
         $this->load->view('SV_scrm_master_chart');
         
     if($this->input->post('project')){
        $data['selected']=  $this->input->post('project');
       // var_dump($data);
        $this->session->set_flashdata('set_selected',$data['selected']);
        
        $this->load->view('testing_sm',$data);
       
     }
     else{
         echo 'hello';
     }
    }
    
    function update_db_sm(){
       
            //$id = $this->uri->segment(3);
         $this->load->view('dev_header');
        $this->load->view('dev_leftside');
         $this->load->view('SV_scrum_chart');
          $this->load->view('footer');
        
        
        
        $this->load->model('Chart','',TRUE);
        $this->Chart->update( $_POST); //
        
        
        
       // redirect('S_scrum_chart/index','refresh');
//        $ee['selected']=  $this->session->flashdata('set_selected');
//           $this->load->view('SV_scrum_chart',$ee);
         
      
    }
       
    
    
}
?>