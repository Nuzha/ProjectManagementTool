<?php

class Model_chart extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    function get_data() {
        $this->db->select();
        $query = $this->db->query("SELECT `name`, `u_pec` FROM `user_stories` WHERE `IterationId` = 'Iteration 01'");

        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

}

?>