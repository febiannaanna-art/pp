<?php 
// Mengatasi error session_start() ganda dari file proteksi
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "auth/proteksi.php"; 
include "../koneksi.php";

$q_notif = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM pesan WHERE status = 0");
$d_notif = mysqli_fetch_assoc($q_notif);
$pesan_baru = $d_notif['total'];
// Ambil data statistik blog
$list_tahun = [];
$sql_tahun = mysqli_query($koneksi, "SELECT DISTINCT YEAR(tanggal) as thn FROM blog ORDER BY thn DESC");
while($t = mysqli_fetch_array($sql_tahun)) {
    $list_tahun[] = $t['thn'];
}
if(empty($list_tahun)) $list_tahun[] = date('Y');

$all_data_stats = [];
foreach($list_tahun as $thn) {
    $monthly = array_fill(1, 12, 0);
    $sql_stats = mysqli_query($koneksi, "SELECT MONTH(tanggal) as bulan, COUNT(*) as jumlah FROM blog WHERE YEAR(tanggal) = '$thn' GROUP BY MONTH(tanggal)");
    while($s = mysqli_fetch_array($sql_stats)) {
        $monthly[(int)$s['bulan']] = (int)$s['jumlah'];
    }
    $all_data_stats[$thn] = array_values($monthly);
}

