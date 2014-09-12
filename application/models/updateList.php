
<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UpdateList extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
	$this->load->database();
    }


public  function update($array, $update){
//include("connect.php");
//$array	= $_POST['arrayorder'];

//var_dump($array);

if ($update == "update"){
	
	$count = 1;
	foreach ($array as $idval) {
		$query = "UPDATE `user_stories` SET `listorder` =  $count  WHERE `StoryId` =$idval";
             //   var_dump($count);
             //   var_dump($idval);
		mysql_query($query) or die(mysql_error());
		$count ++;	
	}
	echo 'All saved! refresh the page to see the changes';
}
}
}
?>
 