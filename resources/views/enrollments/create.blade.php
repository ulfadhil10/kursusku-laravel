@extends('layouts.app')

@section('title', 'Pendaftaran Kursus')

@section('content')
<section class="section" style="padding: 40px 0; background-color: #f8f9fa;">
    <div class="container" style="max-width: 650px; margin: 0 auto;">
        <div style="background:white; padding:32px; border-radius:12px; border:1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
            
            <h2 style="margin-top:0; font-size: 13px; color: #64748b; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">Pendaftaran Kursus</h2>
            <h1 style="margin-top:8px; font-size: 24px; color: #1e293b; margin-bottom: 8px;">Mulai belajar bersama KursusKu</h1>
            <p style="color:#64748b; margin-bottom: 24px; font-size: 14px;">Gunakan data latihan. Field bertanda wajib harus diisi.</p>
            
            <!-- Menampilkan Pesan Error Validasi -->
            @if ($errors->any())
                <div style="background-color: #fef2f2; border: 1px solid #f87171; color: #b91c1c; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 14px;">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Menampilkan Pesan Sukses -->
            @if (session('success'))
                <div style="background-color: #f0fdf4; border: 1px solid #4ade80; color: #166534; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 14px;">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('enrollments.preview') }}">
                @csrf
                
                <!-- BARIS 1: Nama & Email -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px;">
                    <div>
                        <label style="display:block; font-weight:600; margin-bottom:6px; font-size: 13px; color: #334155;">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name') }}" required style="width:100%; padding:8px 12px; border:1px solid #cbd5e1; border-radius:6px; font-size: 14px;">
                    </div>
                    <div>
                        <label style="display:block; font-weight:600; margin-bottom:6px; font-size: 13px; color: #334155;">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required style="width:100%; padding:8px 12px; border:1px solid #cbd5e1; border-radius:6px; font-size: 14px;">
                    </div>
                </div>

                <!-- BARIS 2: No HP & Prodi -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px;">
                    <div>
                        <label style="display:block; font-weight:600; margin-bottom:6px; font-size: 13px; color: #334155;">Nomor HP</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Contoh: 081234567890" required style="width:100%; padding:8px 12px; border:1px solid #cbd5e1; border-radius:6px; font-size: 14px;">
                    </div>
                    <div>
                        <label style="display:block; font-weight:600; margin-bottom:6px; font-size: 13px; color: #334155;">Program Studi</label>
                        <input type="text" name="program_studi" value="{{ old('program_studi') }}" required style="width:100%; padding:8px 12px; border:1px solid #cbd5e1; border-radius:6px; font-size: 14px;">
                    </div>
                </div>
                
                <!-- BARIS 3: Pilih Kursus -->
                <div style="margin-bottom:16px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px; font-size: 13px; color: #334155;">Pilih Kursus</label>
                    <select id="course_id" name="course_id" required style="width:100%; padding:8px 12px; border:1px solid #cbd5e1; border-radius:6px; font-size: 14px; background-color: white;">
                        <option value="">-- Pilih Kursus --</option>
                        @foreach ($courses as $id => $course)
                            <option value="{{ $id }}" {{ old('course_id') == $id ? 'selected' : '' }}>{{ $course['name'] }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- BARIS 4: Jenis Peserta (Radio) -->
                <div style="margin-bottom:16px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px; font-size: 13px; color: #334155;">Jenis Peserta</label>
                    <div style="display:flex; gap:20px;">
                        <label style="font-weight:normal; font-size: 14px; color: #334155;"><input type="radio" name="jenis_peserta" value="Mahasiswa" {{ old('jenis_peserta') == 'Mahasiswa' ? 'checked' : '' }} required> Mahasiswa</label>
                        <label style="font-weight:normal; font-size: 14px; color: #334155;"><input type="radio" name="jenis_peserta" value="Umum" {{ old('jenis_peserta') == 'Umum' ? 'checked' : '' }}> Umum</label>
                        <label style="font-weight:normal; font-size: 14px; color: #334155;"><input type="radio" name="jenis_peserta" value="Guru" {{ old('jenis_peserta') == 'Guru' ? 'checked' : '' }}> Guru</label>
                    </div>
                </div>

                <!-- BARIS 5: Minat Tambahan (Checkbox) -->
                <div style="margin-bottom:16px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px; font-size: 13px; color: #334155;">Minat Tambahan</label>
                    <div style="display:flex; gap:20px;">
                        <label style="font-weight:normal; font-size: 14px; color: #334155;"><input type="checkbox" name="minat_tambahan[]" value="UI/UX" {{ is_array(old('minat_tambahan')) && in_array('UI/UX', old('minat_tambahan')) ? 'checked' : '' }}> UI/UX</label>
                        <label style="font-weight:normal; font-size: 14px; color: #334155;"><input type="checkbox" name="minat_tambahan[]" value="Database" {{ is_array(old('minat_tambahan')) && in_array('Database', old('minat_tambahan')) ? 'checked' : '' }}> Database</label>
                        <label style="font-weight:normal; font-size: 14px; color: #334155;"><input type="checkbox" name="minat_tambahan[]" value="Backend" {{ is_array(old('minat_tambahan')) && in_array('Backend', old('minat_tambahan')) ? 'checked' : '' }}> Backend</label>
                        <label style="font-weight:normal; font-size: 14px; color: #334155;"><input type="checkbox" name="minat_tambahan[]" value="Frontend" {{ is_array(old('minat_tambahan')) && in_array('Frontend', old('minat_tambahan')) ? 'checked' : '' }}> Frontend</label>
                    </div>
                </div>

                <!-- BARIS 6: Metode Belajar & Jumlah Paket -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px;">
                    <div>
                        <label style="display:block; font-weight:600; margin-bottom:6px; font-size: 13px; color: #334155;">Metode Belajar</label>
                        <select name="metode_belajar" required style="width:100%; padding:8px 12px; border:1px solid #cbd5e1; border-radius:6px; font-size: 14px; background-color: white;">
                            <option value="">-- Pilih metode --</option>
                            <option value="Online" {{ old('metode_belajar') == 'Online' ? 'selected' : '' }}>Online</option>
                            <option value="Offline" {{ old('metode_belajar') == 'Offline' ? 'selected' : '' }}>Offline</option>
                            <option value="Hybrid" {{ old('metode_belajar') == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                        </select>
                    </div>
                    <div>
                        <label style="display:block; font-weight:600; margin-bottom:6px; font-size: 13px; color: #334155;">Jumlah Paket</label>
                        <select name="jumlah_paket" required style="width:100%; padding:8px 12px; border:1px solid #cbd5e1; border-radius:6px; font-size: 14px; background-color: white;">
                            <option value="1 paket" {{ old('jumlah_paket') == '1 paket' ? 'selected' : '' }}>1 paket</option>
                            <option value="2 paket" {{ old('jumlah_paket') == '2 paket' ? 'selected' : '' }}>2 paket</option>
                            <option value="3 paket" {{ old('jumlah_paket') == '3 paket' ? 'selected' : '' }}>3 paket</option>
                        </select>
                    </div>
                </div>

                <!-- BARIS 7: Catatan -->
                <div style="margin-bottom:16px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px; font-size: 13px; color: #334155;">Catatan</label>
                    <textarea name="catatan" rows="3" maxlength="300" placeholder="Tuliskan kebutuhan belajar Anda (opsional)" style="width:100%; padding:8px 12px; border:1px solid #cbd5e1; border-radius:6px; font-size: 14px; resize: vertical;">{{ old('catatan') }}</textarea>
                    <small style="color: #64748b; font-size: 12px; margin-top: 4px; display: block;">Maksimal 300 karakter.</small>
                </div>

                <!-- Kotak Ajax Sisa Kursi -->
                <div id="availability" style="padding:12px; background:#f1f5f9; border-radius:6px; margin-bottom:20px; color:#475569; font-size: 14px;">
                    Pilih kursus untuk melihat sisa kursi.
                </div>

                <!-- TOMBOL AKSI -->
                <div style="display:flex; gap: 12px; align-items:center;">
                    <button type="submit" style="background-color: #4d7c0f; color: white; padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer; font-weight: bold; font-size: 14px;">
                        Proses Pendaftaran
                    </button>
                    
                    <button type="button" style="background-color: #f8fafc; color: #334155; padding: 10px 16px; border: 1px solid #cbd5e1; border-radius: 6px; cursor: pointer; font-size: 14px;">
                        History Dummy
                    </button>
                    <button type="button" style="background-color: #f8fafc; color: #334155; padding: 10px 16px; border: 1px solid #cbd5e1; border-radius: 6px; cursor: pointer; font-size: 14px;">
                        Loop Lab
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection