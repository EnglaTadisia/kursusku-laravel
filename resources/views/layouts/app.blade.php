<!doctype html>
<html lang="id">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'KursusKu')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

        /* BACKGROUND */
        body {
            background: #fff7fb;
            color: #35283a;
            margin: 0;
        }

        /* NAVBAR */
        .navbar-kursus {
            background: linear-gradient(90deg, #df3190, #f45b9d);
            padding: 12px 0;
            box-shadow: 0 3px 12px rgba(220, 45, 135, 0.15);
        }

        /* LOGO */
        .navbar-kursus .logo {
            color: white;
            font-size: 22px;
            font-weight: 800;
            text-decoration: none;
        }

        /* MENU */
        .navbar-kursus .menu-link {
            color: white;
            text-decoration: none;
            font-weight: 500;
            margin-left: 20px;
            transition: 0.3s;
            font-size: 14px;
        }

        .navbar-kursus .menu-link:hover {
            color: #ffe0ef;
        }

        /* TOMBOL LOGOUT */
        .navbar-kursus .logout-btn {
            color: white;
            background: transparent;
            border: none;
            font-weight: 500;
            margin-left: 20px;
            cursor: pointer;
            font-size: 14px;
            transition: 0.3s;
        }

        .navbar-kursus .logout-btn:hover {
            color: #ffe0ef;
        }

        /* KONTEN */
        .main-content {
            padding-top: 30px;
            padding-bottom: 40px;
        }

        /* RESPONSIVE */
        @media(max-width: 576px) {

            .navbar-kursus .container {
                flex-direction: column;
                gap: 15px;
            }

            .navbar-kursus .menu {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 12px;
            }

            .navbar-kursus .menu-link {
                margin-left: 0;
                font-size: 13px;
            }

            .navbar-kursus .logout-btn {
                margin-left: 0;
                font-size: 13px;
            }
        }

    </style>

    @stack('styles')

</head>

<body>

    <!-- NAVBAR KURSUSKU -->
    <nav class="navbar-kursus">

        <div class="container d-flex justify-content-between align-items-center">

            <!-- LOGO -->
            <a href="{{ route('home') }}" class="logo">
                KursusKu
            </a>

            <!-- MENU NAVBAR -->
            <div class="menu">

                <a href="{{ route('home') }}" class="menu-link">
                    Beranda
                </a>

                <a href="{{ route('courses.index') }}" class="menu-link">
                    Courses
                </a>

                <a href="{{ route('pendaftaran') }}" class="menu-link">
                    Pendaftaran
                </a>

                <!-- JIKA BELUM LOGIN -->
                @guest

                    <a href="{{ route('login') }}" class="menu-link">
                        Login
                    </a>

                @else

                    <!-- JIKA SUDAH LOGIN -->

                    <a href="{{ route('account.profile') }}" class="menu-link">
                        Akun Saya
                    </a>

                    <form action="{{ route('logout') }}"
                          method="POST"
                          style="display: inline;">

                        @csrf

                        <button type="submit" class="logout-btn">
                            Logout
                        </button>

                    </form>

                @endguest

            </div>

        </div>

    </nav>


    <!-- KONTEN HALAMAN -->
    <main class="container main-content">

        <!-- PESAN BERHASIL -->
        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif

        <!-- PESAN ERROR -->
        @if($errors->any())

            <div class="alert alert-danger">

                @foreach($errors->all() as $error)

                    <div>{{ $error }}</div>

                @endforeach

            </div>

        @endif

        @yield('content')

    </main>


    <!-- JAVASCRIPT -->
    @stack('scripts')

</body>
</html>
