
@extends('layouts.app')

@section('content')

<style>
    .course-detail-wrapper {
        width: 90%;
        max-width: 760px;
        margin: 45px auto;
    }

    .course-detail-card {
        background: #fff9cf;
        border: 2px solid #8DA432;
        border-radius: 14px;
        padding: 30px 35px;
        box-shadow: 0 5px 15px rgba(53, 25, 3, 0.12);
    }

    .course-detail-title {
        text-align: center;
        color: #365004;
        font-size: 25px;
        font-weight: bold;
        margin-bottom: 25px;
    }

    .course-detail-row {
        display: flex;
        padding: 11px 5px;
        border-bottom: 1px solid #e5d98b;
        gap: 15px;
    }

    .course-detail-label {
        width: 150px;
        flex-shrink: 0;
        font-weight: bold;
        color: #351903;
    }

    .course-detail-value {
        color: #351903;
    }

    .course-detail-actions {
        display: flex;
        justify-content: center;
        gap: 12px;
        margin-top: 25px;
    }

    .course-detail-actions a {
        padding: 10px 25px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
    }

    .btn-detail-back {
        background: white;
        color: #365004;
        border: 1px solid #8DA432;
    }

    .btn-detail-edit {
        background: #365004;
        color: white;
    }

    @media (max-width: 500px) {
        .course-detail-card {
            padding: 22px 18px;
        }

        .course-detail-row {
            gap: 8px;
        }

        .course-detail-label {
            width: 115px;
        }
    }
</style>

<div class="course-detail-wrapper">

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="course-detail-card">

        <h2 class="course-detail-title">Detail Kursus</h2>

        <div class="course-detail-row">
            <div class="course-detail-label">Kode</div>
            <div class="course-detail-value">{{ $course->code }}</div>
        </div>

        <div class="course-detail-row">
            <div class="course-detail-label">Nama</div>
            <div class="course-detail-value">{{ $course->name }}</div>
        </div>

        <div class="course-detail-row">
            <div class="course-detail-label">Deskripsi</div>
            <div class="course-detail-value">{{ $course->description ?: '-' }}</div>
        </div>

        <div class="course-detail-row">
            <div class="course-detail-label">Biaya</div>
            <div class="course-detail-value">
                Rp {{ number_format($course->fee, 0, ',', '.') }}
            </div>
        </div>

        <div class="course-detail-row">
            <div class="course-detail-label">Kuota</div>
            <div class="course-detail-value">{{ $course->quota }} peserta</div>
        </div>

        <div class="course-detail-row">
            <div class="course-detail-label">Tanggal Mulai</div>
            <div class="course-detail-value">
                {{ $course->start_date?->format('d-m-Y') }}
            </div>
        </div>

        <div class="course-detail-row">
            <div class="course-detail-label">Status</div>
            <div class="course-detail-value">{{ ucfirst($course->status) }}</div>
        </div>

        <div class="course-detail-actions">
            <a href="{{ route('courses.index') }}" class="btn-detail-back">
                Kembali
            </a>

            <a href="{{ route('courses.edit', $course) }}" class="btn-detail-edit">
                Edit
            </a>
        </div>

    </div>

</div>

@endsection
