<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mail extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('maildb', '', TRUE);
    }

    function index() {
        //This method will have the credentials validation
        $this->load->library('form_validation');

//   $this->form_validation->set_rules('inputemail', 'inputemail', 'trim|required|xss_clean');
        $this->form_validation->set_rules('emaillist', 'emaillist', 'trim|required|xss_clean');
        $this->form_validation->set_rules('inputmsg', 'inputmsg', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $this->load->view('page');
        } else {
            //Go to private area
            redirect('home', 'refresh');
        }
    }

    function check_database($password) {
        //Field validation succeeded.  Validate against database
        $list = $this->input->post('emaillist');
        $msg = $this->input->post('inputmsg');
        //query the database
        $result = $this->maildb->mails($list, $msg);
    }

}

?>
