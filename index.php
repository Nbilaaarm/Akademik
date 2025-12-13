<!DOCTYPE html>
<html>
<head>
<title>Data Mahasiswa</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
<h3>Data Mahasiswa</h3>
<a href="create.php" class="btn btn-primary mb-3">Input Mahasiswa</a>

<table class="table table-bordered">
<tr>
  <th>No</th>
  <th>NIM</th>
  <th>Nama</th>
  <th>Tgl Lahir</th>
  <th>Alamat</th>
  <th>Aksi</th>
</tr>

<?php
include 'koneksi.php';
$no = 1;
$data = $koneksi->query("SELECT * FROM mahasiswa");
while ($row = $data->fetch_assoc()) {
?>
<tr>
  <td><?= $no++ ?></td>
  <td><?= $row['nim'] ?></td>
  <td><?= $row['nama_mhs'] ?></td>
  <td><?= $row['tgl_lahir'] ?></td>
  <td><?= $row['alamat'] ?></td>
  <td>
  <a href="update.php?nim=<?= $row['nim'] ?>"
     class="btn btn-warning btn-sm">Edit</a>

  <a href="delete.php?nim=<?= $row['nim'] ?>"
     class="btn btn-danger btn-sm"
     onclick="return confirm('Hapus data?')">Delete</a>
  </td>
</tr>
<?php } ?>

</table>
</div>

</body>
</html>
