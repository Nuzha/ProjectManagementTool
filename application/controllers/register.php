<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	//Testing
	public function index()
	{
		$this->register_view_load();
	}
        public function register_view_load(){
            $this->load->view('register_page');
        }
        
        public function members(){
            
            $this->load->view('members');
        }

        public function register_validation(){
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('email','Email','required|trim|valid_email');
            $this->form_validation->set_rules('password','Password','required|trim');
            
            $this->form_validation->set_rules('FullName','Full Name','required|trim');
            $this->form_validation->set_rules('UserName','User Name','required|trim');
            
            $this->form_validation->set_rules('ConfirmPassword','Confirm Password','required|trim|matches[password]');
            
            $this->form_validation->set_message('is_unique', "That email is already taken");
            
            
            if($this->form_validation->run()){
                $key=  md5(uniqid());
                
                $this->load->library('email', array('mailtype'=>'html'));
                
              
                $this->email->to($this->input->post('email'));
                echo $this->input->post('email');
               
                
                $this->email->subject("confirm your account");
                
                $message="<P> Thank you for signing up!</p>";
                $message.="<p><a href='".base_url()."register/register_user/$key' > Click here</a>to confirm your account</p>";
                
                $this->email->message($message);
                  $this->email->from("rally@rally.com","clement");
                
                if($this->email->send())
                {
                    echo "Email has been sent";
                }
                else{
                    echo "failed";
                    echo $this->email->print_debugger();
                }
                
                    $to=$this->input->post('email');
                    $subject="confirm your account";
                    $message="<P> Thank you for signing up!</p>";
                    $message.="<p><a href='".base_url()."register/register_user/$key' > Click here</a>to confirm your account</p>";
                    
                 mail($to,$subject,$message,"From: phpmy@wow.com\n");
                
                
            }
            else
            {
                echo "no pass";
                $this->load->view('register_page');
            }
           
        }
        
        public function validate_credentials(){
         
            
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */