<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna - SurveyOnline</title>
    <!-- Tautkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tautkan Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Gaya CSS Khusus untuk Halaman User Profile -->
    <style>
        /* Gaya untuk container profil pengguna */
        .user-profile-container {
            padding: 20px;
            background-color: #f8f9fa;
            border: 1px solid #d1d1d1;
            border-radius: 5px;
        }

        /* Gaya untuk card profil pengguna */
        .user-profile-card {
            background-color: #fff;
            border: 1px solid #d1d1d1;
            border-radius: 5px;
        }

        /* Gaya untuk daftar survei/kuesioner */
        .survey-list {
            list-style-type: none;
            padding: 0;
        }

        .survey-list li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">SurveyOnline</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="user-profile.php">
                        <i class="fas fa-user"></i> Nama Pengguna
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Container untuk Profil Pengguna -->
    <div class="container mt-5 user-profile-container">
        <div class="row">
            <div class="col-md-5">
                <!-- Informasi Profil Pengguna -->
                <div class="card user-profile-card">
                    <div class="card-body">
                        <h5 class="card-title">Profil Pengguna</h5>
                        <p class="card-text">
                            <i class="fas fa-user"></i> Nama Pengguna: Nama Anda<br>
                            <i class="fas fa-envelope"></i> Email: email@example.com
                        </p>
                        <a href="#" class="btn btn-primary">Edit Profil</a>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <!-- Daftar Survei/Kuesioner Pengguna -->
                <h2>Daftar Survei/Kuesioner Saya</h2>
                <ul class="survey-list">
                    <li><a href="survey.php">Judul Survei/Kuesioner 1</a></li>
                    <li><a href="survey.php">Judul Survei/Kuesioner 2</a></li>
                    <!-- Tambahkan daftar survei lainnya -->
                </ul>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (dengan Popper.js dan jQuery) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
