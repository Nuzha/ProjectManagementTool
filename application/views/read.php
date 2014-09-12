
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-11">
        <div class="well well-large"> 
                <?php
                if ($this->session->userdata('is_logged_in')) {

                    $un = $this->session->userdata['USERNAME'];
                    $uid = $this->session->userdata['userid'];

//We check if the ID of the discussion is defined
                    if (isset($_GET['id'])) {
                        $id = intval($_GET['id']);

//We get the title and the narators of the discussion
                        $req1 = mysql_query('select title, user1, user2 from pm where id="' . $id . '" and id2="1"');
                        $dn1 = mysql_fetch_array($req1);

//We check if the discussion exists
                        if (mysql_num_rows($req1) == 1) {
//We check if the user have the right to read this discussion
                            if ($dn1['user1'] == $uid or $dn1['user2'] == $uid) {
//The discussion will be placed in read messages
                                if ($dn1['user1'] == $uid) {
                                    mysql_query('update pm set user1read="yes" where id="' . $id . '" and id2="1"');
                                    $user_partic = 2;
                                } else {
                                    mysql_query('update pm set user2read="yes" where id="' . $id . '" and id2="1"');
                                    $user_partic = 1;
                                }
//We get the list of the messages
                                $req2 = mysql_query('select pm.timestamp, pm.message, member.id as userid, member.username from pm, member where (pm.id="' . $id . '" and member.id=pm.user1) order by pm.id2');
//We check if the form has been sent
                                if (isset($_POST['message']) and $_POST['message'] != '') {
                                    $message = $_POST['message'];
                                    //We remove slashes depending on the configuration
                                    if (get_magic_quotes_gpc()) {
                                        $message = stripslashes($message);
                                    }
                                    //We protect the variables
                                    $message = mysql_real_escape_string(nl2br(htmlentities($message, ENT_QUOTES, 'UTF-8')));
                                    //We send the message and we change the status of the discussion to unread for the recipient
                                    if (mysql_query('insert into pm (id, id2, title, user1, user2, message, timestamp, user1read, user2read)values("' . $id . '", "' . (intval(mysql_num_rows($req2)) + 1) . '", "", "' . $obj->userdata['userid'] . '", "", "' . $message . '", "' . time() . '", "", "")') and mysql_query('update pm set user' . $user_partic . 'read="yes" where id="' . $id . '" and id2="1"')) {
                                        ?>
                                        <div class="alert alert-success">Your message has successfully been sent.<br />
                                            <a href="readmsg?id=<?php echo $id; ?>">Go to the discussion</a></div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="alert alert-error">An error occurred while sending the message.<br />
                                            <a href="readmsg?id=<?php echo $id; ?>">Go to the discussion</a></div>
                                        <?php
                                    }
                                } else {

                            //We display the messages
                                    ?>
                                    <div class="content">
                                        <h3><span class="label label-info"><b>Subject : <?php echo $dn1['title']; ?></span></b></h3>



                                        <?php
                                        if ($req2 === FALSE) {
                                            die(mysql_error());
                                        }
                                        while ($dn2 = mysql_fetch_array($req2)) {
                                            ?>
                                            <table class="messages_table">
                                                <tr>                               
                                                <h4><b><a href="profile?id=<?php echo $dn2['userid']; ?>"><?php echo $dn2['username']; ?></a></td></b></h4>
                                                <h5><i><?php echo $dn2['message']; ?></i></h5>
                                                <td class="left"><div class="date">Sent: <?php echo date('m/d/Y H:i:s', $dn2['timestamp']); ?></div> </td>

                                                </tr>
                                                <?php
                                            }

                                            //We display the reply form
                                            ?>
                                        </table><br />
                                        <h3>Reply</h3>
                                        <div class="center">
                                            <form action="readmsg?id=<?php echo $id; ?>" method="post">
                                                <label for="message" class="center">Message</label><br />
                                                <textarea cols="40" rows="5" name="message" id="message"></textarea><br />
                                                <input class="btn btn-small" type="submit" value="Send" />
                                                <a href="<?php echo base_url() . 'msg/load_list'; ?>"> Back</a><br/>

                                            </form>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                echo '<div class="alert alert-error">You dont have the rights to access this page.</div>';
                            }
                        } else {
                            echo '<div class="alert alert-error">This discussion does not exists.</div>';
                        }
                    } else {
                        echo '<div class="alert alert-error">The discussion ID is not defined.</div>';
                    }
                } else {
                    echo '<div class="alert alert-error">You must be logged to access this page.</div>';
                }
                ?>
        </div>
        </div>
    </div>
</div>