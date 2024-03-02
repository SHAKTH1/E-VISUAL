<?php 

session_start();

	include("connection.php");
	include("adminfunction.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$admin_name = $_POST['admin_name'];
		$admin_password = $_POST['admin_password'];

		if(!empty($admin_name) && !empty($admin_password) && !is_numeric($admin_name))
		{

			//read from database
			$query = "select * from admin where admin_password = '$admin_password' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['admin_password'] === $admin_password)
					{

						$_SESSION['admin_id'] = $user_data['admin_id'];
					      header("Location: adminpanel.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>ADMIN LOGIN</title>
</head>
<link rel="stylesheet" href="../css/signup.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<body>


	<div id="box">
		
		<form method="post">
			<div style="font-size: 40px;margin: 10px;color: white;">ADMIN LOGIN</div>
            <div style="font-size: 13px;margin: 10px;color: white;">Enter admin_name</div>
			<input id="text" type="text" name="admin_name"><br><br>
             <div style="font-size: 13px;margin: 10px;color: white;">Enter admin_password</div>
			<input id="text" type="password" name="admin_password"><br><br>

			<input id="button" type="submit" value="Login">
            <a class="btn" href="login.php">back</a>

		</form>
	</div>
</body>
</html>


