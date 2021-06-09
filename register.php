<?php

require('function.php');

if( isset($_POST["register"])) {

    if( registrasi ($_POST) > 0 ){
        echo "<script>
            alert('user baru berhasil ditambahkan!');
                </script>";
    } else {
        echo mysqli_error($koneksi);
    }

}

?>


<!DOCTYPE HTML>
<html>
    <head>
        <title>Halaman Registrasi</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="container">
          <h1>daftar</h1>
            <form action="" method="post">
                <label for="username">Username</label>
                <br>
                <input type="text" name="username" id="username">
                <br>
                <label for="">Password</label>
                <br>
                <input type="password" name="password" id="password">
                <br>
                <label for="password2">Konfirmasi password</label>
                <br>
                <input type="password" name="password2" id="password2">
                <br>
                <button type="submit" name="register">Daftar</button>

                <p> Sudah punya akun?
                  <a href="login.php">Login di sini</a>
                </p>
            </form>
        </div>
    </body>
</html>
