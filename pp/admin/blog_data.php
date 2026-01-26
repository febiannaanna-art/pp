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

// --- LOGIKA SEARCH & ENTRIES ---
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 3;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $limit) - $limit : 0;

$search = isset($_GET['search']) ? mysqli_real_escape_string($koneksi, $_GET['search']) : '';
$where_clause = $search ? "WHERE judul LIKE '%$search%' OR penulis LIKE '%$search%'" : "";

$data = mysqli_query($koneksi, "SELECT * FROM blog $where_clause");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $limit);

// --- PROSES UPDATE ARTIKEL (MODAL) ---
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $penulis = mysqli_real_escape_string($koneksi, $_POST['penulis']);
    $tanggal = $_POST['tanggal'];
    $isi = mysqli_real_escape_string($koneksi, $_POST['isi']);
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    if($gambar != ""){
        // Ambil nama gambar lama untuk dihapus
        $query_lama = mysqli_query($koneksi, "SELECT gambar FROM blog WHERE id='$id'");
        $d_lama = mysqli_fetch_array($query_lama);
        if(file_exists("assets/img/".$d_lama['gambar'])){
            unlink("assets/img/".$d_lama['gambar']);
        }
        move_uploaded_file($tmp, "assets/img/".$gambar);
        mysqli_query($koneksi, "UPDATE blog SET judul='$judul', tanggal='$tanggal', penulis='$penulis', isi='$isi', gambar='$gambar' WHERE id='$id'");
    } else {
        mysqli_query($koneksi, "UPDATE blog SET judul='$judul', tanggal='$tanggal', penulis='$penulis', isi='$isi' WHERE id='$id'");
    }
    header("location:blog_data.php");
}

