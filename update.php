<?php
include ('koneksi.php');

$nim = $_GET['nim'];
$data = $koneksi->query("SELECT * FROM mahasiswa WHERE nim='$nim'");
$row = $data->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Mahasiswa</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5" style="max-width:600px">
<h3>Edit Data Mahasiswa</h3>

<form action="proses.php" method="post">

<input type="hidden" name="nim" value="<?= $row['nim'] ?>">

<div class="mb-3">
  <label>Nama Mahasiswa</label>
  <input type="text" name="nama_mhs" value="<?= $row['nama_mhs'] ?>" class="form-control">
</div>

<div class="mb-3">
  <label>Tanggal Lahir</label>
  <input type="date" name="tgl_lahir" value="<?= $row['tgl_lahir'] ?>" class="form-control">
</div>

<div class="mb-3">
  <label>Alamat</label>
  <textarea name="alamat" class="form-control"><?= $row['alamat'] ?></textarea>
</div>

<button type="submit" name="update" class="btn btn-primary">Update</button>
<a href="index.php" class="btn btn-secondary">Batal</a>

</form>
</div>

</body>
</html>
