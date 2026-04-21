<?php

		session_start();
		
	$db = new mysqli("localhost","root","","drive");
	if($db->connect_error)
	{
		echo "not connecetd";
	}
	else
	{

		$username = $_POST['username'];
		$user_email = $_POST['user_email'];
		$password = $_POST['password'];


			$check_email = "SELECT email FROM users WHERE email = '$user_email'";
			$response_email = $db->query($check_email);
			if($response_email->num_rows == 0)
			{
				$store = "INSERT INTO users (name,email,pass)
					VALUES('$username','$user_email','$password')
				";
				if($db->query($store))
				{
					echo "success";
					$_SESSION['users'] = $user_email;
				}
				else
				{
					echo "failed";
				}
			}
			else
			{
				echo "email exists";
			}
	}
		
?>