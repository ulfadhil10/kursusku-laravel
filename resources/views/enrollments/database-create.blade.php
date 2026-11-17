@extends('layouts.app')

@section('title', 'Pendaftaran Enrollment')

@section('content')
<section class="section" style="padding: 40px 0; background-color: #f8f9fa;">
    <div class="container" style="max-width: 650px; margin: 0 auto;">
        <div style="background:white; padding:32px; border-radius:12px; border:1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">

            <h1 style="font-size:24px; color:#1e293b;">Pendaftaran Course</h1>
            <p style="color:#64748b; margin-bottom:24px;">
                Pilih peserta dan course yang tersedia.
            </p>

            @if ($errors->any())
                <div style="background:#fef2f2; border:1px solid #f87171; color:#b91c1c; padding:12px; border-radius:8px; margin-bottom:20px;">
                    <ul style="margin:0; padding-left:20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div style="background:#f0fdf4; border:1px solid #4ade80; color:#166534; padding:12px; border-radius:8px; margin-bottom:20px;">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('enrollments.store') }}">
                @csrf

                <div style="margin-bottom:20px;">
                    <label for="participant_id">Pilih Participant</label>
                    <select name="participant_id" id="participant_id" required
                        style="width:100%; padding:10px; border:1px solid #cbd5e1; border-radius:6px;">
                        <option value="">-- Pilih Participant --</option>
                        @foreach ($participants as $participant)
                            <option value="{{ $participant->id }}"
                                {{ old('participant_id') == $participant->id ? 'selected' : '' }}>
                                {{ $participant->name }} ({{ $participant->email }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div style="margin-bottom:20px;">
                    <label for="course_id">Pilih Course</label>
                    <select name="course_id" id="course_id" required
                        style="width:100%; padding:10px; border:1px solid #cbd5e1; border-radius:6px;">
                        <option value="">-- Pilih Course --</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}"
                                {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                {{ $course->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit"
                    style="background:#4d7c0f; color:white; padding:10px 20px; border:none; border-radius:6px; cursor:pointer;">
                    Simpan Pendaftaran
                </button>

                <a href="{{ route('enrollments.index') }}"
                    style="margin-left:10px; color:#4d7c0f;">
                    Lihat Data Enrollment
                </a>
            </form>
        </div>
    </div>
</section>
@endsection