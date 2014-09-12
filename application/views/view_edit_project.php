<?php 

//echo form_open('main/update_project');
//
//echo form_hidden('id', $row[0]->id);

// an array of the fields in the student table
//$field_array = array('project_name','start_date','end_date','no_of_iterations');
//foreach($field_array as $field_name)
//{
//  echo '<p>' . $field_name;
//  echo form_input($field_name, $row[0]->$field_name) . '</p>';
//}

// not setting the value attribute omits the submit from the $_POST array
//echo form_submit('', 'Update'); 
//
//echo form_close();





?>





<div class="container">
	<div class="col-md-7 col-md-offset-2">
		<div class="panel panel-default ">
			<div class="panel-heading">
    			<center><h3 class="panel-title"><strong>Edit Project</strong></h3></center>
    		</div>
    <div class="panel-body"> 
	<?php
		$formattributes = array('class' => 'form-horizontal', 'role' => 'form');
		echo form_open('main/project_update',$formattributes);
                echo form_hidden('id', $row[0]->id);
	?>
		<div class="form-group">
    		<label for="inputProjectName" class="col-sm-3 control-label">Project Name &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
					$projectnameattributes = array('class' => 'form-control','name'=>'project_name');
      				echo form_input($projectnameattributes,$row[0]->project_name);
					if(form_error('project_name')!=null)
						echo '<div class="alert alert-danger">'.form_error('project_name').'</div>';
      			?>
    		</div>
  		</div>
  		<br />
  		<div class="form-group">
    		<label for="inputStartDate" class="col-sm-3 control-label">Start Date &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
      				$StartDateattributes = array('class' => 'form-control','name'=>'start_date');
      				echo form_input($StartDateattributes,$row[0]->start_date);
					if(form_error('start_date')!=null)
						echo '<div class="alert alert-danger">'.form_error('start_date').'</div>';
      			?>
    		</div>
  		</div>
  		<br />
  		<div class="form-group">
    		<label for="inputEndDate" class="col-sm-3 control-label">End Date &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
      				$emailattributes = array('class' => 'form-control','name'=>'end_date');
      				echo form_input($emailattributes,$row[0]->end_date);
					if(form_error('end_date')!=null)
						echo '<div class="alert alert-danger">'.form_error('end_date').'</div>';
      			?>
    		</div>
  		</div>
  		<br />
  		
      			
  		<br />
  		<div class="form-group">
    		<label for="inputNoOfIteration" class="col-sm-3 control-label">Number of Iterations &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
      				$iterationattributes = array('class' => 'form-control','name'=>'no_of_iterations');
      				echo form_input($iterationattributes,$row[0]->no_of_iterations);
					if(form_error('no_of_iterations')!=null)
						echo '<div class="alert alert-danger">'.form_error('no_of_iterations').'</div>';
      			?>
    		</div>
  		</div>
  		<br />
<!--  		<div class="form-group">
    		<label for="inputConfirmPassword" class="col-sm-3 control-label">Confirm Password&nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			//<?php
//      				$confirmpasswordattributes = array('class' => 'form-control','name'=>'confirmpassword');
//      				echo form_password($confirmpasswordattributes);
//					if(form_error('confirmpassword')!=null)
//						echo '<div class="alert alert-danger">'.form_error('confirmpassword').'</div>';
//      			?>
    		</div>
  		</div>-->
  		<br />
<!--  		<div class="form-group">
  			<div class="col-sm-12 col-sm-offset-3">
  				<p class="text-muted">By signingup you accept these <a href="#" class="text-primary">terms and conditions.</a></p>
  			</div>
  		</div>-->
  		<div class="form-group">
    		<div class="col-sm-offset-7 col-sm-5">
      			<?php
      				$clearbtnattributes = array('class' => 'btn btn-default','name'=>'clear','value'=>'Clear','type'=>'reset','content'=>'Clear','data-toggle'=>'tooltip', 'data-original-title'=>'this button will reset all the values in the text feilds');
      				echo form_button($clearbtnattributes);
      			?>
      			&nbsp;
      			<?php
      				$registerbtnattributes = array('class' => 'btn btn-primary','name'=>'','value'=>'update project');
					echo form_submit($registerbtnattributes);
      			?>
    		</div>
  		</div>
  		
  		<?php
  			echo form_close();
  		?>
  		
		</div>
	</div>
	</div>
</div>
</body>
</html>
