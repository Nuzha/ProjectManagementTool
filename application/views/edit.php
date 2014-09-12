
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-11">
        <?php
        //otherwise, we display the values of the database
        $dnn = mysql_fetch_array(mysql_query('select username,password,email from member where id="' . $this->session->userdata('userid') . '"'));
        $username = htmlentities($dnn['username'], ENT_QUOTES, 'UTF-8');
        $password = htmlentities($dnn['password'], ENT_QUOTES, 'UTF-8');
        $email = htmlentities($dnn['email'], ENT_QUOTES, 'UTF-8');

        //We display the form


        if (isset($msg)) {
            echo $msg;
        } else {
            ?>  
            <div class="container">
                <div class="col-md-8 col-md-offset-1 center">
                <div class="well well-large">  

                <?php echo validation_errors(); ?>
                <?php echo form_open('msg/edit'); ?>
                    <b>You can edit your personal information</b><br /> <br>
                <div class="center">
                    <label for="username">Username &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" name="username" id="username" value="<?php echo $username; ?>" /><br /><br>
                    <label for="password">Password <span class="small">(6 characters min.)&nbsp;&nbsp;&nbsp; </span></label><input type="password" name="password" id="password" value="<?php echo $password; ?>" /><br /><br>
                    <label for="passverif">Password <span class="small">(verification)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></label><input type="password" name="repassword" id="passverif" value="<?php echo $password; ?>" /><br /><br>
                    <label for="email">Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" name="email" id="email" value="<?php echo $email; ?>" /><br /><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" class="btn btn-primary"  value="Update" />
                    <a class="btn btn-warning"  href="<?php echo base_url() . 'msg/profile'; ?>">back to your profile</a>
                </div>
                </form>
                </div>
                </div>
            </div>
                <?php
        }
        ?>


    </div>
    </div>
</div>

