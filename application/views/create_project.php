<script>
    
    $(function(){
var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
 
var checkin = $('#dpd1').datepicker({
  onRender: function(date) {
    return date.valueOf() < now.valueOf() ? 'disabled' : '';
  }
}).on('changeDate', function(ev) {
  if (ev.date.valueOf() > checkout.date.valueOf()) {
    var newDate = new Date(ev.date)
    newDate.setDate(newDate.getDate() + 1);
    checkout.setValue(newDate);
  }
  checkin.hide();
  $('#dpd2')[0].focus();
}).data('datepicker');
var checkout = $('#dpd2').datepicker({
  onRender: function(date) {
    return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
  }
}).on('changeDate', function(ev) {
  checkout.hide();
}).data('datepicker');
});
</script>
<script>
    $(function(){
   $('.datepicker').datepicker({
      format: 'yyyy-mm-dd'
    });
});

</script>

<div id="page-wrapper">
    
    <div class="row">
      
        <div class="panel panel-default ">
        <h3>Create Project</h3>
        </div>
        <div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
              You can create a new project here. Please fill your project details here.
            </div>
    </div>
    
<div class="row">
<div class="col-lg-8">


		<div class="panel panel-default ">
			<div class="panel-heading">
    			<h3 class="panel-title"><strong>Create Project</strong></h3>
    		</div>
    <div class="panel-body"> 
	<?php
		$formattributes = array('class' => 'form-horizontal', 'role' => 'form');
		echo form_open('main/create_validate',$formattributes);
	?>
		<div class="form-group">
                    <label for="inputProjectName" class="col-sm-3 control-label" style="color: #0088cc">Project Name &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
					$projectnameattributes = array('class' => 'form-control','name'=>'projectname', 'placeholder'=>'Project Name ');
      				echo form_input($projectnameattributes,$this->input->post('fname'));
					if(form_error('projectname')!=null)
						echo '<div class="alert alert-danger">'.form_error('projectname').'</div>';
      			?>
    		</div>
  		</div>
  		<br />
  		<div class="form-group">
    		<label for="inputStartDate" class="col-sm-3 control-label" style="color: #0088cc">Start Date &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
      				$StartDateattributes = array('class' => 'form-control','name'=>'startdate','id'=>'dpd1','placeholder'=>'mm-dd-yyyy');
      				echo form_input($StartDateattributes,$this->input->post('startdate'));
					if(form_error('startdate')!=null)
						echo '<div class="alert alert-danger">'.form_error('startdate').'</div>';
      			?>
    		</div>
  		</div>
  		<br />
  		<div class="form-group">
    		<label for="inputEndDate" class="col-sm-3 control-label" style="color: #0088cc">End Date &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
                    
      			<?php
      				$emailattributes = array('class' => 'form-control','name'=>'enddate', 'id'=>'dpd2', 'placeholder'=>'mm-dd-yyyy');
      				echo form_input($emailattributes,$this->input->post('enddate'));
					if(form_error('enddate')!=null)
						echo '<div class="alert alert-danger">'.form_error('enddate').'</div>';
      			?>
    		</div>
  		</div>
  		<br />
  		<div class="form-group">
    		<label for="inputOwner" class="col-sm-3 control-label" style="color: #0088cc">Owner &nbsp;&nbsp;</label>
                
                
    		<div class="col-sm-7">
      			<?php
                                $username=$this->session->userdata('USERNAME');
      				$usernameattributes = array('class' => 'form-control','name'=>'owner','value'=>$username);
      				echo form_input($usernameattributes,$this->input->post('owner'));
					if(form_error('owner')!=null)
						echo '<div class="alert alert-danger">'.form_error('owner').'</div>';
      			?>
    		</div>
  		</div>
  		<br />
  		
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
      				$clearbtnattributes = array('class' => 'btn btn-primary','name'=>'clear','value'=>'Clear','type'=>'reset','content'=>'Clear','data-toggle'=>'tooltip', 'data-original-title'=>'this button will reset all the values in the text feilds');
      				echo form_button($clearbtnattributes);
      			?>
      			&nbsp;
      			<?php
      				$registerbtnattributes = array('class' => 'btn btn-success','name'=>'create_project_submit','value'=>'create project');
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
    
    <div class="col-lg-4">
       
    </div>


</div>
    </div>
</body>
</html>