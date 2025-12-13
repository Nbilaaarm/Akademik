<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Input Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5" style="max-width:600px">
<h3>Input Data Mahasiswa</h3>

<form action="proses.php" method="post">

  <div class="mb-3">
    <label>NIM</label>
    <input type="text" name="nim" class="form-control">
  </div>

  <div class="mb-3">
    <label>Nama Mahasiswa</label>
    <input type="text" name="nama_mhs" class="form-control">
  </div>

  <div class="mb-3">
    <label>Tanggal Lahir</label>
    <input type="date" name="tgl_lahir" class="form-control">
  </div>

  <div class="mb-3">
    <label>Alamat</label>
    <textarea name="alamat" class="form-control"></textarea>
  </div>

  <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    <a href="index.php" class="btn btn-success">Lihat Data</a>
</form>
</div>

</body>
</html>
