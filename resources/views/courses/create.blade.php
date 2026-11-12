
@extends('layouts.app')

@section('title', 'Tambah Kursus')

@section('content')

<style>
    body {
        background: linear-gradient(135deg, #fff0f6, #ffe0ed, #fff5fa);
        min-height: 100vh;
    }

    .course-wrapper {
        max-width: 650px;
        margin: 0 auto;
        padding: 15px 0 40px;
    }

    /* JUDUL */
    .course-heading {
        margin-bottom: 20px;
    }

    .course-heading h1 {
        color: #a51d62;
        font-size: 27px;
        font-weight: 800;
        margin-bottom: 6px;
    }

    .course-heading p {
        color: #a36b88;
        font-size: 14px;
    }

    /* HEADER PINK */
    .course-header {
        background: linear-gradient(100deg, #e72e91, #fa72b1);
        color: white;
        text-align: center;
        padding: 17px;
        border-radius: 50px;
        font-size: 23px;
        font-weight: 800;
        margin-bottom: 25px;
        box-shadow: 0 8px 18px rgba(224, 46, 139, 0.20);
    }

    /* FORM CARD */
    .course-card {
        background: rgba(255, 255, 255, 0.95);
        border: 1px solid #ffd1e5;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(219, 73, 143, 0.10);
    }

    /* LABEL */
    .course-card .form-label {
        color: #9e245e;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    /* INPUT */
    .course-card .form-control,
    .course-card .form-select {
        border: 1px solid #f5b5d2;
        border-radius: 11px;
        padding: 11px 13px;
        font-size: 13px;
        color: #75405b;
        background-color: #fffafd;
        box-shadow: none;
    }

    .course-card .form-control::placeholder {
        color: #c49bad;
    }

    .course-card .form-control:focus,
    .course-card .form-select:focus {
        border-color: #ec459a;
        background: #fff;
        box-shadow: 0 0 0 3px rgba(236, 69, 154, 0.12);
    }

    .course-card textarea {
        min-height: 110px;
        resize: vertical;
    }

    /* ERROR VALIDASI */
    .invalid-feedback-custom {
        color: #dc3545;
        font-size: 11px;
        margin-top: 5px;
    }

    .course-card .is-invalid {
        border-color: #dc3545;
    }

    /* GARIS PEMBATAS */
    .course-actions {
        border-top: 1px solid #f9dce9;
        padding-top: 20px;
        margin-top: 22px;
    }

    /* TOMBOL SIMPAN */
    .btn-save {
        background: linear-gradient(100deg, #e52e91, #f45ba5);
        color: white;
        border: none;
        border-radius: 30px;
        padding: 12px 23px;
        font-size: 13px;
        font-weight: 700;
        box-shadow: 0 5px 13px rgba(224, 46, 139, 0.20);
        transition: .3s;
    }

    .btn-save:hover {
        background: #c91e78;
        color: white;
        transform: translateY(-2px);
    }

    /* TOMBOL BATAL */
    .btn-cancel {
        background: white;
        color: #dc3689;
        border: 1px solid #ed6aaa;
        border-radius: 30px;
        padding: 11px 23px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: .3s;
    }

    .btn-cancel:hover {
        background: #fff0f6;
        color: #c51c72;
    }

    /* RESPONSIVE */
    @media(max-width: 576px) {
        .course-wrapper {
            padding: 10px 12px 30px;
        }

        .course-card {
            padding: 20px;
        }

        .course-header {
            font-size: 19px;
        }

        .course-heading h1 {
            font-size: 23px;
        }

        .course-actions {
            flex-wrap: wrap;
        }
    }
</style>

<div class="course-wrapper">

    <!-- JUDUL -->
    <div class="course-heading">
        <h1>Tambah Kursus</h1>
        <p>Isi data kursus baru, lalu klik Simpan.</p>
    </div>

    <!-- HEADER -->
    <div class="course-header">
        + Tambah Kursus
    </div>

    <!-- FORM -->
    <div class="course-card">

        <form method="POST" action="{{ route('courses.store') }}">
            @csrf

            <!-- KODE KURSUS -->
            <div class="mb-3">

                <label class="form-label" for="code">
                    ▦ Kode Kursus
                </label>

                <input
                    type="text"
                    class="form-control @error('code') is-invalid @enderror"
                    id="code"
                    name="code"
                    value="{{ old('code') }}"
                    placeholder="Masukkan kode kursus..."
                    maxlength="20"
                    required>

                @error('code')
                    <div class="invalid-feedback-custom">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <!-- NAMA KURSUS -->
            <div class="mb-3">

                <label class="form-label" for="name">
                    ♟ Nama Kursus
                </label>

                <input
                    type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Masukkan nama kursus..."
                    maxlength="120"
                    required>

                @error('name')
                    <div class="invalid-feedback-custom">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <!-- DESKRIPSI -->
            <div class="mb-3">

                <label class="form-label" for="description">
                    ▤ Deskripsi
                </label>

                <textarea
                    class="form-control @error('description') is-invalid @enderror"
                    id="description"
                    name="description"
                    rows="3"
                    placeholder="Masukkan deskripsi kursus...">{{ old('description') }}</textarea>

                @error('description')
                    <div class="invalid-feedback-custom">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <!-- BIAYA DAN KUOTA -->
            <div class="row">

                <!-- BIAYA -->
                <div class="col-md-6 mb-3">

                    <label class="form-label" for="fee">
                        Biaya (Rp)
                    </label>

                    <input
                        type="number"
                        class="form-control @error('fee') is-invalid @enderror"
                        id="fee"
                        name="fee"
                        value="{{ old('fee', 0) }}"
                        min="0"
                        placeholder="0"
                        required>

                    @error('fee')
                        <div class="invalid-feedback-custom">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <!-- KUOTA -->
                <div class="col-md-6 mb-3">

                    <label class="form-label" for="quota">
                        Kuota Peserta
                    </label>

                    <input
                        type="number"
                        class="form-control @error('quota') is-invalid @enderror"
                        id="quota"
                        name="quota"
                        value="{{ old('quota', 20) }}"
                        min="1"
                        max="500"
                        placeholder="20"
                        required>

                    @error('quota')
                        <div class="invalid-feedback-custom">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>

            <!-- TANGGAL DAN STATUS -->
            <div class="row">

                <!-- TANGGAL MULAI -->
                <div class="col-md-6 mb-3">

                    <label class="form-label" for="start_date">
                        Tanggal Mulai
                    </label>

                    <input
                        type="date"
                        class="form-control @error('start_date') is-invalid @enderror"
                        id="start_date"
                        name="start_date"
                        value="{{ old('start_date') }}"
                        required>

                    @error('start_date')
                        <div class="invalid-feedback-custom">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <!-- STATUS -->
                <div class="col-md-6 mb-3">

                    <label class="form-label" for="status">
                        Status
                    </label>

                    <select
                        class="form-select @error('status') is-invalid @enderror"
                        id="status"
                        name="status"
                        required>

                        <option value="draft"
                            {{ old('status', 'draft') == 'draft' ? 'selected' : '' }}>
                            Draft
                        </option>

                        <option value="open"
                            {{ old('status') == 'open' ? 'selected' : '' }}>
                            Open
                        </option>

                        <option value="closed"
                            {{ old('status') == 'closed' ? 'selected' : '' }}>
                            Closed
                        </option>

                    </select>

                    @error('status')
                        <div class="invalid-feedback-custom">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>

            <!-- TOMBOL -->
            <div class="course-actions d-flex justify-content-center gap-3">

                <button type="submit" class="btn btn-save">
                    ✓ Simpan Kursus
                </button>

                <a href="{{ route('courses.index') }}"
                   class="btn btn-cancel">
                    ↶ Kembali
                </a>

            </div>

        </form>

    </div>

</div>

@endsection
