<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_iteration extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
	$this->load->database();
    }
    
    
    

    public function add_iteration($id)
    {
            $data=array(
                    'ProjectId'=>$id,
                    'i_name'=>$this->input->post('iterationname'),
                    'i_start_date'=>$this->input->post('I_start_date'),
                    'i_end_date'=>$this->input->post('I_end_date'),
                     'i_status'=>'Defined'
                    );
            $this->db->insert('iteration',$data);
    }

    function listIterations()
    {
      return $this->db->get('iteration');
    }
    
    function getIteration($id)
    {
      return $this->db->get_where('iteration', array('i_id'=> $id));
    }	
    
    function updateIteration($id, $data)
    {
      $this->db->where('i_id', $id);
      $this->db->update('iteration', $data); 
    }
    
    function it_id($id)
    {
      return $this->db->get_where('user_stories', array('StoryId'=> $id));
    }	
 
    function get_activity()
          {
    $query = $this->db->query("SELECT  `u_status` , COUNT( * ) AS progress 
                FROM  `user_stories` 
                WHERE  `u_status` =  'Completed'
                GROUP BY  `IterationId`");
             if($query->num_rows()>0) {
                 return $query->result();
              }
             else {
                  return NULL;}
     }
}