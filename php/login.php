<?php

	$login_user = $_POST['login_user'];
	$login_password = $_POST['login_password'];
	
	$db = new mysqli("localhost","root","","drive");
	if($db->connect_error)
	{
		echo "not connected";
	}
	else
	{
		$check_email = "SELECT * FROM users WHERE email = '$login_user' AND pass = '$login_password'";
		$response = $db->query($check_email);
		if($response->num_rows == 0)
		{
			echo "failed";
		}
		else
		{
			echo "success";
		}
	}

?>