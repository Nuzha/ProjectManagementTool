
<div id="page-wrapper">
    <div class="row">
    <h3><center><span class="label label-default"> List of User Stories</span></center></h3>
   <table class="table table-striped">
   
         <thead>
        <tr>
         <th>Project ID</th>
 
          <th>User Story</th>
 
          <th>Description</th>
 
          <th>Iteration</th>
          <th>Plan Estimation</th>
          <th>Owner Email</th>
          <th>Status</th>
        </tr>
       
      </thead>
 
      <tbody>
        
        
                <?php
            

 
                foreach ($userStory_qry ->result() as $story):
                
                ?> 
            
            
               <?php
 
            
                // Print out the contents of the entry 
                echo '<tr class="'.$story->u_status.'">';
                
                echo '<td>' . $story->ProjectId. '</td>';
                echo '<td>' . $story->name . '</td>';
                echo '<td>' . $story->Description . '</td>';
                echo '<td>' . $story->IterationId . '</td>';
                echo '<td>' . $story->PlanEst . '</td>';
                
                echo '<td>' . mailto($story->OwnerEmail) . '</td>';
                echo '<td>'.'<a href = "#u_status_'.$story->StoryId.'" data-toggle="modal" >' . $story->u_status . '</a>'.'</td>';
                 
             ?>    
<!--                ------------------------------------------------------------------------------------------------------------>
                    <div class = "modal fade" id ="u_status_<?php echo $story->StoryId; ?>" >
                                            <div class = "modal-dialog">
                                                <div class = "modal-content">
                                                    <div class = "modal-header">
                                                        <p><b>Change User Story Status</b></p>
                                                    </div>
                                                    <div class = "modal-body" > 
                                                        
                                                      <?php
                                                        $id=$story->StoryId;
                                                      
                                                        $formattributes = array('class' => 'form-horizontal', 'role' => 'form');
                                                        echo form_open('s_dev_iteration/update_userstory_status', $formattributes);
                                                        
                                                        ?>
                                                       
                                                        <div class="form-group">
                                                            <div class="col-md-2"> 
                                                                 User Story ID
                                                            </div>
                                                                <div class="col-md-3">  
                                                                    <?php
                                                                    $discussionattributes = array('class' => 'form-control', 'name' => 'ID', 'value'=>$id);
                                                                    echo form_input($discussionattributes, $this->input->post('discussion'));
                                                                    
                                                                    ?>
                                                           
                                                            
                                                                </div>
                                                         <div class="col-md-4"> 
                                                          
                                                          <?php
                                                                    echo '<select class="form-control" name="category">
                                                                    <option value="sucess">Sucess</option>
                                                                    <option value="Warning">Warning</option>
                                                                    <option value="Active">Active</option>
                                                                    </select> ';
                                                                    
                                                              ?>  
                                                        </div>
                                                             </div>
                                                        
                                               

                                             
                                                    
                                                    <div class = "modal-footer">
                                                        <?php
                                                        $registerbtnattributes = array('class' => 'btn btn-primary', 'name' => 's_submit', 'value' => 'submit');
                                                        echo form_submit($registerbtnattributes);
                                                        ?>

                                                        <?php
                                                         
                                                        echo form_close();
                                                        ?>
                                                        <a class ="btn btn-primary" data-dismiss = "modal">Close</a>
                                                    </div>
                                                    </form>
                                                    </div>    
                                                </div>
                                            </div>
                                        </div> 
     
<!--                -------------------------------------------------------------------------------------------------------------->
            
            <?php endforeach;?>      
           
      </tbody>
 
      <tbody></tbody>
    </table>
      
      
         
      
  </div>
    <!-- /container -->
    
</body>
</html>


