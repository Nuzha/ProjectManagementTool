<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-5">
            <nobr><nobr><nobr><nobr><nobr><nobr><nobr><nobr><nobr><nobr><nobr><nobr><nobr><nobr><nobr></nobr>
                                                                </nobr>
                                                                <nobr><nobr><nobr><nobr><nobr><nobr><nobr><nobr><nobr><nobr><nobr><nobr><nobr><nobr><nobr></nobr>
                                                                </nobr>
        </div>
        
        
        <div class="col-lg-8">

<?php

if ($this->session->userdata('is_logged_in')) {
    $id = $this->session->userdata['userid'];
   
    //We check if the user exists
    $dn = mysql_query('select username, email, signup_date from member where id="' . $id . '"');
         
     if ($dn === FALSE) {
                    die(mysql_error());
     }
     if (mysql_num_rows($dn) > 0) {
     
        $date = mysql_fetch_array($dn);
        
        //We display the user data
?>
        <div class="panel panel-default ">
            <div class="panel-heading">
                <h4><?php echo $this->session->userdata('USERNAME'); ?>'s Profile Details</h4>
            </div>
            <div class="panel-body"> 

                <table class="table table-striped">
                    <?php
                    foreach ($profile->result() as $col):
                        ?>
                        <tr>
                            <td>
                                <img src="http://localhost/ProjectManagementSoftware_SEP004/uploads/<?php echo $col->img_path ?>"  width="100" height="100">
                            </td>
                        </tr>
                        <tr>
                            <td><h4>Full Name</h4></td>
                            <?php
                            echo '<td>' . $col->Full_name . '</td>';
                            ?>

                        </tr>
                        <tr>
                            <td><h4>User Name</h4></td>
                            <?php
                            echo '<td>' . $col->username . '</td>';
                            ?>

                        </tr>
                        <tr>
                            <td><h4>E mail</h4></td>
                            <?php
                            echo '<td>' . $col->email . '</td>';
                            ?>

                        </tr>
                        <tr>
                            <td><h4>Type</h4></td>
                            <?php
                            echo '<td>' . $col->type . '</td>';
                            ?>

                        </tr>

                        <tr>
                            <td><h4>Sign Up Date</h4></td>
                            <?php
                            echo '<td>' . date('Y/m/d', $dn['signup_date']) . '</td>';
                            ?>

                        </tr>
                    <?php endforeach; ?>   
                </table>

            </div>
        </div>
        </div>
    </div>

</div>
<?php
   }
}
?>