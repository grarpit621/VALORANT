<?php
        $result=null;
        $num_rows=0;
        $num_rows_pass=0;
        $conn = new mysqli("localhost", "root", "","valorant");
        if(! $conn )  {  
            die('Could not connect: ' . mysqli_error());  
        }      
        if(isset($_POST['name']) && isset($_POST['pass'])){
            $name = $_POST['name'];
            session_start();
            $_SESSION['name'] = $name;
            $pass=$_POST['pass'];
            $uname=mysqli_query($conn,"Select * from players where username='$name'");
            $pswd=mysqli_query($conn,"Select * from players where pass='$pass'");
            $num_rows = mysqli_num_rows($uname);
            $num_rows_pass = mysqli_num_rows($pswd);
            if($num_rows==0){
                $result="Username does not match";
            }
            else if($num_rows_pass==0){
                $result="Incorrect Password";
            }
            else{
                header("Location: /VALORANT.php");
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
    <title>LOGIN</title>
    <link rel="stylesheet" href="style 2.css?v=<?php echo time(); ?>">
</head>
<body id="fullpage" class="notLoaded">
    <div id="loader">
        <img id="load" src="img/imagelogo.png">
    </div>
    <div id="form">
        <img src="img/imagelogo.png" id="logo">
        <h1>LOGIN</h1>
        <form action="" method="POST" id="inform">
            <input type="text" name="name" placeholder="Username">
            <input type="password" name="pass" placeholder="Password">
            <?php
                echo($result);
            ?>
            <button>Submit</button>
            <div class="links">
                <a href="/Untitled-1.php">Create New Account</a>
                <a href="/Untitled-4.php">Forgot Password?</a>
            </div>
            
        </form>
    </div>
    <script src="script.js"></script>
    
</body>
</html>