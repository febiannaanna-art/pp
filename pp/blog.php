<?php
include "koneksi.php"; 

$sort = isset($_GET['urut']) ? $_GET['urut'] : 'DESC';

// Query Blog
$sql_blog = mysqli_query($koneksi, "SELECT * FROM blog ORDER BY tanggal $sort");

// Query About untuk Judul/Nama
$query_about = mysqli_query($koneksi, "SELECT * FROM about LIMIT 1");
$about = mysqli_fetch_array($query_about);

// Penanganan jika data about kosong
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | <?= $nama_web; ?></title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8f9fa; color: #2d3436; }
        .navbar { background: #ffffff !important; box-shadow: 0 2px 10px rgba(0,0,0,0.0); }
        .navbar-brand, .nav-link { color: #2d3436 !important; font-weight: 600; }
        .nav-link:hover { color: #4e73df !important; }
        .img-wrapper { width: 100%; height: 210px; overflow: hidden; border-radius: 20px 20px 0 0; }
        .img-wrapper img { width: 100%; height: 100%; object-fit: cover; }
        .card-blog { border: none; border-radius: 20px; transition: 0.3s; height: 100%; background: #fff; }
        .card-blog:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important; }
        .card-body { padding: 1.5rem; display: flex; flex-direction: column; }
        .blog-title { font-weight: 500 !important; color: #333; font-size: 1.1rem; line-height: 1.4; margin-top: 10px; }
        .btn-detail { border-radius: 10px; font-weight: 500; }
    </style>
</head>
<body>

<?php include 'partials/navbar.php'; ?>

<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">My Blog</h2>
        <p class="text-muted">Kumpulan cerita dan pengalaman industri</p>
        <div style="width: 50px; height: 3px; background: #4e73df; margin: 10px auto;"></div>
    </div>

    <div class="d-flex justify-content-end mb-4">
        <form method="GET" class="d-flex align-items-center bg-white p-1 rounded-3 shadow-sm">
            <span class="ms-2 me-2 small text-muted">Urutkan:</span>
            <select name="urut" class="form-select form-select-sm border-0" onchange="this.form.submit()" style="cursor:pointer;">
                <option value="DESC" <?= $sort == 'DESC' ? 'selected' : '' ?>>Terbaru</option>
                <option value="ASC" <?= $sort == 'ASC' ? 'selected' : '' ?>>Terlama</option>
            </select>
        </form>
    </div>

    <div class="row g-4">
        <?php while($b = mysqli_fetch_array($sql_blog)) : ?>
        <div class="col-lg-4 col-md-6 d-flex"> 
            <div class="card card-blog shadow-sm w-100">
                <div class="img-wrapper">
                    <img src="admin/assets/img/<?= $b['gambar']; ?>?t=<?= time(); ?>" onerror="this.src='https://via.placeholder.com/400x250'">
                </div>
                
                <div class="card-body">
                    <div class="d-flex gap-3 mb-2">
                        <small class="text-muted"><i class='bx bx-calendar text-primary'></i> <?= date('d M Y', strtotime($b['tanggal'])); ?></small>
                        <small class="text-muted"><i class='bx bx-user text-primary'></i> <?= $b['penulis']; ?></small>
                    </div>

                    <h5 class="blog-title"><?= $b['judul']; ?></h5>
                    
                    <p class="text-muted small my-3">
                        <?= substr(strip_tags($b['isi']), 0, 90); ?>...
                    </p>
                    
                    <div class="mt-auto text-start"> 
                        <a href="blog_detail.php?id=<?= $b['id']; ?>" class="btn btn-outline-primary btn-sm px-4 rounded-pill fw-bold">Detail</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<?php include 'partials/footer.php'; ?>

</body>
</html>