<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-7" >
            <h3>Iteration Plan</h3>
            <div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
              Here you can create iterations and manage the backlog by dragging and dropping the user stories to the iterations.
            </div>
        </div>
<div class="col-lg-5">
      <div class="">
          
<!--          <a href="#" class="btn btn-lg btn-success" data-toggle="modal" data-target="#iteration">Click to open Modal</a>-->
          
            <a href="#" class="btn btn-group-justified btn-primary"data-toggle="modal" data-target="#iteration">Create Iteration</a><br>
            
   
             <table class="table table-striped">     
 
      <tbody>
        <?php
            
            if($row_i !="NULL"){
 
            foreach ($row_i  as $col) {
                // Print out the contents of the entry 
                echo '<tr class="'.$col->project_id.'">';
                
                echo '<tr><td>Project Name:</td><td>' . $col->project_name . '</td></tr>';
                echo '<tr><td>Start Date  :</td><td>' . $col->start_date . '</td></tr>';
                echo '<tr><td>End Date    :</td><td>' . $col->end_date . '</td></tr>';
                $duration= round((strtotime($col->end_date)-  strtotime($col->start_date))/86400) ;
                 echo '<td>Duration   :</td><td>' . $duration. 'Days</td>';
                 $this->session->set_userdata('DURATION', $duration);
            }}
            else{
                
            }
            ?>      
           
      </tbody>
 
      <tbody></tbody>
    </table>
        
      </div>
            
          </div>
    </div>
</div>

   <div class = "modal fade" id = "iteration" tabindex="-1" role="dialog" aria-hidden="true" >
                                            <div class = "modal-dialog">
                                                <div class = "modal-content">
                                                    <div class = "modal-header">
                                                        <script>
                                                                $(function(){
                                                                   $('.datepicker').datepicker({
                                                                      format: 'mm-dd-yyyy'
                                                                    });
                                                                });
                                                     

                                                                </script>
                                                              
                                                              <p><b>Create Iteration</b></p>
                                                                    </div>
                                                    <div class = "modal-body">
                                                   
                                                        
                                                        
<!--                                                       ------------------------------------------------------>
                                                      <?php
             
             $formattributes = array('class' => 'form-vertical', 'role' => 'form', 'id'=>'tryitForm');
             echo form_open('main/createIteration', $formattributes);
                            ?>
                                <div class="form-group">
                                <label for="iterationName" class="control-label">&nbsp;&nbsp; Iteration Name </label>
                                <div class="col-sm-11">
                                <?php
                                $iterationattributes = array('class' => 'form-control', 'name' => 'iterationname');
                                echo form_input($iterationattributes, $this->input->post('iterationname'));
                                if (form_error('iterationname') != null)
                                    echo '<div class="alert alert-danger">' . form_error('iterationname') . '</div>';
                                ?>
                                </div>
                                </div>
                                
                                
                                 <div class="form-group">
                                <label for="start_date" class="control-label">&nbsp;&nbsp; Start Date </label>
                                <div class="col-sm-11">
                                <?php
                                $StartDateattributes = array('class' => 'datepicker', 'name' => 'I_start_date', 'id'=>'dp1');
                                echo form_input($StartDateattributes, $this->input->post('I_start_date'));
                                if (form_error('I_start_date') != null)
                                    echo '<div class="alert alert-danger">' . form_error('I_start_date') . '</div>';
                                ?>
                                </div>
                                </div>
                              
                                
                                 <div class="form-group">
                                <label for="end_date" class="control-label">&nbsp;&nbsp; End Date </label>
                                <div class="col-sm-11">
                                <?php
                                $EndDateattributes = array('class' => 'datepicker', 'name' => 'I_end_date', 'id'=>'dp2');
                                echo form_input($EndDateattributes, $this->input->post('I_end_date'));
                                if (form_error('I_end_date') != null)
                                    echo '<div class="alert alert-danger">' . form_error('I_end_date') . '</div>';
                                ?>
                                </div>
                                </div>
                                
                                
                                
                               
<!--                                                       ------------------------------------------------------->
                                                    </div>
                                                    <div class = "modal-footer">
                                                     <div class="form-group">
                                <div class="col-sm-offset-0">
                                <?php
                                $clearbtnattributes = array('class' => 'btn btn-default', 'name' => 'clear', 'value' => 'Clear', 'type' => 'reset', 'content' => 'Clear', 'data-toggle' => 'tooltip', 'data-original-title' => 'this button will reset all the values in the text feilds');
                                echo form_button($clearbtnattributes);
                                ?>
                                &nbsp;
                                <?php
                                $registerbtnattributes = array('class' => 'btn btn-primary', 'name' => 'create_iteration_submit', 'value' => 'create iteration');
                                echo form_submit($registerbtnattributes);
                                ?>
                                <a class ="btn btn-primary" data-dismiss = "modal">Close</a>
                                </div>
                                </div>

                                <?php
                                echo form_close();
                                ?>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>