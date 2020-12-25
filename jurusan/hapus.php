<?php
require '../app/init.php';

$objJurusan->is_login();

if ($_GET['id']) {
    $id = $_GET['id'];
    $jurusan = $objJurusan->query("SELECT * FROM jurusan WHERE id=$id");
    if (empty($jurusan)) {
        header("Location: jurusan.php");
        exit;
    }
    $objJurusan->hapusJurusan($id);
}

header("Location: jurusan.php");
