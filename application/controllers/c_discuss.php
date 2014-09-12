<?php

class C_discuss extends CI_Controller{
    
    
    var $discussion_id;
    public $username;
    
    
   public function view_discuss($cateogry){
        $cat['category']=$cateogry;
        $this->load->view('header');
       // $this->load->view('left_side');
        $this->load->view('discussion_Home', $cat);
        $this->load->view('category_right_side');
        $this->load->view('footer');
    }
    
    public function discuss_validate(){
        
         $this->load->view('header');
       // $this->load->view('left_side');
        $this->load->view('footer');
        
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('discussion', 'Discussion Topic', 'required|trim|xss_clean|is_unique[discussion.dis_topic]');
       
      
        
        
        
       
        if($this->form_validation->run()){
            $this->load->model('c_discussion');
      
                    if($this->c_discussion->add_discussion()){
                        $this->load->view('discussion_sucessfull_message');
                        }
        }else{
          $this->load->view('discussion_fail');
      }
         $cat['category']=  $this->input->post('category');
      $this->load->view('discussion_Home',$cat);
       $this->load->view('category_right_side');
        
    }
    
    public function select_topic($id){
        $this->session->set_flashdata('discussion_id', $id);
        
        
       $this->load->model('model_users');
    
        
        $this->load->view('header');
        $data['result']=$id;
        
        $data['user']=$this->session->userdata('USERNAME');
        
       // $this->load->library('session');
        $this->get_id($id);
       // 
         $this->load->view('view_comments', $data);
       //   $this->load->view('post_comment', $data);
        //  $this->load->view('category_right_side');
     //  $this->load->view('left_side');
       $this->load->view('footer');
       
       
       
     
        
    }
    public function get_id($id){
        $dis_id['dis_id_y']=$id;
    }
    
    public function save_comment($id){
        
         $myvar=  $this->session->flashdata('discussion_id');   
       
         $this->load->view('header');
        
      $ID=$this->discussion_id;
        $this->username=$this->session->userdata('USERNAME');
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('comment', 'required');
        $data['result']=$id;
        
        $data['user']=$this->session->userdata('USERNAME');
      
        
        
 
       
        if($this->form_validation->run()){
            $this->load->model('c_discussion');
               
                    if($this->c_discussion->add_comment($id, $this->username)){
                        // $this->select_topic($myvar);
                        $this->load->view('Answer_posted_sucessfully');
                          $this->load->view('view_comments', $data);
                        }
        }else{
          $this->load->view('discussion_fail');
            $this->load->view('view_comments', $data);
      }
       
        $this->load->view('footer');  
         
        
        
    }
    
    public function select_category($id){
       
        
        
    }
    
}
?>
