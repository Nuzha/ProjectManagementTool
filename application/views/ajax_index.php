

<body>
<?php if (!isset($ajax_req)): ?>
<div class="show-galle"><a id="show-gallery" >View only Gallery</a></div>
<div class="show-image"><a id="show-images">View only Images</a></div>
<!--<div class="show-articl"><a id="show-articles" onclick="ajax_articles();">View only Articles</a></div>-->
<button id="show-articles" name="show-articles" value="article" onclick="ajax_articles();" >View only Articles</button>
<?php endif; ?>
 
<div id="ajax-content-container">
  <table class="table table-bordered table-condensed table-striped">
    <tr>
      <th>Title</th>
      <th>Type</th>
    </tr>
    <?php foreach ($node_list as $key=>$value): ?>
      <tr>
        <td><?php print $value->title; ?></td>
        <td width="10%"><?php print ucfirst($value->type); ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>

