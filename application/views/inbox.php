 

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-9">
    <div class="well well-large">
        <?php
        //We check if the user is logged
        if ($this->session->userdata('is_logged_in')) {
            $id = $this->session->userdata['userid'];

            $req1 = mysql_query('select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, member.id as userid, member.username from pm as m1, pm as m2,member where ((m1.user1="' . $id . '" and m1.user1read="no" and member.id=m1.user2) or (m1.user2="' . $id . '" and m1.user2read="no" and member.id=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');
            //$req2 = mysql_query('select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, member.id as userid, member.username from pm as m1, pm as m2,member where ((m1.user1="' . $id . '" and m1.user1read="yes" and member.id=m1.user2) or (m1.user2="' . $id . '" and m1.user2read="yes" and member.id=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');
            ?>

            <h4>Inbox:</h4><br />


            <?php
            if ($req1 === FALSE) {
                die(mysql_error());
            }
            ?>
            <h3>You have (<?php echo intval(mysql_num_rows($req1)); ?>): messages</h3>

            <table class="table">
                <tr>
                    <th class="title_cell">Title</th>
                    <th>Nb. Replies</th>
                    <th>Participant</th>
                    <th>Date of creation</th>
                </tr>
                <?php
//We display the list of unread messages
                while ($dn1 = mysql_fetch_array($req1)) {
                    $id = $dn1['id'];
                    ?>

                    <tr>
                        <td class="left"><a href="readmsg?id=<?php echo $dn1['id']; ?>"><?php echo htmlentities($dn1['title'], ENT_QUOTES, 'UTF-8'); ?></a></td>
                        <td><?php echo $dn1['reps'] - 1; ?></td>
                        <td><a href="profile?id=<?php echo $dn1['userid']; ?>"><?php echo htmlentities($dn1['username'], ENT_QUOTES, 'UTF-8'); ?></a></td>
                        <td><?php echo date('Y/m/d H:i:s', $dn1['timestamp']); ?></td>
                    </tr>
                    <?php
                }

                if (intval(mysql_num_rows($req1)) == 0) {
                    ?>
                    <tr>
                        <td colspan="4" class="center">You have no unread messages.</td>
                    </tr>
                    <?php
                }
                ?>
            <?php
        }
        ?>
    </div>
        </div>
        
        
        
        
        
    </div>
    
</div>

