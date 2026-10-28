@extends('layouts.app')

@section('title', 'Beranda - KursusKu')

@section('content')

<!-- HERO -->
<section id="beranda" class="hero">
    <div class="container">
        <div class="hero-content">
            <!-- BAGIAN KIRI: TEKS & TOMBOL -->
            <div class="hero-text">
                <span class="hero-badge">PLATFORM BELAJAR TEKNOLOGI</span>
                
                <h2 class="hero-title">
                <span style="color: #351903;">Belajar Teknologi,</span><br>
                 Bangun Masa Depan.
                </h2>
                
                <p class="hero-desc">
                    Temukan kursus pemrograman yang sesuai dengan kebutuhanmu. Belajar secara bertahap, latihan dengan terarah, dan kembangkan kemampuan melalui materi yang praktis.
                </p>
                
                <div class="hero-buttons">
                    <a href="#kursus" class="button btn-hijau">Lihat Katalog</a>
                    <a href="{{ route('enrollments.create') }}" class="button btn-putih">Daftar Sekarang</a>
                </div>
                
                <div class="hero-buttons-bottom">
                    <a href="#" class="button btn-putih">Hitung Estimasi Biaya</a>
                </div>
            </div>

            <!-- BAGIAN KANAN: GAMBAR -->
            <div class="hero-image-wrapper">
                <img src="{{ asset('images/hero-khusus.png') }}" alt="Mahasiswa belajar" class="hero-image">
            </div>
        </div>
    </div>
</section>

<!-- KEUNGGULAN -->
<section id="keunggulan" class="section">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">KENAPA KURSUSKU?</span>
            <h2 class="section-title">Belajar Lebih Terarah</h2>
            <p class="section-desc">KursusKu membantu peserta mempelajari teknologi secara bertahap melalui materi dan latihan yang relevan.</p>
        </div>
        
        <div class="steps-grid">
            <!-- Card 1 -->
            <div class="step-card">
                <div class="step-number">01</div>
                <h3>Materi Praktis</h3>
                <p>Materi dirancang agar peserta dapat langsung memahami konsep dan menerapkannya dalam latihan.</p>
            </div>
            
            <!-- Card 2 -->
            <div class="step-card">
                <div class="step-number">02</div>
                <h3>Belajar Bertahap</h3>
                <p>Peserta dapat memilih kursus sesuai tingkat kemampuan, mulai dari dasar hingga lanjutan.</p>
            </div>
            
            <!-- Card 3 -->
            <div class="step-card">
                <div class="step-number">03</div>
                <h3>Berbasis Proyek</h3>
                <p>Pembelajaran diarahkan pada latihan pemrograman agar kemampuan dapat berkembang melalui praktik.</p>
            </div>
        </div>
    </div>
</section>

<!-- KATALOG -->
<section id="kursus" class="section section-light">
    <div class="container">
        <h2>Katalog Kursus</h2>
        <table>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Biaya</th>
                    <th>Mulai</th>
                    <th>Sisa</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($featured as $course)
                <tr>
                    <td>{{ $course['code'] }}</td>
                    <td>{{ $course['name'] }}</td>
                    <td>Rp {{ number_format($course['fee'], 0, ',', '.') }}</td>
                    <td>{{ date('d-m-Y', strtotime($course['start_date'])) }}</td>
                    <td>{{ max(0, $course['quota'] - $course['registered']) }}</td>
                    <td>
                        @if($course['registered'] >= $course['quota'])
                            <span class="badge-full">Penuh</span>
                        @else
                            <span class="badge-available">Tersedia</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

<!-- CARA DAFTAR -->
<section id="alur" class="section">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">PANDUAN PENDAFTARAN</span>
            <h2 class="section-title">Cara Daftar Kursus</h2>
            <p class="section-desc">Ikuti tiga langkah sederhana untuk mendaftar di KursusKu.</p>
        </div>
        
        <div class="steps-grid">
            <!-- Langkah 1 -->
            <div class="step-card">
                <div class="step-number">01</div>
                <h3>Pilih Kursus</h3>
                <p>Pilih Web Dasar, PHP Dasar, atau Laravel Fundamental sesuai kebutuhanmu.</p>
            </div>
            
            <!-- Langkah 2 -->
            <div class="step-card">
                <div class="step-number">02</div>
                <h3>Isi Formulir</h3>
                <p>Lengkapi data peserta, pilih metode belajar, dan tentukan jumlah paket.</p>
            </div>
            
            <!-- Langkah 3 -->
            <div class="step-card">
                <div class="step-number">03</div>
                <h3>Proses Pendaftaran</h3>
                <p>Periksa data dan rincian biaya setelah formulir dikirimkan.</p>
            </div>
        </div>

        <!-- Tombol di bawah -->
        <div class="step-action">
            <a href="{{ route('enrollments.create') }}" class="button btn-hijau">Buka Formulir Pendaftaran</a>
        </div>
    </div>
</section>

<!-- VIDEO -->
<section id="media" class="section section-light">
    <div class="container">
        <h2>Video Pembelajaran</h2>
        <div style="text-align:center; margin-top:20px;">
            <iframe width="342" height="607" src="https://www.youtube.com/embed/nQinn48Bk2g" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
</section>

<!-- KONTAK -->
<section id="kontak" class="section">
    <div class="container">
        <h2>Kontak</h2>
        <p>Informasi lebih lanjut mengenai program KursusKu dapat diperoleh melalui halaman ini.</p>
    </div>
</section>

@endsection