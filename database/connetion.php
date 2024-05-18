<?php
$servername = "Localhost";
$username = "root";
$password = "";
$dbname = "db_penggajian";

$connection = mysqli_connect($servername, $username, $password, $dbname);
if (!$connection){
    die("Gagal Koneksi". mysqli_connect_error());
}