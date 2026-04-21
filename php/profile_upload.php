<?php

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
				echo "success";
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