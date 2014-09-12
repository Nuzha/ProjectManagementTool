<!DOCTYPE html>
<html>
    <head>
        <title>Welcome</title>

        <link href="<?php echo base_url() . 'css/bootstrap.min.css' ?>" rel="stylesheet">
        <link href="<?php echo base_url() . 'css/bootstrap.css' ?>" rel="stylesheet">
        <script src="<?= base_url(); ?>js/jquery.js"></script>
        <script src = "<?php echo base_url() . 'js/jquery-1.4.2.min.css' ?>"></script>
    </head>

    <body>      
        <!--Navigation bar-->
        <div class = "navbar navbar-inverse navbar-static-top">
            <div class = "container">

                <div class="navbar-brand"><h4 style="color: white">Agile Project Management Software</h4></div>
                <button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
                    <span class = "icon-bar"></span>
                    <span class = "icon-bar"></span>
                    <span class = "icon-bar"></span>
                </button>

                 <div class="form-group">
                        <p>  <li><a  class ="btn btn-success btn pull-right" href ='<?php echo base_url() . "main/registration" ?>'>Register  &nbsp;&nbsp;</a>
                          
                            <a  class ="btn btn-success btn pull-right" href ='<?php echo base_url() . "main/login" ?>'>Sign In</a></li></p>
                </form>
            </div><!--/.navbar-collapse -->
        </div>
    </div>
    <br>

    <div class="jumbotron">
        <div class="container">
            <h2>Welcome!!!!</h2>
            <h4>Keep & share insights with simplicity</h4>
            <div id = "mytest" class = "carousel slide">

                <ul class = "carousel-indicators">
                    <li data-target = "#mytest" data-slide-to ="0" class = "active"></li>
                    <li data-target = "#mytest" data-slide-to ="1"></li>
                    <li data-target = "#mytest" data-slide-to ="1"></li>
                </ul>

                <div class = "carousel-inner">
                    <div class = "item active">
                        <img src = "img/img1.jpg" alt = "1" class = "img-responsive">
                    </div>
                    <div class = "item">
                        <img src = "img/img2.jpg" alt = "1" class = "img-responsive">
                    </div>
                    <div class = "item">
                        <img src = "img/img3.jpg" alt = "1" class = "img-responsive">
                    </div>

                </div>
                <a class = "carousel-control left" href = "#mytest" data-slide = "prev">
                    <span class = "icon-prev"></span>
                </a>
            </div>
        </div>
    </div>



</body>

</html>