if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM blog WHERE id='$id'");
    header("location:blog_data.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Manajemen Blog | Sneat Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <style>
        :root { --primary-blue: #4e73df; }
        body { background-color: #f8f9fc; font-family: 'Inter', sans-serif; overflow-x: hidden; }
        .sidebar { min-height: 100vh; background: white; border-right: 1px solid #e3e6f0; width: 280px; position: fixed; z-index: 1000; }
        .main-content { margin-left: 280px; width: calc(100% - 280px); min-height: 100vh; padding: 40px; }
        .nav-link { color: #6e707e; font-weight: 500; padding: 1rem 1.5rem; border-radius: 8px; margin-bottom: 5px; display: flex; align-items: center; text-decoration: none; }
        .nav-link:hover, .nav-link.active { background: rgba(78, 115, 223, 0.1); color: var(--primary-blue) !important; }
        .nav-link i { font-size: 1.25rem; margin-right: 1rem; }
        .card { border: none; box-shadow: 0 0.5rem 2rem 0 rgba(58, 59, 120, 0.1); border-radius: 15px; }
        .card-header { background-color: white; border-bottom: 1px solid #e3e6f0; border-radius: 15px 15px 0 0 !important; }
        .table thead th { background-color: #f8f9fc; color: #4e73df; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.05em; border: none; }
        .pagination .page-link { color: var(--primary-blue); border: none; margin: 0 2px; border-radius: 5px; }
        .pagination .page-item.active .page-link { background-color: var(--primary-blue); color: white; }
        .ck-editor__editable { min-height: 200px !important; }
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
        <div class="container-fluid">
            <div class="card mb-4">
                <div class="card-header py-3"><h5 class="m-0 fw-bold text-primary">Tambah Artikel Blog Baru</h5></div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="proses_tambah_blog.php">
                        <div class="row g-3">
                            <div class="col-md-6"><label class="form-label fw-bold">Judul</label><input type="text" name="judul" class="form-control" required></div>
                            <div class="col-md-3"><label class="form-label fw-bold">Penulis</label><input type="text" name="penulis" class="form-control" required></div>
                            <div class="col-md-3"><label class="form-label fw-bold">Tanggal</label><input type="date" name="tanggal" class="form-control" required></div>
                            <div class="col-12"><label class="form-label fw-bold">Isi Artikel</label><textarea name="isi" id="editor" class="form-control"></textarea></div>
                            <div class="col-md-6"><label class="form-label fw-bold">Gambar Sampul</label><input type="file" name="gambar" class="form-control" required></div>
                            <div class="col-12 text-end"><button type="submit" name="tambah" class="btn btn-primary px-5 py-2 fw-bold">Simpan Artikel</button></div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header py-3"><h5 class="m-0 fw-bold text-primary">Daftar Artikel Blog</h5></div>
                <div class="card-body">
                    <form method="GET" class="row mb-3 align-items-center">
                        <div class="col-md-6 d-flex align-items-center">
                            <label class="me-2 small">Show</label>
                            <select name="limit" class="form-select form-select-sm" style="width: auto;" onchange="this.form.submit()">
                                <option value="3" <?= ($limit == 3) ? 'selected' : ''; ?>>3</option>
                                <option value="5" <?= ($limit == 5) ? 'selected' : ''; ?>>5</option>
                                <option value="10" <?= ($limit == 10) ? 'selected' : ''; ?>>10</option>
                            </select>
                            <label class="ms-2 small">entries</label>
                        </div>
                        <div class="col-md-6 text-end">
                            <div class="input-group input-group-sm justify-content-end">
                                <span class="input-group-text bg-white border-end-0"><i class="bx bx-search"></i></span>
                                <input type="text" name="search" class="form-control border-start-0" placeholder="Search..." value="<?= $search; ?>" style="max-width: 200px;">
                                <button type="submit" class="btn btn-primary btn-sm">Cari</button>
                            </div>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th class="ps-3">Gambar</th>
                                    <th>Judul Artikel</th>
                                    <th>Penulis</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM blog $where_clause ORDER BY id DESC LIMIT $halaman_awal, $limit");
                                if(mysqli_num_rows($query) > 0){
                                    while($d = mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <td class="ps-3"><img src="assets/img/<?= $d['gambar']; ?>" width="60" height="60" class="rounded shadow-sm" style="object-fit: cover;"></td>
                                    <td>
                                        <div class="fw-bold text-dark"><?= $d['judul']; ?></div>
                                        <small class="text-muted"><?= date('d M Y', strtotime($d['tanggal'])); ?></small>
                                    </td>
                                    <td><span class="badge bg-light text-dark fw-normal"><?= $d['penulis']; ?></span></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-outline-warning border-0" data-bs-toggle="modal" data-bs-target="#editModal<?= $d['id']; ?>">
                                            <i class="bx bx-edit-alt fs-5"></i>
                                        </button>
                                        <a href="blog_data.php?hapus=<?= $d['id']; ?>" class="btn btn-sm btn-outline-danger border-0" onclick="return confirm('Hapus artikel ini?')"><i class="bx bx-trash fs-5"></i></a>
                                    </td>
                                </tr>

                                <div class="modal fade" id="editModal<?= $d['id']; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header border-bottom py-3">
                                                <h5 class="modal-title fw-bold text-primary">Edit Artikel Blog</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-start">
                                                <form method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" value="<?= $d['id']; ?>">
                                                    <div class="row g-3">
                                                        <div class="col-md-12"><label class="form-label fw-bold">Judul</label><input type="text" name="judul" class="form-control" value="<?= $d['judul']; ?>" required></div>
                                                        <div class="col-md-6"><label class="form-label fw-bold">Penulis</label><input type="text" name="penulis" class="form-control" value="<?= $d['penulis']; ?>" required></div>
                                                        <div class="col-md-6"><label class="form-label fw-bold">Tanggal</label><input type="date" name="tanggal" class="form-control" value="<?= $d['tanggal']; ?>" required></div>
                                                        <div class="col-12"><label class="form-label fw-bold">Isi Artikel</label><textarea name="isi" class="form-control editor-modal"><?= $d['isi']; ?></textarea></div>
                                                        <div class="col-md-12">
                                                            <label class="form-label fw-bold">Ganti Gambar <small class="text-muted">(Kosongkan jika tidak ganti)</small></label>
                                                            <div class="mb-2"><img src="assets/img/<?= $d['gambar']; ?>" width="100" class="rounded"></div>
                                                            <input type="file" name="gambar" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer border-0 px-0 pb-0 mt-4">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" name="update" class="btn btn-primary px-4">Update Artikel</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php 
                                    } 
                                } else {
                                    echo "<tr><td colspan='4' class='text-center py-4 text-muted'>Data tidak ditemukan.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="card-footer bg-white py-3 border-top">
                    <div class="row align-items-center">
                        <div class="col-md-6 text-muted small">
                            <?php 
                                $start = ($jumlah_data > 0) ? $halaman_awal + 1 : 0;
                                $end = min($halaman_awal + $limit, $jumlah_data);
                            ?>
                            Showing <?= $start; ?> to <?= $end; ?> of <?= $jumlah_data; ?> entries
                        </div>
                        <div class="col-md-6">
                            <nav>
                                <ul class="pagination pagination-sm justify-content-end mb-0">
                                    <li class="page-item <?= ($halaman <= 1) ? 'disabled' : ''; ?>">
                                        <a class="page-link" href="?halaman=<?= $halaman - 1; ?>&limit=<?= $limit; ?>&search=<?= $search; ?>"><i class='bx bx-chevron-left'></i></a>
                                    </li>
                                    <?php for($x=1; $x<=$total_halaman; $x++): ?>
                                        <li class="page-item <?= ($halaman == $x) ? 'active' : ''; ?>">
                                            <a class="page-link" href="?halaman=<?= $x; ?>&limit=<?= $limit; ?>&search=<?= $search; ?>"><?= $x; ?></a>
                                        </li>
                                    <?php endfor; ?>
                                    <li class="page-item <?= ($halaman >= $total_halaman) ? 'disabled' : ''; ?>">
                                        <a class="page-link" href="?halaman=<?= $halaman + 1; ?>&limit=<?= $limit; ?>&search=<?= $search; ?>"><i class='bx bx-chevron-right'></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // CKEditor untuk Form Tambah
    ClassicEditor.create(document.querySelector('#editor')).catch(error => { console.error(error); });

    // CKEditor untuk Form Modal Edit
    document.querySelectorAll('.editor-modal').forEach(node => {
        ClassicEditor.create(node).catch(error => { console.error(error); });
    });
</script>
</body>
</html>