<?php


		$otp_verify = $_POST['otp_val'];
		$email_verify = $_POST['email_verify'];
		$db = new mysqli("localhost","root","","drive");

   if($db->connect_error)
   {
    echo "notconnetcetd";
   }
   else
   {
   		$check_otp = "SELECT * FROM check_otp WHERE email = '$email_verify' AND otp = '$otp_verify'";
   		$response = $db->query($check_otp);
   		if($response->num_rows == 1)
   		{
   			echo "success";
   		}
   		else
   		{
   			echo "failed";
   		}
   }

?>