<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Insert Record with jQuery and Ajax</title>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
        <script type="text/javascript">
            $(function() {

                $(".comment_button").click(function() {
                    var element = $(this);
                    var test = $("#content").val();
                    var dataString = 'content=' + test;

                    if (test == '')
                    {
                        alert("Please Enter Some Text");
                    }
                    else
                    {
                        $("#flash").show();
                        $("#flash").fadeIn(400).html('<img src="http://tiggin.com/ajax-loader.gif" align="absmiddle">&nbsp;<span class="loading">Loading Comment...</span>');


                        $.ajax({
                            type: "POST",
                            url: "demo_insert.php",
                            data: dataString,
                            cache: false,
                            success: function(html) {

                                $("#display").after(html);

                                document.getElementById('content').value = '';
                                $("#flash").hide();

                            }
                        });
                    }
                    return false;
                });
            });
        </script>


        <div id="page-wrapper">

            <div class="row">
                <div class="panel panel-default ">
                    <div class="panel-heading">
                        <h3>Release Plan</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h5>Select Details</h5>
                        </div>

                        <div class="panel-body" >
                            <?php echo form_open('burndown/get_release_burndown') ?>
                            <div class="form-group">
                                <label class='label label-success'>Available Projects:</label>
                                <select class="form-control" id='project_category' name='project_category' onchange="get_project()">
                                    <?php
                                    $sql = "SELECT `project_id`, `project_name`  FROM `project_summary`";
                                    $query_resource = mysql_query($sql);
                                    while ($project = mysql_fetch_assoc($query_resource)):
                                        ?>

                                        <option value="<?php echo $project['project_id']; ?>"><?php echo $project['project_name']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>

                            <script>
            var project;
            function get_project() {
                var p;
                p = document.getElementById('project_category').value;
                alert("You have Selected the Project   :" + p);
                project = p;
            }

            function get_release_burndown() {

                document.getElementById("demo").innerHTML = project;
            }
                            </script>

                            <div class="form-group">
                                <label class='label label-success'>Release:</label>                        
                                <select class="form-control" id='release' name='release' >

                                    <?php
                                    $p1 = $_GET["project"];
                                    $sql = "SELECT distinct `r_name`, `project_id`  FROM `release` WHERE `project_id`=1";
                                    $query_resource = mysql_query($sql);
                                    while ($project = mysql_fetch_assoc($query_resource)):
                                        ?>

                                        <option value="<?php echo $project['r_name']; ?>"><?php echo $project['r_name']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <input class = 'btn btn-success' type='submit' value="Add Iteartion"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
                        <?php
                        $sql_check = mysql_query("SELECT * FROM release order by r_id desc");


                        if (isSet($_POST['content'])) {
                            $content = $_POST['content'];

                            mysql_query("insert into messages(msg) values ('$content')");

                            $sql_in = mysql_query("SELECT msg,msg_id FROM messages order by msg_id desc");
                            $r = mysql_fetch_array($sql_in);
                        }
                        ?>
