
@extends('layouts.app')

@section('content')

<style>
    .course-edit-wrapper {
        width: 90%;
        max-width: 760px;
        margin: 40px auto;
    }

    .course-edit-card {
        background: #fff9cf;
        border: 2px solid #8DA432;
        border-radius: 14px;
        padding: 30px 35px;
        box-shadow: 0 5px 15px rgba(53, 25, 3, 0.12);
    }

    .course-edit-title {
        text-align: center;
        color: #365004;
        font-size: 25px;
        font-weight: bold;
        margin-bottom: 25px;
    }

    .course-edit-form label {
        display: block;
        font-weight: bold;
        color: #351903;
        margin-bottom: 7px;
    }

    .course-edit-form input,
    .course-edit-form textarea,
    .course-edit-form select {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #8DA432;
        border-radius: 7px;
        background: white;
        margin-bottom: 5px;
        color: #351903;
    }

    .form-group {
        margin-bottom: 17px;
    }

    .error-message {
        color: #b00020;
        font-size: 13px;
        margin-top: 3px;
    }

    .course-edit-actions {
        display: flex;
        justify-content: center;
        gap: 12px;
        margin-top: 25px;
    }

    .course-edit-actions button,
    .course-edit-actions a {
        padding: 10px 25px;
        border-radius: 8px;
        font-weight: bold;
        text-decoration: none;
        cursor: pointer;
    }

    .btn-save {
        background: #365004;
        color: white;
        border: none;
    }

    .btn-cancel {
        background: white;
        color: #365004;
        border: 1px solid #8DA432;
    }

    @media (max-width: 500px) {
        .course-edit-card {
            padding: 22px 18px;
        }
    }
</style>

<div class="course-edit-wrapper">

    <div class="course-edit-card">

        <h2 class="course-edit-title">Edit Kursus</h2>

        <form action="{{ route('courses.update', $course) }}"
              method="POST"
              class="course-edit-form">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Kode Kursus</label>
                <input type="text" name="code"
                    value="{{ old('code', $course->code) }}">
                @error('code')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Nama Kursus</label>
                <input type="text" name="name"
                    value="{{ old('name', $course->name) }}">
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="description" rows="3">{{ old('description', $course->description) }}</textarea>
                @error('description')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Biaya (Rp)</label>
                <input type="number" name="fee"
                    value="{{ old('fee', $course->fee) }}">
                @error('fee')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Kuota Peserta</label>
                <input type="number" name="quota"
                    value="{{ old('quota', $course->quota) }}">
                @error('quota')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Tanggal Mulai</label>
                <input type="date" name="start_date"
                    value="{{ old('start_date', $course->start_date?->format('Y-m-d')) }}">
                @error('start_date')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status">
                    <option value="draft" {{ old('status', $course->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="open" {{ old('status', $course->status) == 'open' ? 'selected' : '' }}>Open</option>
                    <option value="closed" {{ old('status', $course->status) == 'closed' ? 'selected' : '' }}>Closed</option>
                </select>
                @error('status')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="course-edit-actions">
                <a href="{{ route('courses.show', $course) }}" class="btn-cancel">
                    Batal
                </a>

                <button type="submit" class="btn-save">
                    Simpan Perubahan
                </button>
            </div>

        </form>

    </div>

</div>

@endsection
