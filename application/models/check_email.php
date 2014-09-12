<?php

class Check_email extends CI_Model{
	
	public function not_exsist(){
		$this->db->where('email',$this->input->post('email'));
		$query = $this->db->get('waiting_users');
		if($query->num_rows()==0){
			return true;
		}else{
			return false;			
		}
	}
}
