
@extends('layouts.app')

@section('title', 'Tambah Enrollment')

@section('content')

<style>
    .enroll-wrapper {
        background: #fff8fc;
        min-height: 85vh;
        padding: 35px;
    }

    .enroll-top {
        margin-bottom: 25px;
    }

    .enroll-top h2 {
        font-size: 27px;
        font-weight: 700;
        color: #333;
        margin-bottom: 5px;
    }

    .enroll-top p {
        color: #888;
        font-size: 14px;
    }

    .enroll-container {
        display: grid;
        grid-template-columns: 260px 1fr;
        background: white;
        border: 1px solid #f5dce9;
        border-radius: 12px;
        overflow: hidden;
        max-width: 1000px;
    }

    .enroll-info {
        background: #fce7f2;
        padding: 30px 25px;
    }

    .enroll-info h3 {
        color: #c52c7d;
        font-size: 21px;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .enroll-info p {
        color: #79556a;
        font-size: 14px;
        line-height: 1.8;
    }

    .enroll-icon {
        font-size: 55px;
        margin-bottom: 20px;
    }

    .enroll-form {
        padding: 35px;
    }

    .enroll-form h4 {
        font-size: 19px;
        font-weight: 700;
        margin-bottom: 25px;
        color: #333;
    }

    .enroll-label {
        display: block;
        font-size: 14px;
        font-weight: 600;
        color: #444;
        margin-bottom: 8px;
    }

    .enroll-input {
        width: 100%;
        height: 45px;
        padding: 10px 14px;
        border: 1px solid #e8d5df;
        border-radius: 7px;
        background: #fff;
        margin-bottom: 22px;
        outline: none;
        font-size: 14px;
        box-sizing: border-box;
    }

    .enroll-input:focus {
        border-color: #e53b91;
        box-shadow: 0 0 0 3px #fde5f1;
    }

    .enroll-actions {
        border-top: 1px solid #f1e5eb;
        padding-top: 22px;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    .btn-enroll-back {
        padding: 11px 20px;
        border-radius: 7px;
        background: white;
        border: 1px solid #e4cbd8;
        color: #666;
        text-decoration: none;
        font-size: 14px;
    }

    .btn-enroll-save {
        padding: 11px 23px;
        border: none;
        border-radius: 7px;
        background: #df3190;
        color: white;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
    }

    .btn-enroll-save:hover {
        background: #c52379;
    }

    .enroll-error {
        background: #fff0f0;
        color: #b42318;
        border: 1px solid #f5c2c7;
        padding: 12px 18px;
        border-radius: 7px;
        margin-bottom: 20px;
        font-size: 14px;
    }

    @media(max-width: 700px) {
        .enroll-wrapper {
            padding: 18px;
        }

        .enroll-container {
            grid-template-columns: 1fr;
        }

        .enroll-info {
            padding: 20px;
        }

        .enroll-form {
            padding: 22px;
        }
    }
</style>

<div class="enroll-wrapper">

    <div class="enroll-top">
        <h2>Tambah Enrollment</h2>
        <p>Beranda / Enrollment / Tambah Enrollment</p>
    </div>

    <div class="enroll-container">

        <div class="enroll-info">
            <div class="enroll-icon">📚</div>

            <h3>Pendaftaran Kursus</h3>

            <p>
                Silakan lengkapi formulir pendaftaran
                dengan memilih peserta dan kursus
                yang tersedia pada sistem KursusKu.
            </p>
        </div>

        <div class="enroll-form">

            <h4>Informasi Pendaftaran</h4>

            @if ($errors->any())
                <div class="enroll-error">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('enrollments.store') }}" method="POST">
                @csrf

                <label class="enroll-label">Participant</label>

                <select name="participant_id" class="enroll-input" required>
                    <option value="">-- Pilih Participant --</option>

                    @foreach ($participants as $participant)
                        <option value="{{ $participant->id }}"
                            {{ old('participant_id') == $participant->id ? 'selected' : '' }}>
                            {{ $participant->name }}
                        </option>
                    @endforeach
                </select>

                <label class="enroll-label">Course</label>

                <select name="course_id" class="enroll-input" required>
                    <option value="">-- Pilih Course --</option>

                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}"
                            {{ old('course_id') == $course->id ? 'selected' : '' }}>
                            {{ $course->name }}
                        </option>
                    @endforeach
                </select>

                <div class="enroll-actions">

                    <a href="{{ route('enrollments.index') }}"
                       class="btn-enroll-back">
                        Kembali
                    </a>

                    <button type="submit" class="btn-enroll-save">
                        + Simpan Enrollment
                    </button>

                </div>
            </form>

        </div>
    </div>

</div>

@endsection
