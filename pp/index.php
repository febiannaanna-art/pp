<?php
include "koneksi.php"; 

$query_about = mysqli_query($koneksi, "SELECT * FROM about LIMIT 1");
$about = mysqli_fetch_array($query_about);

$sql_blog = mysqli_query($koneksi, "SELECT * FROM blog ORDER BY id DESC LIMIT 3");

// Inisialisasi status pesan
$pesan_terkirim = false;
if (isset($_GET['status']) && $_GET['status'] == 'sukses') {
    $pesan_terkirim = true;
}

if (isset($_POST['kirim_pesan'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']); 
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $pesan = mysqli_real_escape_string($koneksi, $_POST['pesan']);
    $tanggal = date('Y-m-d H:i:s');

    $query = mysqli_query($koneksi, "INSERT INTO pesan (nama, email, isi_pesan, tanggal) VALUES ('$nama', '$email', '$pesan', '$tanggal')");    
    
    if ($query) {
        // Alihkan kembali ke halaman index dengan parameter sukses
        header("Location: index.php?status=sukses#contact");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title> 
    <base href="http://localhost/pp/pp/">
    <link rel="stylesheet" href="Flat-1.0.0/assets/css/bootstrap-5.0.0-alpha-2.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f4f7fe; color: #2d3436; }
        section { padding: 80px 0; }
        .section-title { text-align: center; margin-bottom: 60px; }
        .section-title h3 { font-weight: 800; font-size: 2.5rem; color: #1e272e; position: relative; display: inline-block; }
        .section-title h3::after { content: ''; position: absolute; width: 60px; height: 5px; background: #4e73df; bottom: -15px; left: 50%; transform: translateX(-50%); border-radius: 10px; }
        .modern-card { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.5); border-radius: 25px; padding: 30px; box-shadow: 0 10px 40px rgba(0,0,0,0.04); transition: all 0.3s ease; height: 100%; }
        .progress { height: 12px; border-radius: 20px; background: #dfe6e9; margin-top: 10px; }
        .progress-bar { background: linear-gradient(90deg, #4834d4, #686de0); border-radius: 20px; }
        .rounded-custom { border-radius: 30px; object-fit: cover; box-shadow: 0 15px 35px rgba(0,0,0,0.1); width: 100%; max-height: 500px; }
        .custom-input { background-color: #f8f9fa !important; border: 1px solid #e9ecef !important; border-radius: 12px !important; padding: 12px 20px !important; }
        .btn-theme { background: #4e73df !important; color: white !important; border: none; border-radius: 12px; font-weight: 700; transition: 0.3s; }
        .blog-title { font-weight: 500 !important; color: #2d3436; font-size: 1.15rem; }
        .experience-badge { position: absolute; bottom: 20px; right: -10px; background: white; padding: 15px 25px; border-radius: 20px; text-align: center; z-index: 2; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .icon-box { width: 45px; height: 45px; background: #f0f3ff; border-radius: 12px; display: flex; align-items: center; justify-content: center; }
    </style>
</head>
<body>

<?php include 'partials/navbar.php'; ?>
<?php include 'partials/header.php'; ?>

<?php if ($pesan_terkirim): ?>
<script>
    Swal.fire({ 
        title: 'Pesan Terkirim! ✨', 
        text: 'Terima kasih, pesan kamu sudah masuk!', 
        icon: 'success', 
        timer: 3000, 
        showConfirmButton: false, 
        timerProgressBar: true 
    });
</script>
<?php endif; ?>

<section id="about" class="bg-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-5 mb-lg-0">
                <div class="position-relative">
                    <img src="admin/assets/img/<?= $about['foto']; ?>" class="rounded-custom img-fluid" alt="Profile">
                </div>
            </div>
            <div class="col-lg-7 ps-lg-5">
                <h6 class="text-primary fw-bold text-uppercase mb-2">About Me</h6>
                <h2 class="text-muted mb-4"><?= $about['judul']; ?></h2>
                <p class="text-muted leading-relaxed mb-4" style="font-size: 1.1rem;">
                    <?= $about['deskripsi']; ?>
                </p>
                <div class="row g-4 mb-5">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="icon-box me-3"><i class="lni lni-calendar text-primary fs-4"></i></div>
                            <div>
                                <small class="text-muted d-block" style="font-size: 0.75rem;">Tanggal Lahir</small>
                                <span class="fw-bold text-dark"><?= $about['tgl_lahir']; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="icon-box me-3"><i class="lni lni-heart text-primary fs-4"></i></div>
                            <div>
                                <small class="text-muted d-block" style="font-size: 0.75rem;">Hobi</small>
                                <span class="fw-bold text-dark"><?= $about['hobi']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
<a href="https://drive.google.com/file/d/1NGLVZ_EIfVt2teYKkjYciGqqa-iRZF2N/view?usp=sharing" target="_blank" class="btn btn-primary px-5 py-3 rounded-pill fw-bold shadow-sm">Download CV</a>            </div>
        </div>
    </div>
</section>

<section id="skills">
    <div class="container">
        <div class="section-title">
            <h3>Technical Skills</h3>
        </div>
        <div class="row g-4">
            <?php
            $sql_s = mysqli_query($koneksi, "SELECT * FROM skills");
            while($s = mysqli_fetch_array($sql_s)) :
            ?>
            <div class="col-md-6 col-lg-4">
                <div class="modern-card">
                    <div class="d-flex justify-content-between">
                        <span class="fw-bold"><?= $s['nama_skill']; ?></span>
                        <span class="text-primary fw-bold"><?= $s['persen']; ?>%</span>
                    </div>
                    <div class="progress"><div class="progress-bar" style="width: <?= $s['persen']; ?>%"></div></div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<section id="education" class="bg-white">
    <div class="container">
        <div class="section-title">
            <h3>Education</h3>
        </div>
        <div class="row g-4">
            <?php
            // Ambil data dari tabel education
            $sql_edu = mysqli_query($koneksi, "SELECT * FROM education ORDER BY tahun DESC");
            while($edu = mysqli_fetch_array($sql_edu)) :
            ?>
            <div class="col-md-6">
                <div class="modern-card">
                    <h5 class="fw-bold text-primary"><?= $edu['tahun']; ?></h5>
                    <h4><?= $edu['sekolah']; ?></h4>
                    <p class="text-muted mb-0"><?= $edu['jurusan']; ?></p>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<section id="projects" class="py-100 bg-light">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h2 class="fw-bold">My Latest Projects</h2>
            <div style="width: 50px; height: 3px; background: #4e73df; margin: 10px auto;"></div>
        </div>
        <div class="row g-4 justify-content-center">
            <?php
            $sql_project = mysqli_query($koneksi, "SELECT * FROM projects ORDER BY id DESC LIMIT 2");
            while($p = mysqli_fetch_array($sql_project)) :
            ?>
            <div class="col-lg-5 col-md-6">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 20px; overflow: hidden;">
                    <img src="admin/assets/img/<?= $p['foto']; ?>" class="card-img-top" style="height: 250px; object-fit: cover;">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-2"><?= $p['nama_project']; ?></h5>
                        <p class="text-muted small"><?= substr(strip_tags($p['deskripsi']), 0, 100); ?>...</p>
                        <a href="project_detail.php?id=<?= $p['id']; ?>" class="btn btn-outline-primary btn-sm px-4 rounded-pill">Detail</a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<section id="blog" class="py-5">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h2 class="fw-bold">My Blog</h2>
            <div style="width: 50px; height: 3px; background: #4e73df; margin: 10px auto;"></div>
        </div>
        <div class="row g-4">
            <?php while($b = mysqli_fetch_array($sql_blog)) : ?>
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 20px; overflow: hidden; background: #fff;">
                    <div style="width: 100%; height: 200px; overflow: hidden;">
                        <img src="admin/assets/img/<?= $b['gambar']; ?>?t=<?= time(); ?>" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.src='https://via.placeholder.com/400x250'">
                    </div>
                    <div class="card-body p-4 d-flex flex-column">
                        <div class="d-flex align-items-center mb-3">
                            <small class="text-muted me-3"><i class='bx bx-calendar text-primary'></i> <?= date('d M Y', strtotime($b['tanggal'])); ?></small>
                            <small class="text-muted"><i class='bx bx-user text-primary'></i> <?= $b['penulis']; ?></small>
                        </div>
                        <h5 class="blog-title mb-3" style="font-weight: 500;"><?= $b['judul']; ?></h5>
                        <p class="text-muted small mb-4"><?= substr(strip_tags($b['isi']), 0, 85); ?>...</p>
                        <div class="mt-auto">
                            <a href="blog_detail.php?id=<?= $b['id']; ?>" class="btn btn-outline-primary btn-sm px-4 rounded-pill fw-bold">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <div class="text-center mt-5">
            <a href="blog.php" class="btn btn-primary px-5 py-3 rounded-pill shadow-sm fw-medium">Lihat Semua Blog</a>
        </div>
    </div>
</section>
<section id="contact" class="bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 mb-5">
                <h3 class="fw-bold mb-4" style="color: #4e73df;">Get in Touch</h3>
                <p class="text-muted mb-4">Hubungi saya kapan saja untuk kolaborasi.</p>
                
                <div class="contact-info">
                    <a href="https://maps.app.goo.gl/LnmH7wBgC4EiSLeQA" target="_blank" class="text-decoration-none">
    <div class="d-flex align-items-center mb-3">
        <div class="icon-box me-3"><i class="bx bx-map text-primary fs-4"></i></div>
        <div>
            <small class="text-muted d-block" style="font-size: 0.75rem;">Lokasi</small>
            <span class="fw-bold text-dark">Bantul, Yogyakarta</span>
        </div>
    </div>
</a>
                    <a href="https://wa.me/6281393623591" target="_blank" class="text-decoration-none">
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon-box me-3"><i class="bx bxl-whatsapp text-primary fs-4"></i></div>
                            <div>
                                <small class="text-muted d-block" style="font-size: 0.75rem;">WhatsApp</small>
                                <span class="fw-bold text-dark">+62 813 9362 3591</span>
                            </div>
                        </div>
                    </a>

                    <a href="https://www.instagram.com/bianacc" target="_blank" class="text-decoration-none">
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon-box me-3"><i class="bx bxl-instagram text-primary fs-4"></i></div>
                            <div>
                                <small class="text-muted d-block" style="font-size: 0.75rem;">Instagram</small>
                                <span class="fw-bold text-dark">@bianacc</span>
                            </div>
                        </div>
                    </a>

                    <a href="mailto:febiannaanna@gmail.com" class="text-decoration-none">
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon-box me-3"><i class="bx bx-envelope text-primary fs-4"></i></div>
                            <div>
                                <small class="text-muted d-block" style="font-size: 0.75rem;">Email</small>
                                <span class="fw-bold text-dark">febiannaanna@gmail.com</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card border-0 shadow-lg p-4 p-md-5" style="border-radius: 25px;">
                    <form action="" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6 mb-3">
                                <label class="small fw-bold mb-1">Name</label>
                                <input type="text" name="nama" class="form-control custom-input" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="small fw-bold mb-1">Email</label>
                                <input type="email" name="email" class="form-control custom-input" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="small fw-bold mb-1">Message</label>
                                <textarea name="pesan" class="form-control custom-input" rows="4" required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="kirim_pesan" class="btn btn-theme w-100 py-3 shadow">Send Message Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'partials/footer.php'; ?>
</body>
</html>