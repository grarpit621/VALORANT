<?php
        $result=null;
        $num_rows=0;
        $conn = new mysqli("localhost", "root", "","valorant");
        if(isset($_POST['email'])){
            $email= $_POST['email'];
            session_start();
            $_SESSION['email'] = $email;            
            $query=mysqli_query($conn,"Select * from players where email='$email'");
            $num_rows = mysqli_num_rows($query);
            if($num_rows==0){
                $result="This email is not registered";
            }
            else{
                $otp = rand(1000, 9999);
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: support@webdamn.com' . "\r\n";
                $messageBody = "One Time Password for login authentication is:" . $otp;
                $messageBody = wordwrap($messageBody,70);
                $subject = "OTP to Login";
                $mailStatus = mail($email, $subject, $messageBody, $headers);
                $query_otp = "Update players set otp='$otp' where email='$email'";
                mysqli_query($conn, $query_otp);
                header("Location: /Untitled-5.php");
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
    <title>FORGOT PASSWORD</title>
    <link rel="stylesheet" href="style 4.css?v=<?php echo time(); ?>">
</head>
<body id="fullpage" class="notLoaded">
    <div id="loader">
        <img id="load" src="img/imagelogo.png">
    </div>
    <div id="form">
        <img src="img/imagelogo.png" id="logo">
        <h1>ENTER EMAIL</h1>
        <form action="" method="POST" id="inform">
            <input type="email" name="email" placeholder="Email">
            <?php
                echo($result);
            ?>
            <button>Submit</button>
            
        </form>
    </div>
    <script src="script.js"></script>
    
</body>
</html>