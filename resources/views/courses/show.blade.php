
@extends('layouts.app')

@section('title', 'Detail Kursus')

@section('content')

<style>
    .detail-wrapper {
        max-width: 850px;
        margin: 0 auto;
        padding: 25px 15px 50px;
    }

    /* JUDUL */
    .detail-heading {
        margin-bottom: 25px;
    }

    .detail-heading h1 {
        color: #a51d62;
        font-size: 28px;
        font-weight: 800;
        margin-bottom: 6px;
    }

    .detail-heading p {
        color: #a36b88;
        font-size: 14px;
        margin: 0;
    }

    /* CARD UTAMA */
    .detail-card {
        background: white;
        border: 1px solid #f5d5e5;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(219, 73, 143, .10);
    }

    /* HEADER CARD */
    .detail-header {
        background: linear-gradient(110deg, #df3190, #f45b9d);
        color: white;
        padding: 28px 30px;
    }

    .detail-header h2 {
        font-size: 23px;
        font-weight: 800;
        margin: 0 0 8px;
    }

    .detail-header p {
        font-size: 13px;
        margin: 0;
        opacity: .95;
    }

    .course-code {
        display: inline-block;
        background: rgba(255,255,255,.20);
        border: 1px solid rgba(255,255,255,.35);
        padding: 6px 13px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        margin-top: 15px;
    }

    /* ISI DETAIL */
    .detail-body {
        padding: 30px;
    }

    .detail-title {
        color: #a51d62;
        font-size: 17px;
        font-weight: 800;
        margin-bottom: 20px;
    }

    .detail-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
    }

    .detail-item {
        background: #fff6fa;
        border: 1px solid #f9dfeb;
        border-radius: 12px;
        padding: 17px;
        min-height: 85px;
    }

    .detail-item.full {
        grid-column: 1 / -1;
    }

    .detail-label {
        color: #b87998;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 9px;
    }

    .detail-value {
        color: #493344;
        font-size: 15px;
        font-weight: 700;
        overflow-wrap: anywhere;
    }

    .fee-value {
        color: #df3190;
        font-size: 18px;
    }

    /* STATUS */
    .status-label {
        display: inline-block;
        padding: 7px 15px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
    }

    .status-open {
        background: #e1f7e9;
        color: #25834b;
    }

    .status-draft {
        background: #e7efff;
        color: #3465bd;
    }

    .status-closed {
        background: #ffe6e6;
        color: #cf4141;
    }

    .status-other {
        background: #f0eaf0;
        color: #66566a;
    }

    /* FOOTER */
    .detail-footer {
        border-top: 1px solid #f5dce9;
        padding: 22px 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
    }

    .btn-detail {
        display: inline-block;
        padding: 11px 22px;
        border-radius: 30px;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        transition: .2s;
    }

    .btn-back {
        background: white;
        color: #df3190;
        border: 1px solid #ed6aaa;
    }

    .btn-back:hover {
        background: #fff0f6;
        color: #c51c72;
    }

    .btn-edit {
        background: linear-gradient(100deg, #df3190, #f45b9d);
        color: white;
        border: none;
        box-shadow: 0 4px 12px rgba(224, 46, 139, .20);
    }

    .btn-edit:hover {
        background: #c91e78;
        color: white;
        transform: translateY(-2px);
    }

    .detail-note {
        text-align: center;
        color: #d94b91;
        font-size: 13px;
        font-style: italic;
        margin-top: 25px;
    }

    /* RESPONSIVE */
    @media(max-width: 576px) {
        .detail-wrapper {
            padding: 15px 10px 30px;
        }

        .detail-header {
            padding: 22px;
        }

        .detail-body {
            padding: 20px;
        }

        .detail-grid {
            grid-template-columns: 1fr;
        }

        .detail-item.full {
            grid-column: auto;
        }

        .detail-footer {
            padding: 18px;
        }

        .detail-footer .btn-detail {
            flex: 1;
            text-align: center;
        }
    }
</style>

<div class="detail-wrapper">

    <!-- JUDUL -->
    <div class="detail-heading">
        <h1>Detail Kursus</h1>
        <p>Lihat informasi lengkap kursus yang tersedia di KursusKu.</p>
    </div>

    <!-- CARD DETAIL -->
    <div class="detail-card">

        <!-- HEADER -->
        <div class="detail-header">

            <h2>{{ $course->name }}</h2>

            <p>Informasi lengkap mengenai kursus yang dipilih.</p>

            <span class="course-code">
                KODE: {{ $course->code }}
            </span>

        </div>

        <!-- ISI DETAIL -->
        <div class="detail-body">

            <div class="detail-title">
                Informasi Kursus
            </div>

            <div class="detail-grid">

                <!-- KODE -->
                <div class="detail-item">
                    <div class="detail-label">
                        Kode Kursus
                    </div>

                    <div class="detail-value">
                        {{ $course->code }}
                    </div>
                </div>

                <!-- NAMA -->
                <div class="detail-item">
                    <div class="detail-label">
                        Nama Kursus
                    </div>

                    <div class="detail-value">
                        {{ $course->name }}
                    </div>
                </div>

                <!-- DESKRIPSI -->
                <div class="detail-item full">
                    <div class="detail-label">
                        Deskripsi
                    </div>

                    <div class="detail-value">
                        {{ $course->description ?: 'Belum ada deskripsi.' }}
                    </div>
                </div>

                <!-- BIAYA -->
                <div class="detail-item">
                    <div class="detail-label">
                        Biaya Kursus
                    </div>

                    <div class="detail-value fee-value">
                        Rp {{ number_format($course->fee, 0, ',', '.') }}
                    </div>
                </div>

                <!-- KUOTA -->
                <div class="detail-item">
                    <div class="detail-label">
                        Kuota Peserta
                    </div>

                    <div class="detail-value">
                        {{ $course->quota }} Peserta
                    </div>
                </div>

                <!-- TANGGAL -->
                <div class="detail-item">
                    <div class="detail-label">
                        Tanggal Mulai
                    </div>

                    <div class="detail-value">
                        {{ $course->start_date?->format('d-m-Y') ?? '-' }}
                    </div>
                </div>

                <!-- STATUS -->
                <div class="detail-item">
                    <div class="detail-label">
                        Status Kursus
                    </div>

                    @php
                        $statusClass = match(strtolower($course->status)) {
                            'open' => 'status-open',
                            'draft' => 'status-draft',
                            'closed' => 'status-closed',
                            default => 'status-other',
                        };
                    @endphp

                    <span class="status-label {{ $statusClass }}">
                        {{ ucfirst($course->status) }}
                    </span>
                </div>

            </div>

        </div>

        <!-- FOOTER -->
        <div class="detail-footer">

            <a href="{{ route('courses.index') }}"
               class="btn-detail btn-back">
                ← Kembali
            </a>

            <a href="{{ route('courses.edit', $course) }}"
               class="btn-detail btn-edit">
                ✎ Edit Kursus
            </a>
{{-- NOTIFIKASI BERHASIL --}}
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show"
         role="alert"
         style="border-radius: 12px; border: 1px solid #a8e6bd;">

        <strong>✓ Berhasil!</strong>
        {{ session('success') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>
    </div>
@endif
        </div>

    </div>

    <div class="detail-note">
        Belajar Lebih Mudah, Raih Masa Depan Lebih Baik.
    </div>

</div>

@endsection
