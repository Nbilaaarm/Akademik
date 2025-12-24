<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Program Studi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* CSS Tambahan agar konsisten dengan halaman Mahasiswa */
        body { background-color: #f8f9fa; }
        .navbar-brand { font-weight: bold; font-size: 1.25rem; }
        .table thead th { border-bottom: none; }
        .btn-sm { margin-right: 5px; } 
    </style>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
      <div class="container-fluid px-5"> 
        <a class="navbar-brand" href="#">Akademik</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Mahasiswa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="prodi.php">Prodi</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container mt-4">
        <h3 class="mb-3">Data Program Studi</h3>

        <?php
        if (isset($_GET['pesan'])) {
            $pesan = $_GET['pesan'];
            if ($pesan == "simpan") {
                echo '<div class="alert alert-success alert-dismissible fade show">Data Prodi berhasil disimpan.<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
            } elseif ($pesan == "update") {
                echo '<div class="alert alert-warning alert-dismissible fade show">Data Prodi berhasil diupdate.<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
            } elseif ($pesan == "hapus") {
                echo '<div class="alert alert-danger alert-dismissible fade show">Data Prodi berhasil dihapus.<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
            } elseif ($pesan == "gagal") {
                echo '<div class="alert alert-danger alert-dismissible fade show">Gagal menghapus! Prodi ini sedang digunakan oleh Mahasiswa.<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
            }
        }
        ?>
        
        <div class="mb-3">
            <a href="prodi_create.php" class="btn btn-primary fw-bold">+ Tambah Prodi</a>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <table class="table table-hover table-striped mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="py-3 ps-4">No</th>
                            <th class="py-3">Nama Prodi</th>
                            <th class="py-3">Jenjang</th>
                            <th class="py-3">Keterangan</th>
                            <th class="py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("koneksi.php");
                        $no = 1;
                        $sql = mysqli_query($db, "SELECT * FROM prodi");
                        
                        while($data = mysqli_fetch_array($sql)){
                        ?>
                            <tr>
                                <td class="ps-4"><?php echo $no++; ?></td>
                                <td><?php echo $data['nama_prodi']; ?></td>
                                <td><?php echo $data['jenjang']; ?></td>
                                <td><?php echo $data['keterangan']; ?></td>
                                <td>
                                    <a href="prodi_edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning btn-sm fw-bold text-dark">Edit</a>
                                    <a href="prodi_delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm fw-bold" onclick="return confirm('Yakin hapus prodi <?php echo $data['nama_prodi']; ?>?')">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>