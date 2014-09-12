<?php
class Project extends CI_Model{
    
    public function add_project(){
        
        $data = array(
                'project_name' => $this->input->post('projectname'),
                'start_date' => $this->input->post('startdate'),
                'end_date' =>$this->input->post('enddate'),
                'project_owner' =>$this->input->post('owner'),
              //  'num_of_iterations' => $this->input->post('no_of_iteration')
            
        );  
        $query = $this->db->insert('project_summary',$data);
        
        if($query){
            return true;
        }
        else{
            return false;
        }
        
    }
    // Retrieve all project records
    public function list_project(){
        return $this->db->get('project_summary');
    }
    
    // Retrieve one project record
  function getProject($id)
  {
    return $this->db->get_where('project_summary', array('project_id'=> $id));
  }

  // Update one project record
  function updateProject($id, $data)
  {
    $this->db->where('id', $id);
    $this->db->update('project_summary', $data); 
  }

  // Delete one project record
  function deleteProject($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('project_summary'); 
  }
  
  public function assign_developers($dev, $pro_id){
      $data =array(
          'project_id'=>$pro_id,
          'member_email'=>$dev,
          
      );
      
      
        $query = $this->db->insert('assign_members',$data);
        
        if($query){
            return TRUE;
        }
        else  {
            return false;
        }
      
  }
  public function get_All_developers(){
      
      $get_query=$this->db->query('SELECT Full_name FROM member WHERE type="developer"');
      
      return $get_query->result();
  }
  
  public function get_project_id($id){
      
//      $this->db->where('project_id', $id);
//   return $this->db->get('project_summary'); 
      
      
      
//      $get_id = $this->db->query("SELECT `project_id` FROM `project_summary` WHERE  `project_name`='$id'");
//        $test = $get_id;
//        return $test;
      
      
      
         $sql = "SELECT `project_id`, `project_name` FROM project_summary WHERE project_name='$id'";
         
        //Run the query
        $query_resource = mysql_query($sql);
        $project = mysql_fetch_assoc($query_resource);
       
        return $project;
  }
    
}

?>
