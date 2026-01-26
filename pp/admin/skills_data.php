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

// Proses Simpan Skill
if (isset($_POST['tambah'])) {
    $nama_skill = mysqli_real_escape_string($koneksi, $_POST['nama_skill']);
    $persen = mysqli_real_escape_string($koneksi, $_POST['persen']);

    $insert = mysqli_query($koneksi, "INSERT INTO skills (nama_skill, persen) VALUES ('$nama_skill', '$persen')");
    if ($insert) {
        echo "<script>alert('Skill berhasil ditambahkan!'); window.location='skills_data.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan skill');</script>";
    }
}

// Proses Update Skill (Modal)
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama_skill = mysqli_real_escape_string($koneksi, $_POST['nama_skill']);
    $persen = mysqli_real_escape_string($koneksi, $_POST['persen']);

    $update = mysqli_query($koneksi, "UPDATE skills SET nama_skill = '$nama_skill', persen = '$persen' WHERE id = '$id'");
    if ($update) {
        echo "<script>alert('Skill berhasil diperbarui!'); window.location='skills_data.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui skill');</script>";
    }
}

// Proses Hapus Skill
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $delete = mysqli_query($koneksi, "DELETE FROM skills WHERE id = '$id'");
    if ($delete) {
        echo "<script>alert('Skill berhasil dihapus!'); window.location='skills_data.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Manajemen Skills | Sneat Admin</title>
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
        .card-header { border-bottom: 1px solid rgba(0,0,0,.125); }
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
            <h4 class="fw-bold">Halaman / <span class="text-muted">Manajemen Skills</span></h4>
        </div>

        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white fw-bold py-3">Tambah Skill Baru</div>
            <div class="card-body p-4">
                <form action="" method="POST" class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nama Skill</label>
                        <input type="text" name="nama_skill" class="form-control" placeholder="Contoh: PHP & MySQL" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Progress (%)</label>
                        <input type="number" name="persen" class="form-control" placeholder="1-100" min="1" max="100" required>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" name="tambah" class="btn btn-primary w-100 fw-bold">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0 align-middle">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4 py-3">NAMA SKILL</th>
                                <th class="py-3">PROGRESS KEMAMPUAN</th>
                                <th class="text-center py-3">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = mysqli_query($koneksi, "SELECT * FROM skills ORDER BY id DESC");
                            if(mysqli_num_rows($sql) > 0):
                                while($row = mysqli_fetch_array($sql)):
                            ?>
                            <tr>
                                <td class="ps-4 fw-bold text-dark"><?= htmlspecialchars($row['nama_skill']); ?></td>
                                <td style="width: 50%;">
                                    <div class="d-flex align-items-center">
                                        <div class="progress w-100 me-3" style="height: 10px; border-radius: 10px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: <?= $row['persen']; ?>%; border-radius: 10px;"></div>
                                        </div>
                                        <span class="small fw-bold text-primary"><?= $row['persen']; ?>%</span>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group gap-1">
                                        <button type="button" class="btn btn-outline-warning btn-sm border-0" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id']; ?>">
                                            <i class='bx bx-edit-alt fs-5'></i>
                                        </button>
                                        <a href="?hapus=<?= $row['id']; ?>" class="btn btn-outline-danger btn-sm border-0" onclick="return confirm('Yakin ingin menghapus skill ini?')"><i class='bx bx-trash fs-5'></i></a>
                                    </div>
                                </td>
                            </tr>

                            <div class="modal fade" id="editModal<?= $row['id']; ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header border-0 pb-0">
                                            <h5 class="modal-title fw-bold text-primary">Edit Skill</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="" method="POST">
                                            <div class="modal-body p-4">
                                                <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Nama Skill</label>
                                                    <input type="text" name="nama_skill" class="form-control" value="<?= htmlspecialchars($row['nama_skill']); ?>" required>
                                                </div>
                                                <div class="mb-0">
                                                    <label class="form-label fw-semibold">Progress (%)</label>
                                                    <input type="number" name="persen" class="form-control" value="<?= $row['persen']; ?>" min="1" max="100" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer border-0 pt-0">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" name="update" class="btn btn-primary px-4 fw-bold">Update Skill</button>
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
                                <td colspan="3" class="text-center py-5 text-muted">Belum ada data skill.</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>