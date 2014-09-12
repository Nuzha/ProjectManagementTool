<body>
 <div id="container">
  <h1>Countries</h1>
  <div id="body">
<?php
foreach($results as $data) { ?>
    <tr>
    	<td class="left"><?php echo $data->id; ?></td>
    	<td class="left"><a href="profile?id=<?php echo $data->id;  ?>"><?php echo htmlentities($data->username, ENT_QUOTES, 'UTF-8'); ?></a></td>
    	<td class="left"><?php echo htmlentities($data->email, ENT_QUOTES, 'UTF-8'); ?></td>
    </tr>
<?php }
?>
   <p><?php echo $links; ?></p>
  </div>
  <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
 </div>
</body>