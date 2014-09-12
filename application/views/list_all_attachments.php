<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10">
             <div class="well well-sm">

             <h3><center><span class="label label-primary">List of All Attachments</center></span></h3><br>
             
             <?php
                  if($this->session->userdata('type')=="Scrum Master"){
                  $sql = "SELECT `id`,`name`,`mime`, `size`,`data`, `created`,`OwnerEmail`,`StoryId`, `Description` FROM file ";
                  }
                  elseif ($this->session->userdata('type')=="Developer") {
                      $email_user=$this->session->userdata('email');
                   $sql = "SELECT `id`,`name`,`mime`, `size`,`data`, `created`,`OwnerEmail`,`StoryId`, `Description` FROM file WHERE OwnerEmail='$email_user' ";
              }
                   $query_resource = mysql_query($sql);
                   
                   while ($story = mysql_fetch_assoc($query_resource)):
                   $type=$story['mime'];
                   
                   $idd=$story['id'];
                   $s_id=$story['StoryId'];
                    $sql2 = "SELECT `name` FROM user_stories WHERE `StoryID`=$s_id ";
                      $query_resource2 = mysql_query($sql2);
                      $user_story = mysql_fetch_assoc($query_resource2);
                      
                      
                   if($type =='application/pdf'):
             ?>
             
             <h4>User Story ID: <?php echo $story['StoryId']; ?> :-<?php echo $user_story['name'];  ?></h4>
              <label class='label label-primary'>Attachments:</label><br>
              <img width="50" height="50" src="http://localhost/ProjectManagementSoftware_SEP004/img/icons/icon_pdf.png"/>
              <?php endif; ?>
              
              <?php if($type =='application/vnd.openxmlformats-officedocument.word'): ?>
              <h4>User Story ID: <?php echo $story['StoryId']; ?> :-<?php echo $user_story['name'];  ?></h4>
              <label class='label label-primary'>Attachments:</label><br>
              <img width="50" height="50" src="http://localhost/ProjectManagementSoftware_SEP004/img/icons/Word_Doc_Icon.png"/>
              <?php endif; ?>
               <a href="" id=""  class="label label-primary" onclick=""><?php echo $story['name']; ?></a>
              <br>
              <a href="">Size  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</a><a href="" id=""  class="label label-warning" onclick=""><?php echo $story['size']; ?>KB</a><br>
              <a href="">Date Created:</a><a href="" id=""  class="label label-warning" onclick=""><?php echo $story['created']; ?></a><br>
              <a href="">Developer &nbsp;&nbsp;&nbsp;   :</a><a href="" id="" class="label label-warning"  onclick=""><?php echo $story['OwnerEmail']; ?></a><br>
              <a href="">Description  &nbsp;&nbsp;:</a><a href="" id=""   onclick=""><?php echo $story['Description']; ?></a><br>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="">Edit</a>|<a href='http://localhost/ProjectManagementSoftware_SEP004/application/views/get_file.php?id=<?php echo $story['id'] ?> 'id=""  onclick="">Download</a>
              <br>
              <?php endwhile; ?>
            
        </div>
        </div>
    </div>
    
</div>