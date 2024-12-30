<?php
$host = "localhost";
$user = "root"; // Sesuaikan dengan user MySQL
$password = ""; // Sesuaikan dengan password MySQL
$database = "hospital_db";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}
?>
