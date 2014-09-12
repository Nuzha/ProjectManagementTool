
<div class="col-md-7 col-md-offset-2">
    <h3><center><span class="label label-default">List of Available Projects</span></center></h3>
  
  <script>
    

    $(document).ready(function() {
            $('#example').popover({
               
                placement: "bottom",
                
                title: "Discussion Forum",
                });
        });
  </script>
</head>
 
<body>
  <div class="container">
    
   <table class="table table-striped">  
      <thead>
        <tr>
         <th>Project ID</th> 
          <th>Project Name</th> 
          <th>Start Date</th> 
          <th>End Date</th>
          <th>Project Owner</th>          
        </tr>
       
      </thead> 
      <tbody>
        
        
                <?php       

 
                foreach ($it_qry ->result() as $story){
                
                
            
                // Print out the contents of the entry 
                echo '<tr class="">';
                
                echo '<td>' . $story->project_id. '</td>';
                echo '<td>' . $story->project_name . '</td>';
                echo '<td>' . $story->start_date. '</td>';
                echo '<td>' . $story->end_date . '</td>';
                echo '<td>' . $story->owner. '</td>';
                
                }
                ?>
                
      </tbody>
 
      <tbody></tbody>
    </table>      
  </div>
    <!-- /container -->
</div>
</body>
</html>



    
    