<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class scrum_master extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    function index() {
        // $this->UserStorylisting();
        $this->update_priority();
    }

    function userStoryListing() {
        //$this->load->library('table');
        $pro_id = $this->session->userdata('project_id');
        $this->load->model('model_userStory', '', TRUE);
        $data['userStory_qry'] = $this->model_userStory->listUserStories($pro_id);
        $this->load->view('header');
        //$this->load->view('left_side');
        $this->load->view('scrum_backlog', $data);
    }

    public function change_priority() {
        $this->load->view('header');
        $this->load->view('change_priority');
    }

    public function update_priority() {

        $this->load->model('updateList', '', TRUE);
        $array = $_POST['arrayorder'];

        $update = $_POST['update'];

        $this->updateList->update($array, $update);


        redirect('scrum_master/change_priority', 'refresh');

        //echo 'sdfsdf';
    }

    public function view_page() {
        $this->load->view('header');
        $this->load->view('additional_document');
    }

    public function get_user_stories() {
        $this->load->view('header');
        $this->load->view('additional_document');

        $owner_email = $_POST['developers'];
        $this->session->set_userdata('storyEmail', $owner_email);
        $this->load->model('c_work_by_person', '', TRUE);
        $data['userStory'] = $this->c_work_by_person->get_all_user_story($owner_email);
        $this->load->view('assigned_user_stories', $data);
    }

    public function upload_file() {
        $this->load->view('header');
        $this->load->model('upload_file');
        $config_arr = array(
            'upload_path' => './uploads/',
            'allowed_types' => 'gif|jpg|png',
            'max_size' => '2048',
            'max_width' => '1024',
            'max_height' => '768',
            'encrypt_name' => true,
        );
        $this->load->library('upload', $config_arr);
        if (!$this->upload->do_upload()) {
            $data['errors'] = $this->upload->display_errors(); // this isn't working
        } else {
            $upload_data = $this->upload->data();
        }
        if ($this->upload_file->file_upload()) {
            $this->load->view('discussion_sucessfull_message');
        } else {
            $this->load->view('c_General_fail_msg');
        }
    }

    public function testing() {
        $this->load->view('header');
        if (isset($_FILES['uploaded_file'])) {
            // Make sure the file was sent without errors
            if ($_FILES['uploaded_file']['error'] == 0) {
                // Connect to the database
                $dbLink = new mysqli('127.0.0.1', 'root', 'root', 'sep_db');
                if (mysqli_connect_errno()) {
                    die("MySQL connection failed: " . mysqli_connect_error());
                }

                // Gather all required data
                $name = $dbLink->real_escape_string($_FILES['uploaded_file']['name']);
                $mime = $dbLink->real_escape_string($_FILES['uploaded_file']['type']);
                $data = $dbLink->real_escape_string(file_get_contents($_FILES ['uploaded_file']['tmp_name']));
                $size = intval($_FILES['uploaded_file']['size']);
                $storyID = $_POST['StoryID'];
                $des = $_POST['description'];
                $email = $this->session->userdata('storyEmail');

                // Create the SQL query
                $query = "
            INSERT INTO `file` (
                `name`, `mime`, `size`, `data`, `created`,`StoryId`,`OwnerEmail`,`Description`
            )
            VALUES (
                '{$name}', '{$mime}', {$size}, '{$data}', NOW(),'{$storyID}','{$email}','{$des}'
            )";

                // Execute the query
                $result = $dbLink->query($query);

                // Check if it was successfull
                if ($result) {
//            echo '<div id="page_wrapper"><div class="row">Success! Your file was successfully added!</div></div>';
                    $this->load->view('attachement_successfull');
                } else {
                    echo 'Error! Failed to insert the file'
                    . "<pre>{$dbLink->error}</pre>";
                }
            } else {
                echo 'An error accured while the file was being uploaded. '
                . 'Error code: ' . intval($_FILES['uploaded_file']['error']);
            }

            // Close the mysql connection
            $dbLink->close();
        } else {
            echo 'Error! A file was not sent!';
        }

// Echo a link back to the main page
        echo '<p>Click <a href="index.html">here</a> to go back</p>';
    }

    public function list_all_attachment() {

        $this->load->view('header');
        $this->load->view('list_all_attachments');
    }

    public function att_download($id) {
        $this->load->view('header');
    }

}

?>
