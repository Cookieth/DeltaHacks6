<?php
session_start();
$_SESSION["start"] = true;
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

        <?php
            if ($_SESSION["failed"] == true) {
                echo "<div class = 'errorMessage'>An error has occurred. move_uploaded_file is failing.</div>";
                //$_SESSION["failed"] = false;
            }
            else if($_SESSION["failed"] == false && $_SESSION["start"] == false){
                echo "<div class = 'uploadedMessage'>Your file has been uploaded.</div>";
            }
        ?>

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
                    <h2>Step 1: Upload .mp3 File</h2>
                    <form role="form" action="formSubmit.php" method="POST" enctype="multipart/form-data">
                        <input type="file" name="file" id="file">
                    
                </div> 
                
                <div class = "col">
                    <h2>Step 2: Process</h2>
                    <input class="button" type="submit" name="submit" value="Process File">
                    <p>Background noise level options:</p>
                    <input type="radio" name="noiseLevel" value="low"> Low noise<br>
                    <input type="radio" name="noiseLevel" value="moderate"> Moderate noise<br>
                    <input type="radio" name="noiseLevel" value="high"> High noise<br>
                    <p>Speed multiplier: </p> <input type="number" name="speedMult" id="speedMult">
                </div>
                <div class = "col">
                    <h2>Step 3: Download converted .mp3 File</h2>

                    <?php
                    echo '<button class = "button"> <a href="'. $_SESSION["cut_file"]. '">Download</a> </button>';
                    ?>

                </div>

            </div>

        </div>
    </body>
</html>
