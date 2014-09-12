<script type="text/javascript" src="js/jquery.js"></script>


<div id="page-wrapper">
    <div class="row">
		<div class="panel panel-default ">
                    <div class="panel-heading">
                        <h3>Current Progress Of User Story</h3>
                        
                       
                        
                    </div>
                </div>
                    </div>
    <div class="row">
        
        
        <div class="col-lg-4">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Showing progress through Pie Chart.</h3>
              </div>
              <div class="panel-body">
                <a  href ="#chartm"  data-toggle="modal"><span class="glyphicon glyphicon-th-list"></span><b>Click here to select a Project</b></a>
               
                <div class="text-right">
<!--                  <a href="#">View Details <i class="fa fa-arrow-circle-right"></i></a>-->
                </div>
              </div>
            </div>
          </div>
        
        <div class="col-lg-8">
             <div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              Select a project to view the progress of user stories.To check out how many user stories are in the status of success,active and warning.
              
            </div>
        </div>
    </div>
    
</div>
   
    <div class = "modal fade" id = "chartm">
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
                            echo form_open('s_scrum_chart/drop_select_sm', $formattributes);
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
        


