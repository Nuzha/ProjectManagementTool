<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class S_dev_iteration extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
       
    }
    
    function index() {
       
       // $this->UserStorylisting();
        
    }
    public function  noti(){
        $data['include']='n_right_side';
        $this->load->view('s_my_work', $data);
    }
    public function view_charts(){
          $this->load->view('dev_header');
        $this->defect_count();
        //  $this->noti();
         
         $this->defect_status_chart();
       
      
        
      
        
        
    }
    function Iterationlisting()
      {
        //$this->load->library('table');

        $this->load->model('s_dev_iterationModel','',TRUE);
        $data['it_qry'] = $this->s_dev_iterationModel->listIterations();

        
        $this->load->view('header');
        $this->load->view('left_side');
        $this->load->view('footer');
        $this->load->view('S_VdevIteration', $data);
      }

      function UserStorylisting()
     {
        //$this->load->library('table');
        $mail = $this->session->userdata['email'];
        $this->load->model('s_dev_iterationModel','',TRUE);
        $data['userStory_qry'] = $this->s_dev_iterationModel->listUserStories($mail);
        $this->load->view('dev_header');
        $this->load->view('dev_leftside');
        $this->load->view('S_VdevBacklog', $data);
        $this->load->view('footer');
      }
      
      function update_iteration_status() {
        $this->load->helper('url');
        $id=  $this->input->post('ID');
        $status=  $this->input->post('category');

        $this->load->model('s_dev_iterationModel', '', TRUE);
       $this->s_dev_iterationModel->update_status($id, $status);
     
        redirect('s_dev_iteration/Iterationlisting', 'refresh');
       
    }
    function update_userstory_status() {
        $this->load->helper('url');
        $id=  $this->input->post('ID');
        $status=  $this->input->post('category');

        $this->load->model('s_dev_iterationModel', '', TRUE);
       $this->s_dev_iterationModel->update_u_story_status($id, $status);
     
        redirect('s_dev_iteration/UserStorylisting', 'refresh');
       
    }
    
    
    //----------------------defects--------------------------------------------------------------------------------------------
    
    function add_defects()
     {
        //$this->load->library('table');
        $mail = $this->session->userdata['email'];
        $this->load->model('s_dev_iterationModel','',TRUE);
        $data['userStory_qry'] = $this->s_dev_iterationModel->listUserStories($mail);
        $this->load->view('dev_header');
        $this->load->view('dev_leftside');
        $this->load->view('add_defects', $data);
        $this->load->view('footer');
      }
      
      function add_defects_c() 
        {
        $this->load->helper('url');
        $mail = $this->session->userdata['email'];
        $id=  $this->input->post('ID');
        $des=  $this->input->post('defect_des');
        $stat=  $this->input->post('defect_stat');

        $this->load->model('s_dev_iterationModel', '', TRUE);
       $this->s_dev_iterationModel->add_defects_m($id, $des,$stat,$mail);
     
        redirect('s_dev_iteration/add_defects', 'refresh');
       
        }
        
        function defect_count()
        {
           $this->load->helper('url');
           $mail = $this->session->userdata['email']; 
           $this->load->model('s_dev_iterationModel','',TRUE);
           $this->s_dev_iterationModel->get_defects($mail);
            $this->load->view('dev_header');

            $this->load->view('defect_chart');
            //$this->load->view('footer');
         
        }
        
        function view_defects($uid) {
            
       
        $this->load->model('s_dev_iterationModel','',TRUE);
        $data['defect_qry'] =$this->s_dev_iterationModel->get_defects_for_uid($uid);
        $this->load->view('dev_header');
        //$this->load->view('dev_leftside');
        $this->load->view('view_defects', $data);
        $this->load->view('footer');
        
        
        
    }
    
    function defect_listing()
    {
        $u_id = $this->session->userdata('u_id');

        var_dump($u_id);
        $this->load->model('s_dev_iterationModel', '', TRUE);
        $data['defect_qry'] = $this->s_dev_iterationModel->get_defects_for_uid($u_id);
        $this->load->view('dev_header');
        //$this->load->view('dev_leftside');
        $this->load->view('view_defects', $data);
        $this->load->view('footer');
        
    }
    
    function update_defect_status() {
        $this->load->helper('url');
        $did = $this->input->post('ID');
        $dstatus = $this->input->post('category');

        $this->load->model('s_dev_iterationModel', '', TRUE);
        $this->s_dev_iterationModel->update_defect_status($did, $dstatus);



        //$this->load->view('view_defects', $data);
        redirect('s_dev_iteration/defect_listing', 'refresh');
       
    }
    
    function defect_status_chart()
        {
           $this->load->helper('url');
           $mail = $this->session->userdata['email']; 
           $this->load->model('s_dev_iterationModel','',TRUE);
           $this->s_dev_iterationModel->get_defects_status($mail);
            $this->load->view('dev_header');
            $data['include']='defect_status_chart';
          // $this->load->view('dev_leftside');
          //$this->load->view('s_my_work',$data);
             $this->load->view('defect_status_chart');
          //$this->load->view('footer');
           
        }
        
        function dev_mywork()
        {
            $this->load->view('dev_header');
            $this->load->view('dev_mywork');
            $this->load->view('footer');
        }
    
    

}

//-----------------------------------------Task----------------------------------------------------------------------------

function get_tasks($uid) {
            
       
        $this->load->model('s_dev_iterationModel','',TRUE);
        $data['task_qry'] =$this->s_dev_iterationModel->get_tasks_for_uid($uid);
        $this->load->view('dev_header');
        //$this->load->view('dev_leftside');
        $this->load->view('view_defects', $data);
        $this->load->view('footer');
        
        
        
    }


?>