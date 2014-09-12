<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>

        <link href="<?php echo base_url() . 'css/bootstrap.min.css' ?>" rel="stylesheet">
        <link href="<?php echo base_url() . 'css/bootstrap.css' ?>" rel="stylesheet">
        <script src="<?= base_url();?>js/jquery.js"></script>
        <script src = "<?php echo base_url() . 'js/jquery-1.4.2.min.css' ?>"></script>
    </head>

    <body style="background-image: url('http://localhost/ProjectManagementSoftware_SEP004/img/new.jpg');">
        
    <!--Navigation bar-->
            <div class = "navbar navbar-inverse navbar-static-top">
                <div class = "container">

                    <div class="navbar-brand"><h4 style="color: white">Agile Project Management Software</h4></div>
                    <button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
                        <span class = "icon-bar"></span>
                        <span class = "icon-bar"></span>
                        <span class = "icon-bar"></span>
                    </button>
                </div>
            </div>
        
            <br>
        
            
        
     <form class="form-horizontal" role="form" action='<?= base_url();?>main/login_validation' method="post">

            <div class="container">

                <div class="col-md-6 col-md-offset-2">  
                    <h2 class="form-signin-heading">Please sign in</h2>

                    <div class="panel panel-default ">
                        <div class="panel-body"> 

                         <?php
                            echo form_open('main/login_validation');
                            echo validation_errors();?>
                
                            <fieldset>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-lg-2 control-label">Email</label>

                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword" class="col-lg-2 control-label">Password</label>

                                    <div class="col-lg-10">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-md-6 col-md-offset-2"> 
      
                                       <button type="submit" class="btn btn-success">Sign In</button>
                                        Or 
                                        <a href="<?php echo base_url() . 'main/registration_form';?>" class="btn btn-primary"> Sign Up </a>
                                        <br> <br>
                                        <a href="<?php echo base_url() . 'main/forgotPassword';?>"> Forgot Password</a>
                                    </div>

                                    <?php
                                     echo form_close();
                                     ?>
                                </div>    
                            </fieldset>	
                        </div>
                    </div>
                </div>
            </div>
         
         <div class = "navbar navbar-inverse navbar-fixed-bottom">
                    <div class = "container">
                        <p class = "navbar-text pull-left">Site Built by Curtin SEP-004</p>
                    </div>
        </div>
                
        </form>	
    </body>

</html>