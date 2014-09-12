<?php

    class Model_users extends CI_Model {
        
        public function can_log_in(){
		
		$this->db->where('email',$this->input->post('email'));
		$this->db->where('password',md5($this->input->post('password')));
		$query = $this->db->get('member');
		
		if($query->num_rows() == 1){
			return true;
		}
		else{
			return false;
		}
	}
        public function get_username($email){
            $this->db->where('email', $email);
            $query=$this->db->get('member');
//            $query="SELECT `username` FROM `member` WHERE `email`=$email";
//            
//            $query_run=mysql_query($query);
//            
//            $user=  mysql_fetch_assoc($query_run);
//            $get_user=$user['username'];
            return  $query->result();
            
            
            
        }
        public function add_temp_users($key){
            $data = array(
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'key' => $key
            );
            
            $query = $this->db->insert('temp_users', $data);
            if($query){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
        
        public function recordLoggedInTime(){
           
            $email = $this->input->post('email');               
            $date = time();
            
            $data = array(
               'loginTime' => $date
            );
            
            $this->db->where('email', $email);
            $this->db->update('member', $data); 
            return TRUE;
            
        }
   }
?>
