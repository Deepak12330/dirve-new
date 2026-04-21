<?php

		$email = $_POST['email'];
		$db = new mysqli("localhost","root","","drive");
		if($db->connect_error)
		{
			echo "notconnetcetd";
		}
		else
		{
			$check_user = "SELECT email FROM users WHERE email = '$email'";

			$response = $db->query($check_user);
			if($response->num_rows == 0)
			{
				echo "notfound";
			}
			else
			{
				echo "found";
			}
		}

?>	