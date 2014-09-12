<?php
$sqll="SELECT count(`StoryId`)from user_stories where `OwnerEmail`='kasun91@gmail.com'";
$story_count = mysql_query($sqll);
$fina= mysql_result($story_count, 0);
//echo $fina;

$sqll1="SELECT `StoryId`,`PlanEst`,`ActualHrs` from user_stories where `OwnerEmail`='kasun91@gmail.com'";
$hrs = mysql_query($sqll1);

$sid= array();
$estimate=array();
$actual=array();

$i = 0;
   
while($row = mysql_fetch_array($hrs))
 {         
            $id[$i]=$row['StoryId'];
            echo $id[$i];
               echo 'br';
            $estimate[$i] = $row['PlanEst'];
              
            $actual[$i]=$row['ActualHrs'];
            $i++;
         
        
 }

//SELECT `PlanEst`,`ActualHrs` from user_stories where `OwnerEmail`="kasun91@gmail.com";
        
        
        
          ?>

<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">
    
      google.load('visualization', '1', {'packages':['corechart']});
            google.setOnLoadCallback(drawChart);
            function drawChart() {

                            alert('dhdhd');

//                        var id1=<?php //echo json_encode($sid); ?>;
//                        var estimate1=<?php //echo json_encode($estimate);?>;
//                        var actual1=<?php //echo json_encode($actual);?>;
//                        var count1=<?php //echo json_encode($story_count);?>;
//                        var Ids =[];
//                        var EstDates=[];
//                        var ActDates=[];
//                        for(var j=0; j<id1.length; j++){ 
//                            Ids[j] = int(id1[j]); }
//                        for(var x=0; x<estimate1.length; x++){ 
//                            EstDates[x] = id1[x]; }
//                        for(var y=0; y<actual1.length; y++){ 
//                            ActDates[y] = id1[y]; }
                        var EstDates=<?php echo $estimate ;?>;
                        var ActDates=<?php echo $actual;?>;
                        var count=<?php echo $$story_count;?>;

                      var data = google.visualization.DataTable();
                    //    ['Year', 'Sales', 'Expenses'],
                    //    ['2004',  1000,      400],
                    //    ['2005',  1170,      460],
                    //    ['2006',  660,       1120],
                    //    ['2007',  1030,      540]
                    //  ]);
                            
                            data.addColumn('number', 'Planned');
                            data.addColumn('number', 'Actual');
                            for (var i = 0; i <EstDates.length; i++) {
                              data.addRow([EstDates[i] , ActDates[i]]);
                            }

                      var options = {'title':'Burnt Down Chart'
                       
                       
                        };
        
              

             var chart = new google.visualization.PieChart(document.getElementById('chart_div'));

              chart.draw(data, options);

            }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>