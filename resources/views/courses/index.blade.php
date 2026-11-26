@extends('layouts.app')

@section('title', 'Daftar Kursus')

@push('styles')
<style>
    .course-page {
        width: 100%;
    }

    .course-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        gap: 15px;
    }

    .course-heading h1 {
        font-size: 28px;
        font-weight: 750;
        color: #35283a;
        margin: 0 0 5px;
    }

    .course-heading h1 span {
        color: #df3190;
    }

    .course-heading p {
        color: #888;
        margin: 0;
        font-size: 14px;
    }

    .btn-kursus {
        background: #df3190;
        color: white;
        border: none;
        border-radius: 9px;
        padding: 11px 19px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        white-space: nowrap;
        transition: .2s;
    }

    .btn-kursus:hover {
        background: #c91e7b;
        color: white;
    }

    .course-box {
        background: white;
        border: 1px solid #f5dce9;
        border-radius: 14px;
        padding: 18px;
        box-shadow: 0 4px 15px rgba(200, 70, 130, .07);
    }

    .course-filter {
        background: #fff8fc;
        border: 1px solid #f5dce9;
        border-radius: 11px;
        padding: 15px;
        margin-bottom: 20px;
    }

    .course-filter label {
        display: block;
        color: #a82b6d;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 7px;
    }

    .course-filter .form-control,
    .course-filter .form-select {
        border: 1px solid #efc6dc;
        border-radius: 8px;
        padding: 10px 12px;
        font-size: 13px;
        color: #493b48;
        background-color: white;
        min-height: 42px;
    }

    .course-filter .form-control:focus,
    .course-filter .form-select:focus {
        border-color: #df3190;
        box-shadow: 0 0 0 3px rgba(223, 49, 144, .12);
    }

    .btn-search {
        background: #df3190;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 10px 19px;
        font-size: 13px;
        font-weight: 600;
        min-height: 42px;
        transition: .2s;
    }

    .btn-search:hover {
        background: #c91e7b;
        color: white;
    }

    .btn-reset {
        background: white;
        color: #c52b7d;
        border: 1px solid #e9a9ca;
        border-radius: 8px;
        padding: 10px 17px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        min-height: 42px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: .2s;
    }

    .btn-reset:hover {
        background: #ffe7f2;
        color: #b51f70;
    }

    .filter-title {
        color: #c52b7d;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 13px;
    }

    .course-footer {
        text-align: center;
        color: #d94b91;
        font-size: 13px;
        margin-top: 25px;
        font-style: italic;
    }

    @media(max-width: 576px) {
        .course-heading {
            align-items: flex-start;
            flex-direction: column;
        }

        .course-heading h1 {
            font-size: 24px;
        }

        .btn-kursus {
            width: 100%;
            text-align: center;
        }

        .course-box {
            padding: 10px;
        }

        .course-filter {
            padding: 12px;
        }
    }
</style>
@endpush

@section('content')

<div class="course-page">

    {{-- NOTIFIKASI BERHASIL --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show"
             role="alert"
             style="border-radius: 12px; border: 1px solid #f3c1d9; background: #fff0f7; color: #bd2878;">

            <strong>✓ Berhasil!</strong>
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    {{-- JUDUL HALAMAN --}}
    <div class="course-heading">
        <div>
            <h1>Daftar <span>Kursus</span></h1>
            <p>Kelola dan lihat semua data kursus di KursusKu.</p>
        </div>

        <a href="{{ route('courses.create') }}" class="btn-kursus">
            + Tambah Kursus
        </a>
    </div>

    <div class="course-box">

        {{-- FORM SEARCH DAN FILTER --}}
        <div class="course-filter">

            <div class="filter-title">
                🔍 Pencarian dan Filter Kursus
            </div>

            <form method="GET"
                  action="{{ route('courses.index') }}"
                  id="course-search-form"
                  class="row g-3 align-items-end">

                {{-- INPUT PENCARIAN --}}
                <div class="col-md-6">
                    <label for="live-search">Cari Kursus</label>

                    <input
                        id="live-search"
                        type="search"
                        name="q"
                        value="{{ $search ?? request('q') }}"
                        class="form-control"
                        placeholder="Cari kode atau nama kursus">
                </div>

                {{-- FILTER STATUS --}}
                <div class="col-md-3">
                    <label for="status-filter">Filter Status</label>

                    <select
                        id="status-filter"
                        name="status"
                        class="form-select">

                        <option value="">Semua Status</option>

                        <option value="open"
                            @selected(($status ?? request('status')) == 'open')>
                            Open
                        </option>

                        <option value="closed"
                            @selected(($status ?? request('status')) == 'closed')>
                            Closed
                        </option>

                        <option value="draft"
                            @selected(($status ?? request('status')) == 'draft')>
                            Draft
                        </option>

                    </select>
                </div>

                {{-- TOMBOL CARI DAN RESET --}}
                <div class="col-md-3 d-flex gap-2">

                    <button type="submit" class="btn-search">
                        Cari
                    </button>

                    <a href="{{ route('courses.index') }}"
                       class="btn-reset"
                       id="reset-course">
                        Reset
                    </a>

                </div>

            </form>
        </div>

        {{-- HASIL PENCARIAN DAN TABEL --}}
        <div id="course-results">
            @include('courses._results')
        </div>

    </div>

    {{-- FOOTER --}}
    <div class="course-footer">
        Belajar Lebih Mudah, Raih Masa Depan Lebih Baik.
    </div>

</div>

{{-- AJAX SEARCH --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('course-search-form');
    const results = document.getElementById('course-results');
    const resetButton = document.getElementById('reset-course');

    if (!form || !results) return;

    const searchUrl = form.action;

    // FUNGSI MEMUAT DATA KURSUS
    function loadCourses(url) {

        const requestUrl = new URL(url, window.location.origin);

        requestUrl.searchParams.set('partial', '1');

        results.style.opacity = '0.5';

        fetch(requestUrl.toString(), {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Gagal memuat data kursus.');
            }

            return response.text();
        })
        .then(html => {

            results.innerHTML = html;
            results.style.opacity = '1';

            const visibleUrl = new URL(requestUrl);

            visibleUrl.searchParams.delete('partial');

            window.history.pushState(
                {},
                '',
                visibleUrl.toString()
            );
        })
        .catch(error => {

            results.style.opacity = '1';

            console.error(error);

            alert('Terjadi kesalahan saat memuat data kursus.');
        });
    }

    // PENCARIAN DAN FILTER
    form.addEventListener('submit', function (event) {

        event.preventDefault();

        const params = new URLSearchParams(
            new FormData(form)
        );

        loadCourses(
            searchUrl + '?' + params.toString()
        );
    });

    // KLIK PAGINATION
    results.addEventListener('click', function (event) {

        const link = event.target.closest('.pagination a');

        if (!link) return;

        event.preventDefault();

        loadCourses(link.href);
    });

    // TOMBOL RESET
    resetButton.addEventListener('click', function (event) {

        event.preventDefault();

        form.reset();

        loadCourses(searchUrl);
    });

    // TOMBOL KEMBALI DAN MAJU BROWSER
    window.addEventListener('popstate', function () {

        const url = new URL(window.location.href);

        loadCourses(url.toString());
    });

});
</script>

@endsection
