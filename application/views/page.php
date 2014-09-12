<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-9">
<div class="well well-large">     
<div class="contents">
    
    <style>
        .contents{

            width: 84%;
            -moz-border-radius: 20px;
            -webkit-border-radius: 20px;
            border-radius: 20px;
            margin: auto;
            padding: 20px;
            margin-top: 20px;
            margin-left: 20px;
        }
        .footer 
        {
            position: relative;

            height: 10px;
            clear:both;
            padding-top:20px;
            color:#fff;
        } 
        .foot 
        {
            position: relative;

            height: 10px;
            clear:both;
            padding-top:20px;
            margin-right: 50%;
        } 
    </style>

     <div id="panel-body">
    
    <a href="<?php echo base_url() . 'masg/users';?>"> See the list of users</a>. <br> <br>
        
       <?php
       
      if ($this->session->userdata('is_logged_in')) {
  
          $un = $this->session->userdata['USERNAME'];
          $id = $this->session->userdata['userid'];
         
         //We count the number of new messages the user has
        $nb_new_pm = mysql_fetch_array(mysql_query('select count(*) as nb_new_pm from pm where ((user1="' . $un . '" and user1read="no") or (user2="' . $id . '" and user2read="no")) and id2="1"'));
        
        //The number of new messages is in the variable $nb_new_pm
        $nb_new_pm = $nb_new_pm['nb_new_pm'];

         //We display the links
      }
      else {
          redirect('msg/restricted');
      }
      ?>
    
      <a href="<?php echo base_url() . 'msg/load_list';?>">My personal messages(<?php echo $nb_new_pm; ?> unread)</a><br/>

    </div>
</div>
</div>
        </div>
    </div>
</div>