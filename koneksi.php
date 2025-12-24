<?php
// --- SETUP DATABASE ---
$server = "localhost";
$user = "root";
$password = "";
$nama_database = "db_akademik";

// --- COBA KONEK ---
$db = mysqli_connect($server, $user, $password, $nama_database);

// Cek nyambung gak? Kalau gagal, matiin aja
if( !$db ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
?>