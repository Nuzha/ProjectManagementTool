<html>
    <?php
        $sql = "SELECT `msg`, `changetype` from `record_notifications`";
        $query_resource = mysql_query($sql);
        while ($project = mysql_fetch_assoc($query_resource)):
    ?>
            <a href="#" class="list-group-item row">
                <span class="badge col-sm-3" style="float: left;"><?php echo $project['changetype']; ?></span>
                <div class="col-sm-9"><i class="fa fa-calendar"></i> <?php echo $project['msg']; ?></div>
            </a>
    <?php
        endwhile;
    ?>
</html>