<script>
    

    $(document).ready(function() {
            $('#example').popover({
               
                placement: "bottom",
                
                title: "Discussion Forum",
                });
        });
  </script>
<div  id="page-wrapper">
    <div class="row">
        <div class="col-lg-8">
    <div class="well well-sm">
		
                    	<div class="panel-heading">
                             <?php $username=$this->session->userdata['USERNAME']; ?>
                            <?php
                            $sql = "SELECT `dis_topic` FROM discussion WHERE `dis_id`=$result";
                            $query_resource= mysql_query($sql);
                            $topic=  mysql_fetch_assoc($query_resource);
                            ?>
                            
                            <center><h3 class="label-default"><strong><?php echo $topic['dis_topic'];  ?></strong></h3></center>
    		</div>
                            <?php
                    //Create the query
                    
                    $sql2="SELECT `comment`, `comment_username` FROM comment WHERE `dis_id`=$result";
                    //Run the query
                    $query_resource = mysql_query($sql2);
                    

                    //Iterate over the results that you've gotten from the database (hopefully MySQL)
                    while ($comments = mysql_fetch_assoc($query_resource)):
                       
                        ?>

                        <a href="" id="<?php echo $comments['comment_username']; ?>"  class="bg-success" onclick=""><b><?php echo $comments['comment_username']; ?>:</b></a>


                        <label   class=""><?php echo $comments['comment']; ?></label><br />
                        

                    <?php endwhile; ?>
                        
                        <?php
                     
		$formattributes = array('class' => 'form-horizontal', 'role' => 'form');
		echo form_open("c_discuss/save_comment/$result",$formattributes);
	?>
                          <div class="form-group">
                              <div class="col-sm-5 ">
                                
                        <a href="" class="bg-success"><b>  <?php echo $this->session->userdata['USERNAME'] ?>:</b></a>
                              </div>
                          </div>
    		<div class="form-group">
    		<div class="col-sm-9">
      			<?php
      				$commentattributes = array('class' => 'form-control','name'=>'comment','placeholder'=>'Enter Your Answer Here.....');
      				echo form_textarea($commentattributes,$this->input->post('comment'));
					if(form_error('comment')!=null)
						echo '<div class="alert alert-danger">'.form_error('comment').'</div>';
      			?>
                    
                    
                </div>  
    		</div>
                          
                          <div class="form-group">
    		<div class="col-sm-offset-7 col-sm-5">
      			<?php
      				$clearbtnattributes = array('class' => 'btn btn-default','name'=>'clear','value'=>'Clear','type'=>'reset','content'=>'Clear','data-toggle'=>'tooltip', 'data-original-title'=>'this button will reset all the values in the text feilds');
      				echo form_button($clearbtnattributes);
      			?>
      			&nbsp;
      			<?php
      				$registerbtnattributes = array('class' => 'btn btn-primary','name'=>'comment_submit','value'=>'Answer');
					echo form_submit($registerbtnattributes);
      			?>
    		</div>
  		</div>
  		
  		<?php
  			echo form_close();
  		?>

    
    
    </div>
        </div>
        
        <div class="col-lg-4">
                       
                            <ul id="rightsidemenu" >
                                
<!-- -----------------------------------------------------creating discuss topic popover------------------------------------------------------------------------------------------------------------------------->
                                
                                  <a  data-html="true "id="example" class="btn btn-success" data-content='<?php
                                    $formattributes = array('class' => 'form-horizontal', 'role' => 'form');
                                    echo form_open('c_discuss/discuss_validate',$formattributes);?>
                                      
                                   <div class="form-group">
                                    <label for="topic" class="control-label">Discussion Topic &nbsp;&nbsp;</label>
                                    <div class="col-sm-11">  
                                    <?php
					$discussionattributes = array('class' => 'form-control','name'=>'discussion');
      				echo form_input($discussionattributes,$this->input->post('discussion'));
					if(form_error('discussion')!=null)
						echo '<div class="alert alert-danger">'.form_error('discussion').'</div>';
      			?>
                                </div>
                                </div>
                               
                                
                                
                                <div class="form-group">
    		<label for="Category" class="control-label">Category &nbsp;&nbsp;</label>
    		<div class="col-sm-11">
                <?php
      			echo '<select class="form-control" name="category">
                        <option value="general">General</option>
                        <option value="bugs">Bugs</option>
                        <option value="other">Other</option>
                        </select> '
                    
                  ?>  
    		</div>
           
                
                
       

  		</div>
                
                 <div class="form-group">
    		<label for="Discription" class="control-label">Discription &nbsp;&nbsp;</label>
    		<div class="col-sm-11">
      			<?php
      				$Discriptionattributes = array('class' => 'form-control','name'=>'discription');
      				echo form_textarea($Discriptionattributes,$this->input->post('discription'));
					if(form_error('discription')!=null)
						echo '<div class="alert alert-danger">'.form_error('discription').'</div>';
      			?>
                    
                    
    		</div>
           
                
                
       

  		</div>
                
                <div class="form-group">
    		<div class="col-sm-offset-1">
      			<?php
      				$clearbtnattributes = array('class' => 'btn btn-default','name'=>'clear','value'=>'Clear','type'=>'reset','content'=>'Clear','data-toggle'=>'tooltip', 'data-original-title'=>'this button will reset all the values in the text feilds');
      				echo form_button($clearbtnattributes);
      			?>
      			&nbsp;
      			<?php
      				$registerbtnattributes = array('class' => 'btn btn-primary','name'=>'discription_submit','value'=>'Post');
					echo form_submit($registerbtnattributes);
      			?>
    		</div>
  		</div>
                                      
                                      
                                      
                                      ' >+Create a Discussion Topic</a></center>
                                  
                                  
                                  
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                                <br>
                                <div class="" >
                                <p class="h5"><b>Discussion Categories</b></p>
                                <li><a class ="active" href ='<?php echo base_url()."c_discuss/view_discuss/general" ?>'>--------------General-------------</a></li><br>
                                <li><a class ="menuItem" href ='<?php echo base_url()."c_discuss/view_discuss/bugs" ?>'>---------------Bugs----------------</a></li><br>
                                <li><a class ="menuItem" href ='<?php echo base_url()."c_discuss/view_discuss/other" ?>'>---------------Other--------------</a></li><br>
                                <li><a  class ="menuItem" href ='<?php echo base_url()."c_discuss/view_discuss/general" ?>'>----------Projects problem-----</a></li>
                                
                                </div>
                            </ul>
                        
                       
                    </div>
    </div>
</div>

                    
                    
		
    
    
