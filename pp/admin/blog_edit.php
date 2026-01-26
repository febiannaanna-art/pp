<?php
include "../koneksi.php";

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM blog WHERE id='$id'");
$d = mysqli_fetch_array($data);

if(isset($_POST['update'])){
    // Menggunakan real_escape_string agar karakter khusus (seperti tanda petik dari editor) tidak merusak query
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $penulis = mysqli_real_escape_string($koneksi, $_POST['penulis']);
    $tanggal = $_POST['tanggal'];
    $isi = mysqli_real_escape_string($koneksi, $_POST['isi']);
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    if($gambar != ""){
        // Hapus gambar lama jika ada
        if(file_exists("assets/img/".$d['gambar'])){
            unlink("assets/img/".$d['gambar']);
        }
        move_uploaded_file($tmp, "assets/img/".$gambar);
        mysqli_query($koneksi, "UPDATE blog SET judul='$judul', tanggal='$tanggal', penulis='$penulis', isi='$isi', gambar='$gambar' WHERE id='$id'");
    } else {
        mysqli_query($koneksi, "UPDATE blog SET judul='$judul', tanggal='$tanggal', penulis='$penulis', isi='$isi' WHERE id='$id'");
    }
    header("location: blog_data.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Edit Artikel | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <style>
        :root { --primary-blue: #4e73df; }
        body { background-color: #f8f9fc; }
        .card-header { background-color: var(--primary-blue) !important; color: white; }
        .btn-primary { background-color: var(--primary-blue); border: none; }
        .ck-editor__editable { min-height: 250px; color: black; }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header py-3"><h6 class="m-0 fw-bold">Edit Artikel Blog</h6></div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" id="formEdit">
                        <div class="mb-3">
                            <label class="form-label">Judul Artikel</label>
                            <input type="text" name="judul" class="form-control" value="<?= $d['judul']; ?>" required>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Penulis</label>
                                <input type="text" name="penulis" class="form-control" value="<?= $d['penulis']; ?>" required>
                            </div>
                            <div class="col">
                                <label class="form-label">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" value="<?= $d['tanggal']; ?>" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Isi Artikel</label>
                            <textarea name="isi" id="editor" class="form-control"><?= $d['isi']; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label d-block">Gambar Saat Ini</label>
                            <?php if($d['gambar']): ?>
                                <img src="assets/img/<?= $d['gambar']; ?>" width="150" class="mb-2 rounded">
                            <?php endif; ?>
                            <input type="file" name="gambar" class="form-control">
                            <small class="text-muted">*Kosongkan jika tidak ingin mengganti gambar</small>
                        </div>
                        <div class="text-end">
                            <a href="blog_data.php" class="btn btn-secondary px-4">Batal</a>
                            <button type="submit" name="update" class="btn btn-primary px-4">Update Artikel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let editorInstance;

    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            editorInstance = editor;
        })
        .catch(error => {
            console.error(error);
        });

    // Menarik data dari CKEditor ke textarea asli sebelum form dikirim
    document.querySelector('#formEdit').addEventListener('submit', () => {
        const editorData = editorInstance.getData();
        document.querySelector('#editor').value = editorData;
    });
</script>

</body>
</html>