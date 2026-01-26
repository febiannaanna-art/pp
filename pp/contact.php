<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
  .navbar-form {
    display: flex;
    align-items: center;
    gap: 10px;
  }
  .navbar-form input {
    border-radius: 20px;
    padding: 5px 15px;
    border: 1px solid #ddd;
  }

  .contact-card {
    background: #fff;
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    margin-top: 20px;
  }

  .form-control {
    border-radius: 8px !important;
    padding: 12px 15px !important;
    border: 1px solid #e2e8f0 !important;
  }

  .btn-submit {
    background-color: #007bff;
    color: white;
    width: 100%;
    padding: 12px;
    border-radius: 8px;
    border: none;
    font-weight: bold;
    transition: 0.3s;
  }
  .btn-submit:hover {
    background-color: #0056b3;
  }
</style>
    <meta charset="UTF-8">
    <title>Contact - Personal Profile</title>
    <link rel="stylesheet" href="Flat-1.0.0/assets/css/bootstrap-5.0.0-alpha-2.min.css">
    <link rel="stylesheet" href="Flat-1.0.0/assets/css/lindy-uikit.css">
</head>
<body class="bg-light">

<?php include 'partials/navbar.php'; ?>

<section class="pt-100 pb-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                <?php if(isset($_GET['status']) && $_GET['status'] == 'sukses'): ?>
                    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                        <strong>Berhasil!</strong> Pesan Anda telah terkirim.
                    </div>
                <?php endif; ?>

                <div class="card border-0 shadow-sm p-4 p-md-5" style="border-radius: 15px;">
                    <div class="text-center mb-40">
                        <h3 class="fw-bold">Contact Me</h3>
                        <p>Hubungi saya untuk kerja sama atau pertanyaan</p>
                    </div>

                    <form action="contact_process.php" method="POST">
  <div class="row">
    <div class="col-md-6 mb-3">
      <label>Nama</label>
      <input type="text" name="nama" class="form-control" placeholder="Nama Anda" required>
    </div>
    <div class="col-md-6 mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" placeholder="Email Anda" required>
    </div>
    <div class="col-md-12 mb-4">
      <label>Pesan</label>
      <textarea name="pesan" class="form-control" rows="5" placeholder="Tulis pesan di sini..." required></textarea>
    </div>
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary w-100">Kirim Pesan</button>
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