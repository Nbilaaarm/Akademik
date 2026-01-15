<?php
session_start();

// proteksi halaman (tidak bisa diakses kalau belum login)
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.25rem;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid px-5">
        <a class="navbar-brand" href="#">Akademik</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link active" href="home.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.php">Mahasiswa</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="prodi.php">Prodi</a>
                </li>

                <!-- DROPDOWN PROFIL -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['nama_lengkap']; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="profil.php">Profil</a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item text-danger" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>

<!-- KONTEN -->
<div class="container px-5">
    <div class="card">
        <div class="card-body">
            <h4>Selamat Datang, <?php echo $_SESSION['nama_lengkap']; ?> 👋</h4>
            <p class="mb-0">
                Anda berhasil login ke sistem akademik.
            </p>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
