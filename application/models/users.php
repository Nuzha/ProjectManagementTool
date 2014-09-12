<?php

class Users extends CI_Model{

	/*when a user sign up. this function will add them to the user waiting list. */
	public function add_user_to_waiting($key){
                    $upload_data = $this->upload->data();
		$data = array (
			'email' => $this->input->post('email'),
                        'tusername'=>$this->input->post('username'),
                        'full_name'=>$this->input->post('fname'),
                        'type'=>$this->input->post('type'),
			'password'=>md5($this->input->post('password')),	
			
			
			'key'=>$key,
                        'img_path'=>$upload_data['file_name']);
		$query = $this->db->insert('temp_users',$data);
		if($query){	return true;} 
		else {return false;	}
	}
	
	/*this function will check wether theres a entrey exsist with the provided activation-key*/
	public function is_activation_key_valid($key){
		$this->db->where('key',$key);
		$query = $this->db->get('temp_users');
		if($query->num_rows()==1){return true;}
		else{return false;}
	}
	
	/*add the user from waiting list to the activated user list*/
	public function activate_user($key){
		$this->db->where('key',$key);
		$activator_info = $this->db->get('temp_users');
		if($activator_info){
			$info = $activator_info->row();
			$data = array (
				'Full_name'=>$info->full_name,
				'type'=>$info->type,
				'email'=>$info->email,
				'username'=>$info->tusername,
				'password'=>$info->password,
                                'img_path'=>$info->img_path,
                                'signup_date' => time(),
                                'loginTime' => time(),
                                );
                        
			$query = $this->db->insert('member',$data);
			
                        
                        if($query){
				$this->db->where('key',$key);
				$this->db->delete('temp_users');
                                
                               
				return true;
			}else{ return false; }			
		}else{ return false; } 
	}

//	public function get_user_basic_details($username){
//		$sql = "SELECT u.fname, u.lname,u.email 
//				 FROM users u
//				 WHERE u.username= '$username'"; 
//		$result = $this->db->query($sql);
//		return $result->result();
//	}
//
//	public function get_user_profile_details($username){
//		$sql = "SELECT ud.bio,ud.profilepicture,ud.telemarketer
//				 FROM user_details ud
//				 WHERE ud.username= '$username'"; 
//		$result = $this->db->query($sql);
//		return $result->result();
//	}
//	
//	public function get_user_business_details($username){
//		$sql = "SELECT bu.bname 
//				 FROM businessusers bu
//				 WHERE bu.username= '$username'"; 
//		$result = $this->db->query($sql);
//		return $result->result();
//	}

//	public function add_user_profilepicture($picturename,$username,$ino){
//		if($ino=='update'){	
//			$sql = "UPDATE user_details 
//	    			SET profilepicture='$picturename' 
//	    			WHERE username='$username'"; 
//			$result = $this->db->query($sql);
//		}
//		if($ino=='insert'){
//			$data = array ('profilepicture' => $picturename,
//							'username' => $username);
//			$query = $this->db->insert('user_details',$data);
//		}
//	}
        
    public function get_profile_details(){
        
        return $this->db->get_where('member', array('email'=> $this->session->userdata('email')));
        
    }

}