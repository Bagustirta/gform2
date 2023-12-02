
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
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
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="button-container">
                            <button id="show-login" class="btn btn-success">Login</button>
                            <button id="show-register" class="btn ">Register</button>
                        </div>

                        <!-- Form Login -->
                        <div class="form-container" id="login-form">
                            <form method="post" action="handle.php">
                                <div class="mb-3">
                                    <label for="login-email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="login-email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="login-password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="login-password" name="password" required>
                                </div>
                                <button type="submit" name="login" class="btn btn-success">
                                    <i class="fas fa-sign-in-alt"></i> Login
                                </button>
                            </form>
                        </div>

                        <!-- Form Register -->
                        <div class="form-container" id="register-form">
                            <form method="post" action="handle.php">
                                <div class="mb-3">
                                    <label for="register-name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="register-name" name="nama" required>
                                </div>
                                <div class="mb-3">
                                    <label for "register-email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="register-email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="register-password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="register-password" name="password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="register-role" class="form-label">Peran</label>
                                    <select class="form-select" id="register-role" name="peran" required>
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                                <button type="submit" name="register" class="btn btn-success">
                                    <i class="fas fa-user-plus"></i> Register
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const loginButton = document.getElementById("show-login");
        const registerButton = document.getElementById("show-register");
        const loginForm = document.getElementById("login-form");
        const registerForm = document.getElementById("register-form");

        loginButton.addEventListener("click", () => {
            loginForm.classList.add("active");
            registerForm.classList.remove("active");
        });

        registerButton.addEventListener("click", () => {
            registerForm.classList.add("active");
            loginForm.classList.remove("active");
        });
    </script>
</body>
</html>
