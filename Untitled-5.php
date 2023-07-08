<?php
        $result=null;
        $conn = new mysqli("localhost", "root", "","valorant");
        if(isset($_POST['otp'])){
            $otp = $_POST['otp'];
            session_start();
            $email=$_SESSION['email'];
            $verify=mysqli_query($conn,"select otp from players where email='$email'");
            $row = $verify->fetch_assoc();
            if($otp==$row["otp"]){

                $result="done";
                mysqli_query($conn,"update players set otp='ADMIN SECRET KEY' where email='$email'");
                header("Location: /Untitled-6.php");
            }
            else{
                $result="WRONG OTP";
            }
        } 
        mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENTER OTP</title>
    <link rel="stylesheet" href="style 5.css?v=<?php echo time(); ?>">
</head>
<body id="fullpage" class="notLoaded">
    <div id="loader">
        <img id="load" src="img/imagelogo.png">
    </div>
    <div id="form">
        <img src="img/imagelogo.png" id="logo">
        <h1>ENTER OTP</h1>
        <form action="" method="POST" id="inform">
            <input type="integer" name="otp" placeholder="OTP" maxlength=4>
            <?php
                echo($result);
            ?>
            <button>Submit</button>
            <div class="links">
                <a href="/Untitled-4.php">RESEND OTP</a>
            </div>      
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>