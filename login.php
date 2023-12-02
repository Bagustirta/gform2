<?php
session_start();
include('conn.php'); // Sisipkan file koneksi

if (isset($_SESSION['peran'])) {
    // Redirect jika pengguna sudah login
    if ($_SESSION['peran'] === 'admin') {
        header('Location: /admin/home.php');
    } elseif ($_SESSION['peran'] === 'user') {
        header('Location: /user/home.php');
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    // Handle proses login
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'";
    $result = $koneksi->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['id'] = $row['id'];
        $_SESSION['peran'] = $row['peran'];
        $_SESSION['username'] = $row['username']; // Simpan nama pengguna dalam sesi
        $_SESSION['email'] = $row['email']; // Simpan email dalam sesi
        header('Location: /gform/' . $_SESSION['peran'] . ' /home.php');
    } else {
        $pesan_error = "Login gagal. Periksa email dan password Anda.";
    }

    $koneksi->close();
}
