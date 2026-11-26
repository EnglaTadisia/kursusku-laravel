
@extends('layouts.app')

@section('title', 'Tambah Enrollment')

@section('content')


<style>
    .enroll-wrapper {
        background: #fff5fa;
        min-height: 88vh;
        padding: 65px 25px;
    }

    .enroll-main {
        max-width: 710px;
        margin: 0 auto;
    }

    .enroll-back {
        display: inline-block;
        color: #df3190;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .enroll-back:hover {
        color: #b91f70;
    }

    .enroll-heading {
        margin-bottom: 25px;
    }

    .enroll-heading h2 {
        font-size: 27px;
        font-weight: 800;
        color: #51243e;
        margin-bottom: 5px;
    }

    .enroll-heading p {
        color: #91808a;
        font-size: 14px;
        margin: 0;
    }

    .enroll-card {
        background: #ffffff;
        border: 1px solid #f5dce9;
        border-radius: 20px;
        padding: 32px;
        box-shadow: 0 12px 35px rgba(220, 49, 144, 0.08);
    }

    .enroll-icon {
        width: 55px;
        height: 55px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fde5f1;
        border-radius: 17px;
        font-size: 27px;
        margin-bottom: 17px;
    }

    .enroll-card h3 {
        font-size: 20px;
        font-weight: 750;
        color: #51243e;
        margin-bottom: 5px;
    }

    .enroll-description {
        color: #91808a;
        font-size: 14px;
        margin-bottom: 27px;
    }

    .enroll-label {
        display: block;
        font-size: 14px;
        font-weight: 650;
        color: #59364a;
        margin-bottom: 9px;
    }

    .enroll-input {
        display: block;
        width: 100%;
        height: 44px;
        padding: 0 14px;
        border: 1px solid #ead8e2;
        border-radius: 11px;
        background: #fff;
        color: #51404a;
        font-size: 14px;
        margin-bottom: 22px;
        outline: none;
        box-sizing: border-box;
        transition: 0.2s;
    }

    .enroll-input:focus {
        border-color: #df3190;
        box-shadow: 0 0 0 3px rgba(223, 49, 144, 0.12);
    }

    .enroll-error {
        background: #fff0f0;
        color: #b42318;
        border: 1px solid #f5c2c7;
        padding: 13px 17px;
        border-radius: 10px;
        margin-bottom: 22px;
        font-size: 13px;
    }

    .enroll-error ul {
        margin: 0;
        padding-left: 20px;
    }

    .enroll-actions {
        display: flex;
        gap: 10px;
        margin-top: 5px;
    }

    .btn-enroll-back {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 12px 20px;
        border-radius: 11px;
        background: #fceaf3;
        color: #a52d6c;
        text-decoration: none;
        font-size: 13px;
        font-weight: 650;
        border: none;
        transition: 0.2s;
    }

    .btn-enroll-back:hover {
        background: #f8d8e8;
        color: #8e2059;
    }

    .btn-enroll-save {
        flex: 1;
        padding: 12px 20px;
        border: none;
        border-radius: 11px;
        background: linear-gradient(100deg, #df3190, #f45b9d);
        color: white;
        font-weight: 700;
        font-size: 13px;
        cursor: pointer;
        transition: 0.2s;
        box-shadow: 0 5px 13px rgba(223, 49, 144, 0.20);
    }

    .btn-enroll-save:hover {
        background: linear-gradient(100deg, #c52379, #e83f8b);
        transform: translateY(-1px);
    }

    @media(max-width: 600px) {
        .enroll-wrapper {
            padding: 35px 16px;
        }

        .enroll-card {
            padding: 23px 19px;
        }

        .enroll-heading h2 {
            font-size: 23px;
        }
    }
</style>


<div class="enroll-wrapper">

    <div class="enroll-main">

        <a href="{{ route('enrollments.index') }}"
           class="enroll-back">
            ← Kembali ke Laporan
        </a>

        <div class="enroll-heading">
            <h2>Tambah Enrollment</h2>
            <p>Daftarkan peserta ke program kursus pilihan di KursusKu.</p>
        </div>

        <div class="enroll-card">

            <div class="enroll-icon">
                📚
            </div>

            <h3>Form Pendaftaran Kursus</h3>

            <p class="enroll-description">
                Lengkapi informasi peserta dan pilih kursus yang ingin diikuti.
            </p>

            @if ($errors->any())
                <div class="enroll-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('enrollments.store') }}" method="POST">
                @csrf

                <label class="enroll-label">
                    Nama Participant
                </label>

                <select name="participant_id"
                        class="enroll-input"
                        required>

                    <option value="">
                        -- Pilih Participant --
                    </option>

                    @foreach ($participants as $participant)
                        <option value="{{ $participant->id }}"
                            {{ old('participant_id') == $participant->id ? 'selected' : '' }}>
                            {{ $participant->name }}
                        </option>
                    @endforeach

                </select>

                <label class="enroll-label">
                    Program Kursus
                </label>

                <select name="course_id"
                        class="enroll-input"
                        required>

                    <option value="">
                        -- Pilih Course --
                    </option>

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
                        Batal
                    </a>

                    <button type="submit"
                            class="btn-enroll-save">
                        Simpan Enrollment
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
