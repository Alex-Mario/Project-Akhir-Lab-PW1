<?php
	include('koneksi.php');
  session_start();

      if(!isset($_SESSION['username'])){
        header ('location:login.php');
      }

      if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
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
<!-- Awal Form Table -->
<div class="card mt-4">
  <div class="card-header bg-success text-white">
    Daftar Mahasiswa
  </div>
  <div class="card-body">

  	<table class="table table-bordered table-striped">
  		<tr>
  			<th>No.</th>
  			<th>NIM</th>
  			<th>Nama</th>
  			<th>Alamat</th>
  			<th>Program Studi</th>
  			<th>Edit / Hapus</th>
  		</tr>
  		<?php
  			$no = 1;
  			$tampil = mysqli_query($koneksi, "SELECT * FROM tmhs order by id_mhs desc");//data yg paling terkahir dimasukkan akan ditampilkan dibaris pertama (descending)
  			while ($data = mysqli_fetch_array($tampil)):
  		?>
  		<tr>
  			<td><?php echo $no++;?></td>
  			<td><?php echo $data['nim'];?></td>
  			<td><?php echo $data['nama'];?></td>
  			<td><?php echo $data['alamat'];?></td>
  			<td><?=$data['prodi'];?></td>
  			<td>
  				<a href="update.php?hal=edit&id=<?=$data['id_mhs']?>" class="btn btn-warning">Edit</a>
  				<a href="delete.php?hal=hapus&id=<?=$data['id_mhs']?>" onclick = "return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger">Hapus</a>
  			</td>
  		</tr>

  		<?php endwhile; //penutup perulangan while ?>

  	</table>
    <div>
      <a href="index.php" class="btn btn-success">Kembali</a>
    </div>
 
</div>
</div>
<!-- Akhir Form Table -->

</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</html>