// Hitung total data
$jml_blog = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM blog"));
$jml_pesan = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pesan"));
$jml_project = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM projects"));
$jml_about = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM about"));
$jml_skills = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM skills"));
$count_edu = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM education"));
$sql_project = mysqli_query($koneksi, "SELECT * FROM projects ORDER BY id DESC LIMIT 5");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Dashboard Admin | Sneat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root { --primary-blue: #4e73df; }
        body { background-color: #f8f9fc; font-family: 'Inter', sans-serif; overflow-x: hidden; }
        .sidebar { min-height: 100vh; background: white; border-right: 1px solid #e3e6f0; width: 280px; position: fixed; z-index: 1000; }
        .main-content { margin-left: 280px; width: calc(100% - 280px); min-height: 100vh; padding: 40px; }
        .nav-link { color: #6e707e; font-weight: 500; padding: 1rem 1.5rem; border-radius: 8px; margin-bottom: 5px; }
        .nav-link:hover, .nav-link.active { background: rgba(78, 115, 223, 0.1); color: var(--primary-blue) !important; }
        .card { border: none; box-shadow: 0 0.5rem 2rem 0 rgba(58, 59, 120, 0.1); border-radius: 15px; }
        .stat-card { padding: 1.2rem !important; transition: 0.3s; }
        .stat-card:hover { transform: translateY(-5px); }
        .stat-card h4 { font-size: 1.8rem; font-weight: 700; margin-bottom: 0; }
        .stat-card small { font-size: 0.75rem; font-weight: 600; color: #858796; text-transform: uppercase; }
        .stat-card i { font-size: 2.2rem; }
        .card-welcome { background: linear-gradient(135deg, #4e73df 0%, #224abe 100%); color: white; padding: 2rem; border: none; }
        .btn-slide { background: none; border: none; color: var(--primary-blue); font-size: 1.5rem; cursor: pointer; }
    </style>
</head>
<body>

<div class="d-flex">
    <div class="sidebar p-4 d-none d-md-block">
        <h3 class="text-primary fw-bold mb-5 ps-2">Sneat Admin</h3>
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link active" href="index.php"><i class="bx bx-home-circle me-3"></i> Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="blog_data.php"><i class="bx bx-layout me-3"></i> Manajemen Blog</a></li>
            <li class="nav-item"><a class="nav-link" href="pesan_masuk.php"><i class="bx bx-envelope me-3"></i> Pesan Masuk</a></li>
            <li class="nav-item"><a class="nav-link" href="project_data.php"><i class="bx bx-rocket me-3"></i> Manajemen Project</a></li>
            <li class="nav-item"><a class="nav-link" href="about_data.php"><i class="bx bx-user me-3"></i> Manajemen about</a></li>
            <li class="nav-item"><a class="nav-link" href="skills_data.php"><i class="bx bx-code-alt me-3"></i> Manajemen Skills</a></li>
            <li class="nav-item"><a class="nav-link" href="education_data.php"><i class="bx bx-book me-3"></i> Manajemen Education</a></li>
            <hr class="my-4">
            <li class="nav-item"><a class="nav-link text-danger" href="auth/logout.php"><i class="bx bx-log-out me-3"></i> Logout</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="card card-welcome mb-4">
            <div class="card-body">
                <h2 class="fw-bold mb-2">Hello Admin, welcome back! 🎉</h2>
                <p class="mb-0 opacity-75">Pantau semua progress karya kamu biar tetap menyala hari ini! 🔥</p>
            </div>
        </div>

        <div class="row g-3 mb-4">
            <div class="col" style="min-width: 200px;">
                <a href="blog_data.php" class="text-decoration-none">
                    <div class="card stat-card border-start border-primary border-5 h-100">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <small>Blog</small>
                                <h4 class="text-dark"><?= $jml_blog; ?></h4>
                            </div>
                            <div class="text-primary"><i class='bx bx-news'></i></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col" style="min-width: 200px;">
                <a href="pesan_masuk.php" class="text-decoration-none">
                    <div class="card stat-card border-start border-success border-5 h-100">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <small>Pesan</small>
                                <h4 class="text-dark"><?= $jml_pesan; ?></h4>
                            </div>
                            <div class="text-success"><i class='bx bx-message-square-dots'></i></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col" style="min-width: 200px;">
                <a href="about_data.php" class="text-decoration-none">
                    <div class="card stat-card border-start border-info border-5 h-100">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <small>About</small>
                                <h4 class="text-dark"><?= $jml_about; ?></h4>
                            </div>
                            <div class="text-info"><i class='bx bx-user'></i></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col" style="min-width: 200px;">
                <a href="skills_data.php" class="text-decoration-none">
                    <div class="card stat-card border-start border-warning border-5 h-100">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <small>Skills</small>
                                <h4 class="text-dark"><?= $jml_skills; ?></h4>
                            </div>
                            <div class="text-warning"><i class='bx bx-code-alt'></i></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col" style="min-width: 200px;">
                <a href="education_data.php" class="text-decoration-none">
                    <div class="card stat-card border-start border-5 h-100" style="border-left-color: #00cfd5 !important;">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <small>Education</small>
                                <h4 class="text-dark"><?= $count_edu; ?></h4>
                            </div>
                            <div style="color: #00cfd5;"><i class='bx bx-book'></i></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card p-4 h-100">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-bold mb-0">Statistik Blog per Bulan</h5>
                        <div class="d-flex align-items-center gap-3">
                            <button class="btn-slide" onclick="changeYear(-1)"><i class='bx bx-chevron-left'></i></button>
                            <span id="displayYear" class="fw-bold text-primary fs-4"><?= $list_tahun[0]; ?></span>
                            <button class="btn-slide" onclick="changeYear(1)"><i class='bx bx-chevron-right'></i></button>
                        </div>
                    </div>
                    <div style="height:350px;">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card p-4 h-100">
                    <h5 class="fw-bold mb-4">Project Terbaru</h5>
                    <div class="list-group list-group-flush mb-4">
                        <?php while($row = mysqli_fetch_array($sql_project)): ?>
                        <div class="list-group-item px-0 py-3 d-flex align-items-center border-bottom">
                            <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-circle me-3">
                                <i class='bx bx-rocket fs-4'></i>
                            </div>
                            <div class="overflow-hidden">
                                <h6 class="mb-0 fw-bold text-truncate"><?= $row['judul'] ?? 'Project Baru'; ?></h6>
                                <small class="text-muted"><?= $row['kategori'] ?? 'Web Development'; ?></small>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <div class="mt-auto pt-3">
                        <div class="card bg-light border-0 p-3 mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted">Total Project</span>
                                <span class="fw-bold text-primary fs-4"><?= $jml_project; ?></span>
                            </div>
                        </div>
                        <a href="project_data.php" class="btn btn-primary w-100 py-2">Kelola Semua Project</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const allData = <?= json_encode($all_data_stats); ?>;
    const years = <?= json_encode($list_tahun); ?>;
    let currentIdx = 0;

    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Jumlah Postingan',
                data: allData[years[currentIdx]],
                borderColor: '#4e73df',
                backgroundColor: 'rgba(78, 115, 223, 0.1)',
                borderWidth: 3,
                pointRadius: 4,
                pointBackgroundColor: '#4e73df',
                fill: true,
                tension: 0.4
            }]
        },
        options: { 
            responsive: true, 
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: { 
                y: { beginAtZero: true, ticks: { stepSize: 1 } }
            }
        }
    });

    function changeYear(step) {
        currentIdx += step;
        if (currentIdx < 0) currentIdx = years.length - 1;
        if (currentIdx >= years.length) currentIdx = 0;
        const selectedYear = years[currentIdx];
        document.getElementById('displayYear').innerText = selectedYear;
        myChart.data.datasets[0].data = allData[selectedYear];
        myChart.update();
    }
</script>
</body>
</html>