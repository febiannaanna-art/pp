<?php
include "../koneksi.php";

$id = $_GET['id'];

// Ambil nama file foto sebelum data dihapus agar bisa sekalian hapus file di folder
$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT foto FROM about WHERE id='$id'"));
if(!empty($data['foto']) && file_exists("assets/img/" . $data['foto'])) {
    unlink("assets/img/" . $data['foto']);
}

$query = mysqli_query($koneksi, "DELETE FROM about WHERE id='$id'");

if($query) {
    echo "<script>alert('Data berhasil dihapus'); window.location='about_data.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data'); window.location='about_data.php';</script>";
}
?>