<?php
	include('koneksi.php');

    session_start();

      if(!isset($_SESSION['username'])){
        header ('location:login.php');
      }

      if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
      }

	//jika tombol simpan diklik
	if (isset($_POST['bsimpan'])) {
		$simpan = mysqli_query($koneksi, "INSERT INTO tmhs(nim,nama,alamat,prodi) VALUES ('$_POST[tnim]', '$_POST[tnama]', '$_POST[talamat]', '$_POST[tprodi]') ");

		if ($simpan) // jika simpan sukses
		{
			echo "<script>
				alert('Berhasil menyimpan data!');
				document.location = 'index.php';
				</script>";
		}

		else //jika simpan gagal
		{
			echo "<script>
				alert('Gagal menyimpan data!');
				document.location = 'create.php';
				</script>";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Project Akhir Lab PW1</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<style>
    body{
        background-image: url(bg1.jpg);
        background-size: cover;
    }
</style>
<body>
<div class="container mt-4">
<h1 class="text-center">CRUD</h1>
<h3 class="text-center">by. Alex Mario Simanjuntak</h3>
<h3 class="text-center">NIM : 201401034</h3>

<div>
	<a class="btn btn-danger" href="logout.php">Logout</a>
</div>
<!-- Awal Form Card -->
<div class="card mt-4">
  <div class="card-header bg-primary text-white">
    Form Input Data Mahasiswa
  </div>
  <div class="card-body">
    <form method="post" action="">
    	<div class="form-group mb-3">
    		<label class="mb-1">NIM</label>
    		<input type="text" name="tnim" class="form-control" placeholder="Input NIM anda disini!" required>
    	</div>
    	<div class="form-group mt-3">
    		<label class="mb-1">Nama</label>
    		<input type="text" name="tnama" class="form-control" placeholder="Input Nama anda disini!" required>
    	</div>
    	<div class="form-group mt-3">
    		<label class="mb-1">Alamat</label>
    		<textarea class="form-control" name="talamat" placeholder="Input Alamat anda disini!"></textarea>
    	</div>
    	<div class="form-group mt-3">
    		<label class="mb-1">Program Studi</label>
    		<select class="form-control" name="tprodi">
    			<option></option>
    			<option value="S1-Ilmu Komputer">S1-Ilmu Komputer</option>
    			<option value="S1-Teknologi Informasi">S1-Teknologi Informasi</option>
    		</select>
    	</div>
    	<div class="mt-3">
    		<button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
    		<button type="reset" class="btn btn-danger" name="breset">Reset</button>
    	</div>
    	<div>
    		<a href="index.php" class="btn btn-warning mt-5">Lihat Data</a>
    	</div>

    </form>
 
</div>
</div>
<!-- Akhir Form Card -->

</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</html>