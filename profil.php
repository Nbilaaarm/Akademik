<?php
session_start();
include 'koneksi.php';

// proteksi halaman
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$email_baru = $_SESSION['email'];

// ambil data user
$query = "SELECT nama_lengkap, email FROM pengguna WHERE email='$email_baru'";
$result = mysqli_query($db, $query);
$data = mysqli_fetch_assoc($result);
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5" style="max-width: 500px;">
    <div class="card shadow-sm">
        <div class="card-header text-center fw-bold">
            Edit Profil
        </div>

        <div class="card-body">
            <form action="profil_proses.php" method="post">

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama_lengkap" class="form-control" 
                            value="<?= $data['nama_lengkap']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control"
                           value="<?= $data['email']; ?>" readonly>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Password Baru</label>
                    <input type="password" name="password" class="form-control"
                           placeholder="">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        Simpan Perubahan
                    </button>
                </div>

            </form>
        </div>
    </div>

    <div class="text-center mt-3">
        <a href="home.php">← Kembali ke Home</a>
    </div>
</div>

</body>
</html>