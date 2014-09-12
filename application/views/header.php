<!DOCTYPE HTML>
<html>
    <head>
        <title>Agile Project Management Software</title>
           <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo base_url() . 'css/bootstrap.min.css' ?>" rel="stylesheet">
        <link href="<?php echo base_url() . 'css/bootstrap.css' ?>" rel="stylesheet">
        <link href="<?php echo base_url() . 'css/styles.css' ?>" rel = "stylesheet">
        <link href="<?php echo base_url() . 'css/dashboardNew.css' ?>" rel = "stylesheet">
        <link href="<?php echo base_url() . 'css/datepicker.css' ?>" rel = "stylesheet">
        
	<link href="<?php echo base_url() . 'css/style.css' ?>" rel = "stylesheet">
        <link href="<?php echo base_url() . 'css/jPushMenu.css' ?>" rel = "stylesheet">

        <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src = "http://localhost/ProjectManagementSoftware_SEP004/js/bootstrap.js"></script>
        <script src = "http://localhost/ProjectManagementSoftware_SEP004/js/bootstrap-datepicker.js"></script>
        <script src = "http://localhost/ProjectManagementSoftware_SEP004/js/bootstrap-popover.js"></script>
        <script src = "http://localhost/ProjectManagementSoftware_SEP004/js/bootstrap-tooltip.js"></script>
        <script src = "http://localhost/ProjectManagementSoftware_SEP004/js/bootstrap-twispy.js"></script>
        <link href="<?php echo base_url() . 'css/style.css' ?>" rel = "stylesheet">
        <script src = "http://localhost/ProjectManagementSoftware_SEP004/js/jquery-1.9.1.min.js"></script>
        <script src = "http://localhost/ProjectManagementSoftware_SEP004/js/jPushMenu.js"></script>
                
        <script>
        jQuery(document).ready(function($) {
                $('.toggle-menu').jPushMenu();
        });
        </script>

        
