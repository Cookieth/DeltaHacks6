<?php
session_start();

$_SESSION["start"] = false;

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image orssssss fake image
 if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        $noise_level = $_REQUEST['noiseLevel'];
        $speed_mult = $_REQUEST['speedMult'];
        $command = "cd uploads && python ../audioEditing.py ". $_FILES["file"]["name"]. " ". $noise_level. " ". $speed_mult;
        $output = shell_exec($command);
        $_SESSION["cut_file"] = "uploads/". $output;
    } else {
        $_SESSION["failed"] = true;
    }

header("Location: index.php");
?>
