<?php
require '../app/init.php';


// if (isset($_SESSION['is_login'])) {
//     header("Location: ../index.php");
//     exit;
// }

if (isset($_POST['login'])) {
    $auth->login($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="../vendor/bootstrap4/css/bootstrap.min.css">
    <!-- My Style -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- Fontawesome -->
    <script src="../vendor/fontawesome/all.min.js"></script>

    <title>Login - Sekolahku</title>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center pt-5">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <?= Message::showMessage('message_login'); ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-login mt-1" name="login">Login</button>

                            <div class="row pt-4 text-center">
                                <div class="col">
                                    <a href="register.php">Belum punya akun?, daftar disini</a><br>
                                    <a href="../index.php" class="mt-2">Kembali ke beranda</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery -->
    <script src="../vendor/jquery/jquery-3.5.0.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../vendor/bootstrap4/js/bootstrap.min.js"></script>
    <!-- My Script -->
    <script src="../assets/js/script.js"></script>
</body>

</html>