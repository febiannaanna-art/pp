<?php 
include "../koneksi.php";
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM skills WHERE id='$id'");
header("location:skills_data.php");
?>