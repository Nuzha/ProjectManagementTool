 
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Paginations extends CI_Controller 
{
    public function __construct() {
        parent:: __construct();
        $this->load->helper("url");
        $this->load->model("user_list");
        $this->load->library("pagination");
    }

    public function example1() {
        $config = array();
        $config["base_url"] = base_url() . "index.php/paginations/example1";
        $config["total_rows"] = $this->user_list->record_count();
        $config["per_page"] = 2;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->user_list->
            fetch_users($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

        $this->load->view("user_pagin", $data);
    }
}