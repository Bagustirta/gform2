<?php
$host = 'localhost'; 
$database = 'db_gform'; 
$username = 'root'; 
$password = ''; 

// Buat koneksi
$koneksi = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
