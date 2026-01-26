<?php
include "../koneksi.php";

$id = $_GET['id'];

$hapus = mysqli_query($koneksi, "DELETE FROM pesan WHERE id='$id'");

if($hapus){
    header("location: pesan_masuk.php");
} else {
    echo "Gagal menghapus pesan";
}
?>