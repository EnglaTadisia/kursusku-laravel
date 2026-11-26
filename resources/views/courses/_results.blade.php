<div class="table-responsive">

    <table class="course-table table">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Kursus</th>
                <th>Biaya</th>
                <th>Kuota</th>
                <th>Tanggal Mulai</th>
                <th>Status</th>
                <th>Aksi</th>
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

                    <td>
                        {{ $course->quota }}
                    </td>

                    <td>
                        {{ $course->start_date
                            ? \Carbon\Carbon::parse($course->start_date)->format('d/m/Y')
                            : '-' }}
                    </td>

                    <td>
                        @php
                            $statusClass = match(strtolower($course->status ?? '')) {
                                'open' => 'status-open',
                                'draft' => 'status-draft',
                                'closed' => 'status-closed',
                                default => 'status-other',
                            };
                        @endphp

                        <span class="status-label {{ $statusClass }}">
                            {{ ucfirst($course->status ?? '-') }}
                        </span>
                    </td>

                    <td>
                        <div class="action-buttons">

                            <a href="{{ route('courses.show', $course) }}"
                               class="btn-action btn-detail">
                                Detail
                            </a>

                            <a href="{{ route('courses.edit', $course) }}"
                               class="btn-action btn-edit">
                                Edit
                            </a>

                            <form method="POST"
                                  action="{{ route('courses.destroy', $course) }}"
                                  onsubmit="return confirm('Apakah kamu yakin ingin menghapus kursus ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn-action btn-delete">
                                    Hapus
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="7" class="empty-course">
                        <div style="font-size: 30px; margin-bottom: 8px;">
                            🔍
                        </div>

                        <strong>Tidak ada kursus ditemukan.</strong>

                        <div style="font-size: 13px; margin-top: 5px;">
                            Coba gunakan kata kunci atau filter yang berbeda.
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

{{-- PAGINATION --}}
<div class="course-pagination">
    {{ $courses->withQueryString()->links() }}
</div>

<style>
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

    .action-buttons {
        display: flex;
        gap: 6px;
        align-items: center;
        flex-wrap: wrap;
    }

    .btn-action {
        display: inline-block;
        padding: 7px 10px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: .2s;
        white-space: nowrap;
    }

    .btn-detail {
        background: #e7efff;
        color: #3465bd;
    }

    .btn-edit {
        background: #fff0d9;
        color: #b7791f;
    }

    .btn-delete {
        background: #ffe6e6;
        color: #cf4141;
    }

    .btn-action:hover {
        opacity: .8;
    }

    .empty-course {
        text-align: center;
        color: #999;
        padding: 35px !important;
    }

    .course-pagination {
        margin-top: 20px;
    }

    .course-pagination nav {
        display: flex;
        justify-content: flex-end;
    }

    .course-pagination .page-link {
        color: #cf287f;
        border-color: #f3d6e5;
    }

    .course-pagination .active > .page-link,
    .course-pagination .page-link.active {
        background: #df3190;
        border-color: #df3190;
        color: white;
    }

    @media(max-width: 576px) {
        .action-buttons {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>
