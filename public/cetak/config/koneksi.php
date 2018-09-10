<?php

// panggil fungsi validasi xss dan injection
require_once('fungsi_validasi.php');
// include '../../wp-config.php';

$server =  "127.0.0.1";
$username = "root";
$password = "";
$database = "mbtech_office_2018_07_23";

// Koneksi dan memilih database di server
$connect = mysqli_connect($server,$username,$password) or die("Koneksi gagal");
mysqli_select_db($connect,$database) or die("Database tidak bisa dibuka");

// buat variabel untuk validasi dari file fungsi_validasi.php
$val = new Validasi;

?>
