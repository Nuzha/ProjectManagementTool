<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class calendar extends CI_Controller {

    public function __construct() {
        parent::__construct();

       
    }

    function index() {
        
        //$this->load->library('');
        //$this->load->view('calendar');
//        $this->load->view('create_events');
        //$this->login();
        
        $data['id'] = $_GET['val'];
        $pid=$data['id']; 
        //echo $pid;
        


            
        $this->load->model('events');   
        $data['ajax_req'] = TRUE;
        $data['members'] = $this->events->get_members($pid);
        $this->load->view('create_events', $data);
       
    }
    
    function display(){
      $data['ajax_req'] = FALSE;
      $this->load->view('dev_header');
      $this->load->view('create_events',$data);
      
//        $this->load->view('calendar');
//        $this->load->view('getchart_hrs');
    }
    
    function display_cal(){
       $this->load->view('dev_header');
       $data['year']= 2014;
       $data['month']=08;
       
       $this->load->view('calendar',$data); 
    }
    
    function submit(){
        $ppid = $_POST['myselect'];
        //echo $ppid;
        $box=$_POST['members'];
        $title=$_POST['title'];
        $description=$_POST['description'];
        $var=$_POST['event_date'];
        $date = str_replace('/', '-', $var);
        $event_date= date('Y-m-d', strtotime($date));
        //echo $event_date;
        foreach($box as $entry){
            
            $sql5="insert into event_chk (pro,mail,title,description,event_date) values('$ppid','$entry','$title','$description', $event_date) ";
            mysql_query($sql5);
        }
        redirect('calendar/display', 'refresh');
        
        
        function a_submit(){
            
        $ppid = 1;
        echo $ppid;
        $box=$_GET['box'];
        $title=$_GET['title'];
        $description=$_GET['description'];
        $var=$_GET['e_date'];
        $date = str_replace('/', '-', $var);
        $event_date= date('Y-m-d', strtotime($date));
        echo $event_date;
        foreach($box as $entry){
            
            $sql5="insert into event_chk (pro,mail,title,description,event_date) values('$ppid','$entry','$title','$description', $event_date) ";
            mysql_query($sql5);
        
    }
    
    
    
    }
    }
}