<!--Notifications-->
        <script>
        
        function checkNotification() {
                $.ajax({
                type: "get",
                //url : "notification.php",
                url: "<?php echo base_url() . 'c_notify/notify'; ?>",
                
            
                success: function(data){
                //alert('done');
                $('#notification-bar').html(data);
                
                },
                error: function(jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
               }
                });
              }

              $(document).ready(function() {
                checkNotification();
              });
        </script>
        

        <script>
            function myFunction()
            {
                $(".menuItem").click(function() {
                    var myURL = $(this).attr("mref");

                    $.ajax({
                        type: "POST",
                        url: myURL,
                        success: function(data) {
                            $('#workingspace').html(data);

                        }
                    });
                    return true;
                });
            }
            $(document).ready(myFunction);
        </script> 


        <script>


            $(document).ready(function() {
                $('#assign_members').popover({
                    placement: "bottom",
                    title: "Assign Members",
                    content: ' <h5><b>Selected Project:</b></h5> <h5 class="label label-success"><b><?php echo $this->session->userdata('project_name'); ?></b></h5> <h5><b>Assign Members:</b></h5>\n\
            <h5><b>Selected Project:</b></h5> ',
                });
            });
        </script>


        <style type="text/css">
            body{
                background: url(<?php echo base_url() . 'img/new.jpg'; ?>) no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;

            }

        </style>
    </head>

    <?php
    if ($this->session->userdata('is_logged_in')) {
        $id = $this->session->userdata['userid'];
        $username = $this->session->userdata['USERNAME'];
        $req1 = mysql_query('select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, member.id as userid, member.username from pm as m1, pm as m2,member where ((m1.user1="' . $id . '" and m1.user1read="no" and member.id=m1.user2) or (m1.user2="' . $id . '" and m1.user2read="no" and member.id=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');
    } else {
        $this->load->view('restricted');
    }

    if ($req1 === FALSE) {
        die(mysql_error());
    }
    ?>
    
    <body >
                
        <!-- Right menu element-->
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right">
            
         <h3 class="panel-title"><i class="fa fa-clock-o"></i> Recent Activity</h3>
              
              <div class="panel-body" id="">
                <div class="list-group">
                  <a href="#" class="list-group-item">
                    <span class="badge">just now</span>
                    <i class="fa fa-calendar"></i> Calendar updated
                  </a>
                  <a href="#" class="list-group-item">
                    <span class="badge">4 minutes ago</span>
                    <i class="fa fa-comment"></i> You commented on a post
                  </a>
                  <a href="#" class="list-group-item">
                    <span class="badge">23 minutes ago</span>
                    <i class="fa fa-truck"></i> User Story #10 of Project 01 modified
                  </a>
                  <a href="#" class="list-group-item">
                    <span class="badge">46 minutes ago</span>
                    <i class="fa fa-money"></i> New user stories has been added for Project 02
                  </a>
                  <a href="#" class="list-group-item">
                    <span class="badge">1 hour ago</span>
                    <i class="fa fa-user"></i> A new user has been added for Project 02
                  </a>
                  <a href="#" class="list-group-item">
                    <span class="badge">2 hours ago</span>
                    <i class="fa fa-check"></i> Completed task: "create Administrator login"
                  </a>
                  <a href="#" class="list-group-item">
                    <span class="badge">1 hour ago</span>
                    <i class="fa fa-globe"></i> Completed user story: "As scrum master I need to add copy or delete work items when...."
                  </a>
                  <a href="#" class="list-group-item">
                    <span class="badge">yesterday</span>
                    <i class="fa fa-check"></i> Completed task: "fix error on sales page"
                  </a>
                   <a href="#" class="list-group-item">
                    <span class="badge">two days ago</span>
                    <i class="fa fa-check"></i> Completed task: "fix error on login page"
                  </a>
                   <a href="#" class="list-group-item">
                    <span class="badge">two days ago</span>
                    <i class="fa fa-check"></i> New user story assigned: "As scrum master I want to view reports so that I can track ..."
                  </a>
                </div>
                <div class="text-right">
                  <a href="#">View All Activity <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
         
        </nav>

        <div id="wrapper">
            <!--Navigation bar-->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

                <div class="navbar-right">
                    <div class="navbar-brand "><font color="white" >Agile Project Management Software</font></div>
                    <button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
                        <span class = "icon-bar"></span>
                        <span class = "icon-bar"></span>
                        <span class = "icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse ">
                    <ul class="nav navbar-nav side-nav">
                        <br>
                        <br>
                        <li><a class ="menuItem" href ='<?php echo base_url() . "main/create_new_project" ?>'><span class="glyphicon glyphicon-th-large" style="color: white"></span><b>  Create Project</b></a></li>
                        <li><a class ="menuItem" href ='<?php echo base_url() . "main/Iteration" ?>'><span class="glyphicon glyphicon-align-center" style="color: white"></span><b>  Iteration Plan</b></a></li>
                        <li><a class ="menuItem" href ='<?php echo base_url() . "releasePlan/release" ?>'><span class="glyphicon glyphicon-indent-left" style="color: white"></span><b>  Release Plan</b></a></li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-align-justify" style="color: white"></span><b>  Backlog</b></a>
                            <ul class="dropdown-menu">
                                <li><a href='<?php echo base_url() . "main/userStory" ?>'>Add User story</a></li>
                                <li><a href='<?php echo base_url() . "scrum_master/UserStorylisting" ?>'>List all user stories</a></li>

                            </ul>
                        </li>

                        <li><a  class ="menuItem" href ='<?php echo base_url() . "main/project_listing" ?>'><span class="glyphicon glyphicon-th-list" style="color: white"></span><b>  View current Projects</b></a></li>
                        <li><a  class ="menuItem" href ='<?php echo base_url() . "c_my_work/work_by_person" ?>'><span class="glyphicon glyphicon-user" style="color: white"></span><span class="glyphicon glyphicon-align-left"></span><b>  Work By Person</b></a></li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-stats"></span><b>  Progress Charts</b></a>
                            <ul class="dropdown-menu">
                                <li><a href='<?php echo base_url() . "s_scrum_chart/scrum_master_chk_u_status" ?>'> Progress of User Stories</a></li>
                                <li><a href='<?php echo base_url() . "burndown/getDetails" ?>'> Iteration Burndown</a></li>
                                <li><a href='<?php echo base_url() . "burndown/get_r_details" ?>'> Release Burndown</a></li>
                            </ul>
                        </li>
                        <li><a class ="menuItem" href ='<?php echo base_url() . "c_discuss/view_discuss/general" ?>'><span class="glyphicon glyphicon-user" style="color: white"></span><span class="glyphicon glyphicon glyphicon-question-sign"></span><b>  Discussions</b></a></li>
                         <li class="dropdown">
                             <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-stats" style="color: white"></span><b>  Upload Additional Document</b></a>
                            <ul class="dropdown-menu">
                                <li><a href='<?php echo base_url() . "scrum_master/view_page" ?>'> Upload Files</a></li>
                                <li><a href='<?php echo base_url() . "scrum_master/list_all_attachment" ?>'> List All Upload Files</a></li>

                            </ul>
                        </li>
                    </ul>

            <!--Navigation Bar-->
            <div class = "collapse navbar-collapse navHeaderCollapse" >
                        <ul class = "nav navbar-nav navbar-left">

                            <li><a  href ="#contact"  data-toggle="modal"><span class="glyphicon glyphicon-th-large"></span><font color="white" > Projects</font></a></li>
                            <li ><a   id="" href='<?php echo base_url() . "main/assign_member" ?>'><span class="glyphicon glyphicon-user"></span><span class="glyphicon glyphicon-user"></span><font color="white" >Assign Members</font></a></li>

                            <li class = "dropdown">
                                <a href = "#dropdown-menu" class = "dropdown-toggle" data-toggle = "dropdown"> <span class="badge"><?php echo intval(mysql_num_rows($req1)); ?></span><font color="white" >  Messages</font> </span> <b class = "caret"></b></a>
                                <ul class = "dropdown-menu">
                                    <li><a href = "<?php echo base_url() . 'msg/inbox'; ?>"><span class="badge"><?php echo intval(mysql_num_rows($req1)); ?></span> Inbox</a></li>
                                    <li><a href = "<?php echo base_url() . 'msg/newmsger'; ?>"> New Message</a></li> 
                                    <li><a href="<?php echo base_url() . 'msg/load_list'; ?>"> All Messages </a></li>
                                </ul>
                            </li>

                            <li class = "dropdown">
                                <a href = "#dropdown-menu" class = "dropdown-toggle" data-toggle = "dropdown"><span class="glyphicon glyphicon-user"><font color="white" ><?php echo $username; ?> </font><b class = "caret"></b></span></a>
                                <ul class = "dropdown-menu">
                                    <li><a href = "<?php echo base_url() . 'main/show_profile'; ?>"data-toggle="modal">My profile</a></li> 
                                    <li><a href = "<?php echo base_url() . 'msg/edit'; ?>"data-toggle="modal">Settings</a></li> 
                                    <li><a href = "<?php echo base_url() . 'main/logout'; ?>"> Logout</a></li>
                                </ul>
                            </li>
                            
                            <li class="toggle-menu menu-right"><a href = "#"><span class="glyphicon glyphicon-bell"></span></a></li>
                        </ul>
                    </div>
            </nav>


