<?php
include "koneksi.php";

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM blog WHERE id = '$id'");
$data = mysqli_fetch_array($query);

if (!$data) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?> | Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    
    <style>
        .content-body table {
            width: 100% !important;
            border-collapse: collapse;
            margin: 20px 0;
        }
        .content-body table th, 
        .content-body table td {
            border: 1px solid #dee2e6 !important; /* Memberikan garis pada tabel */
            padding: 12px;
        }
        .content-body table th {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        .content-body img {
            max-width: 100%; 
            height: auto;
            border-radius: 8px;
        }
        .content-body ul, .content-body ol {
            padding-left: 20px; 
        }
    </style>
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <a href="index.php#blog" class="btn btn-primary mb-4 shadow-sm">
                <i class='bx bx-arrow-back'></i> Kembali ke Beranda
            </a>

            <div class="card border-0 shadow-sm p-4 p-md-5" style="border-radius: 15px;">
                <h1 class="fw-bold mb-2"><?= $data['judul']; ?></h1>
                
                <div class="text-muted mb-4 small">
                    <span><i class='bx bx-calendar'></i> <?= $data['tanggal']; ?></span>
                    <span class="ms-3"><i class='bx bx-user'></i> <?= $data['penulis']; ?></span>
                </div>

                <img src="admin/assets/img/<?= $data['gambar']; ?>" class="img-fluid rounded shadow-sm mb-4" style="width: 100%; max-height: 450px; object-fit: cover;">
                
                <div class="content-body lh-lg" style="text-align: justify; color: #444;">
                    <?= $data['isi']; ?>
                </div>
            </div>

          <h4 class="fw-bold mt-5 mb-3">Artikel Terkait</h4>
<div class="row g-4">
    <?php
    $terkait = mysqli_query($koneksi, "SELECT * FROM blog WHERE id != '$id' LIMIT 3");
    while($t = mysqli_fetch_array($terkait)) :
    ?>
    <div class="col-md-4 d-flex"> <div class="card border-0 shadow-sm w-100" style="border-radius: 15px; overflow: hidden; display: flex; flex-direction: column;">
            <img src="admin/assets/img/<?= $t['gambar']; ?>" class="card-img-top" style="height: 150px; object-fit: cover;">
            
            <div class="card-body p-3 d-flex flex-column">
                <h6 class="mb-1 text-uppercase" style="font-size: 0.85rem;"><?= $t['judul']; ?></h6>
                <p class="text-muted small mb-3" style="font-size: 0.75rem;"><?= $t['tanggal']; ?></p>
                
                <div class="mt-auto"> <a href="blog_detail.php?id=<?= $t['id']; ?>" class="btn btn-outline-primary btn-sm rounded-pill fw-bold px-4">Detail</a>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>
        </div>
    </div>
</div>

</body>
</html>