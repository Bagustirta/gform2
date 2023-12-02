<?php
include "../conn.php"; // Mengimpor berkas koneksi ke dalam berkas getData.php

// Ambil data survei dari database
$query = "SELECT * FROM tb_survey";
$result = $koneksi->query($query);
$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Mengirim data dalam format JSON
header('Content-Type: application/json');
echo json_encode($data);

$koneksi->close();
?>
