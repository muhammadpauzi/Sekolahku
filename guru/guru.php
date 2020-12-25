<?php
require '../app/init.php';

$objGuru->is_login();

if (isset($_POST['cari'])) {
    $guru = $objGuru->cari($_POST['keyword'], 'guru');
} else {
    $guru = $objGuru->query("SELECT * FROM guru");
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

    <title>Guru - Sekolahku</title>
</head>

<body class="pb-5">
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
            <div class="col">
                <div class="card shadow-lg">
                    <div class="card-header">
                        Daftar Guru
                    </div>
                    <div class="card-body">
                        <div class="row px-2">
                            <div class="col">
                                <?= Message::showMessage('message_guru'); ?>
                            </div>
                        </div>
                        <div class="row px-2 justify-content-between">
                            <div class="col-md-4">
                                <a href="tambah.php" class="btn btn-info"><i class="fa fa-plus mr-1"></i> Tambah Data Guru</a>
                            </div>
                            <div class="col-md-5">
                                <form action="" method="post">
                                    <div class="input-group input-group-cari">
                                        <input type="text" class="form-control" placeholder="Cari guru.." name="keyword" autocomplete="off" autofocus>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-info" type="submit" name="cari"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col">
                                <div class="table-responsive">
                                    <table class="table <?= empty($guru) ? '' : 'table-striped'; ?> mt-2">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama Guru</th>
                                                <th scope="col">Alamat Guru</th>
                                                <th scope="col">Jenis Kelamin Guru</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (empty($guru)) : ?>
                                                <tr>
                                                    <td colspan="5">
                                                        <p class="text-danger text-center pt-4">Data tidak ditemukan</p>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php $no = 1;
                                            foreach ($guru as $g) : ?>
                                                <tr>
                                                    <th scope="row"><?= $no++; ?></th>
                                                    <td><?= $g['nama']; ?></td>
                                                    <td><?= $g['alamat']; ?></td>
                                                    <td><?= $g['jenis_kelamin']; ?></td>
                                                    <td>
                                                        <a href="ubah.php?id=<?= $g['id']; ?>" class="badge badge-primary">Ubah</a>
                                                        <a href="hapus.php?id=<?= $g['id']; ?>" class="badge badge-danger">Hapus</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
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