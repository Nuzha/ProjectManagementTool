<html>
    <head>
         <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
          <script type="text/javascript">
              
                    $(document).ready(function () {
                        setInterval(function(){
                            myfunction();
                        },3000);
                      });
                                   
                  function myfunction(){
                    $.ajax ({
                            url: '<?php echo site_url()."c_dev_mywork/timerdis";?>',
                            //data: { type : 'article' },
                            success: function(result) {  
                              alert(<?php echo $data?> );
                              document.body.innerHTML = '';
                               document.body.innerHTML = result; 
                             //$('#userstoryUpdates').html(result); 
                             //$('#defectupdates').html(result); 
                            }
                        });                    
                }
          </script>
    </head>
    <body>

                <h3>Current Changes</h3>
          
                <div >
                    <h5>User Story Updates</h5>
                </div>

                <div id="userstoryUpdates">

                    <?php
                   //$mail = $this->session->userdata['email'];
                    //echo $mail;
                   // $sql = "select user_stories.StoryId as tit,user_stories.name as con,userstory_audit.changetype as type from userstory_audit,user_stories where user_stories.StoryId=userstory_audit.u_id ";
                   // $userStory_qry = mysql_query($sql);
                    

                        foreach($userStory_qry->result() as $story) {
                            ?>

                            <pre><span style="color: red"><?php echo $story->type?></span>   <span style="color: #0088cc"><?php echo $story->tit ?></span>  <span style="color: #00620C"><?php echo $story->con ?></span> </pre>
                            <br>


                            <?php
                        }

//                        $sql3 = "DELETE FROM `userstory_audit`";
//                        mysql_query($sql3);
                    
                    ?>

                </div>
                
                
                <div>
                    <h5>Defect Updates</h5>
                </div>
                
            
                <div id="defectupdates">

                    <?php
                    //$mail = $this->session->userdata['email'];
                    //echo $mail;
                   

                        foreach($userStory_qry1->result() as $story1) {
                            ?>

                            <pre><span style="color: red"><?php echo $story1->type ?></span>   <span style="color: #0088cc"><?php echo $story1->tit ?></span>  <span style="color: #00620C"><?php echo $story1->con?></span> </pre>
                            <br>


                            <?php
                        }

//                        $sql2 = "DELETE FROM `defect_audit`";
//                        mysql_query($sql2);
                    
                    ?>

                </div>
    </body>
</html>
            