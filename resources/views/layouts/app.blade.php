<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'KursusKu')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background: #fff7fb;
            color: #35283a;
        }

        .navbar-kursus {
            background: linear-gradient(90deg, #df3190, #f45b9d);
            padding: 12px 0;
            box-shadow: 0 3px 12px rgba(220, 45, 135, 0.15);
        }

        .navbar-kursus .logo {
            color: white;
            font-size: 22px;
            font-weight: 800;
            text-decoration: none;
        }

        .navbar-kursus .menu-link {
            color: white;
            text-decoration: none;
            font-weight: 500;
            margin-left: 20px;
            transition: 0.3s;
        }

        .navbar-kursus .menu-link:hover {
            color: #ffe0ef;
        }

        .main-content {
            padding-top: 30px;
            padding-bottom: 40px;
        }

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
        }
    </style>

    @stack('styles')
</head>

<body>

    <nav class="navbar-kursus">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="/" class="logo">KursusKu</a>

            <div class="menu">
                <a href="/" class="menu-link">Beranda</a>
                <a href="{{ route('courses.index') }}" class="menu-link">Courses</a>
                <a href="/pendaftaran" class="menu-link">Pendaftaran</a>
            </div>
        </div>
    </nav>

    <main class="container main-content">

        @yield('content')

    </main>

    @stack('scripts')

</body>
</html>
