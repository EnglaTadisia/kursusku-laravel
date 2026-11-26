<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Kursusku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #fff0f5;
            color: #444;
        }

        /* NAVBAR */
        .navbar {
            background: #c2185b;
            padding: 16px 0;
        }

        .navbar-brand {
            color: white !important;
            font-size: 23px;
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: white !important;
            margin-left: 15px;
            font-weight: 500;
        }

        .navbar-nav .nav-link:hover {
            color: #ffd6e5 !important;
        }

        /* LOGIN */
        .login-section {
            min-height: 85vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 45px 15px;
        }

        .login-card {
            background: white;
            width: 100%;
            max-width: 480px;
            padding: 38px;
            border-radius: 18px;
            box-shadow: 0 8px 30px rgba(194, 24, 91, 0.12);
        }

        .login-card h2 {
            color: #ad1457;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #888;
            margin-bottom: 28px;
            font-size: 14px;
        }

        .form-label {
            font-weight: 600;
            color: #444;
            margin-bottom: 8px;
        }

        .form-control {
            height: 45px;
            border: 1px solid #f3c4d5;
            border-radius: 8px;
            padding: 10px 13px;
        }

        .form-control:focus {
            border-color: #ec407a;
            box-shadow: 0 0 0 3px rgba(236, 64, 122, 0.12);
        }

        .btn-show {
            border: 1px solid #f3c4d5;
            background: #fff0f5;
            color: #c2185b;
            padding: 0 15px;
        }

        .btn-show:hover {
            background: #fce4ec;
            color: #ad1457;
        }

        .form-check-input:checked {
            background-color: #ec407a;
            border-color: #ec407a;
        }

        .form-check-input:focus {
            box-shadow: 0 0 0 3px rgba(236, 64, 122, 0.15);
        }

        .forgot-link {
            color: #d81b60;
            font-size: 13px;
            text-decoration: underline;
        }

        .btn-login {
            width: 100%;
            background: #ec407a;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 16px;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: #c2185b;
            color: white;
        }

        .register-text {
            color: #777;
            font-size: 14px;
            margin-top: 23px;
        }

        .register-text a,
        .back-home {
            color: #d81b60;
            font-weight: 600;
            text-decoration: none;
        }

        .register-text a:hover,
        .back-home:hover {
            text-decoration: underline;
        }

        .back-home {
            display: inline-block;
            margin-top: 10px;
            font-size: 14px;
        }

        @media (max-width: 576px) {
            .login-card {
                padding: 25px 20px;
            }

            .login-card h2 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg">
    <div class="container">

        <a class="navbar-brand" href="/">
            Kursusku
        </a>

        <button class="navbar-toggler bg-light"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menuNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuNavbar">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a href="/" class="nav-link">Beranda</a>
                </li>

                <li class="nav-item">
                    <a href="/pendaftaran" class="nav-link">Pendaftaran</a>
                </li>

                <li class="nav-item">
                    <a href="/course" class="nav-link">Course</a>
                </li>

                <li class="nav-item">
                    <a href="/enrollment" class="nav-link">Enrollment</a>
                </li>

                <li class="nav-item">
                    <a href="/login" class="nav-link">Login</a>
                </li>

            </ul>
        </div>
    </div>
</nav>


<!-- HALAMAN LOGIN -->
<section class="login-section">

    <div class="login-card">

        <h2>Selamat Datang 👋</h2>

        <p class="subtitle">
            Masuk dengan username atau email untuk melanjutkan.
        </p>

        <!-- ALERT ERROR -->
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- FORM LOGIN -->
        <form action="{{ route('login.process') }}" method="POST">

            @csrf

            <!-- USERNAME -->
            <div class="mb-3">

                <label class="form-label">
                    Username / Email
                </label>

                <input
                    type="text"
                    name="username"
                    class="form-control"
                    placeholder="Masukkan username atau email"
                    value="{{ old('username') }}"
                    required
                    autofocus
                >

            </div>

            <!-- PASSWORD -->
            <div class="mb-3">

                <label class="form-label">
                    Password
                </label>

                <div class="input-group">

                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control"
                        placeholder="Masukkan password"
                        required
                    >

                    <button
                        type="button"
                        class="btn btn-show"
                        onclick="togglePassword()">
                        Lihat
                    </button>

                </div>

            </div>

            <!-- REMEMBER & FORGOT -->
            <div class="d-flex justify-content-between align-items-center mb-4">

                <div class="form-check">

                    <input
                        type="checkbox"
                        name="remember"
                        value="1"
                        class="form-check-input"
                        id="remember"
                    >

                    <label class="form-check-label" for="remember">
                        Ingat saya
                    </label>

                </div>

                <a href="{{ Route::has('password.request') ? route('password.request') : '#' }}"
                   class="forgot-link">
                    Lupa password?
                </a>

            </div>

            <!-- BUTTON LOGIN -->
            <button type="submit" class="btn-login">
                Masuk
            </button>

        </form>

        <!-- REGISTER -->
        <div class="text-center">

            <p class="register-text">
                Belum punya akun?

                <a href="{{ Route::has('register') ? route('register') : url('/register') }}">
                    Daftar sekarang
                </a>
            </p>

            <a href="/" class="back-home">
                ← Kembali ke Beranda
            </a>

        </div>

    </div>

</section>

<script>
    function togglePassword() {

        const password = document.getElementById("password");
        const button = document.querySelector(".btn-show");

        if (password.type === "password") {
            password.type = "text";
            button.innerText = "Sembunyikan";
        } else {
            password.type = "password";
            button.innerText = "Lihat";
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
