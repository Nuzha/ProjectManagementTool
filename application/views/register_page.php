<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Register</title>

	
</head>
<body>

<div id="container">
	<h1>Add a Member</h1>
        
        <?php
        echo form_open('register/register_validation');
        
        echo validation_errors();
        
        echo "</p>Full Name";
        echo form_input('FullName', $this->input->post('FullName'));
        echo "</p>";
        
        echo "</p>User Name";
        echo form_input('UserName',$this->input->post('UserName'));
        echo "</p>";
        
        echo "</p>Email";
        echo form_input('email', $this->input->post('email') );
        echo "</p>";
        
        echo "</p>Password";
        echo form_password('password');
        echo "</p>";
        
        echo "</p>Confirm Password";
        echo form_password('ConfirmPassword');
        echo "</p>";
        
        echo "</p>";
        echo form_submit('register_submit', 'Register me >>');
        echo "</p>";
        echo form_close();
        
        ?>

	

</body>
</html>