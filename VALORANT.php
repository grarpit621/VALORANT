<?php
    $conn = new mysqli("localhost", "root", "","valorant");
    session_start();
    $name=$_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>VALORANT</title>
    <link rel="stylesheet" href="style 3.css">
</head>
<body id="ani">
    <div>
        <div id="heading">
            <img src="img/imagelogo.png" alt="" srcset="">
            <h1>WELCOME <b id="color"><?php echo strtoupper($name)?></b></h1>
            <h2 id="small">HERE BEGINS THE BATTLE</h2>            
        </div>
        
        <video src="img/BACKGROUND VIDEO.mp4" autoplay muted loop></video>
    </div>
</body>
</html>