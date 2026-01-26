<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "auth/proteksi.php"; 
include "../koneksi.php";

$current_page = basename($_SERVER['PHP_SELF']);

// Logika: Tandai sudah baca jika di halaman ini
if ($current_page == 'pesan_masuk.php') {
    mysqli_query($koneksi, "UPDATE pesan SET status = 1 WHERE status = 0");
}

// Hitung pesan baru untuk bubble (notif WA)
$query_count = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM pesan WHERE status = 0");
$data_count = mysqli_fetch_assoc($query_count);
$pesan_baru = $data_count['total'];

if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM pesan WHERE id='$id'");
    header("location:pesan_masuk.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Pesan Masuk | Sneat Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <style>
        :root { --primary-blue: #4e73df; }
        body { background-color: #f8f9fc; font-family: 'Inter', sans-serif; overflow-x: hidden; }
        .sidebar { min-height: 100vh; background: white; border-right: 1px solid #e3e6f0; width: 280px; position: fixed; z-index: 1000; }
        .main-content { margin-left: 280px; width: calc(100% - 280px); min-height: 100vh; padding: 40px; }
        .nav-link { color: #6e707e; font-weight: 500; padding: 1rem 1.5rem; border-radius: 8px; margin-bottom: 5px; display: flex; align-items: center; text-decoration: none; justify-content: space-between; }
        .nav-link div { display: flex; align-items: center; }
        .nav-link:hover, .nav-link.active { background: rgba(78, 115, 223, 0.1); color: var(--primary-blue) !important; }
        .nav-link i { font-size: 1.25rem; margin-right: 1rem; }
        .card { border: none; box-shadow: 0 0.5rem 2rem 0 rgba(58, 59, 120, 0.1); border-radius: 15px; }
        .card-header { background-color: white; border-bottom: 1px solid #e3e6f0; }
        .table thead th { background-color: #f8f9fc; color: #4e73df; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em; }
        
        /* Notif Bubble Style */
        .badge-wa { font-size: 0.7rem; padding: 0.35em 0.6em; border-radius: 50%; background-color: #e74a3b; color: white; }
        /* Geser Pesan ke Kanan sedikit */
        .col-pesan { padding-left: 40px !important; cursor: pointer; }
    </style>
</head>
<body>

<div class="d-flex">
    <div class="sidebar p-4 d-none d-md-block">
        <h3 class="text-primary fw-bold mb-5 ps-2">Sneat Admin</h3>
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link <?= ($current_page == 'index.php') ? 'active' : ''; ?>" href="index.php"><div><i class="bx bx-home-circle"></i> Dashboard</div></a></li>
            <li class="nav-item"><a class="nav-link <?= ($current_page == 'blog_data.php') ? 'active' : ''; ?>" href="blog_data.php"><div><i class="bx bx-layout"></i> Manajemen Blog</div></a></li>
            <li class="nav-item">
                <a class="nav-link <?= ($current_page == 'pesan_masuk.php') ? 'active' : ''; ?>" href="pesan_masuk.php">
                    <div><i class="bx bx-envelope"></i> Pesan Masuk</div>
                    <?php if($pesan_baru > 0): ?>
                        <span class="badge-wa"><?= $pesan_baru; ?></span>
                    <?php endif; ?>
                </a>
            </li>
            <li class="nav-item"><a class="nav-link <?= ($current_page == 'project_data.php') ? 'active' : ''; ?>" href="project_data.php"><div><i class="bx bx-rocket"></i> Manajemen Project</div></a></li>
            <li class="nav-item"><a class="nav-link <?= ($current_page == 'about_data.php') ? 'active' : ''; ?>" href="about_data.php"><div><i class="bx bx-user"></i> Manajemen about</div></a></li>
            <li class="nav-item"><a class="nav-link <?= ($current_page == 'skills_data.php') ? 'active' : ''; ?>" href="skills_data.php"><div><i class="bx bx-code-alt"></i> Manajemen Skills</div></a></li>
            <li class="nav-item"><a class="nav-link <?= ($current_page == 'education_data.php') ? 'active' : ''; ?>" href="education_data.php"><div><i class="bx bx-book"></i> Manajemen Education</div></a></li>
            <hr class="my-4">
            <li class="nav-item"><a class="nav-link text-danger" href="auth/logout.php"><div><i class="bx bx-log-out"></i> Logout</div></a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold">Halaman / <span class="text-muted">Pesan Masuk</span></h4>
        </div>

        <div class="card shadow-sm">
            <div class="card-header py-3">
                <h6 class="m-0 fw-bold text-primary">Daftar Pesan Pengunjung</h6>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th class="ps-4" width="50">NO</th>
                                <th width="180">NAMA</th>
                                <th width="180">EMAIL</th>
                                <th class="col-pesan">PESAN</th>
                                <th width="180">TANGGAL</th>
                                <th class="text-center" width="100">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $query = mysqli_query($koneksi, "SELECT * FROM pesan ORDER BY id DESC");
                            while($d = mysqli_fetch_array($query)){
                                $isi = isset($d['isi_pesan']) ? $d['isi_pesan'] : (isset($d['pesan']) ? $d['pesan'] : '-');
                            ?>
                            <tr>
                                <td class="ps-4 text-muted"><?= $no++; ?></td>
                                <td><span class="fw-bold text-dark"><?= htmlspecialchars($d['nama']); ?></span></td>
                                <td><a href="mailto:<?= $d['email']; ?>" class="text-decoration-none"><?= htmlspecialchars($d['email']); ?></a></td>
                                <td class="col-pesan" data-bs-toggle="modal" data-bs-target="#viewMsg<?= $d['id']; ?>">
                                    <div style="max-width: 350px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" class="text-muted">
                                        <?= htmlspecialchars($isi); ?>
                                    </div>
                                </td>
                                <td><small class="badge bg-light text-dark fw-normal border"><?= $d['tanggal']; ?></small></td>
                                <td class="text-center">
                                    <a href="pesan_masuk.php?hapus=<?= $d['id']; ?>" class="btn btn-sm btn-outline-danger border-0" onclick="return confirm('Hapus pesan ini?')">
                                        <i class="bx bx-trash fs-5"></i>
                                    </a>
                                </td>
                            </tr>

                            <div class="modal fade" id="viewMsg<?= $d['id']; ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-0 shadow">
                                        <div class="modal-header">
                                            <h5 class="modal-title fw-bold text-primary">Detail Pesan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <p class="mb-1 text-muted small">Dari:</p>
                                            <p class="fw-bold mb-0"><?= htmlspecialchars($d['nama']); ?></p>
                                            <p class="text-muted small mb-3"><?= htmlspecialchars($d['email']); ?></p>
                                            <hr>
                                            <p class="mb-1 text-muted small">Isi Pesan:</p>
                                            <div class="p-3 bg-light rounded" style="white-space: pre-wrap;"><?= htmlspecialchars($isi); ?></div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php } ?>
                            <?php if(mysqli_num_rows($query) == 0): ?>
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">Belum ada pesan masuk.</td>
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