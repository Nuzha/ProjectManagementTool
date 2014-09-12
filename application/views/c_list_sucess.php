<div id="page-wrapper">
    <div id='row_1' class="row">
        
        <div class='col-lg-6' >
             <div class="panel panel-primary">
                 <div class="panel-heading">
                     <h5>Active User Stories </h5>
                 </div>
            <table class="table table-striped">

                <thead>
                    <tr>
                        
                        <th>Project ID</th>
                        <th>User Story</th>
                        <th>Iteration</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    
                     <?php
                     if($userStory_active == FALSE){
                         
                         echo'<div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
              No Active User Stories Available.
            </div>';
                     }
                     else{
                    foreach ($userStory_active as $story) {
                        
                        echo '<td>' . $story->ProjectId . '</td>';
                        echo '<td>' . $story->name . '</td>';
                        echo '<td>' . $story->IterationId . '</td>';
                        echo '<td>' . $story->u_status . '</td>';
                    }
                     }
                    ?>
                </tbody>
            </table>
             </div>
        </div>
        <div class='col-lg-6' >
             <div class="panel panel-success">
                 <div class="panel-heading">
                     <h5>Success User Stories </h5>
                 </div>
            <table class="table table-striped">

                <thead>
                    <tr>
                        
                        <th>Project ID</th>
                        <th>User Story</th>
                        <th>Iteration</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    
                     <?php
                      if($userStory_sucess == FALSE){
                         
                         echo'<div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
              No Sucess User Stories Available.
            </div>';
                     }
                     else{
                     
                    foreach ($userStory_sucess as $story) {
                        
                        echo '<td>' . $story->ProjectId . '</td>';
                        echo '<td>' . $story->name . '</td>';
                        echo '<td>' . $story->IterationId . '</td>';
                        echo '<td>' . $story->u_status . '</td>';
                    }
                     }
                    ?>
                </tbody>
            </table>
             </div>
        </div>
        
      
        
    </div>
    <div class='row'>
            <div class='col-lg-6' >
             <div class="panel panel-warning">
                 <div class="panel-heading">
                     <h5>Warning User Stories </h5>
                 </div>
            <table class="table table-striped">

                <thead>
                    <tr>
                        
                        <th>Project ID</th>
                        <th>User Story</th>
                        <th>Iteration</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    
                     <?php
                      if($userStory_warning == FALSE){
                         
                         echo'<div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
              No Warning User Stories Available.
            </div>';
                     }
                     else{
                    foreach ($userStory_warning as $story1) {
                        
                        echo '<td>' . $story1->ProjectId . '</td>';
                        echo '<td>' . $story1->name . '</td>';
                        echo '<td>' . $story1->IterationId . '</td>';
                        echo '<td>' . $story1->u_status . '</td>';
                    }
                     }
                    ?>
                </tbody>
            </table>
             </div>
        </div>
        
    </div>
</div>
