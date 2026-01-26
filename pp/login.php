<?php
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "pp");

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    $data = mysqli_fetch_array($query);

    if (mysqli_num_rows($query) > 0) {
        $_SESSION['status'] = "login";
        $_SESSION['username'] = $data['username'];
        header("Location: admin/index.php");
        exit;
    } else {
        echo "<script>alert('Username atau Password salah!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%); 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            height: 100vh; 
            margin: 0;
        }
        
        .login-container {
            width: 100%;
            max-width: 450px; 
            padding: 20px;
        }

        .card { 
            border: none; 
            border-radius: 25px; 
            box-shadow: 0 15px 35px rgba(0,0,0,0.2); 
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            overflow: hidden;
        }

        .card-header {
            background: transparent;
            border: none;
            padding-top: 40px;
            text-align: center;
        }

        .icon-box {
            width: 80px;
            height: 80px;
            background: #4e73df;
            color: white;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            margin: 0 auto 20px;
            box-shadow: 0 10px 20px rgba(78, 115, 223, 0.3);
        }

        .form-control {
            border-radius: 12px;
            padding: 12px 20px;
            background: #f8f9fc;
            border: 1px solid #e3e6f0;
            margin-bottom: 5px;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.25 margin-bottom: 5px;rem rgba(78, 115, 223, 0.1);
            border-color: #4e73df;
        }

        .btn-login {
            background: #4e73df;
            border: none;
            border-radius: 12px;
            padding: 12px;
            font-weight: 700;
            letter-spacing: 1px;
            transition: 0.3s;
            margin-top: 10px;
        }

        .btn-login:hover {
            background: #2e59d9;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(78, 115, 223, 0.4);
        }

        .footer-text {
            font-size: 0.85rem;
            color: #858796;
            margin-top: 30px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <div class="card p-4">
            <div class="card-header">
                <div class="icon-box">
                    <i class='bx bxs-user-badge'></i>
                </div>
                <h3 class="fw-bold text-dark">Welcome Back</h3>
                <p class="text-muted small">Please enter your admin credentials</p>
            </div>
            
            <div class="card-body">
                <form method="POST">
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-dark">USERNAME</label>
                        <div class="input-group">
                            <input type="text" name="username" class="form-control" placeholder="Enter username" required>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-dark">PASSWORD</label>
                        <div class="input-group">
                            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                        </div>
                    </div>

                    <button type="submit" name="login" class="btn btn-primary btn-login w-100 mt-2">
                        LOGIN TO DASHBOARD
                    </button>
                </form>

                <div class="footer-text">
                    &copy; 2026 Celsi Febiana Putri Portfolio
                </div>
            </div>
        </div>
    </div>

</body>
</html>