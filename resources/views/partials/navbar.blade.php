<!-- KODE CSS KHUSUS NAVBAR -->
<style>
    .navbar-custom {
        background-color: #351903;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        padding: 15px 0;
        gap: 12px; /* Jarak antar kotak menu */
    }

    .navbar-custom a {
        color: #EDE383;
        text-decoration: none;
        font-weight: bold;
        font-size: 14px;
        padding: 8px 16px; /* Membuat bentuk kotak */
        border-radius: 6px; /* Sudut kotak melengkung sedikit */
        background-color: #365004; /* Warna dasar hijau gelap */
        transition: all 0.3s ease; /* Animasi halus saat hover */
    }

    /* Efek saat kursor diarahkan (Hover) */
    .navbar-custom a:hover {
        background-color: #8DA432; /* Warna berubah jadi hijau terang */
        color: #ffffff; /* Teks jadi putih */
        transform: translateY(-2px); /* Efek sedikit naik */
    }

    /* Khusus untuk menu yang sedang aktif (opsional) */
    .navbar-custom a.active {
        background-color: #8DA432;
        color: #ffffff;
    }
</style>

<!-- HEADER -->
<header style="background-color: #365004; color: #EDE383; text-align: center; padding: 25px 0;">
    <div class="container">
        <h1 style="margin: 0; font-size: 32px; font-weight: bold; color: #EDE383;">KursusKu</h1>
        <p style="margin: 5px 0 0 0; font-size: 14px; color: #EDE383;">
            Belajar Teknologi, Bangun Masa Depan
        </p>
    </div>
</header>

<!-- NAVBAR -->
<nav class="navbar-custom">
    <a href="{{ route('home') }}">Beranda</a>
    <a href="#keunggulan">Keunggulan</a>
    <a href="#kursus">Katalog</a>
    <a href="#alur">Cara Daftar</a>
    <a href="#media">Media</a>
    <a href="#kontak">Kontak</a>
    <a href="/form-p5">Form P5</a>
    <a href="/form-p6">Form P6</a>
    <a href="/history">History</a>
    <a href="{{ route('enrollments.create') }}">Daftar Kursus</a>
</nav>