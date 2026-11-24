
@extends('layouts.app')

@section('title', 'Daftar Kursus')

@section('content')

<style>
   
.course-table-card {
    margin-top: 15px;
    margin-bottom: 8px;
    border: none;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(53, 25, 3, 0.10);
}

.course-actions {
    display: flex;
    align-items: center;
    gap: 5px;
    white-space: nowrap;
}

.course-actions a,
.course-actions button {
    display: inline-block;
    padding: 5px 8px;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 600;
    text-decoration: none;
    cursor: pointer;
    transition: 0.2s;
}

.course-actions form {
    margin: 0;
}

.btn-course-detail {
    background: #fff9cf;
    color: #365004;
    border: 1px solid #8DA432;
}

.btn-course-edit {
    background: #8DA432;
    color: white;
    border: 1px solid #8DA432;
}

.btn-course-delete {
    background: #925E06;
    color: white;
    border: 1px solid #925E06;
}

.course-actions a:hover,
.course-actions button:hover {
    filter: brightness(0.9);
}

.course-table-card th,
.course-table-card td {
    vertical-align: middle;
    padding: 12px 10px;
}

.course-filter {
    display: grid;
    grid-template-columns: minmax(0, 2fr) minmax(220px, 1fr) auto;
    gap: 10px;
    align-items: center;
    margin-top: 12px;
    margin-bottom: 0;
}

.course-filter input,
.course-filter select {
    box-sizing: border-box;
    width: 100%;
    height: 44px;
    border: 1px solid #8DA432;
    border-radius: 8px;
    font-size: 14px;
    line-height: normal;
}

.course-filter input {
    padding: 10px 14px;
}

.course-filter select {
    padding: 8px 35px 8px 14px;
}

.course-filter-buttons {
    display: flex;
    align-items: center;
    gap: 8px;
}

.course-filter-buttons .btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    box-sizing: border-box;
    height: 44px;
    margin: 0;
    padding: 0 18px;
    white-space: nowrap;
    line-height: 1;
}

@media (max-width: 768px) {
    .course-filter {
        grid-template-columns: 1fr;
    }

    .course-filter-buttons {
        justify-content: flex-start;
    }
}

/* Pagination */
.course-pagination {
    display: flex;
    justify-content: flex-end;
    margin: 12px 0 30px;
    font-size: 13px;
}

.course-pagination nav {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 8px;
}

.course-pagination ul,
.course-pagination .pagination {
    display: flex !important;
    flex-direction: row !important;
    align-items: center;
    gap: 5px;
    list-style: none !important;
    padding: 0 !important;
    margin: 0 !important;
}

.course-pagination li {
    display: inline-flex;
    list-style: none !important;
}

.course-pagination .page-link {
    min-width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 5px 9px;
    font-size: 13px;
    color: #365004;
    background: #fffbea;
    border: 1px solid #8DA432;
    border-radius: 5px;
    text-decoration: none;
}

.course-pagination .page-item.active .page-link {
    color: white;
    background: #365004;
    border-color: #365004;
}

.course-pagination .page-item.disabled .page-link {
    color: #aaa;
    background: #f5f5f5;
}
.course-table-card .table thead th {
    background: #365004 !important;
    color: #fff9cf !important;
    border: 1px solid #8DA432 !important;
    border-radius: 0 !important;
    box-shadow: none !important;
}

.course-table-card .table thead tr:first-child th {
    border-top: 0 !important;
}

.course-table-card .table thead th:last-child {
    border-top-right-radius: 0 !important;
    border-bottom-right-radius: 0 !important;
}

.course-table-card thead th {
    text-align: center;
    vertical-align: middle;
}

</style>

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h1 class="h3 mb-1">Daftar Kursus</h1>
            <p class="text-muted mb-0">
                Data diambil dari MySQL melalui Eloquent.
            </p>
        </div>

        <a href="{{ route('courses.create') }}" class="btn btn-primary">
            + Tambah Kursus
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

<form action="{{ route('courses.index') }}" method="GET" class="course-filter">

    <input
        type="text"
        name="q"
        class="form-control"
        placeholder="Cari kode atau nama kursus..."
        value="{{ $search }}"
    >

    <select name="status" class="form-select">
        <option value="">Semua Status</option>
        <option value="open" {{ ($status ?? '') === 'open' ? 'selected' : '' }}>Open</option>
        <option value="closed" {{ ($status ?? '') === 'closed' ? 'selected' : '' }}>Closed</option>
        <option value="draft" {{ ($status ?? '') === 'draft' ? 'selected' : '' }}>Draft</option>
    </select>

    <div class="course-filter-buttons">
        <button type="submit" class="btn btn-primary">Cari</button>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Reset</a>
    </div>

</form>

    <div class="card course-table-card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped mb-0">

                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Biaya</th>
                        <th>Kuota</th>
                        <th>Mulai</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($courses as $course)
                         <tr>
                                <td>{{ $courses->firstItem() + $loop->index }}</td>
                                <td>{{ $course->code }}</td>
                                <td>{{ $course->name }}</td>
                                <td>Rp {{ number_format($course->fee, 0, ',', '.') }}</td>
                                <td>{{ $course->quota }}</td>
                                <td>{{ $course->start_date->format('d/m/Y') }}</td>
                                <td>{{ ucfirst($course->status) }}</td>

                                <td>
                                    <div class="course-actions">

                                        <a href="{{ route('courses.show', $course) }}"
                                           class="btn-course-detail">
                                            Detail
                                        </a>

                                        <a href="{{ route('courses.edit', $course) }}"
                                           class="btn-course-edit">
                                            Edit
                                        </a>

                                        <form action="{{ route('courses.destroy', $course) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus kursus ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn-course-delete">
                                                Hapus
                                            </button>

                                        </form>

                                    </div>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4 text-muted">
                                    Belum ada data kursus.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>
   {{-- Pagination --}}
   <div class="course-pagination">
    {{ $courses->links('pagination::bootstrap-5') }}
</div>
</div>

@endsection
