<?php
include("koneksi.php");

if(isset($_GET['nim'])){
    
    // Hapus data yang NIM-nya sesuai
    $hapus = mysqli_query($db, "DELETE FROM mahasiswa WHERE nim='$_GET[nim]'");

    if($hapus){
        // Sukses? Balik ke index bawa pesan 'hapus'
        header("Location:index.php?pesan=hapus"); 
    } else {
        echo "Gagal menghapus data.";
    }
}
?>