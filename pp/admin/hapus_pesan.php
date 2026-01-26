<?php
$koneksi = mysqli_connect("localhost", "root", "", "pp");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = "DELETE FROM pesan WHERE id = '$id'";
    $hasil = mysqli_query($koneksi, $query);

    if ($hasil) {
        header("Location: index.php?page=pesan");
        exit;
    } else {
        echo "Gagal menghapus: " . mysqli_error($koneksi);
    }
}
?>