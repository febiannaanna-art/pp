<?php
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "pp");

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!empty($username)) {
        $query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");
        $data = mysqli_fetch_array($query);

        if ($data) {
            if ($password == $data['password']) {
                $_SESSION['status'] = "login"; 
                $_SESSION['username'] = $data['username'];
                header("Location: admin/index.php"); // Arahkan ke folder admin
                exit;
            } else {
                echo "<script>alert('Password salah!');</script>";
            }
        } else {
            echo "<script>alert('Username tidak ditemukan!');</script>";
        }
    }
}
?>