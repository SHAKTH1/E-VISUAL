<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>welcome</title>
    <link rel ="stylesheet" href="../css/index.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

</head>
<body>
<div class="box">
<p id="myText" onspeak(keypress=");"> welcome <?php echo $user_data['user_name']; ?>. <br> press enter key to enter the exam </p>
<br>
<br>
<input id="btn" type="submit"  onkeypress="back();" value="logout">
<input id="btn" type ="submit" onkeypress="next();" value="next">
</div>
<script src="index.js"></script>
</body>
</html>