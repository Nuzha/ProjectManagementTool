<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Upload_ducument extends CI_Controller{
    
    public function index(){
        
    }
    
public function list_attachment(){
        
        $this->load->view('dev_header');
        $this->load->view('list_all_attachments');
        
        
    }

}
?>
