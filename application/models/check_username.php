<?php

class Check_username extends CI_Model{
	
	public function not_exsist(){
		
		$this->db->where('username',$this->input->post('username'));
		$query = $this->db->get('waiting_users');
		
		if($query->num_rows()==0){
			return true;
		}else{
			return false;			
		}
	}
}