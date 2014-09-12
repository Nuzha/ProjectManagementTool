<html>
	<head>
		<title>Agile Project Management Software</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="<?php echo base_url(). 'css/bootstrap.min.css'?>" rel="stylesheet">
                <link href="<?php echo base_url(). 'css/bootstrap.css'?>" rel="stylesheet">
                <link href="<?php echo base_url(). 'css/styles.css'?>" rel = "stylesheet">
                <link href="<?php echo base_url(). 'css/dashboardNew.css'?>" rel = "stylesheet">
                <link href="<?php echo base_url(). 'css/datepicker.css'?>" rel = "stylesheet">
                <link href="<?php echo base_url(). 'css/datepicker3.css'?>" rel = "stylesheet">
		<script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
                <script src = "http://localhost/ProjectManagementSoftware_SEP004/js/bootstrap.js"></script>
                <script src = "http://localhost/ProjectManagementSoftware_SEP004/js/bootstrap-datepicker.js"></script>
                 <script src = "http://localhost/ProjectManagementSoftware_SEP004/js/bootstrap-popover.js"></script>
		    <script src = "http://localhost/ProjectManagementSoftware_SEP004/js/bootstrap-tooltip.js"></script>
                    <script src = "http://localhost/ProjectManagementSoftware_SEP004/js/bootstrap-twispy.js"></script>
                    <link href="<?php echo base_url(). 'css/style.css'?>" rel = "stylesheet">

		<script>
                function myFunction()
                {
                     $(".menuItem").click(function() {
                         var myURL = $(this).attr("mref");
                         
                      $.ajax({
                         type : "POST",
                         url : myURL,
                         success: function(data){
                          $('#workingspace').html(data);
                         
                          }
                     });
                     return true;
                 });
               }
              $(document).ready(myFunction);
            </script>  
            
            <script>        
			
                        $(function(){
                 $('.datepicker').datepicker({
                    format: 'yyyy-mm-dd'
                  });
               });



            </script>
        </head>
	
	<body >
            
            <!--Navigation bar-->
		<div class = "navbar navbar-inverse navbar-static-top">
			<div class = "container">
					
                            <div class="navbar-brand">Agile Project Management Software</div>
                        </div>
                </div>
        
        