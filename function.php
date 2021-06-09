<?php

include('koneksi.php');

function registrasi ($data){
    global $koneksi; //mengambil konekasi dipaling atas halaman.

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($koneksi, $data["password"]); // tanda kutip
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

    //cek username sudah ada atau belum
    $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");

    if( mysqli_fetch_assoc($result) ){
        echo "<script>
            alert('username sudah terdaftar')
                </script";

            return false;
    }

    //cek kosong
    $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");

    if( $username == "" ){
        echo "<script>
            alert('username tidak boleh kosong')
                </script";

            return false;
    }

    else if( $password == "" ){
        echo "<script>
            alert('password tidak boleh kosong')
                </script";

            return false;
    }

    //cek konfirmasi password
    if ( $password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai')
                </script>";

            return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan user baru ke database
    mysqli_query($koneksi, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($koneksi);

    
}

?>