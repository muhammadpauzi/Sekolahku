<?php
require '../app/init.php';

$objMurid->is_login();

if ($_GET['id']) {
    $id = $_GET['id'];
    $murid = $objMurid->query("SELECT * FROM murid WHERE id=$id");
    if (empty($murid)) {
        header("Location: murid.php");
        exit;
    }
    $objMurid->hapusMurid($id);
}

header("Location: murid.php");
