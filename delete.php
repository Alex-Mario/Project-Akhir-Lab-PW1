<?php
	include('koneksi.php');
	session_start();

      if(!isset($_SESSION['username'])){
        header ('location:login.php');
      }

      if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
      }

	if ($_GET['hal'] == "hapus") {
		#persiapan hapus data
		$hapus = mysqli_query($koneksi, "DELETE FROM tmhs WHERE id_mhs = '$_GET[id]' ");
		if($hapus){
			 echo "<script>
       				 alert('Data berhasil dihapus!');
        			 document.location = 'read.php';
       				 </script>";
		}
	}

?>
