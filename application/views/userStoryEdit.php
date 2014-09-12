<div class="container">
    <div class="col-md-7 col-md-offset-2">
        <div class="panel panel-default ">
            <div class="panel-heading">
                <center><h3 class="panel-title"><strong>Edit User Story</strong></h3></center>
            </div>


            <div class="panel-body">


                <div>
                    <?php
                    echo form_open('Main/update');

                    echo form_hidden('StoryId', $row[0]->StoryId);


                    $field_array = array('ProjectId', 'name', 'Description', 'IterationId', 'OwnerEmail', 'PlanEst', 'u_status');
                    ?>
                    <div class="form-group">
                        <label>Project Id</label>
                        <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $this->session->userdata('project_name') ?>" disabled>
                    </div>
                    

                    <div class="form-group">
                        <label>User Story</label>
                        <?php
                        echo form_textarea('name', $row[0]->name, 'class="form-control"');
                        ?>
                    </div>
                    

                    <div class="form-group">
                        <label>Description</label>
                        <?php
                        echo form_input('Description', $row[0]->Description, 'class="form-control"');
                        ?>
                    </div>
                    

                    <div class="form-group">

                        <label for="email">Iteration Id </label>
                        <?php echo form_dropdown('IterationId', $iteration_list, $row[0]->IterationId, 'class="form-control"'); ?>
                    </div>
                   

                    <div class="form-group">
                        <label for="email">Owner e-mail </label>
                        <?php echo form_dropdown('OwnerEmail', $email_list, $row[0]->OwnerEmail, 'class="form-control"'); ?>

                    </div>
                    

                    <div class="form-group">
                        <label>Plan Estimation</label>
                        <?php
                        echo form_input('PlanEst', $row[0]->PlanEst, 'class="form-control"');
                        ?>
                    </div>
                    

                    <div class="form-group">
                        <label>User Story Status</label>	
                        <?php
                        $dd_list = array(
                            'Defined' => 'Defined',
                            'Success' => 'Success',
                            'Active' => 'Active',
                            'Warning' => 'Warning',
                        );
                        echo form_dropdown('u_status', $dd_list, $row[0]->u_status, 'class="form-control"');
                        ?>
                    </div>
                   


                    <div class="form-group">
                        <input class = 'btn btn-success' type='submit' value="Update user story"/>
                        <?php echo form_close(); ?>
                    </div>


                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
