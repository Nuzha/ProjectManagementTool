<div class="col-md-7 col-md-offset-2">
    <div class="well well-large">  
        <div class="contents">
            <style>
                .contents{
                    background: url('images/bluec_30p.png');
                    width: 84%;
                    -moz-border-radius: 20px;
                    -webkit-border-radius: 20px;
                    border-radius: 20px;
                    margin: auto;
                    padding: 20px;
                    margin-top: 20px;
                    margin-left: 20px;
                }
            </style>
            <?php
//We check if the users ID is defined
            if ($this->session->userdata('is_logged_in')) {
                $id = $this->session->userdata['userid'];

                //We check if the user exists
                $dn = mysql_query('select username, email, signup_date from member where id="' . $id . '"');

                if (mysql_num_rows($dn) > 0) {
                    $dnn = mysql_fetch_array($dn);
                    //We display the user data
                    ?>

            <h4>Profile of <?php echo htmlentities($dnn['username']); ?> </h4> 
                    <div class="well well-large">
                        <table class ="table"style="width:500px;">
                            <tr>
                                <td><?php /* if ($dnn['avatar'] != '') {
              echo '<img src="' . htmlentities($dnn['avatar'], ENT_QUOTES, 'UTF-8') . '" alt="Avatar" style="max-width:100px;max-height:100px;" />';
              } else {
              echo 'This user dont have an avatar.';
              }
             */ ?></td>
                                <td class="left"><h1><?php echo htmlentities($dnn['username'], ENT_QUOTES, 'UTF-8'); ?></h1>
                                    Email: <?php echo htmlentities($dnn['email'], ENT_QUOTES, 'UTF-8'); ?><br />
                                    This user joined the web site on <?php echo date('Y/m/d', $dnn['signup_date']); ?></td>
                            </tr>
                        </table>
                        <?php
//We add a link to send a pm to the user
                        if($this->session->userdata('is_logged_in')){
                            ?>
                            <br /><a  class="btn btn-primary" href="newmsger" class="big">Send a message to "<?php echo htmlentities($dnn['username'], ENT_QUOTES, 'UTF-8'); ?>"</a>
                             <a  class="btn btn-primary" href="<?php echo base_url() . 'msg/users'; ?>">Go to the users list</a>
                                <?php
                        }
                    } else {
                        echo 'This user dont exists.';
                    }
                } else {
                    echo 'The user ID is not defined.';
                }
                ?>
            </div>
        </div>
    </div>
</div>