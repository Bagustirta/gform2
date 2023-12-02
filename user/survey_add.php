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
    <title>Buat Survey</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }
        .survey-form {
            max-width: 800px;
            margin: auto;
        }
        .question-container {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
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

<section class="container mt-5">
    <div class="survey-form">
        <form id="surveyForm" action="proses_survey.php" method="POST">
            <!-- Input Judul Survey -->
            <div class="mb-3">
                <label for="judulSurvey">Judul Survey:</label>
                <input type="text" id="judulSurvey" name="judul" class="form-control" required placeholder="Judul Survey">
            </div>

            <!-- Container untuk Pertanyaan -->
            <div id="pertanyaanContainer">
                <div class="question-container">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="pertanyaan">Pertanyaan:</label>
                            <textarea type="text" id="pertanyaan" name="pertanyaan[]" class="form-control auto-size" oninput="autoSize(this)" required> </textarea>
                        </div>

                        <div class="col mb-3">
                            <label for="tipePertanyaan">Tipe Pertanyaan:</label>
                            <select id="tipePertanyaan" name="jenis[]" class="form-select" onchange="tipePertanyaanChanged(this)">
                                <option value="pilihan">Pilihan</option>
                                <option value="isian">Isian</option>
                                <option value="centang">Centang </option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3" id="opsiContainer">
                        <!-- Konten opsi akan ditambahkan di sini sesuai tipe pertanyaan -->
                    </div>

                    <div class="container text-center ">
                        <div class="row row-cols-auto">
                            <a class="col" type="button" onclick="tambahOpsi(this)">
                                <i class="fas fa-plus"></i> 
                            </a>

                            <a class="col" type="button"  onclick="hapusPertanyaan(this)">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Tombol Simpan dan Generate Link -->
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-success" onclick="generateLink()">
                <i class="fas fa-link"></i> Generate Link
            </button>
            <button type="button" class="btn btn-info" onclick="tambahPertanyaan()">
                <i class="fas fa-plus"></i> Tambah Pertanyaan
            </button>
        </form>
    </div>
</section>

<!-- Bootstrap 5.3 JavaScript (Bundle) and FontAwesome JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

<script>
    // Fungsi untuk mengatur ukuran otomatis textarea
    function autoSize(element) {
        element.style.height = 'auto';
        element.style.height = (element.scrollHeight) + 'px';
        element.style.resize = 'none';
        element.style.overflowY = 'hidden';
    }

    // Fungsi untuk menambah pertanyaan baru
    function tambahPertanyaan() {
        var pertanyaanContainer = document.getElementById('pertanyaanContainer');

        // Form Pertanyaan Baru
        var newQuestionContainer = document.createElement('div');
        newQuestionContainer.classList.add('question-container');
        newQuestionContainer.innerHTML = `
            <div class="row">
                <div class="col mb-3">
                    <label for="pertanyaan">Pertanyaan:</label>
                    <textarea type="text" name="pertanyaan[]" class="form-control auto-size" oninput="autoSize(this)" required> </textarea>
                </div>

                <div class="col mb-3">
                    <label for="tipePertanyaan">Tipe Pertanyaan:</label>
                    <select name="jenis[]" class="form-select" onchange="tipePertanyaanChanged(this)">
                        <option value="pilihan">Pilihan</option>
                        <option value="isian">Isian</option>
                        <option value="centang">Centang </option>
                    </select>
                </div>
            </div>

            <div class="mb-3" id="opsiContainer">
                <!-- Konten opsi akan ditambahkan di sini sesuai tipe pertanyaan -->
            </div>

            <div class="container text-center ">
                <div class="row row-cols-auto">
                    <a class="col" type="button" onclick="tambahOpsi(this)">
                        <i class="fas fa-plus"></i> 
                    </a>

                    <a class="col" type="button"  onclick="hapusPertanyaan(this)">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </div>
            </div>
        `;

        pertanyaanContainer.appendChild(newQuestionContainer);
    }

    // Fungsi untuk menambah opsi pada pertanyaan dengan tipe "Pilihan"
   // Fungsi untuk menambah opsi pada pertanyaan dengan tipe "Pilihan" atau "Centang"
function tambahOpsi(button) {
    var pertanyaanContainer = button.closest('.question-container');
    if (!pertanyaanContainer) {
        console.error("Parent question-container not found");
        return;
    }

    var opsiContainer = pertanyaanContainer.querySelector('.mb-3#opsiContainer');
    var tipePertanyaanSelect = pertanyaanContainer.querySelector('select[name="jenis[]"]');
    var tipePertanyaan = tipePertanyaanSelect.value;

    // Menambahkan opsi pertama untuk tipe 'Pilihan' atau 'Centang'
    if (tipePertanyaan === 'pilihan' || tipePertanyaan === 'centang') {
        var option = document.createElement('div');
        option.classList.add('mb-3');
        option.innerHTML = `
            <input class="form-check-input" type="${tipePertanyaan === 'pilihan' ? 'radio' : 'checkbox'}" name="teks_jawaban[${pertanyaanContainer.dataset.index}][]">
            <label class="form-check-label flex-grow-1">
                <input type="text" class="form-control" value="Pilihan" name="teks_jawaban[${pertanyaanContainer.dataset.index}][]" required>
            </label>
            <i class="fas fa-times" style="cursor: pointer; margin-left: 5px;" onclick="hapusOpsi(this)"></i>
        `;
        opsiContainer.appendChild(option);
    }
}

// Fungsi untuk menghapus opsi pada pertanyaan dengan tipe "Pilihan" atau "Centang"
function hapusOpsi(button) {
    var opsiContainer = button.closest('.mb-3');
    opsiContainer.parentNode.removeChild(opsiContainer);
}

// Fungsi yang dipanggil saat tipe pertanyaan diubah
function tipePertanyaanChanged(select) {
    var pertanyaanContainer = select.closest('.question-container');
    if (!pertanyaanContainer) {
        console.error("Parent question-container not found");
        return;
    }

    var opsiContainer = pertanyaanContainer.querySelector('.mb-3#opsiContainer');

    // Menghapus opsi sebelumnya saat mengubah tipe
    opsiContainer.innerHTML = '';

    if (select.value === 'pilihan' || select.value === 'centang') {
        // Menambahkan opsi pertama untuk tipe 'Pilihan' atau 'Centang'
        tambahOpsi(pertanyaanContainer.querySelector('button'));
    } else if (select.value === 'isian') {
        // Menambahkan form isian kosong untuk tipe 'Isian'
        var inputGroup = document.createElement('div');
        inputGroup.classList.add('mb-3');
        inputGroup.innerHTML = `
            <label for="jawabanIsian">Jawaban Isian:</label>
            <input type="text" name="jawabanIsian[${pertanyaanContainer.dataset.index}][]" class="form-control auto-size" oninput="autoSize(this)">
        `;

        opsiContainer.appendChild(inputGroup);
    }
}

    // Fungsi untuk menghapus pertanyaan
    function hapusPertanyaan(button) {
        var pertanyaanContainer = document.getElementById('pertanyaanContainer');
        pertanyaanContainer.removeChild(button.closest('.question-container'));
    }
</script>

</body>
</html>