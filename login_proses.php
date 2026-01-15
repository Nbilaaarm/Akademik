<?php
session_start();
include "koneksi.php";

$email = $_POST['email'];
$password = $_POST['password'];

// cari user berdasarkan email
$query = mysqli_query($db, "SELECT * FROM pengguna WHERE email='$email'");
$data = mysqli_fetch_assoc($query);

// cek user ada atau tidak
if ($data) {

    // cek password
    if (password_verify($password, $data['password'])) {

        // simpan session
        $_SESSION['login'] = true;
        $_SESSION['email'] = $data['email'];
        $_SESSION['nama_lengkap'] = $data['nama_lengkap'];

        // alert + redirect
        echo "<script>
                alert('Login berhasil, selamat datang!');
                window.location='home.php';
              </script>";
        exit;

    } else {
        echo "<script>
                alert('Password salah!');
                window.history.back();
              </script>";
    }

} else {
    echo "<script>
            alert('email tidak ditemukan!');
            window.history.back();
          </script>";
}
?>
