<?php
	$server = "localhost";
	$user = "root";
	$password = "";
	$nama_database = "crud";
	$koneksi = mysqli_connect($server,$user,$password,$nama_database)or die(mysqli_error($koneksi));
?>