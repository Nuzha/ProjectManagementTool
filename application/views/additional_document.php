<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-5">
          <div class="panel panel-default ">
              <div class="panel-heading">
                  <h3>Additional Document</h3>
              </div>
          </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Assigned Developers for project <?php echo $this->session->userdata('project_name'); ?></h4>
                </div>
                <div class="panel-body">
                    <?php echo form_open('scrum_master/get_user_stories'); ?>
                    <label class='label label-success'>Assigned developers:</label>
                    <select class="form-control" id='developers' name='developers' >
                         <?php 
                            $id=$this->session->userdata('project_id');
                           
                          $sql = "SELECT  DISTINCT `ProjectId`, `OwnerEmail`  FROM `user_stories` WHERE ProjectId=$id";
                            $query_resource = mysql_query($sql);
                            while ($project = mysql_fetch_assoc($query_resource)):
                        
                        ?>
                         <option value="<?php echo $project['OwnerEmail']; ?>"><?php echo $project['OwnerEmail']; ?></option>
                       
                        
                        
                        <?php endwhile; ?>
                        
                        
                     
                        </select>
                        
                    </select>
                </div>
                <div class="panel-footer">
                     <div class="form-group">
                  
    	       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               <input class = 'btn btn-success' type='submit' value="select developer"/>
                        
                <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>