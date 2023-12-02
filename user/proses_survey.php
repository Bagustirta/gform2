<?php
session_start();
include '../conn.php';


// Tangkap data dari formulir
$judulSurvey = $koneksi->real_escape_string($_POST['judul']);
$pertanyaanArray = $_POST['pertanyaan'];
$jenisArray = $_POST['jenis'];

// Masukkan data survey ke dalam tabel tb_survey
$insertSurveyQuery = "INSERT INTO tb_survey (judul, tgl_buat, id_user) VALUES (?, CURDATE(), ?)";
$stmt = $koneksi->prepare($insertSurveyQuery);
$stmt->bind_param("si", $judulSurvey, $_SESSION['id']);

try {
    $stmt->execute();
    $idSurvey = $stmt->insert_id;  // Dapatkan ID survey yang baru saja dibuat
} catch (Exception $e) {
    // Handle kesalahan, mungkin judul yang sama sudah ada
    exit("Terjadi kesalahan saat memasukkan data survey: " . $e->getMessage());
} finally {
    $stmt->close();
}

// Loop untuk setiap pertanyaan
for ($i = 0; $i < count($pertanyaanArray); $i++) {
    // Tangkap data pertanyaan dan jenis pertanyaan
    $pertanyaan = $koneksi->real_escape_string($pertanyaanArray[$i]);
    $jenis = $koneksi->real_escape_string($jenisArray[$i]);

    // Masukkan data pertanyaan ke dalam tabel tb_pertanyaan
    $insertPertanyaanQuery = "INSERT INTO tb_pertanyaan (id_survey, pertanyaan, jenis) VALUES (?, ?, ?)";
    $stmtPertanyaan = $koneksi->prepare($insertPertanyaanQuery);
    $stmtPertanyaan->bind_param("iss", $idSurvey, $pertanyaan, $jenis);

    try {
        $stmtPertanyaan->execute();
        $idPertanyaan = $stmtPertanyaan->insert_id;  // Dapatkan ID pertanyaan yang baru saja dibuat
    } catch (Exception $e) {
        // Handle kesalahan, mungkin pertanyaan yang sama sudah ada
        exit("Terjadi kesalahan: " . $e->getMessage());
    } finally {
        $stmtPertanyaan->close();
    }

    // Ambil data opsi dari $_POST['teks_jawaban'][$i]
    $opsiArray = $_POST['teks_jawaban'][$i];

    // Pastikan $opsiArray adalah array sebelum melakukan foreach
    if (is_array($opsiArray)) {
        foreach ($opsiArray as $teks_jawaban) {
            $teks_jawabanValue = $koneksi->real_escape_string($teks_jawaban);

            // Masukkan opsi jawaban ke dalam tb_pilih_jawaban
            $insertOpsiQuery = "INSERT INTO tb_pilih_jawaban (id_pertanyaan, teks_jawaban) VALUES (?, ?)";
            $stmtOpsi = $koneksi->prepare($insertOpsiQuery);
            $stmtOpsi->bind_param("is", $idPertanyaan, $teks_jawabanValue);

            try {
                $stmtOpsi->execute();
                echo "Opsi jawaban berhasil dimasukkan.";
            } catch (Exception $e) {
                // Handle kesalahan, mungkin opsi jawaban yang sama sudah ada
                exit("Terjadi kesalahan: " . $e->getMessage());
            } finally {
                $stmtOpsi->close();
            }
        }
    }
}
// Setelah selesai, arahkan ke halaman tertentu (sesuaikan dengan kebutuhan Anda)
header('Location: survey_add.php');
exit();
?>