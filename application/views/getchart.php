
<?php
//$con=mysql_connect("localhost","root","") or die("Failed to connect with database!!!!");
//mysql_select_db("chart", $con); 
// The Chart table contains two fields: weekly_task and percentage
// This example will display a pie chart. If you need other charts such as a Bar chart, you will need to modify the code a little to make it work with bar chart and other charts
$sth = mysql_query("SELECT status,count FROM userstorystatus");

 
$rows = array();
//flag is not needed
$flag = true;
$table = array();
$table['cols'] = array(
 
    // Labels for your chart, these represent the column titles
    // Note that one column is in "string" format and another one is in "number" format as pie chart only required "numbers" for calculating percentage and string will be used for column title
    array('label' => 'status', 'type' => 'string'),
    array('label' => 'count', 'type' => 'number')
 
);
 
$rows = array();
while($r = mysql_fetch_assoc($sth)) {
    $temp = array();
    // the following line will be used to slice the Pie chart
    $temp[] = array('v' => (string) $r['status']); 
 
    // Values of each slice
    $temp[] = array('v' => (int) $r['count']); 
    $rows[] = array('c' => $temp);
}
 
$table['rows'] = $rows;
$jsonTable = json_encode($table);
//echo $jsonTable;
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
 
      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(<?=$jsonTable?>);
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
        
         <div class="col-lg-4">
             <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o"></i> What these labels mean? </h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
                  
                  <a href="#" class="list-group-item">
                    <span class="badge">Active</span>
                    <i class="fa fa-comment"></i>The user stories which are in progress.
                  </a>
                  <a href="#" class="list-group-item">
                    <span class="badge">Success</span>
                    <i class="fa fa-truck"></i>The user stories which are completed.
                  </a>
                  <a href="#" class="list-group-item">
                    <span class="badge">Warning</span>
                    <i class="fa fa-money"></i>The user stories which are blocked and cannot proceed further because of problems.
                  </a>
                </div>
              </div>
         </div>
        </div>
        </div>
        
     </body>
    </html>