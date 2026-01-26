<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "auth/proteksi.php"; 
include "../koneksi.php";

$q_notif = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM pesan WHERE status = 0");
$d_notif = mysqli_fetch_assoc($q_notif);
$pesan_baru = $d_notif['total'];

$current_page = basename($_SERVER['PHP_SELF']);
$current_page = basename($_SERVER['PHP_SELF']);

// --- PROSES SIMPAN PROJECT ---
if (isset($_POST['simpan_project'])) {
    $nama_project = mysqli_real_escape_string($koneksi, $_POST['nama_project']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    
    $nama_file = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = 'assets/img/';
    
    move_uploaded_file($source, $folder.$nama_file);
    mysqli_query($koneksi, "INSERT INTO projects (nama_project, deskripsi, foto) VALUES ('$nama_project', '$deskripsi', '$nama_file')");
    header("location:project_data.php");
}

// --- PROSES UPDATE PROJECT (MODAL) ---
if (isset($_POST['update_project'])) {
    $id = $_POST['id'];
    $nama_project = mysqli_real_escape_string($koneksi, $_POST['nama_project']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $nama_file = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = 'assets/img/';

    if ($nama_file != "") {
        // Hapus foto lama
        $query_lama = mysqli_query($koneksi, "SELECT foto FROM projects WHERE id='$id'");
        $d_lama = mysqli_fetch_array($query_lama);
        if(file_exists($folder.$d_lama['foto'])){ unlink($folder.$d_lama['foto']); }
        
        move_uploaded_file($source, $folder.$nama_file);
        mysqli_query($koneksi, "UPDATE projects SET nama_project='$nama_project', deskripsi='$deskripsi', foto='$nama_file' WHERE id='$id'");
    } else {
        mysqli_query($koneksi, "UPDATE projects SET nama_project='$nama_project', deskripsi='$deskripsi' WHERE id='$id'");
    }
    header("location:project_data.php");
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM projects WHERE id='$id'");
    header("location:project_data.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Manajemen Project | Sneat Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <style>
        :root { --primary-blue: #4e73df; }
        body { background-color: #f8f9fc; font-family: 'Inter', sans-serif; overflow-x: hidden; }
        .sidebar { min-height: 100vh; background: white; border-right: 1px solid #e3e6f0; width: 280px; position: fixed; z-index: 1000; }
        .main-content { margin-left: 280px; width: calc(100% - 280px); min-height: 100vh; padding: 40px; }
        .nav-link { color: #6e707e; font-weight: 500; padding: 1rem 1.5rem; border-radius: 8px; margin-bottom: 5px; display: flex; align-items: center; text-decoration: none; }
        .nav-link:hover, .nav-link.active { background: rgba(78, 115, 223, 0.1); color: var(--primary-blue) !important; }
        .nav-link i { font-size: 1.25rem; margin-right: 1rem; }
        .card { border: none; box-shadow: 0 0.5rem 2rem 0 rgba(58, 59, 120, 0.1); border-radius: 15px; overflow: hidden; }
        .card-header { background-color: white !important; border-bottom: 1px solid #e3e6f0; color: var(--primary-blue) !important; }
        .table thead th { background-color: #f8f9fc; color: #4e73df; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em; }
    </style>
</head>
<body>

<div class="d-flex">
    <div class="sidebar p-4 d-none d-md-block">
        <h3 class="text-primary fw-bold mb-5 ps-2">Sneat Admin</h3>
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link <?= ($current_page == 'index.php') ? 'active' : ''; ?>" href="index.php"><i class="bx bx-home-circle"></i> Dashboard</a></li>
            <li class="nav-item"><a class="nav-link <?= ($current_page == 'blog_data.php') ? 'active' : ''; ?>" href="blog_data.php"><i class="bx bx-layout"></i> Manajemen Blog</a></li>
            <li class="nav-item"><a class="nav-link <?= ($current_page == 'pesan_masuk.php') ? 'active' : ''; ?>" href="pesan_masuk.php"><i class="bx bx-envelope"></i> Pesan Masuk</a></li>
            <li class="nav-item"><a class="nav-link <?= ($current_page == 'project_data.php') ? 'active' : ''; ?>" href="project_data.php"><i class="bx bx-rocket"></i> Manajemen Project</a></li>
            <li class="nav-item"><a class="nav-link <?= ($current_page == 'about_data.php') ? 'active' : ''; ?>" href="about_data.php"><i class="bx bx-user"></i> Manajemen about</a></li>
            <li class="nav-item"><a class="nav-link <?= ($current_page == 'skills_data.php') ? 'active' : ''; ?>" href="skills_data.php"><i class="bx bx-code-alt"></i> Manajemen Skills</a></li>
            <li class="nav-item"><a class="nav-link <?= ($current_page == 'education_data.php') ? 'active' : ''; ?>" href="education_data.php"><i class="bx bx-book"></i> Manajemen Education</a></li>
            <hr class="my-4">
            <li class="nav-item"><a class="nav-link text-danger" href="auth/logout.php"><i class="bx bx-log-out"></i> Logout</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold">Halaman / <span class="text-muted">Manajemen Project</span></h4>
        </div>

        <div class="col-md-12">
            <div class="card mb-5 shadow-sm">
                <div class="card-header py-3"><h6 class="m-0 fw-bold">Tambah Project Baru</h6></div>
                <div class="card-body p-4">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Nama Project</label>
                                <input type="text" name="nama_project" class="form-control" placeholder="Masukkan nama project..." required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Gambar Project</label>
                                <input type="file" name="gambar" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold">Deskripsi Singkat</label>
                                <textarea name="deskripsi" class="form-control" rows="3" placeholder="Tulis deskripsi project di sini..." required></textarea>
                            </div>
                            <div class="col-12 text-end">
                                <button type="submit" name="simpan_project" class="btn btn-primary px-4 shadow-sm">Simpan Project</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header py-3"><h6 class="m-0 fw-bold">Daftar Project Terkini</h6></div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th class="ps-4" width="120">GAMBAR</th>
                                    <th>NAMA PROJECT</th>
                                    <th>DESKRIPSI</th>
                                    <th class="text-center" width="120">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $data = mysqli_query($koneksi, "SELECT * FROM projects ORDER BY id DESC");
                                while($d = mysqli_fetch_array($data)) :
                                ?>
                                <tr>
                                    <td class="ps-4">
                                        <img src="assets/img/<?= $d['foto']; ?>" width="80" height="50" class="rounded shadow-sm" style="object-fit: cover;">
                                    </td>
                                    <td><span class="fw-bold text-dark"><?= htmlspecialchars($d['nama_project']); ?></span></td>
                                    <td><div class="text-muted small" style="max-width: 400px; white-space: normal;"><?= (strlen($d['deskripsi']) > 100) ? substr(htmlspecialchars($d['deskripsi']), 0, 100).'...' : htmlspecialchars($d['deskripsi']); ?></div></td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-warning border-0" data-bs-toggle="modal" data-bs-target="#editModal<?= $d['id']; ?>">
                                                <i class='bx bx-edit-alt fs-5'></i>
                                            </button>
                                            <a href="project_data.php?hapus=<?= $d['id']; ?>" class="btn btn-sm btn-outline-danger border-0" onclick="return confirm('Hapus project ini?')">
                                                <i class='bx bx-trash fs-5'></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="editModal<?= $d['id']; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header border-bottom">
                                                <h5 class="modal-title fw-bold text-primary">Edit Project</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-start p-4">
                                                <form action="" method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" value="<?= $d['id']; ?>">
                                                    <div class="row g-3">
                                                        <div class="col-md-12">
                                                            <label class="form-label small fw-bold">Nama Project</label>
                                                            <input type="text" name="nama_project" class="form-control" value="<?= htmlspecialchars($d['nama_project']); ?>" required>
                                                        </div>
                                                        <div class="col-12">
                                                            <label class="form-label small fw-bold">Deskripsi Singkat</label>
                                                            <textarea name="deskripsi" class="form-control" rows="4" required><?= htmlspecialchars($d['deskripsi']); ?></textarea>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="form-label small fw-bold">Ganti Gambar <small class="text-muted">(Kosongkan jika tidak ganti)</small></label>
                                                            <div class="mb-2"><img src="assets/img/<?= $d['foto']; ?>" width="120" class="rounded shadow-sm"></div>
                                                            <input type="file" name="gambar" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer border-0 px-0 pb-0 mt-4">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" name="update_project" class="btn btn-primary px-4">Update Project</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php endwhile; ?>
                                <?php if(mysqli_num_rows($data) == 0): ?>
                                <tr><td colspan="4" class="text-center py-5 text-muted small">Belum ada data project.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>