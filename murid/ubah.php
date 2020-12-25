<?php
require '../app/init.php';

$objMurid->is_login();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $murid = $objMurid->query("SELECT * FROM murid WHERE id=$id")[0];
    if (empty($murid)) {
        header("Location: murid.php");
    }
} else {
    header("Location: murid.php");
    exit;
}
if (isset($_POST['ubah_murid'])) {
    $objMurid->ubahMurid($_POST);
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

    <title>Ubah Data Murid - Sekolahku</title>
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
                    <li class="nav-item active">
                        <a class="nav-link" href="murid.php">Murid</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../guru/guru.php">Guru</a>
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
                        Form Ubah Data Murid
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <?= Message::showMessage('validasi_murid'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?= $murid['id']; ?>">
                                    <input type="hidden" name="fotoLama" value="<?= $murid['foto']; ?>">
                                    <div class="form-group">
                                        <label for="nama">Nama Murid</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $murid['nama']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat Murid</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $murid['alamat']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Jenis Kelamin Murid</label>
                                        <select class="custom-select" name="jenis_kelamin">
                                            <option value="Laki-laki" <?= $murid['jenis_kelamin'] == 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                                            <option value="Perempuan" <?= $murid['jenis_kelamin'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="fotoUpload">Foto</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input fotoUploadInput" id="fotoUpload" name="foto">
                                            <label class="custom-file-label fotoUploadLabel" for="fotoUpload"><?= $murid['foto']; ?></label>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col">
                                            <a href="murid.php" class="btn btn-light">Kembali</a>
                                            <button type="submit" name="ubah_murid" class="btn btn-info float-right"><i class="fa fa-plus mr-1"></i> Ubah Data Murid</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-lg">
                    <div class="card-header">
                        Foto
                    </div>
                    <div class="card-body m-auto">
                        <img src="../assets/img/murid/<?= $murid['foto']; ?>" alt="" class="img-thumbnail fotoPreview" id="fotoPreview">
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

    <script>
        // Upload foto
        const inputUpload = document.querySelector('#fotoUpload');
        const labelFile = document.querySelector('.fotoUploadLabel');
        const imgPreview = document.querySelector('.fotoPreview');

        inputUpload.addEventListener('change', function() {
            labelFile.textContent = inputUpload.files[0].name;

            const fileURL = new FileReader();
            fileURL.readAsDataURL(inputUpload.files[0]);

            fileURL.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        })
    </script>
</body>

</html>