
@extends('layouts.app')

@section('title', 'Daftar Kursus')

@section('content')

<style>
   
.course-table-card {
    margin-top: 15px;
    margin-bottom: 60px;
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

.course-table-card th:last-child,
.course-table-card td:last-child {
    width: 1%;
    white-space: nowrap;
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

    <div class="card course-table-card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped mb-0">

                    <thead>
                        <tr>
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
                                <td colspan="7" class="text-center py-4 text-muted">
                                    Belum ada data kursus.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>

@endsection
