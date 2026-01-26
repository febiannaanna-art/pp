<?php
if (isset($_POST['kirim'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];
    $tanggal = date('Y-m-d');

    $query = mysqli_query($koneksi, "INSERT INTO pesan (nama, email, pesan, tanggal) VALUES ('$nama', '$email', '$pesan', '$tanggal')");

    if ($query) {
        echo "
        <script>
            Swal.fire({
                title: 'Pesan Terkirim!',
                text: 'Stay tuned, nanti bakal aku balas lewat email ya! ✨',
                icon: 'success',
                confirmButtonColor: '#4e73df',
                confirmButtonText: 'Mantap!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'index.php'; // Arahkan balik ke home
                }
            });
        </script>";
    } else {
        echo "
        <script>
            Swal.fire({
                title: 'Waduh, Error!',
                text: 'Coba kirim ulang deh, kayaknya lagi ada gangguan teknis.',
                icon: 'error'
            });
        </script>";
    }
}
?>