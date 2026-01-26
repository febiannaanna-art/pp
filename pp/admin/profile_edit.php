<?php
$koneksi = mysqli_connect("localhost", "root", "", "pp");
$id = 1; 
$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM profile WHERE id='$id'"));

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $bio = $_POST['bio'];
    mysqli_query($koneksi, "UPDATE profile SET nama='$nama', bio='$bio' WHERE id='$id'");
    header("Location: index.php?page=profile");
}
?>
<form method="POST">
    <input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control">
    <textarea name="bio" class="form-control"><?= $data['bio'] ?></textarea>
    <button type="submit" name="update" class="btn btn-primary">Simpan</button>
</form>