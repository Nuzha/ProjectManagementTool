<!DOCTYPE html>
 
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="description">
  <meta content="" name="author">
  <link href="" rel="shortcut icon">
 
  <title>List of Iterations</title><!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">
  
<script>
    

    $(document).ready(function() {
            $('#example').popover({
               
                placement: "bottom",
                
                title: "Discussion Forum",
                });
        });
  </script>
</head>
 
<body>
  <div class="container">
    <table class="table table-striped">
      <thead>
        <tr>
         <th>Project ID</th>
 
          <th>Iteration Name</th>
 
          <th>Start Date</th>
 
          <th>End Date</th>
          <th>Status</th>
        </tr>
      </thead>
 
      <tbody>
        <?php
            

 
            foreach ($it_qry ->result() as $col):
                
            ?> 
                <?php
                // Print out the contents of the entry 
                
                echo '<tr class="'.$col->i_status.'">';
                
                echo '<td>' . $col->ProjectId . '</td>';
                echo '<td>' . $col->i_name . '</td>';
                echo '<td>' . $col->i_start_date . '</td>';
                echo '<td>' . $col->i_end_date . '</td>';
                echo '<td>'.'<a href = "#u_status_'.$col->i_id.'" data-toggle="modal" >' . $col->i_status . '</a>'.'</td>';
                 
             ?>    
<!--                ------------------------------------------------------------------------------------------------------------>
                    <div class = "modal fade" id ="u_status_<?php echo $col->i_id; ?>" >
                                            <div class = "modal-dialog">
                                                <div class = "modal-content">
                                                    <div class = "modal-header">
                                                        <p><b>Change User Story Status</b></p>
                                                    </div>
                                                    <div class = "modal-body" > 
                                                        
                                                      <?php
                                                        $id=$col->i_id;
                                                      
                                                        $formattributes = array('class' => 'form-horizontal', 'role' => 'form');
                                                        echo form_open('s_dev_iteration/update_iteration_status', $formattributes);
                                                        
                                                        ?>
                                                       
                                                        <div class="form-group">
                                                            <div class="col-md-2"> 
                                                                 Iteration ID
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
