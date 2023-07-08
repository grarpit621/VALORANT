<?php
        $result=null;
        $conn = new mysqli("localhost", "root", "","valorant");
        if(! $conn )  {  
            die('Could not connect: ' . mysqli_error());  
        }    
        if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['cpass']) ){
            $name = $_POST['username'];
            $email=$_POST['email'];
            $pass=$_POST['pass'];
            $cpass=$_POST['cpass'];
            $query=mysqli_query($conn,"Select * from players where username='$name'");
            $e_query=mysqli_query($conn,"Select * from players where email='$email'");
            $num_rows = mysqli_num_rows($query);
            $num_rows_mail = mysqli_num_rows($e_query);
            if($num_rows){
                $result="This username already exists";
            }
            else if($num_rows_mail){
                $result="This email id is already registered";
            }
            else{
                if($pass==$cpass){
                    $query = "INSERT INTO players (username, email, pass) VALUES ('$name','$email','$pass')";
                    $query_run = mysqli_query($conn, $query);
                    header("Location: /Untitled-2.php");
                }
                else{
                    $result="Password does not match";
                }
            }
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body id="fullpage" class="notLoaded">
    <div id="loader">
        <img id="load" src="img/imagelogo.png">
    </div>
    <div id="form">
        <img src="img/imagelogo.png" id="logo">
        <h1>SIGN UP</h1>
        <form action="" method="POST" id="inform">
            <input type="text" name="username" placeholder="Username">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="pass" placeholder="Password">
            <input type="password" name="cpass" placeholder="Confirm Password">
            <?php
                echo($result);
            ?>
            <button type="submit">Submit</button>
            <div class="links">
                <a href="/Untitled-2.php">Already have an account?</a>
            </div>
        </form>
    </div>
    <script src="script.js"></script>
    
</body>
</html>