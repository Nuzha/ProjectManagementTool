<?php
class Upload_file extends CI_Model{
    
    public function file_upload(){
         $upload_data = $this->upload->data();
         
         $data = array (
			'email' => $this->session->userdata('storyEmail'),
                        'StoryId'=>$this->input->post('StoryID'),
                        'Description'=>$this->input->post('description'),
                        
                        'att_path'=>$upload_data['file_name']);
         
         $query = $this->db->insert('attachment',$data);
		if($query){	return true;} 
		else {return false;	}
    }
    
}
?>
