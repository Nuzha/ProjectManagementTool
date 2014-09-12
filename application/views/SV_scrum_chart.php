
    
    <script type="text/javascript" src="js/jquery.js"></script>
     <script type="text/javascript" src="js/chart.js"></script>
    <!--<script type="text/javascript" src="js/chart.js"></script> 
    
    
    <script type="text/javascript" >    // this is that function which take drop down value and blah blah
       // $('#myselect').onchange(function(){
        
            function myfunction(){
            var inpval=$('#myselect').val();
            alert(inpval);

            $.ajax({
                type: 'POST',
                data: ({p : inpval}),
                url: $(this).data('url'),
                success: function(data) {
                     $('.result').html(data);

          }
            } );
        }
    

        
    </script>  -->  
  
  
      
      
    <!--this is the div that will hold the pie chart-->
    
   
    <div class="col-md-7 col-md-offset-2">
		<div class="panel panel-default ">
                    <div class="panel-heading">
                        
                        
<!--                        <a  href ="#chartp"  data-toggle="modal"><span class="glyphicon glyphicon-th-large"></span> Projects</a>-->
                         <?php echo anchor('s_scrum_chart/getchart', 'Get Chart');    ?>
                        
                        
                        
                    </div>
                </div>
                    </div>
   
    <div class = "modal fade" id = "chartp">
                <div class = "modal-dialog">
                    <div class = "modal-content">
                        <div class = "modal-header">
                            <p><b>Current Available Projects</b></p>

                        </div>
                        <p class="h4" style="color: #5bb75b">Please select a project</p>
                        <div class = "modal-body">



                            <!--                                                       ------------------------------------------------------>
                            <?php
                            $formattributes = array('class' => 'form-horizontal', 'role' => 'form');
                            echo form_open('s_scrum_chart/drop_select', $formattributes);
                            ?>
                            <?php
                            //Create the query
                            $email1=$this->session->userdata('email');
                            $sql = "SELECT `project_id`,`project_name` FROM project_summary ";

                            //Run the query
                            $query_resource = mysql_query($sql);

                            //Iterate over the results that you've gotten from the database (hopefully MySQL)
                            while ($project = mysql_fetch_assoc($query_resource)):
                                ?>


                                <input type="radio" name="project" value="<?php echo $project['project_id']; ?>" />
                                <span>
                                    <?php echo $project['project_name']; ?></span><br />

                            <?php endwhile; ?>


                            <!--                                                       ------------------------------------------------------->
                        </div>
                        <div class = "modal-footer">

                            <?php
                            $registerbtnattributes = array('class' => 'btn btn-primary', 'name' => 'project_submit', 'value' => 'show project');
                            echo form_submit($registerbtnattributes);
                            ?>

                            <?php
                            echo form_close();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
</html>    
        

