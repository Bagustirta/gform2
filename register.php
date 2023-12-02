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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    // Handle proses registrasi
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $peran = $_POST['peran'];

    $query = "INSERT INTO tb_user (username, email, password, peran) VALUES ('$username', '$email', '$password', '$peran')";

    if ($koneksi->query($query) === TRUE) {
        // Redirect ke halaman sesuai peran
        $_SESSION['peran'] = $peran;
        $_SESSION['username'] = $username;
        header('Location: /gform/' . $peran . '/home.php');
    } else {
        $pesan_error = "Registrasi gagal. Periksa kembali data yang Anda masukkan.";
    }

    $koneksi->close();
}
