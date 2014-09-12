<?php 

class C_project extends CI_Controller{
    
   public function project_select(){
       
       
      $id = $this->input->post('project');
      $user=$this->session->userdata('type');
        $this->load->model('project');

        $project_id = $this->project->get_project_id($id);
      //  var_dump($project_id);

          $data =array(
              'project_id'=>$project_id['project_id'],
              'project_name'=>$project_id['project_name'],
          );

        $this->session->set_userdata($data);
        if($user=="Scrum Master"){
        redirect('main/Iteration', 'refresh');
      
        }
        else if($user== "Developer"){
            redirect('c_my_work/view_story_board', 'refresh');
        }
      
       
   }
  
   
    
    
}


?>
