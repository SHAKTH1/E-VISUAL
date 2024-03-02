<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$password = $_POST['user_rfid'];

		if(!empty($password))
		{

			//read from database
			$query = "select * from users where user_rfid = '$password' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['user_rfid'] === $password)
					{

						$_SESSION['user_name']=$user_data['user_name'];
						header("Location: index.php");
						die;
					}
				}
			}

		}else
		{
			echo"invalid rfid";
		}
	}
  ?>


<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    

    <title>Login</title>
    <link rel ="stylesheet" href="../css/firstpage.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
<header>
<h2 class ="logo">E~VISUAL</h2>
<nav class="navigation">
<button class="abt" onclick="openpopup()" href ="#">ABOUT_US</button>
<div class="popup" id="popup">
<h3>NAME:Shakthi<br>
EMAIL:shakthi.amarnath@gmail.com<br>
COLLEGE: B.M.S College of Engineering<h3>
<button type="button" onclick="closepopup()" >ok</button>
</div>
<button class="btnlogin" onclick="next();">ADMIN</button>
</nav>
</header>

     <div class ="box">
	<div class="content1">
		<div class="text">
        WELCOME
        </div>
		<form method="post">
        <form action="#">
        <p id ="myText" onkeypress="speak();" >PLEASE SCAN YOUR RFID</p>
          <div class="input-fields">
			<input id="rfidcard" type="password" name="user_rfid"><br><br>
            </div>
			<a class="btn" href="signup.php">Click to Signup</a><br>
		</form>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function(){
        $('#rfidcard').focus();
        $('body').mousemove(function(){
            $('#rfidcard').focus();
        });
    });
    </script>
    <script src ="firstpage.js"></script>
    
    
</body>
</html>

   
    
    