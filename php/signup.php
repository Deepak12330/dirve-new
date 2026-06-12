
<?php

require("data.php");

// Form Data
$full_name = mysqli_real_escape_string($db, $_POST['full_name']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$phone = mysqli_real_escape_string($db, $_POST['phone']);
$address = mysqli_real_escape_string($db, $_POST['address']);
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Password Match Check
if ($password != $confirm_password)
{
    die("Password not match");
}

// Create Table If Not Exists
$create_table = "
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(15) NOT NULL,
    otp VARCHAR(10) DEFAULT NULL,
    address TEXT NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$db->query($create_table))
{
    die("Table Error : " . $db->error);
}

// Check Email Already Exists
$check_email = $db->query("SELECT id FROM users WHERE email='$email'");

if ($check_email->num_rows > 0)
{
    die("Email already registered");
}

// Generate OTP
$pattern = "1234567890";
$length = strlen($pattern);
$otp = [];

for($i=0; $i<6; $i++)
{
    $otp_index = rand(0, $length - 1);
    $otp[] = $pattern[$otp_index];
}

$otp_f = implode($otp);

// Hash Password
$hash_password = password_hash($password, PASSWORD_DEFAULT);

// Email Headers
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type:text/html;charset=UTF-8\r\n";
$headers .= "From: Coach 4 U Computer Institute <deepakharisharma0000@gmail.com>\r\n";

$to = $email;
$subject = "OTP Verification - Coach 4 U Computer Institute";

// Email Template
$message = '
<html>
<head>
<title>OTP Verification</title>
</head>

<body style="font-family:Arial,sans-serif;background:#f4f4f4;padding:20px;">

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td align="center">

<table width="600" cellpadding="20" cellspacing="0" style="background:#ffffff;border-radius:10px;">

<tr>
<td align="center" style="background:#0d6efd;color:white;">
<h1>Coach 4 U Computer Institute</h1>
</td>
</tr>

<tr>
<td>

<h2>Hello '.$full_name.',</h2>

<p>
Thank you for registering with Coach 4 U Computer Institute.
</p>

<p>
Please use the following OTP to verify your account:
</p>

<div style="text-align:center;margin:30px 0;">
<span style="
background:#0d6efd;
color:white;
padding:15px 30px;
font-size:28px;
font-weight:bold;
border-radius:8px;
letter-spacing:5px;
">
'.$otp_f.'
</span>
</div>

<p>
This OTP is valid for verification only.
</p>

<p>
Do not share this OTP with anyone.
</p>

</td>
</tr>

<tr>
<td align="center" style="background:#f8f9fa;">
© 2026 Coach 4 U Computer Institute
</td>
</tr>

</table>

</td>
</tr>
</table>

</body>
</html>
';

// Send Mail
$mail = mail($to, $subject, $message, $headers);

if(!$mail)
{
    die("Mail not sent");
}

// Insert User
$sql = "INSERT INTO users
(
    full_name,
    email,
    phone,
    otp,
    address,
    password
)
VALUES
(
    '$full_name',
    '$email',
    '$phone',
    '$otp_f',
    '$address',
    '$hash_password'
)";

if($db->query($sql))
{
    echo "success";
}
else
{
    echo "Database Error : " . $db->error;
}

?>

