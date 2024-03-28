<?php
// Mulai sesi
session_start();

// Include file koneksi
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Ambil data yang dikirim dari form login
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Query untuk mengecek apakah username dan password ada di database
  $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Ambil data pengguna
    $row = $result->fetch_assoc();
    $level = $row['level'];

    // Beri tanda bahwa pengguna sudah login
    $_SESSION['login_user'] = $username;
    $_SESSION['user_level'] = $level;

    // Redirect sesuai level pengguna
    if ($level == 'admin') {
      header("location: ../admin/index.php"); // Redirect ke halaman admin
    } else {
      header("location: ../index.html"); // Redirect ke halaman user
    }
  } else {
    // Jika data tidak ditemukan, kembali ke halaman login
    echo '<script>alert("Username atau Password Salah!")</script>';
    echo '<script>window.location.href = "login.html";</script>'; // Ganti dengan halaman login Anda
  }
}

$conn->close();
?>
