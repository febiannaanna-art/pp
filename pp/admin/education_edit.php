<?php 
include "auth/proteksi.php"; 
include "../koneksi.php";

$id = mysqli_real_escape_string($koneksi, $_GET['id']);
$query = mysqli_query($koneksi, "SELECT * FROM education WHERE id='$id'");
$d = mysqli_fetch_array($query);

if(isset($_POST['update'])){
    $tahun = mysqli_real_escape_string($koneksi, $_POST['tahun']);
    $sekolah = mysqli_real_escape_string($koneksi, $_POST['sekolah']);
    $jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);
    
    mysqli_query($koneksi, "UPDATE education SET tahun='$tahun', sekolah='$sekolah', jurusan='$jurusan' WHERE id='$id'");
    header("location:education_data.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit Education | Sneat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container">
        <div class="card col-md-6 mx-auto p-4 shadow-sm" style="border-radius: 15px;">
            <h5 class="fw-bold mb-4 text-primary"><i class='bx bx-edit'></i> Edit Data Pendidikan</h5>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label fw-bold small">Tahun</label>
                    <input type="text" name="tahun" class="form-control" value="<?= $d['tahun']; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold small">Nama Sekolah</label>
                    <input type="text" name="sekolah" class="form-control" value="<?= $d['sekolah']; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold small">Jurusan / Keterangan</label>
                    <input type="text" name="jurusan" class="form-control" value="<?= $d['jurusan']; ?>" required>
                </div>
                <div class="pt-3 border-top mt-4">
                    <button type="submit" name="update" class="btn btn-primary px-4">Simpan Perubahan</button>
                    <a href="education_data.php" class="btn btn-outline-secondary px-4">Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>