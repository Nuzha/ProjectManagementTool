<script>
    

    $(document).ready(function() {
            $('#example').popover({
               
                placement: "bottom",
                
                title: "Discussion Forum",
                });
        });
  </script>
<div id="page-wrapper">
    <div class="row" id='dis'>
        <div class="col-lg-8">
    <div class="well well-sm">

        <h3><center><span class="label label-primary"><?php echo $category?> Discussions</center></span></h3><br>
        <?php
        //Create the query
       
        
        $sql = "SELECT `dis_id`,`dis_topic`, `category`,`username`, `discription` FROM discussion WHERE `category`='$category'";

        //Run the query
        $query_resource = mysql_query($sql);

        //Iterate over the results that you've gotten from the database (hopefully MySQL)
        while ($project = mysql_fetch_assoc($query_resource)):
             $id=$project['dis_id'];
            $user=$project['username'];
             $sql_image="SELECT `img_path` FROM member WHERE username='$user'";
             
             $query_resource2 = mysql_query($sql_image);
             $img = mysql_fetch_assoc($query_resource2);
            
            ?>
           <img width="50" height="50" src="http://localhost/ProjectManagementSoftware_SEP004/uploads/<?php echo $img['img_path']; ?>"/>

        
           <a href="" id=""  class="bg-primary" onclick=""><?php echo $project['username']; ?>:</a>
           <h4>Discussion Topic  :<a href="<?php echo base_url()."c_discuss/select_topic/$id" ?>" id="<?php echo $project['dis_id']; ?>"  class="" onclick=""><b><?php echo $project['dis_topic']; ?></b></a></h4>
            
            
        <label style="font-size: small"id="<?php echo $project['dis_id']; ?>"  class="col-md-7">Description  :<?php echo $project['discription']; ?></label><br />
        <br>

        <?php endwhile; ?>



        <br>
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


