<html>
<head>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript" >
 function myfunction(){
        var val = document.getElementById('myselect').value;
        $.ajax ({
            url: '<?php echo site_url()."t2_con/index";?>',
            data: { val : val },
            success: function( result ) {
               //var data1=result;
              // alert(data1);
               $('#container').html(result); 
            }
        });
    }
 </script>
</head>

<body>
   
    <div>
	<label>Project Id</label>
	<select id="myselect" name="myselect" onchange="myfunction()">
	<option value="P01">P01</option>
	<option value="P02">P02</option>
	<option value="P03">P03</option>
	<option value="P04">P04</option> 
	</select>
	</div>
    <div id="container">
       <?php   
            echo $id; ?>
    </div> 

</body>
</html>
