<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class S_dev_iterationModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function listIterations() {
        return $this->db->get('iteration');
    }

    function listUserStories($mail) {
        return $this->db->get_where('user_stories', array('OwnerEmail' => $mail));
    }

    public function update_status($id, $status) {

        $data = array(
            'i_status' => $status,
        );

        $this->db->where('i_id', $id);
        $this->db->update('iteration', $data);
    }

    public function update_u_story_status($id, $status) {

        $data = array(
            'u_status' => $status,
        );

        $this->db->where('StoryId', $id);
        $this->db->update('user_stories', $data);
    }

    function add_defects_m($id, $des, $stat, $mail) {
        $data = array(
            'story_id' => $id,
            'defect_des' => $des,
            'defect_stat' => $stat,
            'defect_founder' => $mail
        );


        $this->db->insert('defect_log', $data);
    }

    function get_defects($mail) {

        $query = $this->db->query("SELECT COUNT(defect_id)as coun,story_id from defect_log where defect_founder='$mail' GROUP BY story_id");


        foreach ($query->result() as $defect) {

            $data = array(
                'story_id' => $defect->story_id,
                'defect_count' => $defect->coun,
            );

            $this->db->insert('defect_chart', $data);
        }
    }

    function get_defects_for_uid($uid) {
        return $this->db->get_where('defect_log', array('story_id' => $uid));
    }
    
    function get_tasks_for_uid($uid) {
        return $this->db->get_where('add_task', array('UStory_Id' => $uid));
    }

    public function update_defect_status($did, $dstatus) {
        $data = array(
            'defect_stat' => $dstatus,
        );

        $this->db->where('defect_id', $did);
        $this->db->update('defect_log', $data);
    }

    function get_defects_status($mail) {

        //$query = $this->db->query("SELECT COUNT(defect_id) from defect_log where defect_stat='In-Progress' AND defect_founder='kasun91@gmail.com'");
        $sql1 = "SELECT COUNT(defect_id) from defect_log where defect_stat='In-Progress' AND defect_founder='kasun91@gmail.com'";
        $res1 = mysql_query($sql1);
        $final1 = mysql_result($res1, 0);
        //echo $final1;

        $sql2 = "SELECT COUNT(defect_id) from defect_log where defect_stat='Completed' AND defect_founder='kasun91@gmail.com'";
        $res2 = mysql_query($sql2);
        $final2 = mysql_result($res2, 0);
        //echo $final2;

        $sql3 = "SELECT COUNT(defect_id) from defect_log where defect_stat='Defined' AND defect_founder='kasun91@gmail.com'";
        $res3 = mysql_query($sql3);
        $final3 = mysql_result($res3, 0);
        //echo $final3;

        $sql4 = "SELECT COUNT(defect_id) from defect_log where defect_stat='Testing' AND defect_founder='kasun91@gmail.com'";
        $res4 = mysql_query($sql4);
        $final4 = mysql_result($res4, 0);
        //echo $final4;

        $this->db->where('status', 'In-Progress');
        $this->db->update('defect_status', array('count' => $final1));

        $this->db->where('status', 'Completed');
        $this->db->update('defect_status', array('count' => $final2));

        $this->db->where('status', 'Defined');
        $this->db->update('defect_status', array('count' => $final3));

        $this->db->where('status', 'Testing');
        $this->db->update('defect_status', array('count' => $final4));
    }

}

?>
