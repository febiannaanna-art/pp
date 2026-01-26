<?php
include "auth/proteksi.php";
include "../koneksi.php";

$id = isset($_GET['id']) ? mysqli_real_escape_string($koneksi, $_GET['id']) : '';
if($id == "") { header("location:about_data.php"); exit; }

$query_data = mysqli_query($koneksi, "SELECT * FROM about WHERE id = '$id'");
$data = mysqli_fetch_array($query_data);

if (isset($_POST['update'])) {
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul'] ?? '');
    $tgl_lahir = mysqli_real_escape_string($koneksi, $_POST['tgl_lahir'] ?? '');
    $hobi = mysqli_real_escape_string($koneksi, $_POST['hobi'] ?? '');
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi'] ?? '');
    
    $foto_nama = $_FILES['foto']['name'];
    
    if ($foto_nama != "") {
        $ekstensi = pathinfo($foto_nama, PATHINFO_EXTENSION);
        $nama_baru = "profile_" . time() . "." . $ekstensi;
        
        if(move_uploaded_file($_FILES['foto']['tmp_name'], "assets/img/" . $nama_baru)) {
            if(!empty($data['foto']) && file_exists("assets/img/" . $data['foto'])) {
                unlink("assets/img/" . $data['foto']);
            }
            mysqli_query($koneksi, "UPDATE about SET judul='$judul', tgl_lahir='$tgl_lahir', hobi='$hobi', deskripsi='$deskripsi', foto='$nama_baru' WHERE id='$id'");
        }
    } else {
        mysqli_query($koneksi, "UPDATE about SET judul='$judul', tgl_lahir='$tgl_lahir', hobi='$hobi', deskripsi='$deskripsi' WHERE id='$id'");
    }
    header("location:about_data.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit About | Sneat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
    <div class="container">
        <div class="card col-md-8 mx-auto p-4 shadow-sm border-0" style="border-radius: 15px;">
            <h5 class="fw-bold mb-4 text-primary"><i class='bx bx-edit'></i> Edit Profil About</h5>
            <form method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label class="form-label fw-bold">Judul (Slogan)</label>
                        <input type="text" name="judul" class="form-control" value="<?= $data['judul'] ?? ''; ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Tanggal Lahir</label>
                        <input type="text" name="tgl_lahir" class="form-control" value="<?= $data['tgl_lahir'] ?? ''; ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Hobi</label>
                        <input type="text" name="hobi" class="form-control" value="<?= $data['hobi'] ?? ''; ?>" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Deskripsi / Tentang Saya</label>
                    <textarea name="deskripsi" class="form-control" rows="4" required><?= $data['deskripsi'] ?? ''; ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Ganti Foto Profil</label>
                    <input type="file" name="foto" class="form-control mb-2">
                    <div class="mt-2">
                        <?php 
                        $foto_ada = $data['foto'] ?? '';
                        $path_foto = "assets/img/" . $foto_ada;
                        if(!empty($foto_ada) && file_exists($path_foto)): ?>
                            <img src="<?= $path_foto; ?>?t=<?= time(); ?>" width="100" height="100" class="rounded border shadow-sm" style="object-fit: cover;">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="pt-3 border-top mt-4">
                    <button type="submit" name="update" class="btn btn-primary px-5 rounded-pill">Simpan Perubahan</button>
                    <a href="about_data.php" class="btn btn-outline-secondary px-4 rounded-pill">Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>