<?php
require '../app/init.php';

$objGuru->is_login();

if (isset($_POST['tambah_guru'])) {
    $objGuru->tambahGuru($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="<?= BASEURL; ?>vendor/bootstrap4/css/bootstrap.min.css">
    <!-- My Style -->
    <link rel="stylesheet" href="<?= BASEURL; ?>assets/css/style.css">
    <!-- Fontawesome -->
    <script src="<?= BASEURL; ?>vendor/fontawesome/all.min.js"></script>

    <title>Tambah Data Guru - Sekolahku</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container">
            <a class="navbar-brand" href="../index.php"><i class="fa fa-university mr-1"></i> Sekolahku</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../murid/murid.php">Murid</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="guru.php">Guru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../jurusan/jurusan.php">Jurusan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary btn-sm text-white" href="../auth/logout.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-4">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header">
                        Form Tambah Data Guru
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <?= Message::showMessage('validasi_guru'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="nama">Nama Guru</label>
                                        <input type="text" class="form-control" id="nama" name="nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat Guru</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Jenis Kelamin Guru</label>
                                        <select class="custom-select" name="jenis_kelamin">
                                            <option value="Laki-laki" selected>Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col">
                                            <a href="guru.php" class="btn btn-light">Kembali</a>
                                            <button type="submit" name="tambah_guru" class="btn btn-info float-right"><i class="fa fa-plus mr-1"></i> Tambah Data Guru</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery -->
    <script src="<?= BASEURL; ?>vendor/jquery/jquery-3.5.0.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= BASEURL; ?>vendor/bootstrap4/js/bootstrap.min.js"></script>
    <!-- My Script -->
    <script src="<?= BASEURL; ?>assets/js/script.js"></script>
</body>

</html>