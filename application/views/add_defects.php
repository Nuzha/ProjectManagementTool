<div id="page-wrapper">
    <div class="row">

    <h3><center><span class="label label-default"> Add Defects </span></center></h3>
   <table class="table table-striped">
   
         <thead>
        <tr>
         <th>Project ID</th>
         <th>User Story</th>
         <th>Description</th>
         <th>Iteration</th>
         <th>Plan Estimation</th>
         <th> </th>
          
        </tr>
       
      </thead>
      <tbody>
        
         

                <?php
                foreach ($userStory_qry->result() as $story):
                    ?> 


                    <?php
                    // Print out the contents of the entry 
                    echo '<tr class="' . $story->u_status . '">';

                    echo '<td>' . $story->ProjectId . '</td>';
                    echo '<td>' . $story->name . '</td>';
                    echo '<td>' . $story->Description . '</td>';
                    echo '<td>' . $story->IterationId . '</td>';
                    echo '<td>' . $story->PlanEst . '</td>';

                    //echo '<td>' . mailto($story->OwnerEmail) . '</td>';
                    echo '<td>' . '<a href = "#u_status1_' . $story->StoryId . '" data-toggle="modal" >Add Defects</a>' . '</td>';
                    echo '<td>' . anchor('s_dev_iteration/view_defects/' . $story->StoryId, 'View Defects') . '</td>';
                    ?>    
                    <!--                ------------------------------------------------------------------------------------------------------------>
                <div class = "modal fade" id ="u_status1_<?php echo $story->StoryId; ?>" >
                    <div class = "modal-dialog">
                        <div class = "modal-content">
                            <div class = "modal-header">
                                <p><b>Add Defects</b></p>
                            </div>
                            <div class = "modal-body" > 

    <?php
    $id = $story->StoryId;

    $formattributes = array('class' => 'form-horizontal', 'role' => 'form');
    echo form_open('s_dev_iteration/add_defects_c', $formattributes);
    ?>

                                <div class="form-group">
                                    <div class="col-md-2"> 
                                        User Story ID
                                    </div>
                                    <div class="col-md-3">  
                                <?php
                                $discussionattributes = array('class' => 'form-control', 'name' => 'ID', 'value' => $id);
                                echo form_input($discussionattributes, $this->input->post('discussion'));
                                ?>


                                    </div>
                                    <div class="col-md-4"> 




                                        <label >Defect Description: </label>
                                        <textarea type="text" name="defect_des" id="defect_des" value="" size="30"> </textarea>

                                        <label >Defect Status: </label>
    <?php echo '<select class="form-control" name="defect_stat">
                                                                    <option >defined</option>
                                                                    <option >in-progerss</option>
                                                                    <option >completed</option>
                                                                    </select> '; ?> 

                                    </div>
                                </div>




                            </div>
                            <div class = "modal-footer">
                                <div class="form-group">
                                    <div class="col-sm-offset-0">
    <?php
    $registerbtnattributes = array('class' => 'btn btn-success', 'name' => 's_submit', 'value' => 'submit');
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
                </div>

                <!--                -------------------------------------------------------------------------------------------------------------->

<?php endforeach; ?>      

            </tbody>

            <tbody></tbody>
        </table>




    </div>
    <!-- /container -->
</div>
</body>
</html>


