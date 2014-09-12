<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Forgot password</title>
         <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/signin.css" rel="stylesheet">
        
  </head>

  <body>

    <div class="container">

      <form class="form-forgotPw" role="form">
        <h4 class="form-forgotPw-heading">Please enter your email address</h4>
        <input type="email" class="form-control" name="submit_pw" placeholder="Email address" required autofocus>
        <button id="warn-me" class="navbar-btn btn-info btn pull-left" onclick="show()">Submit</button>
        <div data-alerts="alerts" data-titles="{'warning': '<em>Warning!</em>'}" data-ids="myid" data-fade="3000"></div>

        <script>
            $('#element').tooltip('show');
       </script>    
        
        <div class = "modal fade" id = "warn-me" role="dialog">
		<div class = "modal-dialog">
			<div class = "modal-content">
				<div class = "modal-body">
					<p>My number</p>
				</div>
				<div class = "modal-footer">
				<a class ="btn btn-default" data-dismiss = "modal">I'm Done</a>
                                </div>
				</div>
				</div>
	</div>
       
        <script>
        $("#warn-me").click(function() {
          $(document).trigger("add-alerts", [
            {
              'message': "This is a warning.",
              'priority': 'warning'
                  
             }
          ]);
        });
        </script>

      </form>

    </div>       
      
  </body>
</html>
