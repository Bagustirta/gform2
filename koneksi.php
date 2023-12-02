<?php
include('conn.php'); // Sisipkan file koneksi

// Query untuk mengambil data dari database dengan prepared statement
$query = "SELECT * FROM tb_user";
$s = $koneksi->prepare($query);
$s->execute();

$result = $s->get_result();

if ($result) {
    while ($row = $result->fetch_assoc()) {
        // Lakukan sesuatu dengan data
        echo $row['nama_kolom'];
    }
} else {
    echo "Kesalahan: " . $koneksi->error;
}

// Tutup koneksi
$s->close();
$koneksi->close();
?>
