
<div class="container">
	<div class="col-md-10 col-md-offset-2">
		<div class="panel panel-default ">
			<div class="panel-heading">
    			<center><h3 class="panel-title"><strong>Edit Iteration</strong></h3></center>
    		</div>
                    <div class="panel-body"></div>

<?php 

echo form_open('main/updateIteration');

echo form_hidden('i_id', $row[0]->i_id);

// an array of the fields in the student table
$field_array = array('ProjectId','i_name','i_start_date','i_end_date','i_status');
?>
<div>
<label>Project Id</label>
<?php
$dd_list = array(
                  'P01'   => 'P01',
                  'P02'   => 'P02',
                  'P03'   => 'P03',
		                );
echo form_dropdown('ProjectId', $dd_list,$row[0]->ProjectId)
?>
</div>
<br>
<div>
<label>Iteration Name</label>
<?php

echo form_input('i_name', $row[0]->i_name) ;
?>
</div>
<br>




<br>
<div>
<label>Iteration Start Date</label>
<?php
echo form_input('i_start_date',$row[0]->i_start_date);
?>
</div>
<br>

<br>
<div>
<label>Iteration End Date</label>
<?php
echo form_input('i_end_date',$row[0]->i_end_date);
?>
</div>
<br>

<div>
<label>Iteration Status</label>	
<?php	 
		 $dd_list = array(
		                  'Defined'   => 'Defined',
		                  'In-Progress'   => 'In-Progress',
		                  'Completed'   => 'Completed',
		                );
		 echo form_dropdown('i_status', $dd_list,$row[0]->i_status);?>
</div>
<br>


<div><?php		    
// not setting the value attribute omits the submit from the $_POST array
echo form_submit('', 'Update'); 

echo form_close();

?>
</div>

