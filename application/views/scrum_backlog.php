<div id="page-wrapper">
    <div class="row">
        <?php echo form_open('scrum_master/change_priority'); ?>
        <div class="form-group">
            <input class = 'btn btn-success' type='submit' value="change priority"/>
        </div>
        <?php echo form_close(); ?>
    </div>
    <div class="row">

        <div class="col-lg-12">
            <h3><center> <span class="label label-default">List of User Stories</span></center></h3>
            <table class="table table-striped">

                <thead>
                    <tr>
                        <th> </th>   
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
                    $notice_des ="Description NOT Added";
                    $notice_it="Iteration NOT Added";
                    $notice_email="NOT Assigned Yet";
                    $notice_planes="Estimation NOT Added";
                    
                    foreach ($userStory_qry->result() as $story) {
                        // Print  the contents of the entry 
                        echo '<tr class="' . $story->u_status . '">';
                        echo'<td><nobr>' .
                        anchor('Main/edit/' . $story->StoryId, 'edit') . ' | ' .
                        anchor('Main/delete/' . $story->StoryId, 'delete', "onClick=\" return confirm('Are you sure you want to '
            + 'delete the record for $story->StoryId?')\"") . ' | ' .
                        anchor('Main/add_task/' . $story->StoryId, 'add tasks') .
                        '</nobr></td>';
                        echo '<td>' . $story->ProjectId . '</td>';
                        echo '<td>' . $story->name . '</td>';
                        if ($story->Description == null) {
                            echo '<td> <span class="glyphicon glyphicon-question-sign" style="color:red">' . $notice_des . '</span></td>';
                        } else {
                            echo '<td>' . $story->Description . '</td>';
                        }

                        if ($story->IterationId == null) {
                            echo '<td> <span class="glyphicon glyphicon-question-sign" style="color:red">' . $notice_it . '</span></td>';
                        } else {
                            echo '<td>' . $story->IterationId . '</td>';
                        }

                        if ($story->PlanEst == null) {
                            echo '<td> <span class="glyphicon glyphicon-question-sign" style="color:red">' . $notice_planes . '</span></td>';
                        } else {
                            echo '<td>' . $story->PlanEst . '</td>';
                        }

                        if ($story->OwnerEmail == null) {
                            echo '<td> <span class="glyphicon glyphicon-question-sign" style="color:red">' . $notice_email . '</span></td>';
                        } else {
                            echo '<td>' . mailto($story->OwnerEmail) . '</td>';
                        }
                        
                        
                        echo '<td>' . $story->u_status . '</td>';
                    }
                    ?>
                </tbody>

            </table>


        </div>
    </div>
</div>




