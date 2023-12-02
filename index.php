<!DOCTYPE html>
<html>
<head>
    <title>SurveyOnline - Platform Survei/Kuesioner Online</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        .form-container {
            display: none;
        }
        .active {
            display: block;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
        }
        .button-container button {
            flex: 1;
        }
    </style>
</head>
<body>
    <header class="bg-light p-3 navbar-light bg-light">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center ">
                <h1 class="logo">SurveyOnline</h1>
                <nav>
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Masuk</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <div class="col-md-11">
                <div class="button-container">                                        
                    <button id="show-login" class="btn btn-success  " >Login</button>                                                
                    <button id="show-register" class="btn  ">Register</button>
                </div>
            </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="container mt-2">
        <div class="row justify-content-center">
           
              
                      

                        <!-- Form Login -->
                        <div class="form-container active mt-2" id="login-form">
                      
                            <form method="post" action="login.php">
                                <div class="mb-3">
                                    <label for="login-username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="login-username" name="username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="login-password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="login-password" name="password" required>
                                </div>
                                <button type="submit" name="login" class="btn btn-success btn-block">
                                    <i class="fas fa-sign-in-alt"></i> Login
                                </button>
                            </form>
                        </div>

                        <!-- Form Register -->
                        <div class="form-container mt-2" id="register-form">
                            <form method="post" action="register.php">
                                <div class="mb-3">
                                    <label for="register-username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="register-username" name="username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="register-email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="register-email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="register-password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="register-password" name="password" required>
                                </div>
                                <div class="mb-3" hidden>
                                    <label for="register-role" class="form-label">Peran</label>
                                    <select class="form-select" id="register-role" name="peran" >
                                        <option value="user">User</option>
                                    </select>
                                </div>
                                <button type="submit" name="register" class="btn btn-success btn-block">
                                    <i class="fas fa-user-plus"></i> Register
                                </button>
                            </form>
                   
                
            </div>
        </div>
    </div>
            </div>
        </div>
    </div>
    </div>




    <section class="hero bg-primary text-center py-5 text-white">
        <div class="container">
            <h2>Buat Survei/Kuesioner Online dengan Mudah</h2>
            <p>SurveyOnline adalah platform yang memudahkan Anda membuat survei dan mengumpulkan tanggapan dari responden dengan cepat. Dapatkan wawasan berharga dari pelanggan, karyawan, atau audiens Anda.</p>
            <a href="create-survey.php" class="btn btn-warning">Mulai Buat Survei Sekarang <i class="fas fa-arrow-right"></i></a>
        </div>
    </section>
    
    <section class="features text-center py-5">
    <div class="container">
        <h3>Feature</h3>
        <br>
        <div class="row">
            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-body">
                        <i class="fas fa-mobile-alt fa-3x mb-3 text-primary"></i>
                        <h3>Responsif</h3>
                        <p>Desain yang responsif untuk survei yang terlihat hebat di semua perangkat.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-body">
                        <i class="fas fa-chart-bar fa-3x mb-3 text-primary"></i>
                        <h3>Analisis Lanjutan</h3>
                        <p>Peroleh wawasan mendalam dengan analisis statistik yang kuat.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-body">
                        <i class="fas fa-lock fa-3x mb-3 text-primary"></i>
                        <h3>Keamanan Data</h3>
                        <p>Kami mengutamakan keamanan data responden dan survei Anda. Data Anda aman bersama kami.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    
    <section class="testimonials bg-light text-center py-5">
        <div class="container">
            <h3>Testimoni Pelanggan</h3>
            <br>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card p-4">
                        <div class="card-body">
                            <i class="fas fa-user fa-3x text-primary mb-3"></i>
                           
                            <p>"SurveyOnline membantu kami mendapatkan masukan pelanggan dengan cepat. Luar biasa!"</p>
                            <p><strong>Nyoman</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card p-4">
                        <div class="card-body">
                            <i class="fas fa-user fa-3x text-primary mb-3"></i>
                        
                            <p>"Platform ini sangat mudah digunakan dan memberikan hasil yang berkualitas."</p>
                            <p><strong>Ketut</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="navbar-light text-center py-3">
        <div class="container">
            <p>&copy; 2023 SurveyOnline. Hak Cipta Dilindungi.</p>
        </div>
    </footer>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const loginButton = document.getElementById("show-login");
        const registerButton = document.getElementById("show-register");
        const loginForm = document.getElementById("login-form");
        const registerForm = document.getElementById("register-form");

        loginButton.addEventListener("click", () => {
            loginForm.classList.add("active");
            registerForm.classList.remove("active");
            loginButton.classList.add("btn-success");
            registerButton.classList.remove("btn-success");
            registerButton.classList.add("btn");
        });

        registerButton.addEventListener("click", () => {
            registerForm.classList.add("active");
            loginForm.classList.remove("active");
            registerButton.classList.add("btn-success");
            loginButton.classList.remove("btn-success");
            loginButton.classList.add("btn");
        });
    </script>