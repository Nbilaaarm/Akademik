<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* CSS Tambahan agar mirip persis */
        body { background-color: #f8f9fa; }
        .navbar-brand { font-weight: bold; font-size: 1.25rem; }
        .table thead th { border-bottom: none; }
        /* Memastikan tombol aksi sejajar */
        .btn-sm { margin-right: 5px; } 
    </style>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
      <div class="container-fluid px-5"> <a class="navbar-brand" href="#">Akademik</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="index.php">Mahasiswa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="prodi.php">Prodi</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container mt-4">
        <h3 class="mb-3">Data Mahasiswa</h3>
        
        <?php
        if (isset($_GET['pesan'])) {
            $pesan = $_GET['pesan'];
            if ($pesan == "simpan") {
                echo '<div class="alert alert-success alert-dismissible fade show">Data berhasil disimpan.<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
            } elseif ($pesan == "update") {
                echo '<div class="alert alert-warning alert-dismissible fade show">Data berhasil diupdate.<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
            } elseif ($pesan == "hapus") {
                echo '<div class="alert alert-danger alert-dismissible fade show">Data berhasil dihapus.<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
            }
        }
        ?>

        <div class="mb-3">
            <a href="create.php" class="btn btn-primary fw-bold">+ Tambah</a>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body p-0"> <table class="table table-hover table-striped mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="py-3 ps-4">No.</th>
                            <th class="py-3">NIM</th>
                            <th class="py-3">Nama</th>
                            <th class="py-3">Alamat</th>
                            <th class="py-3">Prodi</th> <th class="py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("koneksi.php");
                        
                        // --- QUERY JOIN PENTING ---
                        // Kita gabungkan tabel mahasiswa & prodi agar nama prodi muncul
                        // SELECT m.*, p.nama_prodi artinya ambil semua data mahasiswa DAN nama_prodi
                        $query = "SELECT m.*, p.nama_prodi 
                                  FROM mahasiswa m 
                                  LEFT JOIN prodi p ON m.prodi_id = p.id 
                                  ORDER BY m.nim ASC";
                        
                        $tampil = mysqli_query($db, $query);
                        $no = 1;

                        while($data = mysqli_fetch_array($tampil)){
                        ?>
                            <tr>
                                <td class="ps-4"><?php echo $no++; ?></td>
                                <td><?php echo $data['nim']; ?></td>
                                <td><?php echo $data['nama_mhs']; ?></td>
                                <td><?php echo $data['alamat']; ?></td>
                                
                                <td><?php echo $data['nama_prodi']; ?></td> 
                                
                                <td>
                                    <a href="edit.php?nim=<?php echo $data['nim']; ?>" class="btn btn-warning btn-sm fw-bold text-dark">Edit</a>
                                    
                                    <a href="delete.php?nim=<?php echo $data['nim']; ?>" class="btn btn-danger btn-sm fw-bold" onclick="return confirm('Yakin hapus data <?php echo $data['nama_mhs']; ?>?')">Hapus</a>
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