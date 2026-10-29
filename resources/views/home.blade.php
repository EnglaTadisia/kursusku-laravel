
@extends('layouts.app')

@section('title', 'Beranda - KursusKu')

@section('content')

{{-- BAGIAN HERO / BANNER UTAMA --}}
<section class="py-5">
    <div class="p-4 p-md-5 rounded-4"
         style="background: linear-gradient(135deg, #fce4ec, #f8bbd0);">

        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <span class="badge rounded-pill mb-3"
                      style="background-color: #d63384;">
                    Kursus teknologi untuk mahasiswa
                </span>

                <h1 class="display-5 fw-bold mb-3"
                    style="color: #34303a;">
                    Belajar Lebih Terarah
                    Bersama KursusKu
                </h1>

                <p class="lead text-secondary mb-4">
                    Tingkatkan kemampuanmu dalam bidang teknologi
                    melalui kursus yang praktis, mudah dipahami,
                    dan sesuai kebutuhan.
                </p>

                <a href="{{ route('enrollments.create') }}"
                   class="btn btn-lg px-4 text-white"
                   style="background-color: #d63384; border-color: #d63384;">
                    Daftar Sekarang
                </a>

                <a href="#pilihan-kursus"
                   class="btn btn-outline-dark btn-lg px-4 ms-2">
                    Lihat Kursus
                </a>
            </div>

            {{-- KARTU LOGO ASLI KURSUSKU --}}
            <div class="col-lg-4 text-center">
                <div class="p-4 rounded-4 bg-white shadow-sm">

                    <img
                        src="{{ asset('images/hero-kursus.jpg') }}"
                        alt="Logo KursusKu"
                        class="img-fluid rounded-3"
                        style="width: 100%;
                               max-width: 280px;
                               height: auto;
                               object-fit: contain;"
                    >

                    <h3 class="h4 fw-bold mt-3"
                        style="color: #d63384;">
                        Mulai Belajar
                    </h3>

                    <p class="text-secondary mb-0">
                        Kembangkan keterampilan digitalmu bersama KursusKu.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- BAGIAN PILIHAN KURSUS --}}
<section id="pilihan-kursus" class="py-4">

    <div class="text-center mb-5">
        <span class="text-uppercase fw-bold"
              style="color: #d63384;">
            Program Pembelajaran
        </span>

        <h2 class="fw-bold mt-2">
            Pilihan Kursus Kami
        </h2>

        <p class="text-secondary">
            Pilih program yang sesuai dengan minat dan tujuan belajarmu.
        </p>
    </div>

    <div class="row g-4">

        {{-- KURSUS WEB DASAR --}}
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 rounded-4">
                <div class="card-body p-4">
                    <div class="rounded-3 p-3 mb-3 text-center"
                         style="background-color: #fce4ec; font-size: 42px;">
                        🌐
                    </div>

                    <h3 class="h5 fw-bold">Web Dasar</h3>

                    <p class="text-secondary">
                        Pelajari dasar HTML, CSS, dan cara membuat
                        halaman website yang menarik.
                    </p>

                    <a href="{{ route('enrollments.create') }}"
                       class="btn w-100 text-white"
                       style="background-color: #d63384; border-color: #d63384;">
                        Pilih Kursus
                    </a>
                </div>
            </div>
        </div>

        {{-- KURSUS PHP DASAR --}}
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 rounded-4">
                <div class="card-body p-4">
                    <div class="rounded-3 p-3 mb-3 text-center"
                         style="background-color: #fce4ec; font-size: 42px;">
                        💻
                    </div>

                    <h3 class="h5 fw-bold">PHP Dasar</h3>

                    <p class="text-secondary">
                        Kenali variabel, percabangan, perulangan,
                        dan logika pemrograman PHP.
                    </p>

                    <a href="{{ route('enrollments.create') }}"
                       class="btn w-100 text-white"
                       style="background-color: #d63384; border-color: #d63384;">
                        Pilih Kursus
                    </a>
                </div>
            </div>
        </div>

        {{-- KURSUS LARAVEL DASAR --}}
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 rounded-4">
                <div class="card-body p-4">
                    <div class="rounded-3 p-3 mb-3 text-center"
                         style="background-color: #fce4ec; font-size: 42px;">
                        🚀
                    </div>

                    <h3 class="h5 fw-bold">Laravel Dasar</h3>

                    <p class="text-secondary">
                        Pelajari routing, Blade template, layout,
                        dan dasar pembuatan aplikasi Laravel.
                    </p>

                    <a href="{{ route('enrollments.create') }}"
                       class="btn w-100 text-white"
                       style="background-color: #d63384; border-color: #d63384;">
                        Pilih Kursus
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- BAGIAN AJAKAN PENDAFTARAN --}}
<section class="py-5 mt-4">
    <div class="rounded-4 p-4 p-md-5 text-center"
         style="background-color: #fce4ec;">

        <h2 class="fw-bold mb-3">
            Siap Mengembangkan Kemampuanmu?
        </h2>

        <p class="text-secondary mb-4">
            Mulai perjalanan belajarmu dan pilih kursus
            yang sesuai dengan kebutuhanmu.
        </p>

        <a href="{{ route('enrollments.create') }}"
           class="btn btn-lg text-white px-4"
           style="background-color: #d63384; border-color: #d63384;">
            Mulai Pendaftaran
        </a>
    </div>
</section>

@endsection
