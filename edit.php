<?php
include("koneksi.php");

// Cari data lama berdasarkan NIM dari URL
$edit = mysqli_query($db, "SELECT * FROM mahasiswa WHERE nim='$_GET[nim]'");
$data = mysqli_fetch_array($edit);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container mt-5">
        <div class="card col-md-8 mx-auto">
            <div class="card-header bg-warning">
                Edit Data Mahasiswa
            </div>
            <div class="card-body">
                <form action="update.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">NIM</label>
                        <input type="text" name="nim" class="form-control" value="<?php echo $data['nim']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_mhs" class="form-control" value="<?php echo $data['nama_mhs']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control" value="<?php echo $data['tgl_lahir']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="3" required><?php echo $data['alamat']; ?></textarea>
                    </div>
                    
                    <button type="submit" name="submit" class="btn btn-primary">Update Data</button>
                    <a href="index.php" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>