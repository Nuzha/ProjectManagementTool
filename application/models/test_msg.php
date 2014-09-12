<?php

Class Test_msg extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function msg_dbs() {
        $userid = $this->session->userdata['userid'];
        $username = $this->session->userdata['USERNAME'];
// $username=$obj->userdata['username'];
//$dn1 = mysql_fetch_array(mysql_query('select count(id) as recip, id as recipid, (select count(*) from pm) as npm from users where username="'.$recip.'"'));
//$this -> db -> select('count(id), as recip, id as recipid');
//$this -> db -> select('count(id),  as recipid');
//$this -> db -> select('count(id),  as npm');
//   $this -> db -> from('pm');
//   $this -> db -> where('username = ' . "'" . $username . "'");
//   $this -> db -> where('password = ' . "'" . $password . "'");
//   $this -> db -> limit(1);

        $title = $this->input->post('title');
        $recip = $this->input->post('recip');
        $message = $this->input->post('message');
        $SqlInfo = 'select count(id) as recips, id as recipid, (select count(*) from pm) as npm from member where username="' . $recip . '"';
        $query = $this->db->query($SqlInfo);
        foreach ($query->result() as $row) {
            $data['recips'] = $row->recips;
            $data['recipid'] = $row->recipid;
            $data['npm'] = $row->npm;
        }

//   
//     $this->db->select('users.count(id) AS recips','users.id AS recipid');
//  $this->db->select('pm.count(*) AS npm',FALSE);
//   
////        $this->db->from('users');
////           $this->db->from('pm');
//              $this->db->where('users.username',$recip);
//              $query = $this->db->get('users')->result();
//             $querys = $this->db->get('pm')->result();

        if (($data['recips'] == 1) && ($data['recipid'] != $userid) && ($id = $data['npm'] + 1)) {
//                    if($data['recips']==1)
//                		{
//			//We check if the recipient is not the actual user
// 			if(($data['recipid']!=$userid))
// 			{
// 				$id = $data['npm']+1;
//                                 if($id)
//                              {
//                                    
            $this->db->set('id', $id, TRUE);
            $this->db->set('id2', '1', TRUE);
            $this->db->set('user1', $userid, TRUE);
            $this->db->set('user2', $data['recipid'], TRUE);
            $this->db->set('user1read', 'yes', TRUE);
            $this->db->set('user2read', 'no', TRUE);
            $this->db->set('title', $this->input->post('title', TRUE));

//$this->db->set('password', 'PASSWORD("'.$this->input->post('password', TRUE).'")', FALSE);
            $this->db->set('message', $this->input->post('message', TRUE));

            $this->db->set('timestamp', time(), TRUE);
// $this->db->set('signup_date', $this->input->post(time(), TRUE));
            $query = $this->db->insert('pm');

//   $query = $this ->db-> get();

           return $query;
        } else {
            return false;
        }
    }

}

?>