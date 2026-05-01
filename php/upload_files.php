<?php

require("db.php");
session_start();

$user_email = $_SESSION['users'];

// File data
$upload_file_name  = $_FILES['upload_files']['name'];
$upload_file_path  = $_FILES['upload_files']['tmp_name'];
$upload_file_size  = $_FILES['upload_files']['size'];

$newfilesize = round($upload_file_size/(1024*1024), 2);

// Get user id
$newData = "SELECT * FROM profile_data WHERE email = '$user_email'";
$newDataquery = $db->query($newData);
$responseData = $newDataquery->fetch_assoc();

$user_id = $responseData['id'];

// Folder path
$folder = "../user_" . $user_id;

// Create folder if not exists
if(!file_exists($folder)) {
    mkdir($folder);
}

// Move file (ALWAYS run)
$destination = $folder . "/" . $upload_file_name;

if(move_uploaded_file($upload_file_path, $destination)) {

    // Check table exists
    $check_table = "SHOW TABLES LIKE 'users_$user_id'";
    $result = $db->query($check_table);

    if($result->num_rows == 0) {
        // Create table
        $create = "CREATE TABLE users_$user_id (
            id INT AUTO_INCREMENT PRIMARY KEY,
            file_name VARCHAR(255),
            file_size FLOAT
        )";
        $db->query($create);
    }

    // Insert file data
    $insert = "INSERT INTO users_$user_id (file_name, file_size)
               VALUES ('$upload_file_name', '$newfilesize')";

    if($db->query($insert)) {
        echo "Upload + DB Insert Success";
    } else {
        echo "Insert Failed: " . $db->error;
    }

} else {
    echo "File Upload Failed";
}

?>