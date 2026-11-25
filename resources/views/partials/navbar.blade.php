
<style>
    .navbar-custom {
        background-color: #351903;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        padding: 15px 25px;
        gap: 12px;
    }

    .navbar-custom a,
    .navbar-custom .user-menu summary {
        color: #EDE383;
        text-decoration: none;
        font-weight: bold;
        font-size: 14px;
        padding: 10px 18px;
        border-radius: 7px;
        background-color: #365004;
        transition: all 0.2s ease;
        cursor: pointer;
        list-style: none;
        display: inline-block;
    }

    .navbar-custom a:hover,
    .navbar-custom .user-menu summary:hover {
        background-color: #8DA432;
        color: #fff;
        transform: translateY(-2px);
    }

    .navbar-custom a.active {
        background-color: #8DA432;
        color: #fff;
    }

    .user-menu {
        position: relative;
    }

    .user-menu summary::-webkit-details-marker {
        display: none;
    }

    .user-menu summary::after {
        content: " ▾";
        font-size: 12px;
    }

    .user-dropdown {
        position: absolute;
        top: calc(100% + 10px);
        left: 0;
        min-width: 190px;
        background: #FFFBEA;
        border: 1px solid #EDE383;
        border-radius: 9px;
        padding: 8px;
        box-shadow: 0 8px 20px rgba(0,0,0,.18);
        z-index: 1000;
    }

    .user-dropdown a {
        display: block;
        background: transparent;
        color: #351903;
        padding: 11px 13px;
        border-radius: 6px;
        font-size: 13px;
    }

    .user-dropdown a:hover {
        background: #EDE383;
        color: #351903;
        transform: none;
    }

    .user-dropdown form {
        margin: 0;
    }

    .user-dropdown button {
        width: 100%;
        text-align: left;
        background: transparent;
        border: none;
        color: #9b2929;
        padding: 11px 13px;
        border-radius: 6px;
        font-size: 13px;
        font-weight: bold;
        cursor: pointer;
    }

    .user-dropdown button:hover {
        background: #f5e2d9;
    }

    @media (max-width: 600px) {
        .navbar-custom {
            gap: 8px;
            padding: 12px;
        }

        .navbar-custom a,
        .navbar-custom .user-menu summary {
            font-size: 12px;
            padding: 9px 12px;
        }
    }
</style>

<!-- HEADER -->
<header style="background-color: #365004; color: #EDE383; text-align: center; padding: 25px 0;">
    <div class="container">
        <h1 style="margin: 0; font-size: 32px; font-weight: bold; color: #EDE383;">
            KursusKu
        </h1>
        <p style="margin: 5px 0 0 0; font-size: 14px; color: #EDE383;">
            Belajar Teknologi, Bangun Masa Depan
        </p>
    </div>
</header>

<!-- NAVBAR -->
<nav class="navbar-custom">

    @auth
        <!-- MENU PENGGUNA -->
        <details class="user-menu">
            <summary>{{ $userName = Auth::user()->name }}</summary>

            <div class="user-dropdown">
                <a href="{{ route('profile.index') }}">
                    Profil Saya
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">
                        Logout
                    </button>
                </form>
            </div>
        </details>

        <a href="{{ route('home') }}">Beranda</a>
        <a href="{{ route('courses.index') }}">Katalog</a>

    @else
        <a href="{{ route('home') }}">Beranda</a>
        <a href="#keunggulan">Keunggulan</a>
        <a href="#kursus">Katalog</a>
        <a href="#alur">Cara Daftar</a>
        <a href="#media">Media</a>
        <a href="#kontak">Kontak</a>
        <a href="/form-p5">Form P5</a>
        <a href="/form-p6">Form P6</a>
        <a href="/history">History</a>
        <a href="{{ route('pendaftaran.create') }}">Daftar Kursus</a>
        <a href="{{ route('login') }}">Login</a>
    @endauth

</nav>
