<?php
        $result=null;
        $conn = new mysqli("localhost", "root", "","valorant");  
        if(isset($_POST['pass']) && isset($_POST['cpass']) ){
            session_start();
            $email=$_SESSION['email'];
            $pass=$_POST['pass'];
            $cpass=$_POST['cpass'];
            if($pass==$cpass){
                $query = "update players set pass='$cpass' where email='$email'";
                $query_run = mysqli_query($conn, $query);
                header("Location: /Untitled-2.php");
            }
            else{
                $result="Password does not match";
            }
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEW PASSWORD</title>
    <link rel="stylesheet" href="style 6.css?v=<?php echo time(); ?>">
</head>
<body id="fullpage" class="notLoaded">
    <div id="loader">
        <img id="load" src="img/imagelogo.png">
    </div>
    <div id="form">
        <img src="img/imagelogo.png" id="logo">
        <h1>CREATE NEW PASSWORD</h1>
        <form action="" method="POST" id="inform">
            <input type="password" name="pass" placeholder="New Password">
            <input type="password" name="cpass" placeholder="Confirm New Password">
            <?php
                echo($result);
            ?>
            <button type="submit">Submit</button>
        </form>
    </div>
    <script src="script.js"></script>
    
</body>
</html>