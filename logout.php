<?php
session_start(); // Mulai sesi

// Hapus semua data sesi
session_destroy();

// Redirect ke halaman login atau halaman lain yang sesuai
header('Location: index.php'); // Gantilah "login.php" dengan halaman yang sesuai
exit();
?>
