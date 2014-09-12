<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-6">
        <div class="panel panel-default">
                    <div class="panel-heading">
        <h3>Change Priority Of a User Story</h3>
                    </div>
        </div>
    </div>
        
        <div class="col-lg-5">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h5>Selected project details : <?php echo $this->session->userdata('project_name')?></h5>
                </div>
            </div>
        </div>
                
            
    </div>
    <div class="row">
       
    </div>
    <div class="row">
        <div class="col-lg-11">
             <div class="panel panel-primary">
                  <div class="panel-heading">
            <h4 class="">List of User Stories </h4>
                  </div>
             </div>
<link href="../style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.js"></script>
<style>
ul {
	padding:0px;
	margin: 0px;
}
#response {
	padding:10px;
	background-color:#9F9;
	border:2px solid #396;
	margin-bottom:20px;
}
#list li {
	margin: 0 0 3px;
	padding:8px;
	background-color: #9e9e9e;
	color: #000;
	list-style: none;
}
</style>
<script type="text/javascript">
$(document).ready(function(){ 	
	  function slideout(){
  setTimeout(function(){
  $("#response").slideUp("slow", function () {
      });
    
}, 2000);}
	
    $("#response").hide();
	$(function() {
	$("#list ul").sortable({ opacity: 0.8, cursor: 'move', update: function() {
			
			var order = $(this).sortable("serialize") + '&update=update'; 
			$.post("scrum_master/update_priority", order, function(theResponse){
				$("#response").html(theResponse);
				$("#response").slideDown('slow');
				slideout();
			}); 															 
		}								  
		});
	});

});	
</script>


<div id="container">
    
  <div id="list">
        
    <div id="response">
    
    </div>
   
    <ul>
      <?php
             //   include("connect.php");
      $id=$this->session->userdata('project_id');
				$query  = "SELECT `StoryId`, `name` FROM user_stories WHERE ProjectId=$id ORDER BY listorder  ASC";
				$result = mysql_query($query);
				while($row = mysql_fetch_array($result, MYSQL_ASSOC))
				{
					
				$id = stripslashes($row['StoryId']);
				$text = stripslashes($row['name']);
					
				?>
       
            <tbody>
      <li id="arrayorder_<?php echo $id ?>">
          <label class='label label-primary'>User Story ID:</label>        <?php echo $id?> <br> 
            <label class='label label-success'>User Story :</label>        <?php echo $text; ?>
        <div class="clear"></div>
      </li>
      
      <?php } ?>
        </tbody>
    </ul>
  </div>
</div>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-7025232-1");
pageTracker._trackPageview();
} catch(err) {}
</script>


        </div>
</div>
</div>
