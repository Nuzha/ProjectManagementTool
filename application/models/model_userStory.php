<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_userStory extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function add_userStory() {
        $data = array(
            'ProjectId' => $this->session->userdata('project_id'),
            'name' => $_POST['user_story'],
            'Description' => $_POST['description'],
            'IterationId' => $_POST['iteration'],
            'OwnerEmail' => $_POST['email'],
            'PlanEst' => $_POST['plan_estimation'],
            'u_status' => 'Defined'
        );
        $this->db->insert('user_stories', $data);
    }

    function listUserStories($pro_id) {
//      return $this->db->get_where('user_stories',array('ProjectId'=> $pro_id));
        return $this->db->query("select * from user_stories where ProjectId=$pro_id order by listorder");
    }

    function getStory($id) {
        return $this->db->get_where('user_stories', array('StoryId' => $id));
    }

    function updateStory($id, $data) {
        $this->db->where('StoryId', $id);
        $this->db->update('user_stories', $data);
    }

    function deleteStory($id) {
        $this->db->where('StoryId', $id);
        $this->db->delete('user_stories');
    }

    public function get_mail() {
        //$this->db->select('OwnerEmail');
        //$result=$this->db->get('user_stories');
        //$return = array();
        //if($result->num_rows() >0)
        //{
        //foreach($result->result_array() as $row)
        //	{
        //	$return['id']=$row['OwnerEmail'];
        //	}
        //}
        //return $return;

        $query = $this->db->query('select distinct StoryId , OwnerEmail  from user_stories');
        $dropdowns = $query->result();
        foreach ($dropdowns as $dropdown) {
            $dropDownList[$dropdown->OwnerEmail] = $dropdown->OwnerEmail;
        }
        //$dropDownOptions = array('' => 'SELECT', '0' => 'None');
        //$finalDropDown = $dropDownOptions + $dropDownList;
        $finalDropDown = $dropDownList;
        return $finalDropDown;
    }

    public function get_iteration($pid) {


        $query = $this->db->query("select `IterationId`  from user_stories where ProjectId='$pid'");
        $dropdowns = $query->result();
        foreach ($dropdowns as $dropdown) {
            $dropDownList[$dropdown->IterationId] = $dropdown->IterationId;
        }
        //$dropDownOptions = array('' => 'SELECT', '0' => 'None');
        //$finalDropDown = $dropDownOptions + $dropDownList;
        $finalDropDown = $dropDownList;
        return $finalDropDown;
    }

//------------------------------------------------------------task---------------------------------------------------------------
    public function add_task() {

        $data = array(
            'UStory_Id' => $_POST['StoryId'],
            'UStory_name' => $_POST['Story'],
            'T_name' => $_POST['task_name'],
            'T_Description' => $_POST['task_des']
        );
        $this->db->insert('add_Task', $data);
    }

    public function get_all_task($id) {
        $query = $this->db->get_where('add_Task', array('UStory_Id' => $id));
        return $query->result();
    }

    public function get_Story_Id_where_taskId($id) {
        return $this->db->get_where('add_Task', array('Task_Id' => $id));
        //$this->db->select('Task_Id');
        //$this->db->from('add_Task');
        //return $qu=$this->db->where('Task_Id'=>$id);
        //return $query_task->result();
    }

}

?>