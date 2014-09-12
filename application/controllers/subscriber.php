
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Subscriber extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('Datatables');
        $this->load->library('table');
        $this->load->database();
    }
    function index()
    {

        //set table id in table open tag
        $tmpl = array ( 'table_open'  => '<table id="big_table" border="1" cellpadding="2" cellspacing="1" class="mytable">' );
        $this->table->set_template($tmpl); 
        
        $this->table->set_heading('Title','Type');

        $this->load->view('subscriber_view');
    }
    //function to handle callbacks
    function datatable()
    {
//        $t='article';
//        $this->datatables->select('id,title,type')
//        ->unset_column('id')
//        ->from('node')
//        ->where('type==','article');
        
         $this->datatables->select('id,title,type');
         $this->datatables->from('node');
         $this->datatables->where('type == "image"');
        
        
        echo $this->datatables->generate();
    }
    
    function chart(){
        $this->load->view('getchart_hrs');
    }
}