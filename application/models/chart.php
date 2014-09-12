<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Chart extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function update($data) {
        $this->db->where('status', 'success');
        $this->db->update('userstorystatus', array('count' => $_POST['success']));

        $this->db->where('status', 'warning');
        $this->db->update('userstorystatus', array('count' => $_POST['warning']));

        $this->db->where('status', 'active');
        $this->db->update('userstorystatus', array('count' => $_POST['active']));
    }

    public function get_projectname() {

        $query = $this->db->query('select project_name from project_summary');
        $dropdowns = $query->result();
        foreach ($dropdowns as $dropdown) {
            $dropDownList[$dropdown->project_name] = $dropdown->project_name;
        }
        //$dropDownOptions = array('' => 'SELECT', '0' => 'None');
        //$finalDropDown = $dropDownOptions + $dropDownList;
        $finalDropDown = $dropDownList;
        return $finalDropDown;
    }

}

?>
