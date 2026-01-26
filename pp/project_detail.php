<?php
$koneksi = mysqli_connect("localhost", "root", "", "pp");

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM projects WHERE id='$id'");
$p = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Project | <?= $p['nama_project']; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f4f7fe; }
        .detail-card { border-radius: 25px; border: none; overflow: hidden; }
        .btn-back { border-radius: 12px; padding: 10px 25px; font-weight: 600; }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card detail-card shadow-sm">
                    <img src="admin/assets/img/<?= $p['foto']; ?>" class="img-fluid w-100" alt="<?= $p['nama_project']; ?>" style="max-height: 500px; object-fit: cover;">
                    
                    <div class="card-body p-4 p-md-5">
                        <h2 class="fw-bold mb-3"><?= $p['nama_project']; ?></h2>
                        <hr class="mb-4">
                        <p class="text-secondary" style="line-height: 1.8; text-align: justify;">
                            <?= nl2br($p['deskripsi']); ?>
                        </p>
                        <div class="mt-5">
                            <a href="index.php#projects" class="btn btn-primary btn-back">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>