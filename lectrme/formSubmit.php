<?php
session_start();

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image orssssss fake image
 if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

        $command = 'python audioEditing.py '. $target_file;
        $output = shell_exec($command);
        $_SESSION["cut_file"] = "uploads/". $output;
        
    } else {
        echo "Sorry, there was an error uploading your file.";
        $_SESSION["failed"] = true;
    }

header("Location: index.php");






?>
