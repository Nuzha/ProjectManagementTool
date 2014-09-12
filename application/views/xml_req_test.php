
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Agile Project Management Software</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo base_url() . 'css/bootstrap.min.css' ?>" rel="stylesheet">
        <link href="<?php echo base_url() . 'css/bootstrap.css' ?>" rel="stylesheet">
        <link href="<?php echo base_url() . 'css/styles.css' ?>" rel = "stylesheet">
<script src = "http://localhost/ProjectManagementSoftware_SEP004/js/bootstrap.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    
<script type="text/javascript">
	// Customise those settings

var seconds = 5;
var divid = "timediv";
var url = "<?php echo site_url()."c_xml_req_test/index";?>";



function refreshdiv(){

// The XMLHttpRequest object

var xmlHttp;
try{
xmlHttp=new XMLHttpRequest(); // Firefox, Opera 8.0+, Safari
}
catch (e){
try{
xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
}
catch (e){
try{
xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
}
catch (e){
alert("Your browser does not support AJAX.");
return false;
}
}
}

// Timestamp for preventing IE caching the GET request

fetch_unix_timestamp = function()
{
return parseInt(new Date().getTime().toString().substring(0, 10))
}

var timestamp = fetch_unix_timestamp();
var nocacheurl = url+"?t="+timestamp;

// The code...

xmlHttp.onreadystatechange=function(){
if(xmlHttp.readyState==4){
document.getElementById(divid).innerHTML=xmlHttp.responseText;
setTimeout('refreshdiv()',seconds*1000);
}
}
xmlHttp.open("GET",nocacheurl,true);
xmlHttp.send(null);
}

// Start the refreshing process

var seconds;
window.onload = function startrefresh(){
setTimeout('refreshdiv()',seconds*1000);
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
                            url: '<?php echo site_url()."c_xml_req_test/actionDelete";?>',
                            data: { type : 'empty' },
                            success: function(result) {                                       
                            $('#ajax-content-container').html(result); 
                            }
                        });                    
                }

       
        
</script> 



</head>


<div id="page-wrapper">
<div class="row">
 <div class="col-lg-6">
 <div class="panel panel-primary">
 <div class="panel-heading">
          <h5>User Story Updates</h5>
<!--          <button type="button" id="closeButton" name="closeButton" value="close" onclick="myfunction1();"/>-->
</div>

<div class="panel-body">

<strong>This is the current date and time (updates every 5 seconds):</strong>
<div id="timediv">
  
</div>                   
</div>
</div>
</div>
</div>
    
    
    
</div>    
