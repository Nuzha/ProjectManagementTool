  <div class="container">
	<div class="col-md-7 col-md-offset-2">
		<div class="panel panel-default ">
			<div class="panel-heading">
    			<center><h3 class="panel-title"><strong>Iteration Listing</strong></h3></center>
    		</div>
    
<div class="navigation">
<?php 
  // nav bar
  echo anchor('Main/Iteration', 'Add Iteraion');
  echo (' | ');
  
  echo anchor('Main/Iterationlisting', 'List All Iterations');
?>
</div>



<h3><strong><?php echo $headline;?></strong></h3>

<div>
<center><?php echo $data_table; ?></center>
</div>