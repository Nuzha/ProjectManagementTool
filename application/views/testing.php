 <div class="col-md-7 col-md-offset-2">
		<div class="panel panel-default ">
                    <div class="panel-heading"> 





<?php echo form_open('s_scrum_chart/update_db'); ?>
            <br>
            
            <?php 
           
            $p_id=$selected;
            echo $p_id;
//            $sql_o =$pid;
//            $res_o = mysql_query($sql_o);
//            $pid1= mysql_result($res_o,0,'project_id');
           
            
            
//            $p_id = $pid1 ; 
               
                
// this where i wanted to assign the drop down value
                    ?>   
            <br>

		
	   
	    <label >Success: </label>
            <?php 
            
            $email=$this->session->userdata('email');
            $sql = "SELECT COUNT(u_status)from user_stories where u_status='success' and ProjectId='$p_id' and OwnerEmail='$email'";
            $res = mysql_query($sql);
            $final= mysql_result($res,0);
            //echo $final;
            ?>
             
            <input type="number" name="success" value="<?php echo set_value('success',$final); ?>"/>
            
	    
	    <br>
            
            
	    <label >Active: </label>
            <?php $sql1 = "SELECT COUNT(u_status)from user_stories where u_status='active'and ProjectId='$p_id' and OwnerEmail='$email'";
            $res1 = mysql_query($sql1);
            $final1= mysql_result($res1,0);
            //echo $final;
            ?>
             
            <input type="number" name="active" value="<?php echo set_value('active',$final1); ?>"/>
            
	   
	    <br>
            
           
	    <label >Warning: </label>
            <?php $sql2 = "SELECT COUNT(u_status)from user_stories where u_status='warning'and ProjectId='$p_id' and OwnerEmail='$email'";
            $res2 = mysql_query($sql2);
            $final2= mysql_result($res2,0);
            //echo $final;
            ?>
             
            <input type="number" name="warning" value="<?php echo set_value('warning',$final2); ?>"/>
            
	    
	    
	    
		
	    
	    
        
        <div class="form-group">
    	<div class="col-sm-offset-7 col-sm-5">
       <?php
      				$registerbtnattributes = array('class' => 'btn btn-primary','name'=>'submit','value'=>'Post');
					echo form_submit($registerbtnattributes);
      			?>
	
            <?php echo form_close(); ?>
        </div>
        
       
          
          <div id="chart_content">
              
          </div>
            </div>
                    </div>
                </div>
 </div>
