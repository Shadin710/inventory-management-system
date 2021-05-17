
<?php

        session_start();
	    include_once 'connection/db_connection.php';
        if(empty($_SESSION['check']))
        {
            header("Location:error_page.php");
        }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Animated Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/reg.svg">
		</div>
		<div class="login-content">
			<form action="admin_register.php" method = "POST">
				<img src="img/avatar.svg">
				<h2 class="title">Welcome</h2>
				
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" name = "username">
           		   </div>
           		</div>
				   <div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-envelope"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Email</h5>
           		   		<input type="text" class="input" name = "email">
           		   </div>
           		</div>

           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="pass">
            	   </div>
            	</div>
            	
            	<input type="submit" class="btn" value="Register">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
