<?php
session_start();

require 'config.php';
require 'Message.php';
require 'App.php';
require 'Murid.php';
require 'Guru.php';
require 'Jurusan.php';
require 'Auth.php';

$objMurid = new Murid;
$objGuru = new Guru;
$objJurusan = new Jurusan;
$auth = new Auth;
