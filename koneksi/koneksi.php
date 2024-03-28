<?php 
// konfigurasi database

$host = "localhost";
$username = "root";
$password = "";
$database = "tugassib";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
  }
  ?>