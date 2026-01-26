<?php
include "auth/proteksi.php"; 
include "../koneksi.php";

$id = $_GET['id'];
// Perbaikan: Nama tabel diganti menjadi projects
$query = mysqli_query($koneksi, "SELECT * FROM projects WHERE id = '$id'");
$data = mysqli_fetch_array($query);

if (isset($_POST['update'])) {
    $nama = $_POST['nama_project'];
    $deskripsi = $_POST['deskripsi'];
    $gambar_lama = $_POST['gambar_lama'];

    // Cek apakah user mengunggah gambar baru
    if ($_FILES['gambar']['name'] != "") {
        $nama_gambar = $_FILES['gambar']['name'];
        $tmp_name = $_FILES['gambar']['tmp_name'];
        $folder = 'assets/img/';
        move_uploaded_file($tmp_name, $folder . $nama_gambar);
        
        // Hapus gambar lama jika ada
        if (file_exists($folder . $gambar_lama) && $gambar_lama != "") {
            unlink($folder . $gambar_lama);
        }
    } else {
        $nama_gambar = $gambar_lama;
    }

    // Perbaikan: Query UPDATE menggunakan nama tabel 'projects' dan kolom 'foto'
    $update = mysqli_query($koneksi, "UPDATE projects SET 
        nama_project = '$nama', 
        deskripsi = '$deskripsi', 
        foto = '$nama_gambar' 
        WHERE id = '$id'");

    if ($update) {
        header("Location: project_data.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Edit Project | Sneat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <style>
        :root { --primary-blue: #4e73df; }
        body { background-color: #f8f9fc; font-family: 'Inter', sans-serif; overflow-x: hidden; }
        .sidebar { min-height: 100vh; background: white; border-right: 1px solid #e3e6f0; width: 280px; position: fixed; }
        .main-content { margin-left: 280px; width: calc(100% - 280px); min-height: 100vh; }
        .nav-link { color: #6e707e; font-weight: 500; padding: 1rem 1.5rem; border-radius: 8px; font-size: 1.1rem; margin-bottom: 5px; }
        .nav-link:hover, .nav-link.active { background: rgba(78, 115, 223, 0.1); color: var(--primary-blue) !important; }
        .card { border: none; box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 120, 0.15); border-radius: 12px; }
        .card-header { background-color: var(--primary-blue) !important; color: white; }
        .btn-primary { background-color: #4e73df; border: none; }
    </style>
</head>
<body>

<div class="d-flex">
    <div class="sidebar p-4 d-none d-md-block">
        <h3 class="text-primary fw-bold mb-5 ps-2">Sneat Admin</h3>
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="index.php"><i class="bx bx-home-circle me-3"></i> Dashboard</a></li>
            <li class="nav-item"><a class="nav-link active" href="project_data.php"><i class="bx bx-rocket me-3"></i> Manajemen Project</a></li>
            <hr class="my-4">
            <li class="nav-item"><a class="nav-link text-danger" href="auth/logout.php"><i class="bx bx-log-out me-3"></i> Logout</a></li>
        </ul>
    </div>

    <div class="main-content p-5">
        <div class="col-md-12">
            <div class="card shadow border-0 mx-auto" style="max-width: 800px;">
                <div class="card-header fw-bold p-3">Edit Project</div>
                <div class="card-body p-4">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="gambar_lama" value="<?= $data['foto']; ?>">
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Nama Project</label>
                            <input type="text" name="nama_project" class="form-control" value="<?= $data['nama_project']; ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Deskripsi Singkat</label>
                            <textarea name="deskripsi" class="form-control" rows="4" required><?= $data['deskripsi']; ?></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Gambar Project (Kosongkan jika tidak diganti)</label>
                            <input type="file" name="gambar" class="form-control">
                            <small class="text-muted">Gambar saat ini: <?= $data['foto']; ?></small>
                        </div>
                        
                        <div class="mt-4 text-end">
                            <a href="project_data.php" class="btn btn-secondary px-4 me-2">Batal</a>
                            <button type="submit" name="update" class="btn btn-primary px-4">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>