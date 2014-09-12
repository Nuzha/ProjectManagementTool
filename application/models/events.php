<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class events extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
	$this->load->database();
    }
    
 
    function get_members($pid) {
//      $this->db->select('title,type');
//      //$this->db->order_by('created','DESC');
//      //$this->db->limit(30,0);
//      $query = $this->db->get($this->table);
//
//      return $query->result();

       $sql=" SELECT `member_email` FROM `assign_members` WHERE `project_id`='$pid'";
       return $this->db->query($sql);
    }  
    
}