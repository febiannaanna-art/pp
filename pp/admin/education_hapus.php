<?php
include "../koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM education WHERE id='$id'");

if ($query) {
    header("location:education_data.php");
} else {
    echo "Gagal menghapus data";
}
?>