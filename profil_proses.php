<?php
session_start();
include 'koneksi.php';

// proteksi
if (!isset($_SESSION['login'])) {
    echo "<script>
            alert('Silakan login terlebih dahulu!');
            window.location='login.php';
          </script>";
    exit;
}
$email    = $_SESSION['email'];
$nama_lengkap     = $_POST['nama_lengkap'];
$password = $_POST['password'];

// jika password diisi
if (!empty($password)) {

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $query = "UPDATE pengguna
              SET nama_lengkap='$nama_lengkap', password='$password_hash'
              WHERE email='$email'";

} else {

    // jika password tidak diubah
    $query = "UPDATE pengguna
              SET nama_lengkap='$nama_lengkap'
              WHERE email='$email'";

}

if (mysqli_query($db, $query)) {

    // update session supaya navbar langsung berubah
    $_SESSION['nama_lengkap'] = $nama_lengkap;

    echo "<script>
            alert('Profil berhasil diperbarui!');
            window.location='profil.php';
          </script>";

} else {

    echo "<script>
            alert('Profil gagal diperbarui!');
            window.history.back();
          </script>";
}