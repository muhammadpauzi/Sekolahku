<?php
require '../app/init.php';

$objGuru->is_login();

if ($_GET['id']) {
    $id = $_GET['id'];
    $guru = $objGuru->query("SELECT * FROM guru WHERE id=$id");
    if (empty($guru)) {
        header("Location: guru.php");
        exit;
    }
    $objGuru->hapusGuru($id);
}

header("Location: guru.php");
