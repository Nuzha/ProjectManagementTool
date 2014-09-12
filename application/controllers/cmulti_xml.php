<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cmulti_xml extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    function index() {
        $mail = $this->session->userdata['email'];
        $tablename = 'userstory_audit';
        $query="select user_stories.StoryId as tit,user_stories.name as con,userstory_audit.changetype as type from userstory_audit,user_stories where user_stories.StoryId=userstory_audit.u_id AND userstory_audit.owneremail='$mail' ";
        $result = mysql_query($query);

        while($row = mysql_fetch_array($result, MYSQL_ASSOC))
        {
//        echo "<b>  </b> {$row['type']}" .
//        "<b>  </b> {$row['tit']}" .
//        "<b>  </b> {$row['con']}";
//        echo "<br>";?>
        
            <pre><span style="color: red"><?php echo $row['type'] ?></span>   <span style="color: #0088cc"><?php echo $row['tit'] ?></span>  <span style="color: #00620C"><?php echo $row['con'] ?></span> </pre>

       <?php }

    }
    
    function actionDelete(){
        $type = $_GET['empty'];
        
        echo $type;
        $sql3 = "DELETE  FROM `userstory_audit`";
        mysql_query($sql3); 
    }
    
   
    function display(){
        $this->load->view('dev_header');
        $this->load->view('multi_xml');
        
    }
    
    function wasin(){
       
//        $str = "It is %a on %b %d, %Y, %X - Time zone: %Z";
//        echo(gmstrftime($str, time()));
        
         $mail = $this->session->userdata['email'];
        $query1="select defect_log.defect_id as tit,defect_log.defect_des as con,defect_audit.changetype as type from defect_audit,defect_log where defect_log.defect_id=defect_audit.d_id AND defect_audit.oemail='$mail'";
        $result1 = mysql_query($query1);

        while($story1 = mysql_fetch_array($result1, MYSQL_ASSOC))
        {
//        echo "<b>  </b> {$row['type']}" .
//        "<b>  </b> {$row['tit']}" .
//        "<b>  </b> {$row['con']}";
//        echo "<br>";?>
        
            <pre><span style="color: red"><?php echo $story1['type'] ?></span>   <span style="color: #0088cc"><?php echo $story1['tit'] ?></span>  <span style="color: #00620C"><?php echo $story1['con'] ?></span> </pre>


       <?php }
        
        
    }
    
    function actionDeletedefects(){
        $action = $_GET['empt'];
        
        echo $action;
        $sql4 = "DELETE  FROM `defect_audit`";
        mysql_query($sql4); 
    }
    
    function boo3(){
        

        // Echo results

        echo time(); 

    }
    
}
?>