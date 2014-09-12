

<body>
<div class="container">
	<div class="col-md-10 col-md-offset-2">
		<div class="panel panel-default ">
			<div class="panel-heading">
    			<center><h3 class="panel-title"><strong>Add Tasks To User Story</strong></h3></center>
    		</div>
         <div class="panel-body">
<?php 

echo form_open('main/insert_Task');

echo form_hidden('StoryId', $row[0]->StoryId);
echo form_hidden('Story', $row[0]->name);

// an array of the fields in the student table
$field_array = array('ProjectId','name','Description','IterationId','OwnerEmail','PlanEst');
?>

<div>
<label>User Story :</label>
<?php

echo form_label($row[0]->name,'Story_n') ;
?>
</div>
<br>
<br>

<div>
<label >Task Name: </label>
<input type="text" name="task_name" id="task_name" value="" size="30" placeholder="Enter Task Name" />
</div>
<br>

<div>
<label >Task Description: </label>
<input type="text" name="task_des" id="task_des" value="" size="30" placeholder="Enter Task Description" />
</div>
<br>

<p>
<input type="submit" value="Submit" />
</p>

<?php echo form_close(); ?>


<h5>Already Existing Tasks : </h5>
<?php
foreach($query as $row1)
{
?>
  	<div class="message_show">
    <p>
    	Task name:<?php echo  $row1->T_name; ?>
    </p>
    <p>
       	Task description:<?php echo $row1->T_Description; ?>
    </p>
    <?php echo"------------------------------------------------------------------------------------------------------------------------" ?>
    </div>
   
<?php
}
?>

</div>
	</div>
	</div>
</div>
    </body>
</html>
