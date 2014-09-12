<?php
$mail = $this->session->userdata['email'];

$sql = "SELECT COUNT(u_status)from user_stories where u_status='success' AND `OwnerEmail`='$mail'" ;
$res = mysql_query($sql);
$final = mysql_result($res, 0);
//echo $final;

$sql1 = "SELECT COUNT(u_status)from user_stories where u_status='active' AND `OwnerEmail`='$mail'";
$res1 = mysql_query($sql1);
$final1 = mysql_result($res1, 0);
//echo $final1;

$sql2 = "SELECT COUNT(u_status)from user_stories where u_status='defined' AND `OwnerEmail`='$mail'";
$res2 = mysql_query($sql2);
$final2 = mysql_result($res2, 0);
//echo $final2;


//defects
$sql3 = "SELECT COUNT(`defect_stat`)from defect_log where `defect_stat`='active' AND `defect_founder`='$mail'";
$res3 = mysql_query($sql3);
$final3 = mysql_result($res3, 0);
//echo $final3;

$sql4 = "SELECT COUNT(`defect_stat`)from defect_log where `defect_stat`='success'AND `defect_founder`='$mail'";
$res4 = mysql_query($sql4);
$final4 = mysql_result($res4, 0);
//echo $final4;

$sql5 = "SELECT COUNT(`defect_stat`)from defect_log where `defect_stat`='defined'AND `defect_founder`='$mail'";
$res5 = mysql_query($sql5);
$final5 = mysql_result($res5, 0);
//echo $final5;


//SELECT COUNT(`defect_stat`)from defect_log where `defect_stat`='active'

?>





<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Agile Project Management Software</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php //echo base_url() . 'css/bootstrap.min.css' ?>" rel="stylesheet">
        <link href="<?php //echo base_url() . 'css/bootstrap.css' ?>" rel="stylesheet">
        <link href="<?php //echo base_url() . 'css/styles.css' ?>" rel = "stylesheet">
<script src = "http://localhost/ProjectManagementSoftware_SEP004/js/bootstrap.js"></script>-->
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

<script type="text/javascript" src="//www.google.com/jsapi"></script>
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
<script src="http://localhost/ProjectManagementSoftware_SEP004/js/attc.googleCharts.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'css/attc.css' ?>">

<script type="text/javascript">
// The AJAX function...

function AJAX(){
try{
xmlHttp=new XMLHttpRequest(); // Firefox, Opera 8.0+, Safari
return xmlHttp;
}
catch (e){
try{
xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
return xmlHttp;
}
catch (e){
try{
xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
return xmlHttp;
}
catch (e){
alert("Your browser does not support AJAX.");
return false;
}
}
}
}

// Timestamp for preventing IE caching the GET request (common function)

function fetch_unix_timestamp()
{
 return parseInt(new Date().getTime().toString().substring(0, 10))
}

////////////////////////////////
//
// Refreshing the DIV TIMEDIV
//
////////////////////////////////

function refreshdiv_timediv(){

// Customise those settings

var seconds = 5;
var divid = "timediv";
var url = "<?php echo site_url()."cmulti_xml/index";?>";;

// Create xmlHttp

var xmlHttp_one = AJAX();

// No cache

var timestamp = fetch_unix_timestamp();
var nocacheurl = url+"?t="+timestamp;

// The code...

xmlHttp_one.onreadystatechange=function(){
if(xmlHttp_one.readyState==4){
document.getElementById(divid).innerHTML=xmlHttp_one.responseText;
setTimeout('refreshdiv_timediv()',seconds*1000);
}
}
xmlHttp_one.open("GET",nocacheurl,true);
xmlHttp_one.send(null);
}

// Start the refreshing process

window.onload = function startrefresh(){
setTimeout('refreshdiv_timediv()',seconds*1000);
}

////////////////////////////////
//
// Refreshing the DIV TIMEINWASHINGTON
//
////////////////////////////////

function refreshdiv_timeinwashington(){

// Customise those settings

var seconds = 8;
var divid = "timeinwashington";
var url = "<?php echo site_url()."cmulti_xml/wasin";?>";

// Create xmlHttp

var xmlHttp_two = AJAX();

// No cache

var timestamp = fetch_unix_timestamp();
var nocacheurl = url+"?t="+timestamp;

// The code...

xmlHttp_two.onreadystatechange=function(){
if(xmlHttp_two.readyState==4){
document.getElementById(divid).innerHTML=xmlHttp_two.responseText;
setTimeout('refreshdiv_timeinwashington()',seconds*1000);
}
}
xmlHttp_two.open("GET",nocacheurl,true);
xmlHttp_two.send(null);
}

// Start the refreshing process

window.onload = function startrefresh(){
setTimeout('refreshdiv_timeinwashington()',seconds*1000);
}

////////////////////////////////
//
// Refreshing the DIV OTHERDIV
//
////////////////////////////////

