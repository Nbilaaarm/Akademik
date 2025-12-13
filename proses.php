<?php
include ('koneksi.php');

/* =================
   CREATE
================= */
if (isset($_POST['submit'])) {

    $nim = $_POST['nim'];
    $nama = $_POST['nama_mhs'];
    $tgl  = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO mahasiswa (nim, nama_mhs, tgl_lahir, alamat)
            VALUES ('$nim', '$nama', '$tgl', '$alamat')";

    if ($koneksi->query($sql)) {
        echo "Berhasil menyimpan data mahasiswa";
    } else {
        echo "Gagal menyimpan data mahasiswa!";
    }
}

elseif (isset($_POST['update'])) {

    $nim = $_POST['nim'];
    $nama = $_POST['nama_mhs'];
    $tgl  = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];

    $sql = "UPDATE mahasiswa 
            SET nama_mhs='$nama',
                tgl_lahir='$tgl',
                alamat='$alamat'
            WHERE nim='$nim'";

    if ($koneksi->query($sql)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data mahasiswa gagal diupdate";
    }
}

elseif (isset($_GET['nim'])) {

    $nim = $_GET['nim'];

    $sql = "DELETE FROM mahasiswa WHERE nim='$nim'";

    if ($koneksi->query($sql)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data mahasiswa gagal dihapus";
    }
}
?>
