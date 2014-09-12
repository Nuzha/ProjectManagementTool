<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Model_burndown extends CI_Model {


    public function __construct() {
        parent::__construct();
    }

    public function getUserStories($data) {
         $pro_name=$_POST['project_category'];
         $it_name=$_POST['iteration'];
         return $this->db->query("SELECT  num_of_userstories FROM  iteration WHERE i_name = '$it_name' AND `ProjectId` =$pro_name");
    }

    public function getDuration($data) {
         $pro_name=$_POST['project_category'];
         $it_name=$_POST['iteration'];
         return $this->db->query("SELECT  Duration FROM  iteration WHERE i_name = '$it_name' AND `ProjectId` =   $pro_name");

    }

    public function getEndDates($data) {
         $pro_name=$_POST['project_category'];
         $it_name=$_POST['iteration'];
         return $this->db->query("SELECT  end_date FROM  user_stories WHERE IterationId = '$it_name' AND `ProjectId` = $pro_name AND u_status = 'Success'");
    }
    
     public function getStartDate($data) {
         $pro_name=$_POST['project_category'];
         $it_name=$_POST['iteration'];
         return $this->db->query("SELECT  i_start_date FROM  iteration WHERE i_name = '$it_name' AND `ProjectId` = $pro_name");

    }
    
    public function getPlanEst($data) {
         $pro_name=$_POST['project_category'];
         $it_name=$_POST['release'];
         return $this->db->query("SELECT sum(PlanEst) FROM  user_stories WHERE `ProjectId` =$pro_name");
    }
    
     public function getIterations($data) {
         $pro_name=$_POST['project_category'];
         $it_name=$_POST['release'];
         return $this->db->query("SELECT  `it_id` FROM  `release` WHERE `project_id` = $pro_name");
    }
}

?>