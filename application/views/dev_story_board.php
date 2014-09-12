<style>
.column {
	margin-left: 2%;
	width: 22%;
}
</style>
<div id="page-wrapper"> 
    <div class="row">
           
            <div class="col-lg-7">
                 <div class="panel panel-default ">
                    <div class="panel-heading">
                        <h3>Story Board</h3>
                        
                       
                        
                    </div>
                </div>
            </div>
    </div>
             
             <!-- BEGIN: XHTML for example 1.3 -->

			<div id="example-1-3">

				<div class="column left first">
                                   <h3><center><span class="label label-info">To Do</center></span></h3>

					<ul class="sortable-list">
						
					
                                <?php
                                    $user=$this->session->userdata('USERNAME');
                            $sql = "SELECT `name` FROM `user_stories` WHERE ProjectId=$pro_id AND OwnerEmail='$owner' ";
                            $query_resource = mysql_query($sql);
                            
                            while ($project = mysql_fetch_assoc($query_resource)):
                            
                                ?>
                                 <li class="sortable-item"><?php echo $project['name']; ?></li>
				

                            <?php endwhile; ?>
                                    </ul>

				</div>
     
                             
                            
                             <div class="column left">
                               <h3><center><span class="label label-warning">In Progress</center></span></h3>
                                 <ul class="sortable-list">
                                              <?php
                                    $user=$this->session->userdata('USERNAME');
                            $sql = "SELECT `name` FROM `user_stories` WHERE ProjectId=$pro_id AND OwnerEmail='$owner' AND u_status='Active' ";
                            $query_resource = mysql_query($sql);
                            
                            while ($project = mysql_fetch_assoc($query_resource)):
                            
                                ?>
                                 <li class="sortable-item"><?php echo $project['name']; ?></li>
				

                            <?php endwhile; ?>
					</ul>
                                
                            </div>
                          
                             <div class="column left">
                                <h3><center><span class="label label-success">Completed</center></span></h3>
                                 <ul class="sortable-list">	
                                      <?php
                                    $user=$this->session->userdata('USERNAME');
                            $sql = "SELECT `name` FROM `user_stories` WHERE ProjectId=$pro_id AND OwnerEmail='$owner' AND u_status='Success' ";
                            $query_resource = mysql_query($sql);
                            
                            while ($project = mysql_fetch_assoc($query_resource)):
                            
                                ?>
                                 <li class="sortable-item"><?php echo $project['name']; ?></li>
				

                            <?php endwhile; ?>
					</ul>
                                
                            </div>
                            
                                        <div class="column left">
                                <h3><center><span class="label label-danger">Blocked</center></span></h3>
                                 <ul class="sortable-list">	
                                      <?php
                                    $user=$this->session->userdata('USERNAME');
                            $sql = "SELECT `name` FROM `user_stories` WHERE ProjectId=$pro_id AND OwnerEmail='$owner' AND u_status='Warning' ";
                            $query_resource = mysql_query($sql);
                            
                            while ($project = mysql_fetch_assoc($query_resource)):
                            
                                ?>
                                 <li class="sortable-item"><?php echo $project['name']; ?></li>
				

                            <?php endwhile; ?>
					</ul>
                                
                            </div>
                            
                            
				
				<div class="clearer">&nbsp;</div>

			</div>

               
  
             
               <script type="text/javascript" src = "http://localhost/ProjectManagementSoftware_SEP004/js/jquery-1.4.2.min.js"></script>
                  <script type="text/javascript" src = "http://localhost/ProjectManagementSoftware_SEP004/js/jquery-ui-1.8.custom.min.js"></script>
             
 <script type="text/javascript">

$(document).ready(function(){

	// Example 1.1: A single sortable list
	

	// Example 1.2: Sortable and connectable lists
	

	// Example 1.3: Sortable and connectable lists with visual helper
	$('#example-1-3 .sortable-list').sortable({
		connectWith: '#example-1-3 .sortable-list',
		placeholder: 'placeholder',
	});

	// Example 1.4: Sortable and connectable lists (within containment)
	

});

</script>

    </div>
                                  
                         

