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

    .course-table {
        width: 100%;
        border-collapse: collapse;
        margin: 0;
    }

    .course-table thead th {
        background: #fff0f7;
        color: #c52b7d;
        font-size: 13px;
        font-weight: 700;
        padding: 15px 12px;
        border-bottom: 1px solid #f3d6e5;
        white-space: nowrap;
    }

    .course-table tbody td {
        padding: 15px 12px;
        border-bottom: 1px solid #f3edf1;
        font-size: 14px;
        vertical-align: middle;
    }

    .course-table tbody tr:hover {
        background: #fff8fb;
    }

    .course-table tbody tr:last-child td {
        border-bottom: none;
    }

    .code-label {
        display: inline-block;
        background: #ffe7f2;
        color: #cf287f;
        padding: 6px 10px;
        border-radius: 6px;
        font-weight: 700;
        font-size: 12px;
    }

    .name-label {
        font-weight: 600;
        color: #403448;
    }

    .fee-label {
        font-weight: 700;
        color: #df3190;
        white-space: nowrap;
    }

    .status-label {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
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

    .empty-course {
        text-align: center;
        color: #999;
        padding: 35px !important;
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
    }
</style>
@endpush

@section('content')

<div class="course-page">

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
        <div class="table-responsive">
            <table class="course-table">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Kursus</th>
                        <th>Biaya</th>
                        <th>Kuota</th>
                        <th>Tanggal Mulai</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($courses as $course)
                        <tr>
                            <td>
                                <span class="code-label">
                                    {{ $course->code }}
                                </span>
                            </td>

                            <td class="name-label">
                                {{ $course->name }}
                            </td>

                            <td class="fee-label">
                                Rp {{ number_format($course->fee, 0, ',', '.') }}
                            </td>

                            <td>{{ $course->quota }}</td>

                            <td>
                                {{ $course->start_date->format('d/m/Y') }}
                            </td>

                            <td>
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
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="empty-course">
                                Belum ada data kursus.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="course-footer">
        Belajar Lebih Mudah, Raih Masa Depan Lebih Baik.
    </div>

</div>

@endsection
