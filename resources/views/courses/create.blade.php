
@extends('layouts.app')

@section('title', 'Tambah Kursus')

@section('content')
<div class="container py-4" style="max-width: 760px">
    <h1 class="h3 mb-3">Tambah Kursus</h1>

    <form method="POST" action="{{ route('courses.store') }}" class="card card-body" novalidate>
        @csrf

        <div class="mb-3">
            <label class="form-label" for="code">Kode Kursus</label>
            <input type="text" name="code" id="code"
                class="form-control" value="{{ old('code') }}" required>
            @error('code')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="name">Nama Kursus</label>
            <input type="text" name="name" id="name"
                class="form-control" value="{{ old('name') }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="description">Deskripsi</label>
            <textarea name="description" id="description"
                class="form-control">{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="fee">Biaya</label>
            <input type="number" name="fee" id="fee"
                class="form-control" value="{{ old('fee', 0) }}" min="0" required>
            @error('fee')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="quota">Kuota</label>
            <input type="number" name="quota" id="quota"
                class="form-control" value="{{ old('quota', 20) }}" min="1" max="500" required>
            @error('quota')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="start_date">Tanggal Mulai</label>
            <input type="date" name="start_date" id="start_date"
                class="form-control" value="{{ old('start_date') }}" required>
            @error('start_date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="status">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="draft" @selected(old('status', 'draft') === 'draft')>Draft</option>
                <option value="open" @selected(old('status') === 'open')>Open</option>
                <option value="closed" @selected(old('status') === 'closed')>Closed</option>

            </select>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Simpan Kursus</button>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
