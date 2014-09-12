<div id="page-wrapper">
    <div class="row">
        <h3><center><span class="label label-default"> Change Defect Status </span></center></h3>
        <table class="table table-striped">

            <thead>
                <tr>
                    <th>Defect ID</th>



                    <th>Description</th>


                    <th>Defect Status </th>

                </tr>

            </thead>

            <tbody>


                <?php
                foreach ($defect_qry->result() as $defect):
                    ?> 


                    <?php
                    // Print out the contents of the entry 
                    echo '<tr class="' . $defect->defect_stat . '">';

                    echo '<td>' . $defect->defect_id . '</td>';
                    echo '<td>' . $defect->defect_des . '</td>';




                    //echo '<td>' . mailto($story->OwnerEmail) . '</td>';
                    //echo '<td>'.'<a href = "#u_status1_'.$story->StoryId.'" data-toggle="modal" >Add Defects</a>'.'</td>';
                    //echo '<td>'.anchor('Main/edit/' . $story->StoryId, 'View Defects').'</td>';
                    echo '<td>' . '<a href = "#defect_stat_' . $defect->defect_id . '" data-toggle="modal" >' . $defect->defect_stat . '</a>' . '</td>';
                    ?>    
                    <!--                ------------------------------------------------------------------------------------------------------------>
                <div class = "modal fade" id ="defect_stat_<?php echo $defect->defect_id; ?>" >
                    <div class = "modal-dialog">
                        <div class = "modal-content">
                            <div class = "modal-header">
                                <p><b>Change Defect Status</b></p>
                            </div>
                            <div class = "modal-body" > 

    <?php
    $id = $defect->defect_id;

    $formattributes = array('class' => 'form-horizontal', 'role' => 'form');
    echo form_open('s_dev_iteration/update_defect_status', $formattributes);
    ?>

                                <div class="form-group">
                                    <div class="col-md-2"> 
                                        Defect ID
                                    </div>
                                    <div class="col-md-3">  
                                <?php
                                $discussionattributes = array('class' => 'form-control', 'name' => 'ID', 'value' => $id);
                                echo form_input($discussionattributes, $this->input->post('discussion'));
                                ?>


                                    </div>
                                    <div class="col-md-4"> 

                                        <?php
                                        echo '<select class="form-control" name="category">
                                                                    <option value="Defined">Defined</option>
                                                                    <option value="Active">Active</option>
                                                                    <option value="Testing">Testing</option>
                                                                    <option value="Success">Success</option>
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

<?php 
       $this->session->set_userdata('u_id',$defect->story_id);
       endforeach; ?>      

            </tbody>

            <tbody></tbody>
        </table>




    </div>
    <!-- /container -->

</body>
</html>


