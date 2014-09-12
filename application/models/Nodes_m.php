<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nodes_m extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
	$this->load->database();
    }
    private $table = "node";
 
    function get_node_list($mail) {
//      $this->db->select('title,type');
//      //$this->db->order_by('created','DESC');
//      //$this->db->limit(30,0);
//      $query = $this->db->get($this->table);
//
//      return $query->result();
        
        $sql="SELECT `defect_id` as id,`defect_des` as description,`defect_stat` as status FROM `defect_log` WHERE `defect_founder`='$mail'";
        return $this->db->query($sql);
    }

    function get_node_by_type($type,$mail) {
//      $this->db->select('title,type');
//      $this->db->where('type',$type,'=');
//     // $this->db->order_by('created','DESC');
//      $query = $this->db->get($this->table);
//
//      return $query->result();
      
      if ($type=="defects"){
          
          $sql="SELECT `defect_id` as id,`defect_des` as description,`defect_stat` as status FROM `defect_log` WHERE `defect_founder`='$mail'";
          return $this->db->query($sql);
      }
      if($type=="userstories")
      {
          
          $sql1="SELECT `StoryId` as id,`name` as description, `u_status` as status FROM `user_stories` WHERE `OwnerEmail`='$mail'";
          return $this->db->query($sql1);
      }
    }
}
?>
