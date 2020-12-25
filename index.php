<?php
require 'app/init.php';

if (isset($_POST['cariMurid'])) {
    $murid = $objMurid->cari($_POST['keywordMurid'], 'murid');
} else {
    $murid = $objMurid->query("SELECT * FROM murid");
}

if (isset($_POST['cariGuru'])) {
    $guru = $objGuru->cari($_POST['keywordGuru'], 'guru');
} else {
    $guru = $objGuru->query("SELECT * FROM guru");
}

if (isset($_POST['cariJurusan'])) {
    $jurusan = $objJurusan->cari($_POST['keywordJurusan'], 'jurusan');
} else {
    $jurusan = $objJurusan->query("SELECT * FROM jurusan");
}

$jumlah = [
    'murid' => count($objMurid->query("SELECT * FROM murid")),
    'guru' => count($objMurid->query("SELECT * FROM guru")),
    'jurusan' => count($objMurid->query("SELECT * FROM jurusan"))
];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="vendor/bootstrap4/css/bootstrap.min.css">
    <!-- My Style -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Fontawesome -->
    <script src="vendor/fontawesome/all.min.js"></script>

    <title>Beranda - Sekolahku</title>
</head>

<body class="pb-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container">
            <a class="navbar-brand" href=""><i class="fa fa-university mr-1"></i> Sekolahku</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="">Beranda</a>
                    </li>
                    <?php if (isset($_SESSION['is_login'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="murid/murid.php">Murid</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="guru/guru.php">Guru</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="jurusan/jurusan.php">Jurusan</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link btn btn-primary btn-sm text-white" href="auth/logout.php">Log Out</a>
                        </li>
                    <?php endif; ?>
                    <?php if (!isset($_SESSION['is_login'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary btn-sm text-white" href="auth/login.php">Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-4 card-informasi">
            <div class="col-md-4">
                <div class="card shadow-lg card-informasi-murid text-center">
                    <div class="card-header">
                        Jumlah Murid
                    </div>
                    <div class="card-body">
                        <h1><?= $jumlah['murid']; ?></h1>
                        <p>Murid</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-lg card-informasi-guru text-center">
                    <div class="card-header">
                        Jumlah Guru
                    </div>
                    <div class="card-body">
                        <h1><?= $jumlah['guru']; ?></h1>
                        <p>Guru</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-lg card-informasi-jurusan text-center">
                    <div class="card-header">
                        Jumlah Jurusan
                    </div>
                    <div class="card-body">
                        <h1><?= $jumlah['jurusan']; ?></h1>
                        <p>Jurusan</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Murid -->
        <div class="row mt-4">
            <div class="col">
                <div class="card shadow-lg">
                    <div class="card-header">
                        Daftar Murid
                    </div>
                    <div class="card-body">
                        <div class="row px-2 justify-content-between">
                            <div class="col">
                                <form action="" method="post">
                                    <div class="input-group input-group-cari">
                                        <input type="text" class="form-control" placeholder="Cari murid.." name="keywordMurid" autocomplete="off" autofocus>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-info" type="submit" name="cariMurid"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col">
                                <div class="table-responsive">
                                    <table class="table <?= empty($murid) ? '' : 'table-striped'; ?> mt-2">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama Murid</th>
                                                <th scope="col">Alamat Murid</th>
                                                <th scope="col">Jenis Kelamin Murid</th>
                                                <th scope="col">Foto Murid</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (empty($murid)) : ?>
                                                <tr>
                                                    <td colspan="5">
                                                        <p class="text-danger text-center pt-4">Data tidak ditemukan</p>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php $no = 1;
                                            foreach ($murid as $m) : ?>
                                                <tr>
                                                    <th scope="row"><?= $no++; ?></th>
                                                    <td><?= $m['nama']; ?></td>
                                                    <td><?= $m['alamat']; ?></td>
                                                    <td><?= $m['jenis_kelamin']; ?></td>
                                                    <td class="foto-murid">
                                                        <img src="assets/img/murid/<?= $m['foto']; ?>" data-toggle="modal" data-target="#fotoModal" class="img-thumbnail foto-list">
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

        <!-- Guru -->
        <div class="row mt-4">
            <div class="col">
                <div class="card shadow-lg">
                    <div class="card-header">
                        Daftar Guru
                    </div>
                    <div class="card-body">
                        <div class="row px-2 justify-content-between">
                            <div class="col">
                                <form action="" method="post">
                                    <div class="input-group input-group-cari">
                                        <input type="text" class="form-control" placeholder="Cari guru.." name="keywordGuru" autocomplete="off" autofocus>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-info" type="submit" name="cariGuru"><i class="fa fa-search"></i></button>
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (empty($guru)) : ?>
                                                <tr>
                                                    <td colspan="4">
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

        <!-- Jurusan -->
        <div class="row mt-4">
            <div class="col">
                <div class="card shadow-lg">
                    <div class="card-header">
                        Daftar Jurusan
                    </div>
                    <div class="card-body">
                        <div class="row px-2 justify-content-between">
                            <div class="col">
                                <form action="" method="post">
                                    <div class="input-group input-group-cari">
                                        <input type="text" class="form-control" placeholder="Cari jurusan.." name="keywordJurusan" autocomplete="off" autofocus>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-info" type="submit" name="cariJurusan"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col">
                                <div class="table-responsive">
                                    <table class="table <?= empty($jurusan) ? '' : 'table-striped'; ?> mt-2">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama Jurusan</th>
                                                <th scope="col">Kepala Jurusan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (empty($jurusan)) : ?>
                                                <tr>
                                                    <td colspan="3">
                                                        <p class="text-danger text-center pt-4">Data tidak ditemukan</p>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php $no = 1;
                                            foreach ($jurusan as $j) : ?>
                                                <tr>
                                                    <th scope="row"><?= $no++; ?></th>
                                                    <td><?= $j['nama']; ?></td>
                                                    <td><?= $j['kepala']; ?></td>
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

    <!-- Modal -->
    <div class="modal fade" id="fotoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Foto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="" alt="" class="img-thumbnail modal-foto">
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery -->
    <script src="vendor/jquery/jquery-3.5.0.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="vendor/bootstrap4/js/bootstrap.min.js"></script>
    <!-- My Script -->
    <script src="assets/js/script.js"></script>
</body>

</html>