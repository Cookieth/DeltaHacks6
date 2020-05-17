<?php
$target_directory = 'uploads/';
$uploaded_name = '/var/www/html/gitDH/DeltaHacks6/lectrme/uploads/newname.mp3';//$target_directory . basename($_FILES['uploadedmp3']['name']);
$upload_status = 1;
$file_type = strtolower(pathinfo($uploaded_name, PATHINFO_EXTENSION));

if ($file_type != 'mp3'){
    echo '<div class = "errorMessage"> Only audio files are allowed to be uploaded. </div>';
    $upload_status = 0;
}
if ($upload_status === 0){
    echo '<div class = "errorMessage">An error has occurred. Upload Status is 0.</div>';
}
else {
    if(move_uploaded_file($_FILES['uploadedmp3']['name'], $uploaded_name)) {
        echo basename($_FILES['uploadedmp3']['name']);
        echo '<div class = "uploadedMessage"> The file '. basename($_FILES['uploadedmp3']['name']). ' has been uploaded.</div>';
    }
    else {
        echo '<div class = "errorMessage">An error has occurred. move_uploaded_file is failing.</div>';
    }
}
?>


<meta http-equiv="pragma" content="no-cache" />
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <link rel="stylesheet" href="index.css">
        <link rel="shortcut icon" href="img/favicon_round.png" type="image/x-icon">
    </head>
    <body>
        <div class="container-fluid">

            <div class="row">
                <div class="col-2">
                </div>
                <div class="col">
                    <h1><font color="white"> L E C T R <img class="img_logo" src="img/logo_transparent.png"></font></h1>
                </div>
                <div class="col-2">
                </div>
            </div>

            <div class = "row">
                <div class = "col-2">
                </div>

                <div class = "col">
                    <h2>What is this?</h2>
                    <br>
                    <p>LECTR.me (short for "lecture me") is an automated mp3 editor developed by undergraduate students at DeltaHacks that cuts the length of your mp3 file without taking away any important data. We do this by determining the 'silent' points of your mp3 file, and splicing them out! The result is a much shorter audio file, without any information being lost. This is a much better alternative to speeding up audio files for faster listening.</p>
                    <br>
                </div>

                <div class = "col-2">
                </div>
            </div>

            <div class="row">

                <div class = "col">
                    <form class="box" action="submitTest.php" method="post" enctype="multipart/form-data">
                        <div class="file_input">
                            <h2>Step 1: Upload .mp3 File</h2>
                            <input type="file" name="uploadedmp3" id="uploadedmp3">
                        </div>
                    </form>
                </div> 
                
                <div class = "col">
                    <h2>Step 2: Process</h2>
                    <input class="button buttonTest" type="submit" name="submit" value="Process File">
                </div>

                <div class = "col">
                    <h2>Step 3: Download converted .mp3 File</h2>
                    <button class = "button">Download File</button>
                </div>

            </div>

        </div>
    </body>
</html>
