<?php 
session_start();

	include("connection.php");
	include("functions.php");
 

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['user_rfid'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$query = "insert into users (user_name,user_rfid) values ('$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
    }
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
     <link rel="stylesheet" href="../css/signup.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 50px;margin: 10px;color: white;">SIGNUP</div>
            <div style="font-size: 13px;margin: 10px;color: white;">Enter user_name</div>
			<input id="text" type="text" name="user_name"><br>
            <div style="font-size: 13px;margin: 10px;color: white;">San your RFID_CARD</div>
            
			<input id="text" type="password" name="user_rfid"><br><br>
            
			<input id="button" type="submit" value="Signup">     
             <a class="btn" href="login.php">back</a>
     
		</form>
	</div>
</body>
</html>