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
     
    </head>
      <body>

        <!--Navigation bar-->
        <div class = "navbar navbar-inverse navbar-static-top ">
            <div class = "container">

                <div class = "navbar-brand">Agile Project Management Software</div>
                <button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
                    <span class = "icon-bar"></span>
                    <span class = "icon-bar"></span>
                    <span class = "icon-bar"></span>
                </button>

                <div class = "collapse navbar-collapse navHeaderCollapse">
                    <ul class = "nav navbar-nav navbar-right">

                        <li class = "active"><a href = "#projects" data-toggle="modal"><span class="glyphicon glyphicon-th-large"></span> Projects</a></li>
                        <li><a href = "#teams" data-toggle="modal"><span class="glyphicon glyphicon-user"></span><span class="glyphicon glyphicon-user"></span> Teams</a></li>
                        <li><a href = "#"><span class="glyphicon glyphicon-envelope"></span> Messages</a></li>
                        <li><a href = "#"><span class="glyphicon glyphicon-bell"></span> Notifications</a></li>
                        <li><a href = "#"><span class="glyphicon glyphicon-wrench"></span> Settings</a></li>
                        <li class = "dropdown">

                            <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown"><b class = "caret"></b><span class="glyphicon glyphicon-user"></span></a>
                            <ul class = "dropdown-menu">
                                <li><a href = "#">My Profile</a></li>
                                <li><a href = "#">Sign Off</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!--Left side menu-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-5 col-md-2 sidebar">
                    <ul id="leftsidemenu" class="nav nav-sidebar">
                        <li class="active"><a href="#">My work</a></li>
                        <li><a href="#">Backlog</a></li>
                        <li><a href="#">User Stories</a></li>
                        <li><a class ="menuItem" href ='<?php echo base_url() . "main/Iteration" ?>'>Iteration Plan</a></li>
                        <li><a href="#">Release Plan</a></li>
                        <li><a href="#">Task Board</a></li>
                        <li><a href="#">User Story Progress</a></li>
                        <li><a href="#">Team Members</a></li>
                    </ul>
                </div>

            </div>
        </div>

        <!--Footer-->
        <div class = "navbar navbar-default navbar-fixed-bottom">
            <div class = "container">
                <p class = "navbar-text pull-left">Site Built by Curtin SEP-004</p>
                <a href="<?php echo base_url() . 'main/logout' ?>" class="navbar-btn btn-info btn pull-right">Sign Off</a>
                <div id="ajax_container"></div>
            </div>
        </div>

        <script src = "js/bootstrap.js"></script>
    </body>

</html>