<?php
require('koneksi.php');
session_start();

if(isset($_SESSION["username"])){
	header("Location: index.php");
	exit;
}
    
    if( isset($_POST["login"]) ){

        $username = $_POST["username"];
        $password = $_POST["password"];

       $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

       //cek username
       if( mysqli_num_rows($result) === 1 ) {

            //cek password
            $row = mysqli_fetch_assoc($result);
            if( password_verify($password, $row["password"]) ){

            	//set session
            	$_SESSION['username'] = $username;

                header("Location: index.php");
                exit;
            }
       }
       
       $error = true;
    }


?>



<!DOCTYPE HTML>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="style.css">

    </head>

    <body>
        <div class="container">
          <h1>Login</h1>

          <?php if( isset($error)) : ?>

                <p style="color: red; font-style: italic;"> username / password salah </p>

          <?php endif; ?>


            <form action="" method="post">
                <label for="username">Username</label><br>
                <input type="text" name="username" id="username"><br>
                <label for="password">Password</label><br>
                <input type="password" name="password" id="password"><br>
                <button type="submit" name="login">Log in</button>
            </form>

            <p><a href="register.php" class="">Daftar disini!</a></p>

        </div>
    </body>
</html>