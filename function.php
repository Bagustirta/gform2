<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $questions = $_POST['questions'];

    // Simpan judul dan pertanyaan ke database
    // Logika penyimpanan ke database
}
?>
