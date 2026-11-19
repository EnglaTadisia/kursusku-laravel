
@extends('layouts.app')

@section('title', 'Laporan Enrollment')

@section('content')

<style>
    .enrollment-wrapper {
        background: #fff6fa;
        min-height: 85vh;
        padding: 35px;
    }

    .page-heading {
        margin-bottom: 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
    }

    .page-heading h2 {
        color: #333;
        font-size: 27px;
        font-weight: 700;
        margin: 0;
    }

    .page-heading p {
        color: #999;
        font-size: 14px;
        margin: 7px 0 0;
    }

    .btn-add-enrollment {
        background: #df3190;
        color: white;
        text-decoration: none;
        padding: 12px 20px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        transition: .2s;
    }

    .btn-add-enrollment:hover {
        background: #c52279;
        color: white;
    }

    .report-card {
        background: white;
        border-radius: 13px;
        padding: 25px;
        box-shadow: 0 4px 18px rgba(220,45,135,.08);
        border: 1px solid #f8e3ed;
    }

    .report-title {
        font-size: 19px;
        font-weight: 700;
        color: #333;
        margin-bottom: 22px;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .enrollment-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 600px;
    }

    .enrollment-table thead {
        background: #df3190;
        color: white;
    }

    .enrollment-table th {
        padding: 16px;
        text-align: left;
        font-size: 14px;
        font-weight: 600;
    }

    .enrollment-table td {
        padding: 16px;
        border-bottom: 1px solid #f3e5ec;
        color: #555;
        font-size: 14px;
    }

    .enrollment-table tbody tr:hover {
        background: #fff5fa;
    }

    .status-badge {
        display: inline-block;
        padding: 6px 13px;
        border-radius: 20px;
        background: #fce1ef;
        color: #c52c7d;
        font-size: 12px;
        font-weight: 600;
    }

    .empty-data {
        text-align: center !important;
        padding: 45px 15px !important;
        color: #999 !important;
    }

    .empty-icon {
        font-size: 38px;
        display: block;
        margin-bottom: 10px;
    }

    @media(max-width: 600px) {
        .enrollment-wrapper {
            padding: 18px;
        }

        .report-card {
            padding: 15px;
        }

        .page-heading h2 {
            font-size: 22px;
        }
    }
</style>

<div class="enrollment-wrapper">

    <div class="page-heading">
        <div>
            <h2>Laporan Enrollment KursusKu</h2>
            <p>Kelola dan pantau data pendaftaran kursus.</p>
        </div>

        <a href="{{ route('enrollments.create') }}"
           class="btn-add-enrollment">
            + Tambah Enrollment
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="report-card">

        <div class="report-title">
            Daftar Enrollment
        </div>

        <div class="table-responsive">
            <table class="enrollment-table">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Participant</th>
                        <th>Course</th>
                        <th>Start Date</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($enrollments as $enrollment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                {{ $enrollment->participant->name ?? '-' }}
                            </td>

                            <td>
                                {{ $enrollment->course->name ?? '-' }}
                            </td>

                            <td>
                                {{ $enrollment->start_date ?? '-' }}
                            </td>

                            <td>
                                <span class="status-badge">
                                    {{ ucfirst($enrollment->status ?? '-') }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="empty-data">
                                <span class="empty-icon">📋</span>
                                Belum ada data enrollment.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>

</div>

@endsection
