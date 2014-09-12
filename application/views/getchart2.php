<?php 

$sql = "SELECT COUNT(u_status)from user_stories where u_status='success'";
$res = mysql_query($sql);
$final = mysql_result($res, 0);
echo $final;

$sql1 = "SELECT COUNT(u_status)from user_stories where u_status='active'";
$res1 = mysql_query($sql1);
$final1 = mysql_result($res1, 0);
echo $final1;

$sql2 = "SELECT COUNT(u_status)from user_stories where u_status='defined'";
$res2 = mysql_query($sql2);
$final2 = mysql_result($res2, 0);
echo $final2;


//defects
$sql3 = "SELECT COUNT(`defect_stat`)from defect_log where `defect_stat`='active'";
$res3 = mysql_query($sql3);
$final3 = mysql_result($res3, 0);
echo $final3;

$sql4 = "SELECT COUNT(`defect_stat`)from defect_log where `defect_stat`='success'";
$res4 = mysql_query($sql4);
$final4 = mysql_result($res4, 0);
echo $final4;

$sql5 = "SELECT COUNT(`defect_stat`)from defect_log where `defect_stat`='defined'";
$res5 = mysql_query($sql5);
$final5 = mysql_result($res5, 0);
echo $final5;


//SELECT COUNT(`defect_stat`)from defect_log where `defect_stat`='active'

?>

<!DOCTYPE html>
  <head>
    <script type="text/javascript" src="//www.google.com/jsapi"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://localhost/ProjectManagementSoftware_SEP004/js/attc.googleCharts.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'css/attc.css' ?>">
  </head>
  <body>
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
  </body>
</html>
