
@extends('layouts.app')

@section('title', 'Profil Saya - KursusKu')

@section('content')
<style>
    .profile-page {
        width: min(1100px, 94%);
        margin: 45px auto;
        color: #351903;
    }

    .profile-banner {
        background: linear-gradient(115deg, #365004, #66851c, #8DA432);
        padding: 35px 40px 85px;
        border-radius: 18px 18px 0 0;
        color: #FFFBEA;
        position: relative;
        overflow: hidden;
    }

    .profile-banner h2 {
        font-size: 27px;
        margin: 0 0 8px;
    }

    .profile-banner p {
        margin: 0;
        opacity: .9;
        font-size: 15px;
    }

    .profile-main {
        background: #fff;
        padding: 0 40px 35px;
        border-radius: 0 0 18px 18px;
        box-shadow: 0 8px 30px rgba(53,25,3,.10);
    }

    .profile-identity {
        display: flex;
        align-items: center;
        gap: 22px;
        margin-top: -55px;
        position: relative;
        padding-bottom: 28px;
        border-bottom: 1px solid #eee;
    }

    .profile-photo {
        width: 115px;
        height: 115px;
        min-width: 115px;
        border: 6px solid white;
        border-radius: 50%;
        background: #EDE383;
        color: #365004;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 43px;
        font-weight: bold;
        box-shadow: 0 3px 12px rgba(0,0,0,.12);
    }

    .profile-identity h1 {
        font-size: 25px;
        margin: 23px 0 5px;
    }

    .profile-identity p {
        color: #777;
        margin: 0;
        font-size: 14px;
    }

    .profile-badge {
        display: inline-block;
        margin-top: 10px;
        background: #edf4dc;
        color: #365004;
        padding: 6px 13px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
    }

    .profile-layout {
        display: grid;
        grid-template-columns: 1.5fr 1fr;
        gap: 25px;
        margin-top: 30px;
    }

    .profile-card {
        background: #fff;
        border: 1px solid #e9ecd9;
        border-radius: 13px;
        padding: 25px;
    }

    .profile-card h3 {
        font-size: 18px;
        margin: 0 0 7px;
        color: #365004;
    }

    .profile-card .description {
        color: #888;
        font-size: 13px;
        margin: 0 0 23px;
        line-height: 1.6;
    }

    .profile-info {
        padding: 15px 16px;
        background: #fafbf6;
        border: 1px solid #edf0e4;
        border-radius: 9px;
        margin-bottom: 13px;
    }

    .profile-info:last-child {
        margin-bottom: 0;
    }

    .profile-info label {
        display: block;
        color: #888;
        font-size: 12px;
        margin-bottom: 7px;
    }

    .profile-info p {
        font-size: 15px;
        font-weight: 600;
        margin: 0;
        overflow-wrap: anywhere;
    }

    .account-item {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 16px 0;
        border-bottom: 1px solid #eee;
    }

    .account-item:last-child {
        border-bottom: none;
    }

    .account-icon {
        width: 43px;
        height: 43px;
        min-width: 43px;
        border-radius: 10px;
        background: #f1f4e5;
        color: #365004;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
    }

    .account-item small {
        display: block;
        color: #888;
        font-size: 12px;
        margin-bottom: 4px;
    }

    .account-item strong {
        font-size: 14px;
    }

    .profile-bottom {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        margin-top: 28px;
    }

    .profile-bottom p {
        color: #888;
        font-size: 13px;
        margin: 0;
    }

    .profile-edit {
        background: #8DA432;
        color: white;
        padding: 11px 22px;
        border-radius: 7px;
        text-decoration: none;
        font-size: 13px;
        font-weight: bold;
        opacity: .7;
        cursor: not-allowed;
    }

    @media(max-width: 750px) {
        .profile-page {
            margin: 25px auto;
        }

        .profile-banner {
            padding: 28px 22px 75px;
        }

        .profile-main {
            padding: 0 20px 25px;
        }

        .profile-layout {
            grid-template-columns: 1fr;
        }

        .profile-identity {
            gap: 13px;
        }

        .profile-photo {
            width: 85px;
            height: 85px;
            min-width: 85px;
            font-size: 30px;
        }

        .profile-identity h1 {
            font-size: 19px;
        }
    }
</style>

<section class="profile-page">

    <div class="profile-banner">
        <h2>Profil Pengguna</h2>
        <p>Selamat datang di halaman akun KursusKu.</p>
    </div>

    <div class="profile-main">

        <div class="profile-identity">
            <div class="profile-photo">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>

            <div>
                <h1>{{ $user->name }}</h1>
                <p>{{ $user->email }}</p>
                <span class="profile-badge">● Akun Aktif</span>
            </div>
        </div>

        <div class="profile-layout">

            <div class="profile-card">
                <h3>Informasi Pribadi</h3>
                <p class="description">
                    Informasi identitas pengguna yang terdaftar pada KursusKu.
                </p>

                <div class="profile-info">
                    <label>Nama Lengkap</label>
                    <p>{{ $user->name }}</p>
                </div>

                <div class="profile-info">
                    <label>Alamat Email</label>
                    <p>{{ $user->email }}</p>
                </div>

                <div class="profile-info">
                    <label>ID Pengguna</label>
                    <p>#{{ $user->id }}</p>
                </div>
            </div>

            <div class="profile-card">
                <h3>Ringkasan Akun</h3>
                <p class="description">
                    Informasi umum mengenai akun Anda.
                </p>

                <div class="account-item">
                    <div class="account-icon">◷</div>
                    <div>
                        <small>Tanggal Bergabung</small>
                        <strong>{{ $user->created_at->format('d F Y') }}</strong>
                    </div>
                </div>

                <div class="account-item">
                    <div class="account-icon">✓</div>
                    <div>
                        <small>Status Akun</small>
                        <strong>Aktif</strong>
                    </div>
                </div>

                <div class="account-item">
                    <div class="account-icon">⌂</div>
                    <div>
                        <small>Platform</small>
                        <strong>KursusKu</strong>
                    </div>
                </div>
            </div>

        </div>

        <div class="profile-bottom">
            <p>Terdaftar sebagai pengguna KursusKu.</p>

            <span class="profile-edit">
                Edit Profil (Segera Hadir)
            </span>
        </div>

    </div>
</section>
@endsection
