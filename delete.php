<?php
include ('koneksi.php');

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];

    $sql = "DELETE FROM mahasiswa WHERE nim='$nim'";
    $query = $koneksi->query($sql);

    if ($query) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal dihapus";
    }
}
?>
