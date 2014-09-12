<?php
		foreach ($db_profile_details as $info) { $picture = $info->profilepicture; $bio = $info->bio; }
		foreach ($db_business_details as $info) { $bname = $info->bname; }
		foreach ($db_basic_details as $info) { $fname = $info->fname; $lname = $info->lname; $email = $info->email; }
?>

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
			  <div class="panel-body">
			    <?php 
			    	if(isset($picture)){
			    		echo '<img width="250" src="'.base_url().'images/prifilepictures/'.$picture.'" class="img-thumbnail pull-left profile-picture"/>';
					}else{
						echo '<img width="250" src="'.base_url().'images/prifilepictures/default_profile.jpg" class="img-thumbnail pull-left profile-picture"/>';
					}
				?>
			    <div class="col-md-8 pull-right ">
			    	 <a href="<?php echo base_url().'profile/update'?>" id="" name="" class="btn btn-default"></a>
			   		<h3>
			   			<?php 
				   			if(isset($bname)){
				   				 echo '<span class="glyphicon glyphicon-briefcase"></span>&nbsp;&nbsp;<u>'.$bname.'</u>'; 
							}else if(isset($fname) || isset($lname)){
								 echo '<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;<u>'.$fname.'&nbsp;'.$lname.'</u>'; 
							} 
						?>
					</h3>
					<br />
					<p><?php if(isset($email)){ echo '<span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;'.$email; }?></p>
					<p><?php if(isset($bio)){ echo '<span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;'.$bio; }?></p>
			   	</div>
			   	
			  </div>
			  <div class="panel-footer">
			  	<div class="container ">
			   		<a href="<?php echo base_url().'profile/update'?>" class="navbar-btn pull-left">My Advertisements</a>
			  	</div>
			  </div>
			</div>
		</div>
	</div>
</div>

