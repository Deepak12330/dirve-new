<?php


   $send_email =  $_POST['send_email'];
   $db = new mysqli("localhost","root","","drive");

   if($db->connect_error)
   {
    echo "notconnetcetd";
   }
   else
   {


        $pattern = "1234567890";
        $length = strlen($pattern);
        $otp = [];


        for($i=0;$i<6;$i++)
        {
            $otp_index = rand(0,$length);
            $otp[] = $pattern[$otp_index];
        }

        $otp_f = implode($otp);



        $sent_otp = mail($send_email,"OTP VERIFICATION",$otp_f,"FROM: deepakharisharma0000@gmail.com");
        if($sent_otp)
        {
            // echo "success";

            $store = "INSERT INTO check_otp(email,otp)
                        VALUES('$send_email','$otp_f')
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


?>