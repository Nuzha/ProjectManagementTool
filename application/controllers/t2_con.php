<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class t2_con extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
function index() {
    $data['id'] = $_GET['val'];
      //echo $data['id']; 
      //echo 'skjahkjshjkdkdh';
     $this->load->view('t2',$data);
    
}

function aa(){
    //if (isset($_POST['val'])) {
      
      
      
      $this->load->view('t2');
      //$this->load->view('t2',$data);
   // }
}

}