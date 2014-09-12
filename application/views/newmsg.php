<div class="col-md-7 col-md-offset-2">
    <div class="well well-large">
    <?php
    if ($this->session->userdata('is_logged_in')) {
  
          $un = $this->session->userdata['USERNAME'];
          $id = $this->session->userdata['userid'];
    
          $form = true;
          $otitle = '';
          $orecip = '';
          $omessage = '';
        
          if (isset($datas)) {
            echo $otitle = $datas['title'];
            echo $orecip = $datas['recip'];
            echo $omessage = $datas['message'];
            //We protect the variables
            $title = mysql_real_escape_string($datas['title']);
            $recip = mysql_real_escape_string($datas['recip']);
            $message = mysql_real_escape_string(nl2br(htmlentities($datas['message'], ENT_QUOTES, 'UTF-8')));
            //We check if the recipient exists
            $dn1 = mysql_fetch_array(mysql_query('select count(id) as recip, id as recipid, (select count(*) from pm) as npm from member where username="' . $recip . '"'));
            if ($dn1['recip'] == 1) {
                //We check if the recipient is not the actual user
                if ($dn1['recipid'] != $_SESSION['userid']) {
                    $id = $dn1['npm'] + 1;
                    //We send the message
                    if (mysql_query('insert into pm (id, id2, title, user1, user2, message, timestamp, user1read, user2read)values("' . $id . '", "1", "' . $title . '", "' . $_SESSION['userid'] . '", "' . $dn1['recipid'] . '", "' . $message . '", "' . time() . '", "yes", "no")')) {
                        ?>
                        <div class="message">The message has successfully been sent.<br />
                            <a href="list_pm.php">List of my personal messages</a></div>
                            <a href="<?php echo base_url() . 'msg/load_list';?>">My personal messages(<?php echo $nb_new_pm; ?> unread)</a><br/>
                        <?php
                        $form = false;
                    } else {
                        //Otherwise, we say that an error occured
                        $error = 'An error occurred while sending the message';
                    }
                } else {
                    //Otherwise, we say the user cannot send a message to himself
                    $error = 'You cannot send a message to yourself.';
                }
            } else {
                //Otherwise, we say the recipient does not exists
                $error = 'The recipient does not exists.';
            }
        } else {
            //Otherwise, we say a field is empty
            $error = 'A field is empty. Please fill of the fields.';
        }

        if (isset($_GET['recip'])) {
            //We get the username for the recipient if available
            $orecip = $_GET['recip'];
        }
        if ($form) {
//We display a message if necessary
            if (isset($error)) {
                echo '<div class="message">' . $error . '</div>';
            }
//We display the form
            ?>
            <div class="content">
                <h1>New Personal Message</h1>
            <?php echo validation_errors(); ?>
            <?php echo form_open('welcome/newmsgs'); ?>
                Please fill the following form to send a personal message.<br />
                <label for="title">Title</label><input type="text" value="<?php echo htmlentities($otitle, ENT_QUOTES, 'UTF-8'); ?>" id="title" name="title" /><br />
                <label for="recip">Recipient<span class="small">(Username)</span></label><input type="text" value="<?php echo htmlentities($orecip, ENT_QUOTES, 'UTF-8'); ?>" id="recip" name="recip" /><br />
                <label for="message">Message</label><textarea cols="40" rows="5" id="message" name="message"><?php echo htmlentities($omessage, ENT_QUOTES, 'UTF-8'); ?></textarea><br />
                <input type="submit" value="Send" />
                </form>
                <a href="<?php echo base_url() . 'main/load_list';?>">My personal messages(<?php echo $nb_new_pm; ?> unread)</a><br/>
            </div>
            <?php
        }
    } else {
        echo '<div class="message">You must be logged to access this page.</div>';
    }
    ?>
    
    </div>