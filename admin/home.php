<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SurveyOnline - Admin</title>
    <!-- Tautkan Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tautkan Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Tautkan CSS Kustom Untuk Menggeser Sidebar ke Kiri -->
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">SurveyOnline</a>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link " href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i> <?php echo $_SESSION['username']; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="admin-profile.php">
                                <i class="fas fa-user-circle"></i> Profile
                            </a>
                            <a class="dropdown-item" href="../logout.php">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
        </div>
    </nav>

    <div class="container-fluid mt-5">
        <div class="row">
            <!-- Menu Bar di Sisi Kiri -->
            <div class="col-md-2">
                <div class="list-group fixed-left" id="sidebar">
                    <a href="#dashboard" class="list-group-item list-group-item-action">
                         <i class="fas fa-tachometer-alt"></i> Dasboard
                   </a>
                    <a href="#surveys" class="list-group-item list-group-item-action">
                        <i class="fas fa-poll"></i> Survei
                    </a>
                    <a href="#questions" class="list-group-item list-group-item-action">
                        <i class="fas fa-question-circle"></i> Pertanyaan
                    </a>
                    <a href="#responses" class="list-group-item list-group-item-action">
                        <i class="fas fa-poll-h"></i> Respon
                    </a>
                </div>
            </div>

                    <!-- Tampilan CRUD di Sisi Kanan -->
            <div class="col-md-9">
                <!-- Tampilan Dasbor -->
                <div id="dashboard" class="admin-table">
                    <h2>Dasboard</h2>
                    <!-- Isi dasbor -->
                </div>

                <!-- Tabel Data Survei -->
                <div id="surveys" class="admin-table">
                    <h2>Data Survei</h2>
                    <table class="table table-bordered" id="survey-table">
                        <?php
                            // Buat koneksi ke database
                            include "../conn.php"; // Gantilah dengan berkas koneksi yang sesuai

                            // Query SQL untuk mengambil data survei dengan nama pengguna
                            $query = "SELECT tb_survey.id, tb_survey.judul, tb_survey.tgl_buat, tb_user.username
                                    FROM tb_survey
                                    INNER JOIN tb_user ON tb_survey.id_user = tb_user.id";
                            $result = $koneksi->query($query);

                            if (!$result) {
                                die("Error in query: " . $koneksi->error); // Cetak pesan kesalahan
                            }
                        ?>

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th>Username</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["id"] . "</td>";
                                    echo "<td>" . $row["judul"] . "</td>";
                                    echo "<td>" . $row["tgl_buat"] . "</td>";
                                    echo "<td>" . $row["username"] . "</td>";
                                    echo '<td><a href="#">Edit</a> | <a href="#">Hapus</a></td>';
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>Tidak ada data survei.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>


                <!-- Tabel Data Pertanyaan -->
                <div id="questions" class="admin-table">
                    <h2>Data Pertanyaan</h2>
                    <table class="table table-bordered" id="survey-table">
                        <?php
                            // Buat koneksi ke database
                            include "../conn.php"; // Gantilah dengan berkas koneksi yang sesuai

                            // Query SQL untuk mengambil data survei dengan nama pengguna
                            $query = "SELECT id, id_survey, pertanyaan, jenis
                                      FROM tb_pertanyaan";
                            $result = $koneksi->query($query);

                            if (!$result) {
                                die("Error in query: " . $koneksi->error); // Cetak pesan kesalahan
                            }
                        ?>

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>ID Survey</th>
                                <th>Pertanyaan</th>
                                <th>Jenis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["id"] . "</td>";
                                    echo "<td>" . $row["id_survey"] . "</td>";
                                    echo "<td>" . $row["pertanyaan"] . "</td>";
                                    echo "<td>" . $row["jenis"] . "</td>";
                                    echo '<td><a href="#">Edit</a> | <a href="#">Hapus</a></td>';
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>Tidak ada data survei.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- Tabel Data Respon -->
                <div id="responses" class="admin-table">
                    <h2>Data Respon</h2>
                    <table class="table table-bordered" id="survey-table">
                        <?php
                            // Buat koneksi ke database
                            include "../conn.php"; // Gantilah dengan berkas koneksi yang sesuai

                            // Query SQL untuk mengambil data survei dengan nama pengguna
                            $query = "SELECT tb_survey.id, tb_survey.judul, tb_survey.tgl_buat, tb_user.username
                                    FROM tb_survey
                                    INNER JOIN tb_user ON tb_survey.id_user = tb_user.id";
                            $result = $koneksi->query($query);

                            if (!$result) {
                                die("Error in query: " . $koneksi->error); // Cetak pesan kesalahan
                            }
                        ?>

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>ID Survey</th>
                                <th>ID Pertanyaanl</th>
                                <th>Jawaban</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["id"] . "</td>";
                                    echo "<td>" . $row["id_survey"] . "</td>";
                                    echo "<td>" . $row["id_pertanyaan"] . "</td>";
                                    echo "<td>" . $row["jawaban"] . "</td>";
                                    echo '<td><a href="#">Edit</a> | <a href="#">Hapus</a></td>';
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>Tidak ada data survei.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function() {
    // Sembunyikan semua tabel kecuali dasbor saat halaman pertama dimuat
    $(".admin-table").hide();
    $("#dashboard").show(); // Tampilkan dasbor

    // Tampilkan tabel yang sesuai saat menu di sidebar diklik
    $(".list-group-item").click(function() {
        $(".admin-table").hide();
        var target = $(this).attr("href");
        $(target).show();
    });
});
</script>