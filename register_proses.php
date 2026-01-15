<?php
include "koneksi.php";

// Pastikan index di $_POST sama dengan 'name' di form HTML (register.php)
$nama     = $_POST['nama_lengkap'];
$email    = $_POST['email']; 
$password = $_POST['password'];

$password_hash = password_hash($password, PASSWORD_DEFAULT);

$query = "INSERT INTO pengguna (nama_lengkap, email, password)
          VALUES ('$nama', '$email', '$password_hash')";

if (mysqli_query($db, $query)) {
    echo "<script>
            alert('Registrasi Berhasil!');
            window.location='login.php';
          </script>";
} else {
    echo "Error: " . mysqli_error($db);
}
?>