<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "auth/proteksi.php"; 
include "../koneksi.php";

// Mendapatkan nama file saat ini untuk class 'active'
$current_page = basename($_SERVER['PHP_SELF']);

// Query untuk mengambil data about
$query = mysqli_query($koneksi, "SELECT * FROM about LIMIT 1");
$cek = mysqli_num_rows($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Manajemen About | Sneat Admin</title>
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
        .card-header { background-color: white !important; border-bottom: 1px solid #e3e6f0; }
        .info-label { font-weight: 600; color: #4e73df; min-width: 100px; display: inline-block; }
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
            <h4 class="fw-bold">Halaman / <span class="text-muted">Manajemen About</span></h4>
            <div class="d-flex gap-2">
                <?php if($cek == 0): ?>
                    <a href="about_tambah.php" class="btn btn-primary btn-sm px-3 shadow-sm"><i class='bx bx-plus'></i> Tambah Data</a>
                <?php endif; ?>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header py-3">
                <h6 class="m-0 fw-bold text-primary">Data Profil About Me</h6>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0 align-middle">
                        <thead>
                            <tr>
                                <th class="ps-4">INFO PROFIL</th>
                                <th width="150">FOTO</th>
                                <th class="text-center" width="200">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($cek > 0): 
                                $row = mysqli_fetch_array($query); ?>
                            <tr>
                                <td class="ps-4 py-4">
                                    <div class="mb-2"><span class="info-label">Judul:</span> <span class="text-dark fw-bold"><?= $row['judul'] ?? '-'; ?></span></div>
                                    <div class="mb-1 small"><span class="info-label">Tgl Lahir:</span> <?= $row['tgl_lahir'] ?? '-'; ?></div>
                                    <div class="mb-1 small"><span class="info-label">Hobi:</span> <?= $row['hobi'] ?? '-'; ?></div>
                                    <div class="text-muted mt-3" style="max-width: 500px; font-size: 0.85rem; line-height: 1.5;">
                                        <strong class="text-dark">Tentang:</strong><br>
                                        <?= nl2br(htmlspecialchars(substr($row['deskripsi'] ?? '', 0, 250))); ?>...
                                    </div>
                                </td>
                                <td>
                                    <?php 
                                    $path_foto = "assets/img/" . ($row['foto'] ?? '');
                                    if (!empty($row['foto']) && file_exists($path_foto)): ?>
                                        <img src="<?= $path_foto; ?>?t=<?= time(); ?>" class="rounded shadow-sm border" width="100" height="100" style="object-fit: cover;">
                                    <?php else: ?>
                                        <div class="bg-light d-flex align-items-center justify-content-center rounded border shadow-sm" style="width: 100px; height: 100px;">
                                            <i class='bx bx-user text-muted' style="font-size: 2.5rem;"></i>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group gap-2">
                                        <a href="about_edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm px-3">
                                            <i class='bx bx-edit'></i> Edit
                                        </a>
                                        <a href="about_hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm px-3" onclick="return confirm('Yakin ingin menghapus data profil ini?')">
                                            <i class='bx bx-trash'></i> Hapus
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php else: ?>
                            <tr>
                                <td colspan="3" class="text-center py-5 text-muted">
                                    <i class='bx bx-info-circle fs-2 d-block mb-2'></i>
                                    Data profil belum tersedia.
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>