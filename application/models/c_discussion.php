<?php

class C_discussion extends CI_Model{
    
    public function add_discussion(){
        
          $data = array(
            'dis_topic' => $this->input->post('discussion'),
           
              'username'=>  $this->session->userdata('USERNAME'),
               'category'  =>$this->input->post('category'),
            'discription' =>$this->input->post('discription'),
            
        );
        
        $query =$this->db->insert('discussion',$data);
        
        if($query){
            return true;
        }
        else{
            return false;
        }
       
        }
         function get_comments($id){
            
          $this->db->where('dis_id', $id);
          $query=$this->db->get('comment');
          
          return $query->result();
            
            
        }
     public function add_comment($id, $user){
        
          $data = array(
            'dis_id'=>$id,
            'comment_username'=>$user,
            'comment' =>$this->input->post('comment'),
            
        );
        
        $query =$this->db->insert('comment',$data);
        
        if($query){
            return true;
        }
        else{
            return false;
        }
       
        }
        
        
        public function get_discussion($id){
            
            $this->db->where('category', $id);
          $query=$this->db->get('discussion');
          
          return $query;
            
        }
        
      
    
} 
?>
