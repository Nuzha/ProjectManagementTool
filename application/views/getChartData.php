 <div id="page-wrapper">

    <div class="row">
        <div class="panel panel-default ">
            <div class="panel-heading">
                <h3>Iteration Burndown Chart</h3>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h5>Select Details</h5>
                </div>
                
                <div class="panel-body">
                    <?php echo form_open('burndown/get_it_burndown')?>
                    <div class="form-group">
                        <label class='label label-success'>Available Projects:</label>
                        <select class="form-control" id='project_category' name='project_category' onchange="get_project()">
                        <?php 
                          $sql = "SELECT `project_id`, `project_name`  FROM `project_summary`";
                            $query_resource = mysql_query($sql);
                            while ($project = mysql_fetch_assoc($query_resource)):
                        
                        ?>
                        
                        <option value="<?php echo $project['project_id']; ?>"><?php echo $project['project_name']; ?></option>
                        <?php endwhile; ?>
                        </select>
                    </div>
                    
                    <script>
                        var project;
                        function get_project(){
                                     var p;
                                     p = document.getElementById('project_category').value;
                                     alert("You have Selected the Project   :"+p);
                                     project=p;
                         }
                         
                        function get_iteration(){
                                
                            document.getElementById("demo").innerHTML =project;
                         }                        
                    </script>

                    <div class="form-group">
                        <label class='label label-success'>Iteration:</label>                        
                        <select class="form-control" id='iteration' name='iteration' >
                            
                            <?php 
                            $p1=$_GET["project"];
                            $sql = "SELECT `i_name`, `ProjectId`  FROM `iteration` WHERE `ProjectId`=1";
                            $query_resource = mysql_query($sql);
                            while ($project = mysql_fetch_assoc($query_resource)):
                            ?>
                        
                        <option value="<?php echo $project['i_name']; ?>"><?php echo $project['i_name']; ?></option>
                        <?php endwhile; ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                            <input class = 'btn btn-primary' type='submit' value="Submit"/>
                    </div>
                </div>