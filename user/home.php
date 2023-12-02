<?php
session_start(); 
if (!isset($_SESSION['id'])) {
    // Redirect atau berikan pesan kesalahan
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SurveyOnline - Beranda</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tautkan Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .custom-search {
            width: 450px;
        }

        .card-shadow {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">SurveyOnline</a>
            <form class="d-flex" method="GET" action="search.php">
                <input class="form-control custom-search" type="search" placeholder="Cari survei..." name="keyword">
                <button class="btn btn-outline-success" type="submit">Cari</button>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link " href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i> <?php echo $_SESSION['username']; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="user-profile.php">
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

    <!-- Hero Section -->
    <section class="container mt-5">
        <div>
            <p>Mulai Form Formulir</p>
            <div class="row row-cols-1 row-cols-md-4 row-cols-lg-6">
                <div class="col mb-3">
                    <a href="survey_add.php">
                        <div class="card card-shadow" style="width: 100%;">
                            <img src="../image/tambah.png" class="card-img-top" alt="...">
                        </div>
                    </a>
                    <p class="mt-1">Kosong</p>
                </div>

                <div class="col mb-3">
                    <a href="survey-add.php">
                        <div class="card card-shadow" style="width: 100%;">
                            <img src="../image/tambah.png" class="card-img-top" alt="...">
                        </div>
                    </a>
                    <p class="mt-1">Kosong</p>
                </div>

                <div class="col mb-3">
                    <a href="survey-add.php">
                        <div class="card card-shadow" style="width: 100%;">
                            <img src="../image/tambah.png" class="card-img-top" alt="...">
                        </div>
                    </a>
                    <p class="mt-1">Kosong</p>
                </div>

                <div class="col mb-3">
                    <a href="survey-add.php">
                        <div class="card card-shadow" style="width: 100%;">
                            <img src="../image/tambah.png" class="card-img-top" alt="...">
                        </div>
                    </a>
                    <p class="mt-1">Kosong</p>
                </div>

                <div class="col mb-3">
                    <a href="survey-add.php">
                        <div class="card card-shadow" style="width: 100%;">
                            <img src="../image/tambah.png" class="card-img-top" alt="...">
                        </div>
                    </a>
                    <p class="mt-1">Kosong</p>
                </div>

                <div class="col mb-3">
                    <a href="survey-add.php">
                        <div class="card card-shadow" style="width: 100%;">
                            <img src="../image/tambah.png" class="card-img-top" alt="...">
                        </div>
                    </a>
                    <p class="mt-1">Kosong</p>
                </div>
            </div>
        </div>

        <br>
        <br>

        <div>
            <p>Mulai Form Formulir</p>
            <div class="row row-cols-1 row-cols-md-4 row-cols-lg-6">
                <div class="col mb-3">
                    <a href="survey-add.php">
                        <div class="card card-shadow" style="width: 100%;">
                            <img src="../image/tambah.png" class="card-img-top" alt="...">
                        </div>
                    </a>
                    <p class="mt-1">Kosong</p>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


