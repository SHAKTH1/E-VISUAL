<?php

function check_login($con)
{

	if(isset($_SESSION['admin_id']))
	{

		$id = $_SESSION['admin_id'];
		$query = "select * from admin where admin_name = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	echo "ghghg";
	die;

}
?>





