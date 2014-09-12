<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ajax_demo extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    function index() {

//        if (isset($_POST['type'])) {
//            echo   $_POST['type'];          
//            echo 'jckxvkjcnvkj';
//           $this->load->model('nodes_m');
//          $data['ajax_req'] = TRUE;
//           $data['node_list'] = $this->nodes_m->get_node_by_type($_POST['type']);
//           $this->load->view('template',$data);
//
//        }
//        else{
//         echo'error error error';
//        }
        //----------------------------------------
        
//        $data['id'] = $_GET['val'];
//      //echo $data['id']; 
//      //echo 'skjahkjshjkdkdh';
//         $this->load->view('template',$data);
        
        $type = $_GET['type'];
        
        //echo $type;
        $mail = $this->session->userdata['email'];

        $this->load->model('nodes_m');
        $data['ajax_req'] = TRUE;
        $data['node_list'] = $this->nodes_m->get_node_by_type($type,$mail);
        $this->load->view('dev_header');
        $this->load->view('template', $data);
        
     
     
    }
 
    function giveMoreData() {
            $mail =$this->session->userdata['email'];
            //echo $mail;
            $this->load->model('nodes_m');

            $data['view'] = 'ajax_index';
            $data['node_list'] = $this->nodes_m->get_node_list($mail);
            $this->load->view('dev_header');
            $this->load->view('template', $data);
        
              //  $this->load->view('template');
        }
  }
   

?>