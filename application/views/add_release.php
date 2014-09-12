 <div id="page-wrapper">

    <div class="row">
        <div class="panel panel-default ">
            <div class="panel-heading">
                <h3>Release Burndown Chart</h3>
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
                    <?php echo form_open('burndown/get_release_burndown')?>
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
                         
                        function get_release(){
                                
                            document.getElementById("demo").innerHTML =project;
                         }                        
                    </script>

                    <div class="form-group">
                        <label class='label label-success'>Release:</label>                        
                        <select class="form-control" id='release' name='release' >

                            <?php
                            $p1 = $_GET["project"];
                            $sql = "SELECT distinct `r_name`, `project_id`  FROM `release` WHERE `project_id`=1";
                            if ($sql === FALSE) {
                                die(mysql_error()); 
                              
                            }
                            
                            $query_resource = mysql_query($sql);
                            while ($project = mysql_fetch_assoc($query_resource)):
                                ?>

                                <option value="<?php echo $project['r_name']; ?>"><?php echo $project['r_name']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="form-group">
                            <input class = 'btn btn-success' type='submit' value="Submit"/>
                    </div>
                </div>