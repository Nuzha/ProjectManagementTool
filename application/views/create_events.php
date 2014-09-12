
<!--<html>
<head>
    
    <title>Agile Project Management Software</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php //echo base_url() . 'css/bootstrap.min.css' ?>" rel="stylesheet">
        <link href="<?php //echo base_url() . 'css/bootstrap.css' ?>" rel="stylesheet">
        <link href="<?php //echo base_url() . 'css/styles.css' ?>" rel = "stylesheet">
<script src = "http://localhost/ProjectManagementSoftware_SEP004/js/bootstrap.js"></script>-->
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript" >
 function dropdown(){
        var val = document.getElementById('myselect').value;
        $.ajax ({
           
            url: '<?php echo site_url()."calendar/index";?>',
            data: {'val':val},
            //data: { val : val },
            success: function( result ) {
               //var data1=result;
              // alert(data1);
            $('#container').html(result); 
            }
        });
    }
 </script>
 <script type="text/javascript" >
 function myfunction1(){
        //var pro = document.getElementById('myselect').value;
        var box=document.getElementById('members').value;
        var title=document.getElementById('title').value;
        var description=document.getElementById('description').value;
        var e_date=document.getElementById('event_date').value;
        $.ajax ({
            url: '<?php echo site_url()."calendar/a_submit";?>',
            data: { pro : pro, box : box, title : title, description : description, e_date : e_date},
            success: function( result ) {
               //var data1=result;
              alert('gghh');
               $('#container').html(result); 
            }
        });
    }
 </script>
 
 <style type="text/css">
       /* calendar */
   table.calendar		{ border-left:1px solid #999; }
   tr.calendar-row	{height:20px;  }
   td.calendar-day	{ min-height:20px; font-size:9px; position:relative; } * html div.calendar-day { height:10px; }
   td.calendar-day:hover	{ background:#eceff5; }
   td.calendar-day-np	{ background:#eee; min-height:40px; } * html div.calendar-day-np { height:40px; }
   td.calendar-day-head { background:#ccc; font-weight:bold; text-align:center; width:40px; padding:5px; border-bottom:1px solid #999; border-top:1px solid #999; border-right:1px solid #999; }
   div.day-number		{ background:#999; padding:5px; color:#fff; font-weight:bold; float:right; margin:-5px -5px 0 0; width:20px; text-align:center; }
   /* shared */
   td.calendar-day, td.calendar-day-np { width:120px; padding:5px; border-bottom:1px solid #999; border-right:1px solid #999; }
   
   div.day-number	 { 
	background:#999; 
	position:absolute; 
	z-index:2; 
	top:-5px; 
	right:-25px; 
	padding:5px; 
	color:#fff; 
	font-weight:bold; 
	width:20px; 
	text-align:center; 
}
td.calendar-day, td.calendar-day-np { 
	width:40px; 
	padding:5px 25px 5px 5px; 
	border-bottom:1px solid #999; 
	border-right:1px solid #999; 
}

    </style>


<body>
    <div id="page-wrapper">
<div class="row">
 <div class="col-lg-6">
 <div class="panel panel-success">
 <div class="panel-heading">
     <h5> <b> Create Events </b></h5>
     
    
        <?php $this->load->helper('form'); ?>

        <?php echo form_open('calendar/submit');?>
        <div class="form-group">
        
	<label>Project Name</label>
	<select class="form-control" id="myselect" name="myselect" onchange="dropdown();">
        <?php    
            $sql="SELECT `project_id`,`project_name` FROM project_summary";
            $qry = mysql_query($sql);
            while ($project = mysql_fetch_assoc($qry)){
            ?>
            <option value="<?php echo $project['project_id'];?>"><?php echo $project['project_name'];?></option>
            <?php }?>
	
	</select>
        </div>
    
        
        <div id="container">
        <?php if (isset($members)):?>
        <?php
                    foreach($members->result() as $story):
                                        ?>


            <input  type="checkbox" name="members[]" id="members[]" value="<?php echo $story->member_email; ?>" />
           <span><?php echo $story->member_email;  ?></span><br/>

                    <?php endforeach; ?>
        
            
            
        </div>
    
        <label>Event Title: </label>
        <br>
        <textarea class="form-control" class="form-control" name="title" id="title" value="" cols="10" rows="2"></textarea>
        <br>
        <label>Event Description: </label>
        
        <textarea class="form-control" name="description" id="description" value="" cols="60" rows="4"></textarea>
        <br>
        <label>Date: </label>
        <input class="form-control" type='date' name='event_date' id='event_date' placeholder="event date"/>
        <input type='submit' value='submit' onchange=""/> 
        
        <?php echo form_close();?>
        
        
        
        </div>
        <div class="panel-body">
        <a href="<?php echo base_url()."calendar/display_cal" ?>" class="btn btn-primary btn-link" role="button"><span class="glyphicon glyphicon-calendar">
            Get Events
        </span></a>
        </div>
        <?php endif; ?>
        
 </div>
</div>
</div>

        

</body>
</html>
