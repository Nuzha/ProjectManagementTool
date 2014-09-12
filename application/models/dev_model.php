<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dev_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
	$this->load->database();
    }
   
 
    function get(){       
        $sql="select user_stories.StoryId as tit,user_stories.name as con,userstory_audit.changetype as type from userstory_audit,user_stories where user_stories.StoryId=userstory_audit.u_id";
        return $this->db->query($sql);        
    } 
    
    function getdefects(){       
        $sql1="select defect_log.defect_id as tit,defect_log.defect_des as con,defect_audit.changetype as type from defect_audit,defect_log where defect_log.defect_id=defect_audit.d_id ";
        return $this->db->query($sql1);        
    } 
    
    
}