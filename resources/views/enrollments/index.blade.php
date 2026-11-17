@extends('layouts.app')

@section('title', 'Data Enrollment')

@section('content')
<section class="section" style="padding:40px 0; background:#f8f9fa;">
    <div class="container" style="max-width:1000px; margin:auto;">
        <div style="background:white; padding:30px; border-radius:12px;">

            <h1 style="font-size:24px; color:#1e293b;">Data Enrollment</h1>

            <a href="{{ route('enrollments.create') }}"
                style="display:inline-block; margin:15px 0; padding:10px 16px; background:#4d7c0f; color:white; border-radius:6px; text-decoration:none;">
                Tambah Enrollment
            </a>

            @if (session('success'))
                <p style="color:green;">{{ session('success') }}</p>
            @endif

            <div style="overflow-x:auto;">
                <table style="width:100%; border-collapse:collapse;">
                    <thead>
                        <tr style="background:#EDE383;">
                            <th style="padding:12px; border:1px solid #ddd;">No</th>
                            <th style="padding:12px; border:1px solid #ddd;">Participant</th>
                            <th style="padding:12px; border:1px solid #ddd;">Course</th>
                            <th style="padding:12px; border:1px solid #ddd;">Tanggal Mulai</th>
                            <th style="padding:12px; border:1px solid #ddd;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($enrollments as $enrollment)
                            <tr>
                                <td style="padding:12px; border:1px solid #ddd;">{{ $loop->iteration }}</td>
                                <td style="padding:12px; border:1px solid #ddd;">{{ $enrollment->participant->name }}</td>
                                <td style="padding:12px; border:1px solid #ddd;">{{ $enrollment->course->name }}</td>
                                <td style="padding:12px; border:1px solid #ddd;">{{ $enrollment->course->start_date?->format('d-m-Y') ?? '-' }}</td>
                                <td style="padding:12px; border:1px solid #ddd;">{{ ucfirst($enrollment->status) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="padding:15px; text-align:center;">
                                    Belum ada data enrollment.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</section>
@endsection