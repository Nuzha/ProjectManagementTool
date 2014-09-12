<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_work_by_person extends CI_Model{
    
    public function list_sucess(){
        $id=$_POST['project_category'];
        $itr=$_POST['iteration'];
        $owner=$_POST['OwnerEmail'];
          $this->db->select();
        $query = $this->db->query("SELECT `ProjectId`,`name`, `u_status`,`IterationId`, `PlanEst`  FROM `user_stories` WHERE `IterationId`='$itr' AND ProjectId=$id AND OwnerEmail='$owner' AND u_status='Success' ");

        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
        
        
    }
    
    public function list_warning(){
        $id=$_POST['project_category'];
        $itr=$_POST['iteration'];
        $owner=$_POST['OwnerEmail'];
          $this->db->select();
        $query = $this->db->query("SELECT `ProjectId`,`name`, `u_status`,`IterationId`, `PlanEst`  FROM `user_stories` WHERE `IterationId`='$itr' AND ProjectId=$id AND OwnerEmail='$owner' AND u_status='Warning' ");

        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
        
        
    }
    
    public function list_active(){
        $id=$_POST['project_category'];
        $itr=$_POST['iteration'];
        $owner=$_POST['OwnerEmail'];
          $this->db->select();
        $query = $this->db->query("SELECT `ProjectId`,`name`, `u_status`,`IterationId`, `PlanEst`  FROM `user_stories` WHERE `IterationId`='$itr' AND ProjectId=$id AND OwnerEmail='$owner' AND u_status='Active' ");

        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
        
        
    }
    
    public function get_iteration(){
         $project=$_POST['project'];
         
             $this->db->select();
        $query = $this->db->query("SELECT `i_name`,  FROM `iteration` WHERE `ProjectId`=$project  ");

        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
        
        
    }
    public function get_owner(){
        
        $project=$_POST['project'];
         
             $this->db->select();
        $query = $this->db->query("SELECT `ProjectId`,`i_name`,  FROM `iteration` WHERE `ProjectId`=$project  ");

        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
    
        public function get_project(){
        
        $project=$_POST['project'];
         
             $this->db->select();
        $query = $this->db->query("SELECT `project_id`,`project_name`,  FROM `project_summary` WHERE `ProjectId`=$project  ");

        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
    
    public function get_all_user_story($owner_email){
          $pro_id=$this->session->userdata('project_id');
         
         
             $this->db->select();
        $query = $this->db->query("SELECT u_status,StoryId,name, Description FROM `user_stories` WHERE OwnerEmail='$owner_email' AND ProjectId=$pro_id ");

        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
         
         
        
    }
    
    
}
?>
