

<div id="page-wrapper">
	<div class="row">
           
            <div class="col-lg-7">
                 <div class="panel panel-default ">
                    <div class="panel-heading">
                        <h3>Assign a Member</h3>
                        
                       
                        
                    </div>
                </div>
		<div class="panel panel-default ">
			<div class="panel-heading">
    			<center><h3 class="panel-title"><strong>Assign Members to Project</strong></h3></center>
    		</div>
    <div class="panel-body"> 
	<?php
		$formattributes = array('class' => 'form-horizontal', 'role' => 'form');
		echo form_open('main/add_developer',$formattributes);
              
	?>
		<div class="form-group">
    		<label for="inputProjectName" class="col-sm-3 control-label" style="color: #0088cc">Project Name &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
					$projectnameattributes = array('class' => 'form-control','name'=>'project_name');
      				echo form_input($projectnameattributes,$this->session->userdata('project_name'));
					if(form_error('project_name')!=null)
						echo '<div class="alert alert-danger">'.form_error('project_name').'</div>';
      			?>
    		</div>
  		</div>
  		
  		
      			
  		<br />
  		<div class="form-group">
    		<label for="inputNoOfIteration" class="col-sm-3 control-label" style="color: #0088cc">Available Developers &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
                    <select name="tot" class="form-control" onchange="">
                        <?php
                         $sql = "SELECT `id`,`username`, `type`, `email` FROM member WHERE `type`='Developer'";
                          $query_resource = mysql_query($sql);
                          
                          while ($developer = mysql_fetch_assoc($query_resource)):
                              
                          ?>
         
                             <option value="<?php echo $developer['email']; ?>"><?php echo $developer['email'] ?></option>
                         
                        <?php endwhile; ?>
                    </select>
                </div>
                </div>
                    <br>
                    <br>
                  <div class="form-group">
    		<div class="col-sm-offset-8 col-sm-5">
      			<?php
      				$selectbtnattributes = array('class' => 'btn btn-success','name'=>'Add','value'=>'Add Developer','type'=>'Add','content'=>'Add Developer','data-toggle'=>'tooltip', 'data-original-title'=>'');
      				echo form_button($selectbtnattributes);
      			?>
      			
    		</div>
                  </div>
  	
  		<?php
  			echo form_close();
  		?>
  		
	
	
		</div>
	</div>
                
                <div class="panel panel-default ">
			<div class="panel-heading">
    			<center><h3 class="panel-title"><strong><?php echo $this->session->userdata('project_name');?> Assigned Member Details</strong></h3></center>
    		</div>
    <div class="panel-body">
        <div class="form-group">
            <label for="developers" class="col-sm-3 control-label">Assigned Developers :</label>
            <div class="col-sm-7">
             <?php
                        $id=$this->session->userdata('project_id');
                         $sql2 = "SELECT `project_id`,`member_email` FROM assign_members WHERE `project_id`='$id'";
                          $query_resource2 = mysql_query($sql2);
                          
                          while ($list = mysql_fetch_assoc($query_resource2)):
                              
                          ?>
            
            <a href="" id="<?php echo $list['member_email']; ?>"  class="bg-success" onclick=""><h4><?php echo $list['member_email']; ?></h4></a>
            <?php endwhile; ?>
            </div>
        </div>
    </div>
                </div>
            </div>
	
    
    
    
        <div class="col-lg-5">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o"></i> Recent Activity</h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
                  <a href="#" class="list-group-item">
                    <span class="badge">just now</span>
                    <i class="fa fa-calendar"></i> Calendar updated
                  </a>
                  <a href="#" class="list-group-item">
                    <span class="badge">4 minutes ago</span>
                    <i class="fa fa-comment"></i> You commented on a post
                  </a>
                  <a href="#" class="list-group-item">
                    <span class="badge">23 minutes ago</span>
                    <i class="fa fa-truck"></i> User Story #10 of Project 01 modified
                  </a>
                  <a href="#" class="list-group-item">
                    <span class="badge">46 minutes ago</span>
                    <i class="fa fa-money"></i> New user stories has been added for Project 02
                  </a>
                  <a href="#" class="list-group-item">
                    <span class="badge">1 hour ago</span>
                    <i class="fa fa-user"></i> A new user has been added for Project 02
                  </a>
                  <a href="#" class="list-group-item">
                    <span class="badge">2 hours ago</span>
                    <i class="fa fa-check"></i> Completed task: "create Administrator login"
                  </a>
                  <a href="#" class="list-group-item">
                    <span class="badge">1 hour ago</span>
                    <i class="fa fa-globe"></i> Completed user story: "As scrum master I need to add copy or delete work items when...."
                  </a>
                  <a href="#" class="list-group-item">
                    <span class="badge">yesterday</span>
                    <i class="fa fa-check"></i> Completed task: "fix error on sales page"
                  </a>
                   <a href="#" class="list-group-item">
                    <span class="badge">two days ago</span>
                    <i class="fa fa-check"></i> Completed task: "fix error on login page"
                  </a>
                   <a href="#" class="list-group-item">
                    <span class="badge">two days ago</span>
                    <i class="fa fa-check"></i> New user story assigned: "As scrum master I want to view reports so that I can track ..."
                  </a>
                </div>
                <div class="text-right">
                  <a href="#">View All Activity <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
		
        </div>
    </div>
    
    
		</div>


