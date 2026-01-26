<?php
if (!isset($_SESSION['login'])) {
    header("Location: auth/login.php");
    exit;
}
?>
<?php
$koneksi = mysqli_connect("localhost", "root", "", "pp");
$query = "SELECT * FROM pesan ORDER BY id DESC";
$tampil = mysqli_query($koneksi, $query);
?>

<?php
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$koneksi = mysqli_connect("localhost", "root", "", "pp");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="Flat-1.0.0/assets/css/bootstrap-5.0.0-alpha-2.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Daftar Pesan Masuk</h5>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Pesan</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    if(mysqli_num_rows($tampil) > 0) {
                        while($data = mysqli_fetch_array($tampil)): 
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($data['nama']); ?></td>
                        <td><?= htmlspecialchars($data['email']); ?></td>
                        <td><?= nl2br(htmlspecialchars($data['isi_pesan'])); ?></td>
                        <td><?= $data['tanggal']; ?></td>
                        <td>
                            <a href="hapus_pesan.php?id=<?= $data['id']; ?>" 
                               class="btn btn-sm btn-danger" 
                               onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; } else { ?>
                        <tr><td colspan="6" class="text-center">Belum ada pesan baru.</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>