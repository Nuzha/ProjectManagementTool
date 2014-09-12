<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Categorized user stories for selected project .</h3>
                </div>



                <div class="panel-body">

                    <?php echo form_open('s_scrum_chart/update_db_sm'); ?>
                    <br>

                    <?php
                    $p_id = $selected;
                    ?>   
                    <br>



                    <label >Success: </label>
                    <?php
                    $sql = "SELECT COUNT(u_status)from user_stories where u_status='success' and ProjectId='$p_id'";
                    $res = mysql_query($sql);
                    $final = mysql_result($res, 0);
//echo $final;
                    ?>

                    <input type="number" name="success" value="<?php echo set_value('success', $final); ?>"/>


                    <br>


                    <label >Active: </label>
                    <?php
                    $sql1 = "SELECT COUNT(u_status)from user_stories where u_status='active'and ProjectId='$p_id'";
                    $res1 = mysql_query($sql1);
                    $final1 = mysql_result($res1, 0);
                    //echo $final;
                    ?>

                    <input type="number" name="active" value="<?php echo set_value('active', $final1); ?>"/>


                    <br>


                    <label >Warning: </label>
                    <?php
                    $sql2 = "SELECT COUNT(u_status)from user_stories where u_status='warning'and ProjectId='$p_id'";
                    $res2 = mysql_query($sql2);
                    $final2 = mysql_result($res2, 0);
                    //echo $final;
                    ?>

                    <input type="number" name="warning" value="<?php echo set_value('warning', $final2); ?>"/>








                    <div class="form-group">
                        <div class="col-sm-offset-7 col-sm-5">
                            <?php
                            $registerbtnattributes = array('class' => 'btn btn-success', 'name' => 'submit', 'value' => 'continue');
                            echo form_submit($registerbtnattributes);
                            ?>

<?php echo form_close(); ?>
                        </div>



                        <div id="chart_content">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Through a Pie Chart you can view the statistics in a graphical way.
            </div>
        </div>
    </div>
    <div class="row">
        <div class="row">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

            </div>
        </div>
    </div>
</div>


