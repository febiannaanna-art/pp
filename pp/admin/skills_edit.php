<?php 
include "../koneksi.php";
$id = $_GET['id'];
$d = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM skills WHERE id='$id'"));

if(isset($_POST['update'])){
    $nama = $_POST['nama_skill'];
    $persen = $_POST['persen'];
    mysqli_query($koneksi, "UPDATE skills SET nama_skill='$nama', persen='$persen' WHERE id='$id'");
    header("location:skills_data.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Skill</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container-fluid card shadow p-4" style="max-width: 800px;">
        <h4>Edit Skill: <?= $d['nama_skill']; ?></h4>
        <form method="post">
            <div class="mb-3">
                <label>Nama Skill</label>
                <input type="text" name="nama_skill" class="form-control" value="<?= $d['nama_skill']; ?>">
            </div>
            <div class="mb-3">
                <label>Persentase (%)</label>
                <input type="number" name="persen" class="form-control" value="<?= $d['persen']; ?>">
            </div>
            <button name="update" class="btn btn-success w-100">Update Skill</button>
        </form>
    </div>
</body>
</html>