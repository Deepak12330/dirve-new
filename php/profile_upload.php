<?php

	require("db.php");
	session_start();
	$user_email = $_SESSION['users'];

	$username_fetch = "SELECT * FROM users WHERE email = '$user_email'";

	$response = $db->query($username_fetch);
	$array = $response->fetch_assoc();
	$username = $array['name'];





	
	$profile_name = $_FILES['profile_pic']['name'];
	$profile_path = $_FILES['profile_pic']['tmp_name'];




	if(file_exists("../profile_pics"))
	{
		// echo "found";

		if(file_exists("../profile_pics/". $profile_name))
		{
			echo "found";
		}
		else
		{
			if(move_uploaded_file($profile_path,"../profile_pics/" .$profile_name))
			{
				$store = "INSERT INTO profile_data(username,		email,profile_pic)
							VALUES('$username','$user_email','$profile_name')
				";
				if($db->query($store))
				{
					echo "success";
				}
				else
				{
					echo "failed";
				}
			}
			else
			{
				echo "failed";
			}
		}

	}
	else
	{
		mkdir("../profile_pics");
	}
		
?>