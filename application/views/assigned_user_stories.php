<div id="page_wrapper">
    <div class="row">
        <div class="col-lg-11">
             
             <div class="panel panel-primary">
                 <div class="panel-heading">
                     <h5>Active User Stories </h5>
                 </div>
                  <?php
		$formattributes = array('class' => 'form-horizontal', 'role' => 'form','method' =>'post','enctype' => 'multipart/form-data');
		echo form_open('scrum_master/testing',$formattributes);
	?>
              <label class='label label-success'>List of assigned user stories:</label>
                 <table class="table table-striped">

                <thead>
                    <tr>
                        <th> </th>
                        <th>User Story</th>
                        <th>Description</th>
                      
                    </tr>
                </thead>
                <tbody>

                <?php
                    foreach ($userStory as $story) {
                        // Print out the contents of the entry 
                        echo '<tr class="' . $story->u_status . '">';
                        echo'<td><nobr><input type="radio" name="StoryID" value="' .$story->StoryId .
                        '"></nobr></td>';
                      
                        echo '<td>' . $story->name . '</td>';
                        echo '<td>' . $story->Description . '</td>';
                     
                     
                    }
                    ?>
                </tbody>
                
          </table>
    
                 <div class="panel-body">
                       <div class="form-group">
                      <label class='label label-success'>Attachment:</label>
                      <input type="file" name="uploaded_file">
                       </div>
                     
                     <div class="form-group">
                         <label class='label label-success'>Description:</label>
                         <input type="textarea" class="form-control" name="description" placeholder="description">
                     </div>
             </div>
              
              <div class="panel-footer">
                  <?php
      				$registerbtnattributes = array('class' => 'btn btn-primary','name'=>'story_submit','value'=>'upload file');
					echo form_submit($registerbtnattributes);
      			?>
                  <?php
  			echo form_close();
  		?>
  		
              </div>
            
        </div>
    </div>
</div>
