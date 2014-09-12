<!DOCTYPE HTML>
<html>
    <head>
        <title>Agile Project Management Software</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo base_url() . 'css/bootstrap.min.css' ?>" rel="stylesheet">
        <link href="<?php echo base_url() . 'css/bootstrap.css' ?>" rel="stylesheet">
        <link href="<?php echo base_url() . 'css/styles.css' ?>" rel = "stylesheet">
        <link href="<?php echo base_url() . 'css/dashboardNew.css' ?>" rel = "stylesheet">
        <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src = "http://localhost/ProjectManagementSoftware_SEP004/js/bootstrap.js"></script>
        <script src = "http://localhost/ProjectManagementSoftware_SEP004/js/bootstrap-datepicker.js"></script>
        <script src = "http://localhost/ProjectManagementSoftware_SEP004/js/bootstrap-popover.js"></script>
        <script src = "http://localhost/ProjectManagementSoftware_SEP004/js/bootstrap-tooltip.js"></script>
        <script src = "http://localhost/ProjectManagementSoftware_SEP004/js/bootstrap-twispy.js"></script>
        <link href="<?php echo base_url() . 'css/style.css' ?>" rel = "stylesheet">
        
<!--        <script src="http://localhost/ProjectManagementSoftware_SEP004/js/attc.googleCharts.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php //echo base_url() . 'css/attc.css' ?>">-->
        
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
        <style type="text/css">
	body{
		background: url(<?php echo base_url().'img/new.jpg'; ?>) no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		
	}
	
</style>
    </head>

    <body >
         <div id="wrapper">
        <!--Navigation bar-->
         <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            
              <div class="navbar-header">
                <div class = "navbar-brand">Agile Project Management Software</div>
                <button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
                    <span class = "icon-bar"></span>
                    <span class = "icon-bar"></span>
                    <span class = "icon-bar"></span>
                </button>
              </div>

                <?php
                 if ($this->session->userdata('is_logged_in')) {
                        $id = $this->session->userdata['userid'];
        
                            $req1 = mysql_query('select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, member.id as userid, member.username from pm as m1, pm as m2,member where ((m1.user1="' . $id . '" and m1.user1read="no" and member.id=m1.user2) or (m1.user2="' . $id . '" and m1.user2read="no" and member.id=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');
                 }
                
                 if ($req1 === FALSE) {
                    die(mysql_error());
                }
        ?>
<!--             ------------------------------------------------------------------------------------------------>
 <div class="collapse navbar-collapse ">
     <ul id="leftsidemenu" class="nav navbar-nav side-nav">
                                
                                
                                 <li><a  class ="menuItem" href ='<?php echo base_url()."cmulti_xml/display" ?>'><span class="glyphicon glyphicon-th-list"></span><b>  My work</b></a></li>
                                <li><a class ="menuItem" href ='<?php echo base_url()."c_my_work/view_story_board" ?>'><span class="glyphicon glyphicon-indent-left"></span><b>  Story Board</b> </a></li>
                                <li><a class ="menuItem" href ='<?php echo base_url()."s_dev_iteration/UserStorylisting" ?>'><span class="glyphicon glyphicon-list"></span><b>  Backlog</b></a></li>
                                
                                <li><a class ="menuItem" href ='<?php echo base_url()."su_new/index" ?>'><span class="glyphicon glyphicon-list"></span><b>new</b></a></li> 
                                
<!--                                 <li><a  class ="menuItem" href ='<?php echo base_url()."s_dev_iteration/add_defects" ?>'><span class="glyphicon glyphicon-list-alt"></span><b>  Defect Log</b></a></li>-->
                                 <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-align-justify"></span><b>  Defects </b></a>
                            <ul class="dropdown-menu">
                                <li><a href='<?php echo base_url() . "s_dev_iteration/add_defects" ?>'>Defect Log</a></li>
                                <li><a href='<?php echo base_url() . "s_dev_iteration/defect_status_chart" ?>'>Defect Status</a></li>
                                <li><a href='<?php echo base_url() . "s_dev_iteration/defect_count" ?>'>Defect Count</a></li>

                            </ul>
                        </li>
                                <li><a class ="menuItem" href ='<?php echo base_url()."s_scrum_chart/index" ?>'><span class="glyphicon glyphicon-sort-by-attributes"></span><b>  View current Progress Of User Story</b></a></li>
                                 <li><a  class ="menuItem" href ='<?php echo base_url()."s_dev_iteration/defect_status_chart" ?>'><span class="glyphicon glyphicon-stats"></span><b>  Defect status chart</b></a></li>
                                   <li><a  class ="menuItem" href ='<?php echo base_url()."upload_ducument/list_attachment" ?>'><span class="glyphicon glyphicon-th-list"></span><b>Additional Documents</b></a></li>
                            </ul>
     

                       
   


<!--             ------------------------------------------------------------------------------------------------->
       
                <div class = "collapse navbar-collapse navHeaderCollapse">
                    <ul class = "nav navbar-nav navbar-right">

                        <li class = "active"><a href = "#project" data-toggle="modal"><span class="glyphicon glyphicon-th-large"></span> Projects</a></li>
                        <li><a href = "#teams" data-toggle="modal"><span class="glyphicon glyphicon-user"></span><span class="glyphicon glyphicon-user"></span> Teams</a></li>
                        <li class = "dropdown">

                            <a href = "#dropdown-menu" class = "dropdown-toggle" data-toggle = "dropdown"> <span class="badge"><?php echo intval(mysql_num_rows($req1)); ?></span>  Messages </span> <b class = "caret"></b></a>
                            <ul class = "dropdown-menu">
                                <li><a href = "<?php echo base_url() . 'msg/inbox'; ?>"><span class="badge"><?php echo intval(mysql_num_rows($req1)); ?></span> Inbox</a></li>
                                <li><a href = "<?php echo base_url() . 'msg/newmsger'; ?>"> New Message</a></li> 
                                <li><a href="<?php echo base_url() . 'msg/load_list'; ?>"> All Messages </a></li>

                            </ul>
                        </li>

                        <li><a href = "#"><span class="glyphicon glyphicon-bell"></span> Notifications</a></li>
                        <li class = "dropdown">

                            <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown"><b class = "caret"></b><span class="glyphicon glyphicon-user"><?php echo $this->session->userdata('USERNAME');?></span></a>
                            <ul class = "dropdown-menu">
                                <li><a href = "<?php echo base_url() . 'msg/profile'; ?>">My Profile</a></li>
                                <li><a href = "<?php echo base_url() . 'msg/edit'; ?>">Update Profile</a></li>
                                <li><a href = "<?php echo base_url() . 'main/logout'; ?>"> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
         </nav>
           <div class = "modal fade" id = "project">
                <div class = "modal-dialog">
                    <div class = "modal-content">
                        <div class = "modal-header">
                            <p><b>Current Available Projects</b></p>

                        </div>
                        <p class="h4" style="color: #5bb75b">Please select a project</p>
                        <div class = "modal-body">



                            <!--                                                       ------------------------------------------------------>
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
                        