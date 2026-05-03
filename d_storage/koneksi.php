<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "d_storage";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Aduh, koneksi database gagal: " . mysqli_connect_error());
}
?>