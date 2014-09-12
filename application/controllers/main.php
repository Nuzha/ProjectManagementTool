<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('model_chart');
    }

    function index() {
        
        //$this->load->view('it_burndown');
        $this->login();
    }

 
//-------------------------------------------shamil----------------------------------------------------------
    public function registration_form() {
        $this->load->view('register_header');
        $this->load->view("view_registration");
    }

   public function signup_validate() {
   
        $this->load->view('register_header');  
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fname', 'Full Name', 'required|trim|xss_clean|alpha');
     

        $this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|valid_email|is_unique
[temp_users.email]|is_unique[member.email]');
        /* $this->form_validation->set_rules('username','Username','required|trim|xss_clean|callback_valid_username'); */
        $this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean|is_unique
[temp_users.tusername]|is_unique[member.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('confirmpassword', 'Confirm password', 'required|trim|matches[password]');

        $data['title'] = 'Signup';
        if ($this->form_validation->run()) {
            $config = Array(
				'protocol' => 'smtp',
			  	'smtp_host' => 'ssl://smtp.googlemail.com',
			  	'smtp_port' => 465,
			  	'smtp_user' => 'fadilanuzha@gmail.com',
			  	'smtp_pass' => 'mt1891mt1891',
			  	'mailtype' => 'html',
			  	'charset' => 'iso-8859-1',
			  	'wordwrap' => TRUE
			);
			$key=md5(uniqid());
                        $message="<h3><b>Agile Project Management Software</h3></b><br/>";
			$message.="Thank you for registering on our agile web tool .<br /><br />";
			$message.="<a href='" . base_url() . "main/activate/$key'><i>click here</i></a> to activate your 
account.";
			
                        $this->load->library('email');
                        $this->email->set_newline("\r\n");
                        $this->email->from('fadilanuzha@gmail.com'); 
                        $this->email->to($this->input->post('email'));
                        $this->email->subject('Agile Project Management Software');
			$this->email->message($message);

                        $this->load->model('users');
                        
    //       -----------------------------------------------image upload---------------------------------------------------------
                        $config_arr = array(
                'upload_path'   => './uploads/',
                'allowed_types' => 'gif|jpg|png',
                'max_size'      => '2048',
                'max_width'     => '1024',
                'max_height'    => '768',
                'encrypt_name'  => true,
                );         
            $this->load->library('upload', $config_arr);
            if (!$this->upload->do_upload()) {
                $data['errors'] = $this->upload->display_errors(); // this isn't working
            } else {
                $upload_data = $this->upload->data();
               
            }
//       --------------------------------------------------------------------------------------------------------
           
          
            if ($this->users->add_user_to_waiting($key)) {
                if ($this->email->send()) {
//					$this->load->view('header',$data);
                    var_dump($this->upload->data());
                    $this->load->view('view_registration_success');
                    $this->load->view('view_login');
//					$this->load->view('footer');
                         
                                   
                    
                    
                } else {
                    $this->load->view('c_General_fail_msg');
                    show_error($this->email->print_debugger());
                    //email not send';
//					$this->load->view('header',$data);
                    $this->load->view('view_registration');
//					$this->load->view('footer');					
                }
            } else {
                //not added to DB';
//				$this->load->view('header',$data);
                $this->load->view('view_registration');
//				$this->load->view('footer');
            }
        } else {
            //validation failed
//			$this->load->view('header',$data);
            $this->load->view('view_registration');
//			$this->load->view('footer');
        }
    }

    public function activate($key) {
        $data['title'] = 'Account Activation';
        $this->load->model('users');
        if ($this->users->is_activation_key_valid($key)) {
            if ($this->users->activate_user($key)) {
                $operations = array(
                    'status' => "success",
                    'message' => 'This account has being successfully activated. ');
                //$this->load->view('header');
                $this->load->view("view_registration_account_activation_status", $operations);
                // $this->load->view('footer');
            } else {
                $operations = array(
                    'status' => 'fail',
                    'message' => 'Error activating this account. Please try again later.');
               // $this->load->view('header');
                $this->load->view("view_registration_account_activation_status", $operations);
             //   $this->load->view('footer');
            }
        } else {
            $operations = array(
                'status' => 'invalid-key',
                'message' => 'Invalid activation-key. Please specify a valid activation-key to activate an account.
									<br /><br /> This error might have being occurred 
because,
									<br /> 
									<ul>
										<li> This profile is already being 
activated.</li>
										<li> There\'s no user with this 
activation-key in the user waiting list.</li>
									</ul>');
          //  $this->load->view('header', $data);
            $this->load->view("view_registration_account_activation_status", $operations);
         //  $this->load->view('footer');
        }
    }
      public function show_profile(){
         $this->load->view('header');
        //$this->load->view('left_side');
        $this->load->model('users');
        $data['profile']=  $this->users->get_profile_details();
         $this->load->view('User_profile', $data);
         $this->load->view('footer');
        
    }

    //starting my other function
    public function create_new_project() {
        $this->load->view('header');
       // $this->load->view('left_side');
        $data['include'] = 'n_right_side';
        $this->load->view('create_project',$data);
         //$this->load->view('n_right_side');
        $this->load->view('footer');
    }

    public function create_validate() {

        $this->load->view('header');
       // $this->load->view('left_side');
        $this->load->view('footer');

        $this->load->library('form_validation');
        $this->form_validation->set_rules('projectname', 'Project Name', 'required|trim|xss_clean|is_unique[project_summary.project_name]');
        $this->form_validation->set_rules('startdate', 'Start Date', 'required|trim|xss_clean');
        /* $this->form_validation->set_rules('email','Email','required|trim|xss_clean|valid_email|callback_valid_email'); */
        $this->form_validation->set_rules('enddate', 'End Date', 'required|trim|xss_clean');
        /* $this->form_validation->set_rules('username','Username','required|trim|xss_clean|callback_valid_username'); */
        $this->form_validation->set_rules('owner', 'Owner', 'required|trim|xss_clean');
       // $this->form_validation->set_rules('no_of_iteration', 'Number Of Iteration', 'required|trim');

        if ($this->form_validation->run()) {
            $this->load->model('project');

            if ($this->project->add_project()) {
                $this->load->view('view_create_project_sucessfull');
                 $this->load->view('create_project');
            }
        } else {

            $this->load->view('create_project');
        }
    }
    
    function Project_listing()
      {
        //$this->load->library('table');

        $this->load->model('project','',TRUE);
        $data['it_qry'] = $this->project->list_project();        
        $this->load->view('header');
        $this->load->view('left_side');
        $this->load->view('footer');
        $this->load->view('view_available_projects', $data);
      }

   

    public function project_edit() {
        $this->load->helper('form');
        $id = $this->uri->segment(3);
        $this->load->model('project');
        $data['row'] = $this->project->getProject($id)->result();
        $this->load->view('header');
        $this->load->view('left_side');
        $this->load->view('view_edit_project', $data);
    }

    public function project_update() {
        $this->load->model('project');
        $this->project->updateProject($_POST['id'], $_POST);
        $this->load->view('header');
        $this->load->view('left_side');
        redirect('main/project_listing', 'refresh');
    }

    public function project_delete() {
        $id = $this->uri->segment(3);
        $this->load->model('project');
        $this->project->deleteProject($id);
        $this->load->view('header');
        $this->load->view('left_side');
        redirect('main/project_listing', 'refresh');
    }

    public function project_assign_developer() {

        $this->load->helper('form');
        $id = $this->uri->segment(3);
        $this->load->model('project');
        $data['row'] = $this->project->getProject($id)->result();
        $data['developers'] = $this->project->get_All_developers();

        // $this->project->assign_developers();

        $this->load->view('header');
        $this->load->view('left_side');
        $this->load->view('view_assign_developer', $data);
    }

    public function get_dropdown() {
        
    }

    public function add_developer() {
        $this->load->view('header');
      //  $this->load->view('left_side');
         $this->load->view('footer');
        $developer = $this->input->post('tot');
        $project_id=$this->session->userdata('project_id');
        $this->load->model('project');
        
        if($this->project->assign_developers($developer, $project_id)){
            $this->load->view('assign_successfull');
            
        }
        else{
             $this->load->view('c_General_fail_msg');
        }
        
        
    }

    public function viewChart() {

        $data['graph'] = $this->model_chart->get_data();
        $this->load->view('header');
        $this->load->view('left_side');
        $this->load->view('view_chart', $data);
    }
public function assign_member(){
     $this->load->view('header');
      //  $this->load->view('left_side');
         $this->load->view('view_assign_developer');
        $this->load->view('footer');
    
}

    //finishing my other function
//-------------------------------------------Surani---------------------------------------------------------- 
//---------------------user story scrum master---------------------------------------------------


    public function test_function() {
        $this->load->view('header');
        $this->load->view('left_side');
    }

    function userStory() {

        $data['title'] = "Add User Story";
        $data['headline'] = "";
        $data['include'] = 'add_uerstory_view';
        $this->load->model('Model_userStory', '', TRUE);
        
        $data['email_list'] = $this->Model_userStory->get_mail();
        $pid=$this->session->userdata('project_id');
        $data['iteration_list'] = $this->Model_userStory->get_iteration($pid);
        $this->load->view('header');
      //  $this->load->view('left_side');
        $this->load->view('template1', $data);
        $this->load->view('footer');
    }

    function create() {
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_story', 'User Story', 'required');
        $this->form_validation->set_rules('email', 'Owner Email',  'trim|required|valid_email');

		if ($this->form_validation->run() == FALSE)
		{   
                         
                         $this->load->model('Model_userStory', '', TRUE);
                         $data['title'] = "Add User Story";
                         $data['headline'] = "";
                         $data['include'] = 'add_uerstory_view';
                         $data['email_list'] = $this->Model_userStory->get_mail();
                         $pid=$this->session->userdata('project_id');
                         $data['iteration_list'] = $this->Model_userStory->get_iteration($pid);
                         $this->load->view('header');
                         
                          $this->load->view('template', $data);
                        $this->load->view('footer');
		}
		else
		{   
                    $this->load->model('Model_userStory', '', TRUE);
                    $this->Model_userStory->add_userStory();
                    redirect('Main/userStory', 'refresh');
		}
    }

    function listing() {
        $this->load->library('table');

        $this->load->model('Model_userStory', '', TRUE);
        $userStory_qry = $this->Model_userStory->listUserStories();

        // generate HTML table from query results
        $tmpl = array(
            'table_open' => '<table border="0" cellpadding="8" cellspacing="5" >',
            'heading_row_start' => '<tr bgcolor="#66cc44">',
            'row_start' => '<tr bgcolor="#dddddd">'
        );
        $this->table->set_template($tmpl);

        $this->table->set_empty("&nbsp;");

        $this->table->set_heading('', 'Project Id', 'User Story', 'Descrption', 'Iteration', 'Plan Estimation', 'Status', 'Owner Email');


        $table_row = array();
        foreach ($userStory_qry->result() as $story) {
            $table_row = NULL;
            $table_row[] = '<nobr>' .
                    anchor('Main/edit/' . $story->StoryId, 'edit') . ' | ' .
                    anchor('Main/delete/' . $story->StoryId, 'delete', "onClick=\" return confirm('Are you sure you want to '
            + 'delete the record for $story->StoryId?')\"") . ' | ' .
                    anchor('Main/add_task/' . $story->StoryId, 'add tasks') .
                    '</nobr>';
            // replaced above :: $table_row[] = anchor('student/edit/' . $student->id, 'edit');
            //$table_row[] = $student->s_name;
            $table_row[] = $story->ProjectId;
            //$table_row[] = $story->address;
            $table_row[] = $story->name;
            $table_row[] = $story->Description;
            $table_row[] = $story->IterationId;
            $table_row[] = $story->PlanEst;
            $table_row[] = $story->u_status;
            $table_row[] = mailto($story->OwnerEmail);

            $this->table->add_row($table_row);
        }

        $userStory_table = $this->table->generate();

        // generate HTML table from query results
        // replaced above :: $students_table = $this->table->generate($students_qry);
        // display information for the view
        $data['title'] = "user story listing";
        $data['headline'] = "User Story Listing";
        $data['include'] = 'userStory_listing_view';

        $data['data_table'] = $userStory_table;
        $this->load->view('header');
        $this->load->view('left_side');
        $this->load->view('template1', $data);
    }

    function edit() {
        $this->load->helper('form');
        $this->load->model('Model_userStory', '', TRUE);

        $data['email_list'] = $this->Model_userStory->get_mail();
        $pid = $this->session->userdata('project_id');
        $data['iteration_list'] = $this->Model_userStory->get_iteration($pid);

        $id = $this->uri->segment(3);
        $this->load->model('Model_userStory', '', TRUE);
        $data['row'] = $this->Model_userStory->getStory($id)->result();

        // display information for the view
        $data['title'] = "Edit User Story";
        $data['headline'] = "";
        $data['include'] = 'userStoryEdit';

        $this->load->view('header');
        $this->load->view('left_side');

        $this->load->view('template1', $data);
    }

    function update() {
        //$id = $this->uri->segment(3);
        $this->load->model('Model_userStory', '', TRUE);
        $this->Model_userStory->updateStory($_POST['StoryId'], $_POST);
        redirect('scrum_master/UserStorylisting', 'refresh');
    }

    function delete() {
        $id = $this->uri->segment(3);

        $this->load->model('Model_userStory', '', TRUE);
        $this->Model_userStory->deleteStory($id);
        redirect('scrum_master/UserStorylisting', 'refresh');
    }

    //-------------------task---------------------------------------------------------------------------------- 

    function add_task() {
        $this->load->helper('form');
        $data['base'] = $this->config->item('base_url');
        $id = $this->uri->segment(3);
        $this->load->model('Model_userStory', '', TRUE);
        $data['row'] = $this->Model_userStory->getStory($id)->result();


        $data['query'] = $this->Model_userStory->get_all_task($id);

        // display information for the view
        $data['title'] = "Add tasks";
        $data['headline'] = "";
        $data['include'] = 'add_task';
        $this->load->view('header');
        $this->load->view('left_side');

        $this->load->view('template1', $data);
    }

    function re_add_task() {

        $this->load->helper('form');
        $data['base'] = $this->config->item('base_url');
        $id1 = $this->uri->segment(3);
        $this->load->model('Model_userStory', '', TRUE);
        $tas = $this->Model_userStory->get_Story_Id_where_taskId($id1)->result();
        $id = $tas[0]->UStory_Id;
        $data['row'] = $this->Model_userStory->getStory($id)->result();


        $data['query'] = $this->Model_userStory->get_all_task($id);

        // display information for the view
        $data['title'] = "Add tasks";
        $data['headline'] = "";
        $data['include'] = 'add_task';

        $this->load->view('header');
        $this->load->view('left_side'); 
        $this->load->view('template1', $data);
    }

    public function insert_Task() {
        $this->load->model('Model_userStory', '', TRUE);
        $this->Model_userStory->add_task();
        $this->load->helper('url');
        redirect('Main/re_add_task/' . $this->db->insert_id());
    }

//---------------------------------------------------------fadila---------------------------------------------------
    //Login
    public function login() {
        $this->load->view('view_login');
    }

    public function signup() {
        $this->load->view('signup');
    }

    public function members() {

        if ($this->session->userdata('is_logged_in')) {

            if ($this->session->userdata('type') == "Scrum Master") {
                $this->load->view('header');
                $this->load->view('left_side');
                $this->load->view('footer');
            } else if ($this->session->userdata('type') == "Developer") {
                $this->load->view('dev_header');
                $this->load->view('dev_leftside');
                $this->load->view('footer');
            }
        } else {
            redirect('main/restricted');
        }
    }

    public function restricted() {
        $this->load->view('restricted');
    }

    
    public function login_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_validate_credentials');
        $this->form_validation->set_rules('password', 'Password', 'required|md5');

        if ($this->form_validation->run()) {

            // -----------------------------newly added-------------------------------------------------------------
            $this->load->model('model_users');
            $temp_email = $this->input->post('email');
            //   $username['re']= $this->model_users->get_username($temp_email);

            $query = "SELECT `username` ,`type`, `id` FROM member WHERE `email`='$temp_email'";
            
            $query_run = mysql_query($query);
            $user = mysql_fetch_assoc($query_run);
            $get_user = $user['username'];
            $type = $user['type'];
            $id = $user['id'];
            
            //------------------------------------------------------------------------------------------
            $data = array(
                'type' => $type,
                'USERNAME' => $get_user,
                'email' => $this->input->post('email'),
                'userid' => $id,
                'is_logged_in' => 1,
                'loginTime' => time(),
            );
            
            $this->session->set_userdata($data);
            $this->model_users->recordLoggedInTime();  
            redirect('main/members');
            
          //  $this->load->model('s_dev_iterationModel', '', TRUE);         
            
        } else {
            // $this->load->view('view_login');

            redirect('main/restricted');
        }
    }

    public function validate_credentials() {
        $this->load->model('model_users');

        if ($this->model_users->can_log_in()) {
            return true;
        } else {
            $this->form_validation->set_message('validate_credentials', 'Incorrect Email / Password.');
            return false;
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('main/login');
    }

    //Iteration Management--------------------

    public function Iteration() {
         $id['pro_id']=$this->session->userdata('project_id');
        
         $this->load->model('project');
         
          
        if($this->session->userdata('project_id')){
            
           
          $id['row_i']=$this->project->getProject($id['pro_id'])->result();
        $this->load->view('header');
      //  $this->load->view('left_side');
       $this->load->view('footer');
        $this->load->view('c_iteration_project_header',$id);
        
        $this->load->view('iteration',$id);
        
        
        
        
            
        }
        else{
            $id['row_i']="NULL";
            $this->load->view('header');
    //    $this->load->view('left_side');
        $this->load->view('footer');
         $this->load->view('project_not_selected');
         
      
         $this->load->view('c_iteration_project_header',$id);
         
        }
    }

    function createIteration() {
        $this->load->helper('url');

        $this->load->model('model_iteration', '', TRUE);
        $this->model_iteration->add_iteration($this->session->userdata('project_id'));
       
        redirect('main/Iteration', 'refresh');
         $this->load->view('c_Iteration_create_sucessfull');
    }

    function Iterationlisting() {
        $this->load->library('table');

        $this->load->model('model_iteration', '', TRUE);
        $it_qry = $this->model_iteration->listIterations();

        // generate HTML table from query results
        $tmpl = array(
            'table_open' => '<table border="0" cellpadding="8" cellspacing="5">',
            'heading_row_start' => '<tr bgcolor="#66cc44">',
            'row_start' => '<tr bgcolor="#dddddd">'
        );

        $this->table->set_template($tmpl);
        $this->table->set_empty("&nbsp;");
        $this->table->set_heading('', 'Project Id', 'Iteration Name', 'Start date', 'End date', 'Status');

        $table_row = array();

        foreach ($it_qry->result() as $col) {
            $table_row = NULL;
            $table_row[] = '<nobr>' .
                    anchor('Main/editIteration/' . $col->i_id, 'edit') . ' | ' .
                    anchor('Main/delete/' . $col->i_id, 'delete', "onClick=\" return confirm('Are you sure you want to '
                + 'delete the record for $col->i_id?')\"") .
                    '</nobr>';
            // replaced above :: $table_row[] = anchor('student/edit/' . $student->id, 'edit');
            //$table_row[] = $student->s_name;
            //$table_row[] = $col->i_id;
            $table_row[] = $col->ProjectId;

            $table_row[] = $col->i_name;
            $table_row[] = $col->i_start_date;
            $table_row[] = $col->i_end_date;
            $table_row[] = $col->i_status;

            $this->table->add_row($table_row);
        }

        $userStory_table = $this->table->generate();

        // generate HTML table from query results
        // replaced above :: $students_table = $this->table->generate($students_qry);
        // display information for the view
        $data['title'] = "Iteration Listing";
        $data['headline'] = "Iteration Listing";
        // $data['include'] = 'iteration_listing_view';

        $data['data_table'] = $userStory_table;

        $this->load->view('header');
        $this->load->view('left_side');

        $this->load->view('iteration_listing_view', $data);
    }

    function editIteration() {
        $this->load->helper('form');

        $id = $this->uri->segment(3);       //
        $this->load->model('Model_iteration', '', TRUE);
        $data['row'] = $this->Model_iteration->getIteration($id)->result(); //calling wrong function
        // display information for the view
        //$data['title'] = "Edit User Story";
        //$data['headline'] = "Edit User Story Information";
        //$data['include'] = 'userStoryEdit';
        $this->load->view('header');
        $this->load->view('left_side');

        $this->load->view('edit_iteration', $data);
    }

    function updateIteration() {
        //$id = $this->uri->segment(3);
        $this->load->model('Model_iteration', '', TRUE);
        $this->Model_iteration->updateIteration($_POST['i_id'], $_POST); //
        redirect('Main/Iterationlisting', 'refresh');
    }

}

?>