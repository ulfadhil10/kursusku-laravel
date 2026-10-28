
@extends('layouts.app')

@section('title', 'Pendaftaran Kursus')

@section('content')
<section class="section" style="padding: 40px 0; background-color: #f8f9fa;">
    <div class="container" style="max-width: 650px; margin: 0 auto;">
        <div style="background:white; padding:32px; border-radius:12px; border:1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">

            <h2 style="margin-top:0; font-size:13px; color:#64748b; font-weight:600; text-transform:uppercase;">Pendaftaran Kursus</h2>
            <h1 style="margin-top:8px; font-size:24px; color:#1e293b; margin-bottom:8px;">Mulai belajar bersama KursusKu</h1>
            <p style="color:#64748b; margin-bottom:24px; font-size:14px;">Gunakan data latihan. Field bertanda wajib harus diisi.</p>

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

            <form method="POST" action="{{ route('enrollments.preview') }}">
                @csrf

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:16px;">
                    <div>
                        <label>Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name') }}" required style="width:100%; padding:8px 12px; border:1px solid #cbd5e1; border-radius:6px;">
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required style="width:100%; padding:8px 12px; border:1px solid #cbd5e1; border-radius:6px;">
                    </div>
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:16px;">
                    <div>
                        <label>Nomor HP</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" required style="width:100%; padding:8px 12px; border:1px solid #cbd5e1; border-radius:6px;">
                    </div>
                    <div>
                        <label>Program Studi</label>
                        <input type="text" name="program_studi" value="{{ old('program_studi') }}" required style="width:100%; padding:8px 12px; border:1px solid #cbd5e1; border-radius:6px;">
                    </div>
                </div>

                <div style="margin-bottom:16px;">
                    <label>Pilih Kursus</label>
                    <select id="course_id" name="course_id" required style="width:100%; padding:8px 12px; border:1px solid #cbd5e1; border-radius:6px;">
                        <option value="">-- Pilih Kursus --</option>
                        @foreach ($courses as $id => $course)
                            <option value="{{ $id }}" {{ old('course_id') == $id ? 'selected' : '' }}>
                                {{ $course['name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div style="margin-bottom:16px;">
                    <label>Jenis Peserta</label>
                    <div style="display:flex; gap:20px;">
                        @foreach (['Mahasiswa', 'Umum', 'Guru'] as $jenis)
                            <label>
                                <input type="radio" name="jenis_peserta" value="{{ $jenis }}" {{ old('jenis_peserta') == $jenis ? 'checked' : '' }} required>
                                {{ $jenis }}
                            </label>
                        @endforeach
                    </div>
                </div>

                <div style="margin-bottom:16px;">
                    <label>Minat Tambahan</label>
                    <div style="display:flex; gap:20px; flex-wrap:wrap;">
                        @foreach (['UI/UX', 'Database', 'Backend', 'Frontend'] as $minat)
                            <label>
                                <input type="checkbox" name="minat_tambahan[]" value="{{ $minat }}" {{ is_array(old('minat_tambahan')) && in_array($minat, old('minat_tambahan')) ? 'checked' : '' }}>
                                {{ $minat }}
                            </label>
                        @endforeach
                    </div>
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:16px;">
                    <div>
                        <label>Metode Belajar</label>
                        <select name="metode_belajar" required style="width:100%; padding:8px 12px; border:1px solid #cbd5e1; border-radius:6px;">
                            <option value="">-- Pilih metode --</option>
                            @foreach (['Online', 'Offline', 'Hybrid'] as $metode)
                                <option value="{{ $metode }}" {{ old('metode_belajar') == $metode ? 'selected' : '' }}>{{ $metode }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>Jumlah Paket</label>
                        <select name="jumlah_paket" required style="width:100%; padding:8px 12px; border:1px solid #cbd5e1; border-radius:6px;">
                            @foreach (['1 paket', '2 paket', '3 paket'] as $paket)
                                <option value="{{ $paket }}" {{ old('jumlah_paket') == $paket ? 'selected' : '' }}>{{ $paket }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div style="margin-bottom:16px;">
                    <label>Catatan</label>
                    <textarea name="catatan" rows="3" maxlength="300" placeholder="Tuliskan kebutuhan belajar Anda (opsional)" style="width:100%; padding:8px 12px; border:1px solid #cbd5e1; border-radius:6px;">{{ old('catatan') }}</textarea>
                    <small>Maksimal 300 karakter.</small>
                </div>

                <div id="availability" style="padding:12px; background:#f1f5f9; border-radius:6px; margin-bottom:20px; color:#475569;">
                    Pilih kursus untuk melihat sisa kursi.
                </div>

                <div style="display:flex; gap:12px; flex-wrap:wrap;">
                    <button type="submit" style="background:#4d7c0f; color:white; padding:10px 20px; border:none; border-radius:6px; cursor:pointer;">
                        Proses Pendaftaran
                    </button>
                    <button type="button" style="background:#f8fafc; color:#334155; padding:10px 16px; border:1px solid #cbd5e1; border-radius:6px;">
                        History Dummy
                    </button>
                    <button type="button" style="background:#f8fafc; color:#334155; padding:10px 16px; border:1px solid #cbd5e1; border-radius:6px;">
                        Loop Lab
                    </button>
                </div>

                <div style="border:1px solid #ddd; padding:20px; border-radius:8px; margin-top:24px; background:white;">
                    <h3>Fasilitas</h3>
                    <ul>
                        <li>Modul digital</li>
                        <li>Sertifikat penyelesaian</li>
                        <li>Forum diskusi kelas</li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
