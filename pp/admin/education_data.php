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

// Mendapatkan nama file saat ini untuk class 'active'
$current_page = basename($_SERVER['PHP_SELF']);

// Proses Simpan Education
if (isset($_POST['simpan_edu'])) {
    $tahun = mysqli_real_escape_string($koneksi, $_POST['tahun']);
    $sekolah = mysqli_real_escape_string($koneksi, $_POST['sekolah']);
    $jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);

    $insert = mysqli_query($koneksi, "INSERT INTO education (tahun, sekolah, jurusan) VALUES ('$tahun', '$sekolah', '$jurusan')");
    if ($insert) {
        header("location:education_data.php");
    }
}

// Proses Update Education (Modal)
if (isset($_POST['update_edu'])) {
    $id = $_POST['id'];
    $tahun = mysqli_real_escape_string($koneksi, $_POST['tahun']);
    $sekolah = mysqli_real_escape_string($koneksi, $_POST['sekolah']);
    $jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);

    $update = mysqli_query($koneksi, "UPDATE education SET tahun='$tahun', sekolah='$sekolah', jurusan='$jurusan' WHERE id='$id'");
    if ($update) {
        header("location:education_data.php");
    }
}

// Proses Hapus Education
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM education WHERE id = '$id'");
    header("location:education_data.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Manajemen Education | Sneat Admin</title>
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
            <h4 class="fw-bold">Halaman / <span class="text-muted">Manajemen Education</span></h4>
        </div>

        <div class="col-md-12"> 
            <div class="card shadow-sm mb-4">
                <div class="card-header py-3"><h6 class="m-0 fw-bold">Tambah Riwayat Pendidikan Baru</h6></div>
                <div class="card-body p-4">
                    <form method="POST">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label class="form-label small fw-bold">Tahun</label>
                                <input type="text" name="tahun" class="form-control" placeholder="Contoh: 2020 - 2023" required>
                            </div>
                            <div class="col-md-5">
                                <label class="form-label small fw-bold">Nama Sekolah / Instansi</label>
                                <input type="text" name="sekolah" class="form-control" placeholder="Nama sekolah..." required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small fw-bold">Jurusan / Keterangan</label>
                                <input type="text" name="jurusan" class="form-control" placeholder="Contoh: Teknik Informatika" required>
                            </div>
                            <div class="col-12 text-end">
                                <button type="submit" name="simpan_edu" class="btn btn-primary px-4 shadow-sm">Simpan Pendidikan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header py-3"><h6 class="m-0 fw-bold">Daftar Riwayat Pendidikan</h6></div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th class="ps-4">TAHUN</th>
                                    <th>SEKOLAH</th>
                                    <th>JURUSAN</th>
                                    <th class="text-center" width="120">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM education ORDER BY id DESC");
                                if(mysqli_num_rows($query) > 0):
                                    while($d = mysqli_fetch_array($query)):
                                ?>
                                <tr>
                                    <td class="ps-4"><span class="fw-bold text-primary"><?= htmlspecialchars($d['tahun']); ?></span></td>
                                    <td><span class="fw-bold text-dark"><?= htmlspecialchars($d['sekolah']); ?></span></td>
                                    <td class="text-muted"><?= htmlspecialchars($d['jurusan']); ?></td>
                                    <td class="text-center">
                                        <div class="btn-group gap-1">
                                            <button type="button" class="btn btn-outline-warning btn-sm border-0" data-bs-toggle="modal" data-bs-target="#editModal<?= $d['id']; ?>">
                                                <i class="bx bx-edit-alt fs-5"></i>
                                            </button>
                                            <a href="education_data.php?hapus=<?= $d['id']; ?>" class="btn btn-outline-danger btn-sm border-0" onclick="return confirm('Hapus riwayat pendidikan ini?')"><i class="bx bx-trash fs-5"></i></a>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="editModal<?= $d['id']; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title fw-bold text-primary">Edit Riwayat Pendidikan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="POST">
                                                <div class="modal-body p-4 text-start">
                                                    <input type="hidden" name="id" value="<?= $d['id']; ?>">
                                                    <div class="mb-3">
                                                        <label class="form-label small fw-bold">Tahun</label>
                                                        <input type="text" name="tahun" class="form-control" value="<?= htmlspecialchars($d['tahun']); ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label small fw-bold">Nama Sekolah / Instansi</label>
                                                        <input type="text" name="sekolah" class="form-control" value="<?= htmlspecialchars($d['sekolah']); ?>" required>
                                                    </div>
                                                    <div class="mb-0">
                                                        <label class="form-label small fw-bold">Jurusan / Keterangan</label>
                                                        <input type="text" name="jurusan" class="form-control" value="<?= htmlspecialchars($d['jurusan']); ?>" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer border-0">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" name="update_edu" class="btn btn-primary">Update Data</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <?php 
                                    endwhile; 
                                else:
                                ?>
                                <tr>
                                    <td colspan="4" class="text-center py-5 text-muted">Belum ada data riwayat pendidikan.</td>
                                </tr>
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