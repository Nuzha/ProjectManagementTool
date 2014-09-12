
<?php
//$con=mysql_connect("localhost","root","") or die("Failed to connect with database!!!!");
//mysql_select_db("chart", $con); 
// The Chart table contains two fields: weekly_task and percentage
// This example will display a pie chart. If you need other charts such as a Bar chart, you will need to modify the code a little to make it work with bar chart and other charts
//$sth = mysql_query("SELECT status,count FROM userstorystatus");

 
//$rows = array();
////flag is not needed
//$flag = true;
//$table = array();
//$table['cols'] = array(
 
    // Labels for your chart, these represent the column titles
    // Note that one column is in "string" format and another one is in "number" format as pie chart only required "numbers" for calculating percentage and string will be used for column title
//    array('label' => 'status', 'type' => 'string'),
//    array('label' => 'count', 'type' => 'number')
// 
//);
// 
//$rows = array();
//while($r = mysql_fetch_assoc($sth)) {
//    $temp = array();
//    // the following line will be used to slice the Pie chart
//    $temp[] = array('v' => (string) $r['status']); 
// 
//    // Values of each slice
//    $temp[] = array('v' => (int) $r['count']); 
//    $rows[] = array('c' => $temp);
//}
// 
//$table['rows'] = $rows;
//$jsonTable = json_encode($table);
////echo $jsonTable;
//?>
<?php
$sql = "SELECT COUNT(u_status)from user_stories where u_status='success'";
$res = mysql_query($sql);
$final1 = mysql_result($res, 0);
echo $final1;

$sql1 = "SELECT COUNT(u_status)from user_stories where u_status='active'";
$res2 = mysql_query($sql1);
$final2 = mysql_result($res2, 0);
echo $final2;
$sql3 = "SELECT COUNT(u_status)from user_stories where u_status='warning'";
$res3 = mysql_query($sql3);
$final3 = mysql_result($res3, 0);
echo $final3;
$sql4 = "SELECT COUNT(u_status)from user_stories where u_status='defined'";
$res4 = mysql_query($sql4);
$final4 = mysql_result($res4, 0);
echo $final4;
 ?>
<html>
  <head>
    <!--Load the Ajax API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">
 
    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});
 
    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);
 
    function drawChart() {
        
       alert('gjsgfjsg');
 
      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.arrayToDataTable([
          ['status', 'count'],
          ['Success', <?php echo $final1 ?>],
          ['Active', <?php echo $final2 ?>],
          ['Warning', <?php echo $final3 ?>],
          ['Defined', <?php echo $final4 ?>]
      ]);
      var options = {
           title: 'User Story Staus',
          is3D: 'true',
          width: 600,
          height: 400
        };
      // Instantiate and draw our chart, passing in some options.
      // Do not forget to check your div ID
      var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
      chart.draw(data, options);
    }
    </script>
    <script type="text/javascript">
        
        function ccmValidateBlockForm() {
                setTimeout(function() {
                   drawChart();
                }, 3000);
                 return false;
             }
    </script>
    </head>
     <body>
     <div id="page-wrapper">

     <div class="row">
        <div class="panel panel-default ">
            <div class="panel-heading">
                <h3>User Story Progress Chart</h3>
            </div>
        </div>
    </div>    
        <div class="row">
        <div class="col-lg-8">
 
        <div class="col-md-7 col-md-offset-2">
		
                   
           
        <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
        </div>
              
        </div>
        
         
        </div>
        
     </body>
    </html>
    
    
?>
