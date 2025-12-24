<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    
    <div class="container mt-5">
        <div class="card col-md-8 mx-auto">
            <div class="card-header bg-primary text-white">
                Input Data Mahasiswa
            </div>
            <div class="card-body">
                <form action="proses.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">NIM</label>
                        <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_mhs" class="form-control" placeholder="Masukkan Nama Lengkap" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Program Studi</label>
                        <select name="prodi_id" class="form-select" required>
                            <option value="">-- Pilih Prodi --</option>
                            <?php
                            include("koneksi.php");
                            // Ambil data dari tabel prodi biar muncul di pilihan
                            $query_prodi = mysqli_query($db, "SELECT * FROM prodi");
                            while($data_prodi = mysqli_fetch_array($query_prodi)){
                                echo "<option value='".$data_prodi['id']."'>".$data_prodi['jenjang']." - ".$data_prodi['nama_prodi']."</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="3" required></textarea>
                    </div>
                    
                    <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                    <a href="index.php" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
  </body>
</html>