<!--Pop up for selecting a project-->
            <div class = "modal fade" id = "contact">
                <div class = "modal-dialog">
                    <div class = "modal-content">
                        <div class = "modal-header">
                            <p><b>Current Available Projects</b></p>

                        </div>
                        <p class="h4" style="color: #5bb75b">Please select a project</p>
                        <div class = "modal-body">


                            <?php
                            $formattributes = array('class' => 'form-horizontal', 'role' => 'form');
                            echo form_open('c_project/project_select', $formattributes);
                            ?>
                            <?php
                            //Create the query
                            $sql = "SELECT `project_id`,`project_name` FROM project_summary";

                            //Run the query
                            $query_resource = mysql_query($sql);

                            //Iterate over the results that you've gotten from the database (hopefully MySQL)
                            while ($project = mysql_fetch_assoc($query_resource)):
                                ?>


                                <input type="radio" name="project" value="<?php echo $project['project_name']; ?>" />
                                <span>
                                    <?php echo $project['project_name']; ?></span><br />

                            <?php endwhile; ?>



                        </div>
                        <div class = "modal-footer">

                            <?php
                            $registerbtnattributes = array('class' => 'btn btn-primary', 'name' => 'project_submit', 'value' => 'show project');
                            echo form_submit($registerbtnattributes);
                            ?>

                            <?php
                            echo form_close();
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <!--            -------------------------------------------------------------------------------------------------------------->

            <div class = "modal fade" id = "members">
                <div class = "modal-dialog">
                    <div class = "modal-content">
                        <div class = "modal-header">
                            <p><b>Project Assign Members</b></p>
                        </div>
                        <div class = "modal-body">



                            <!--                                                       ------------------------------------------------------>
                            <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Tooltip on left">Tooltip on left</button>
                            <!--                                                       ------------------------------------------------------->
                        </div>
                        <div class = "modal-footer">
                            <a class ="btn btn-default" href="#test" data-dismiss= "modal">Submit</a>
                            <a class ="btn btn-primary" data-dismiss = "modal">Close</a>
                        </div>
                    </div>
                </div>
            </div>
