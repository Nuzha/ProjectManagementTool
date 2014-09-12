<?php

class C_my_work extends CI_Controller{
    
    
    
    
    
    public  function view_story_board(){
        
        $id['pro_id']=$this->session->userdata('project_id');
        $id['owner']=  $this->session->userdata('email');
       
        $this->load->model('project');
        $id['row_i']=$this->project->getProject($id['pro_id'])->result();
         
        if($this->session->userdata('project_id')){
            $this->load->view('dev_header');
           // $this->load->view('dev_leftside');
            $this->load->view('footer');
            $this->load->view('dev_story_board',$id);
            
        }
         else{
            $id['row_i']="NULL";
            $this->load->view('dev_header');
      //  $this->load->view('dev_leftside');
        $this->load->view('footer');
         $this->load->view('project_not_selected');
         
         }
}
    public function work_by_person(){
        $this->load->view('header');
        $this->load->view('work_by_person');
        $this->load->view('footer');
        
    }
    public function project_drop_select(){
        $this->load->view('header');
       
        $this->load->model('c_work_by_person', '', TRUE);
        $data['iteration'] = $this->c_work_by_person->get_iteration();
        $data['proj'] = $this->c_work_by_person->get_project();
         //  $this->load->view('footer');
        $this->load->view('work_by_person',$data);
        
        
    }
        public function get_details(){
         $this->load->view('header');
         //  $this->load->view('footer');
        $this->load->view('work_by_person');
        $this->load->model('c_work_by_person', '', TRUE);
        $data['userStory_sucess'] = $this->c_work_by_person->list_sucess();
        $data['userStory_warning'] = $this->c_work_by_person->list_warning();
          $data['userStory_active'] = $this->c_work_by_person->list_active();
        $this->load->view('c_list_sucess', $data);
      //   $this->load->view('c_list_warning', $data);
       
        
        
       
         
     }
    
    
    
}
?>