function refreshdiv_otherdiv(){

// Customise those settings

var seconds = 10;
var divid = "otherdiv";
var url = "<?php echo site_url()."cmulti_xml/boo3";?>";

// Create xmlHttp

var xmlHttp_three = AJAX();

// No cache

var timestamp = fetch_unix_timestamp();
var nocacheurl = url+"?t="+timestamp;

// The code...

xmlHttp_three.onreadystatechange=function(){
if(xmlHttp_three.readyState==4){
document.getElementById(divid).innerHTML=xmlHttp_three.responseText;
setTimeout('refreshdiv_otherdiv()',seconds*1000);
}
}
xmlHttp_three.open("GET",nocacheurl,true);
xmlHttp_three.send(null);
}

// Start the refreshing process

var seconds;
window.onload = function startrefresh(){
setTimeout('refreshdiv_otherdiv()',seconds*1000);
}
</script>

<script type="text/javascript"> 
    $(document).ready(function () {
                    //ajax_articles();
                    //ajax_images();
                    //ajax_gallery();
                    //myfunction1();
                  });
                function myfunction1(){
                    $.ajax ({
                            url: '<?php echo site_url()."cmulti_xml/actionDelete";?>',
                            data: { type : 'empty' },
                            success: function(result) { 
                            //alert('fhfh');
                            $('#ajax-content-container').html(result); 
                            }
                        });                    
                }
                
                function myfunction2(){
                    $.ajax ({
                            url: '<?php echo site_url()."cmulti_xml/actionDeletedefects";?>',
                            data: { action : 'empt' },
                            success: function(result) { 
                            //alert('fhfh');
                            $('#ajax-content-container').html(result); 
                            }
                        });                    
                }

       
        
</script> 

    
<div id="page-wrapper">
<div class="row">
 <div class="col-lg-6">
 <div class="panel panel-success">
 <div class="panel-heading">
          <h5>User Story Updates</h5>
          <button type="button" id="closeButton" name="closeButton" value="close" onclick="myfunction1();"/>
</div>

<div class="panel-body">

<script type="text/javascript">
refreshdiv_timediv();
</script>

<div name="timediv" id="timediv"></div>
</div>
</div>
</div>
    
    
<div class="col-lg-6">
 <div class="panel panel-success">
 <div class="panel-heading">
          <a href="<?php echo base_url() ."calendar/display_cal" ?>" class="btn btn-primary btn-link" role="button"><span class="glyphicon glyphicon-calendar">
            Get Events
              </span></a>
           <br>
          <a href="<?php echo base_url() ."ajax_demo/giveMoreData" ?>" class="btn btn-primary btn-link" role="button"><span class="glyphicon glyphicon-check">
            Quick view on user story and defect logs
              </span></a>
          
</div>


</div>
</div>
    

</div>
    

<div class="row">
 <div class="col-lg-6">
 <div class="panel panel-warning">
 <div class="panel-heading">
          <h5>Defect Updates</h5>
          <button type="button" id="closeButton" name="closeButton" value="close" onclick="myfunction2();"/>
</div>




<script type="text/javascript">
refreshdiv_timeinwashington();
</script>

<div name="timeinwashington" id="timeinwashington"></div>

</div>
</div>
</div>
    
<!--<div class="row">
 <div class="col-lg-6">
 <div class="panel panel-info">
 <div class="panel-heading">
          <h5>Chart Updates</h5>


<b>Oh, and this is the current timestamp!
 (updates every 10 seconds):</b>
</div>
<script type="text/javascript">
refreshdiv_otherdiv();
</script>

<div name="otherdiv" id="otherdiv"></div>


</div>
</div>
</div>-->
    
<div class="row">
 <div class="col-lg-12">
 <div class="panel panel-success">
 <div class="panel-heading">
          <h5>Defects & UserStories Summary</h5>
 </div>

<div class="mainContent">
    	<table 
    		title="Attendance Percentages" 
    		id="AttendancePercentages" 
    		summary="pieDescription" 
    		data-attc-createChart="true"
    		data-attc-colDescription="pieDescription" 
    		data-attc-colValues="pieValues" 
    		data-attc-location="AttendancePercentagesPie" 
    		data-attc-hideTable="true" 
    		data-attc-type="pie"
    		data-attc-googleOptions='{"is3D":true}'
    		data-attc-controls='{"showHide":true,"create":true,"chartType":true}'
    		>
			<thead>
				<tr>
					<th id="pieDescription">Description</th>
					<th id="pieValues">user stories</th>
					<th>defects</th>
					
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Success</td>
					<td><?php echo $final ?></td>
					<td><?php echo $final4 ?></td>
					
				</tr>
				<tr>
					<td>Active</td>
					<td><?php echo $final1 ?></td>
					<td><?php echo $final3 ?></td>
					
				</tr>
				<tr>
					<td>Defined</td>
					<td><?php echo $final2 ?></td>
					<td><?php echo $final5 ?></td>
					
				</tr>
				
			</tbody>
		</table>
		<div id="AttendancePercentagesPie"></div>
		</div>






</div>
</div>
</div>

    
</div>
</html>