<?php
$koneksi = mysqli_connect("localhost", "root", "", "pp");

if (isset($_POST['tambah_project'])) {
    $nama_project = $_POST['nama_project'];
    
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    
    $path = "assets/img/" . $foto;
    
    if (move_uploaded_file($tmp, $path)) {
        $query = "INSERT INTO projects (nama_project, foto) VALUES ('$nama_project', '$foto')";
        mysqli_query($koneksi, $query);
        echo "<script>alert('Project berhasil diupload!'); window.location='index.php?page=projects';</script>";
    } else {
        echo "Gagal mengupload gambar. Pastikan folder assets/img/ sudah dibuat.";
    }
}
?>

<form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label>Nama Project</label>
        <input type="text" name="nama_project" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Pilih Foto Project</label>
        <input type="file" name="foto" class="form-control" required>
    </div>
    <button type="submit" name="tambah_project" class="btn btn-primary">Upload Project</button>
</form>