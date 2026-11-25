
@extends('layouts.app')

@section('title', 'Login - KursusKu')

@section('content')

<style>
    .login-section {
        padding: 65px 30px;
    }

    .login-layout {
        max-width: 1050px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 25px;
        align-items: stretch;
    }

    /* Kotak Informasi */
    .login-info {
        background: #365004;
        color: #FFFBEA;
        border-radius: 16px;
        padding: 45px 38px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        box-shadow: 0 8px 20px rgba(53, 25, 3, 0.10);
        overflow: hidden;
    }

    .login-info .eyebrow {
        color: #EDE383;
        font-weight: bold;
        letter-spacing: 2px;
        font-size: 13px;
    }

    .login-info h1 {
        max-width: 390px;
        font-size: 36px;
        line-height: 1.25;
        margin: 18px 0;
        color: #FFFBEA;
    }

    .login-info p {
        line-height: 1.8;
        color: #F5F0CF;
        font-size: 15px;
    }

    .info-line {
        width: 65px;
        height: 4px;
        background: #EDE383;
        border-radius: 10px;
        margin: 8px 0 18px;
    }

    /* Tampilan Coding */
    .code-preview {
        background: #241b13;
        border: 1px solid rgba(237, 227, 131, 0.25);
        border-radius: 12px;
        padding: 15px 18px;
        margin: 22px 0;
        box-shadow: 0 8px 18px rgba(0, 0, 0, 0.15);
    }

    .code-header {
        display: flex;
        align-items: center;
        gap: 6px;
        padding-bottom: 12px;
        border-bottom: 1px solid #51402d;
        margin-bottom: 12px;
    }

    .code-dot {
        width: 9px;
        height: 9px;
        border-radius: 50%;
        background: #EDE383;
    }

    .code-title {
        color: #d8cda7;
        font-size: 11px;
        margin-left: 8px;
    }

    .code-lines {
        font-family: Consolas, monospace;
        font-size: 12px;
        line-height: 1.9;
        color: #FFFBEA;
    }

    .code-yellow {
        color: #EDE383;
    }

    .code-green {
        color: #A8C76B;
    }

    /* Keunggulan */
    .feature-list {
        display: grid;
        grid-template-columns: 1fr;
        gap: 12px;
        margin-top: 10px;
    }

    .feature-item {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .feature-number {
        width: 34px;
        height: 34px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(237, 227, 131, 0.15);
        color: #EDE383;
        border-radius: 9px;
        font-weight: bold;
        font-size: 13px;
    }

    .feature-item strong {
        display: block;
        color: #FFFBEA;
        font-size: 14px;
    }

    .feature-item small {
        display: block;
        color: #D9D8B8;
        font-size: 12px;
        margin-top: 3px;
    }

    /* Kotak Login */
    .login-card {
        max-width: none;
        width: 100%;
        box-sizing: border-box;
        padding: 35px 30px;
        align-self: center;
    }

    .login-card .page-intro {
        margin-top: 0;
    }

    .login-card input[type="email"],
    .login-card input[type="password"],
    .login-card input[type="text"] {
        width: 100%;
        height: 48px;
        box-sizing: border-box;
        padding: 12px 14px;
        border: 1px solid #C9BD74;
        border-radius: 10px;
        background: #FFFBEA;
        font: inherit;
    }

    .login-card input:focus {
        outline: none;
        border-color: #8DA432;
        box-shadow: 0 0 0 3px rgba(141, 164, 50, 0.15);
    }

    /* Ikon Lihat Password */
    .password-wrapper {
        position: relative;
    }

    .password-wrapper input {
        padding-right: 48px !important;
    }

    .toggle-password {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        border: none;
        background: transparent;
        color: #365004;
        padding: 5px;
        cursor: pointer;
        display: flex;
        align-items: center;
    }

    .toggle-password:hover {
        color: #8DA432;
    }

    .toggle-password svg {
        width: 21px;
        height: 21px;
    }

    .login-card .btn-primary {
        width: 100%;
        margin-top: 8px;
    }

    .forgot-password {
        text-align: center;
        margin-top: 20px;
    }

    .forgot-password a {
        color: #365004;
    }

    /* Tampilan HP */
    @media (max-width: 768px) {
        .login-section {
            padding: 35px 18px;
        }

        .login-layout {
            grid-template-columns: 1fr;
        }

        .login-info {
            padding: 30px;
        }

        .login-info h1 {
            font-size: 30px;
        }

        .login-card {
            padding: 30px 22px;
        }
    }
</style>

<section class="section login-section">
    <div class="login-layout">

        <!-- Kotak Informasi -->
        <div class="login-info">

            <span class="eyebrow">KURSUSKU • DIGITAL LEARNING</span>

            <h1>
                Tingkatkan Skill,
                Bangun Masa Depan.
            </h1>

            <div class="info-line"></div>

            <p>
                Kembangkan kemampuan digital melalui pembelajaran
                teknologi yang praktis dan mudah dipahami.
            </p>

            <!-- Ilustrasi Coding -->
            <div class="code-preview">
                <div class="code-header">
                    <span class="code-dot"></span>
                    <span class="code-dot"></span>
                    <span class="code-dot"></span>
                    <span class="code-title">belajar-teknologi.php</span>
                </div>

                <div class="code-lines">
                    <div><span class="code-yellow">&lt;?php</span></div>
                    <div>$kursus = <span class="code-green">"KursusKu"</span>;</div>
                    <div>$skill = <span class="code-green">"Programming"</span>;</div>
                    <div>&nbsp;</div>
                    <div><span class="code-yellow">echo</span> "Mulai Belajar!";</div>
                    <div><span class="code-yellow">?&gt;</span></div>
                </div>
            </div>

            <!-- Keunggulan -->
            <div class="feature-list">

                <div class="feature-item">
                    <div class="feature-number">01</div>
                    <div>
                        <strong>Belajar Fleksibel</strong>
                        <small>Belajar sesuai waktu dan kebutuhan.</small>
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-number">02</div>
                    <div>
                        <strong>Materi Praktis</strong>
                        <small>Pelajari keterampilan teknologi.</small>
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-number">03</div>
                    <div>
                        <strong>Kembangkan Skill</strong>
                        <small>Persiapkan diri menghadapi dunia digital.</small>
                    </div>
                </div>

            </div>
        </div>

        <!-- Kotak Login -->
        <div class="form-card login-card">

            <div class="page-intro">
                <span class="eyebrow">Selamat Datang</span>
                <h1>Login KursusKu</h1>
                <p>Masuk untuk mengakses akun Anda.</p>
            </div>

            @if (session('status'))
                <div class="alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert-success"
                     style="background: #F8E2D5; border-color: #925E06;">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.store') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Masukkan email"
                        required
                        autofocus
                    >
                </div>

                <div class="form-group">
                    <label for="password">Password</label>

                    <div class="password-wrapper">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Masukkan password"
                            required
                        >

                        <button
                            type="button"
                            class="toggle-password"
                            onclick="togglePassword(this)"
                            aria-label="Tampilkan password"
                            aria-pressed="false"
                        >
                            <svg viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor"
                                 stroke-width="2"
                                 stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7-10-7-10-7z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <label style="font-weight: normal;">
                        <input
                            type="checkbox"
                            name="remember"
                            value="1"
                            style="width: auto; height: auto;"
                        >
                        Ingat saya
                    </label>
                </div>

                <button type="submit" class="btn-primary">
                    Login
                </button>

                <p class="forgot-password">
                    <a href="{{ route('password.request') }}">
                        Lupa password?
                    </a>
                </p>

            </form>
        </div>

    </div>
</section>

<script>
    function togglePassword(button) {
        const password = document.getElementById('password');
        const isHidden = password.type === 'password';

        password.type = isHidden ? 'text' : 'password';

        button.setAttribute('aria-pressed', isHidden);
        button.setAttribute(
            'aria-label',
            isHidden ? 'Sembunyikan password' : 'Tampilkan password'
        );

        button.innerHTML = isHidden
            ? `<svg viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 3l18 18"/>
                    <path d="M10.6 10.6a2 2 0 0 0 2.8 2.8"/>
                    <path d="M9.9 5.2A10.8 10.8 0 0 1 12 5c6.4 0 10 7 10 7a13 13 0 0 1-3 3.7"/>
                    <path d="M6.6 6.6C3.7 8.5 2 12 2 12s3.6 7 10 7c1.1 0 2.1-.2 3-.5"/>
                </svg>`
            : `<svg viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7-10-7-10-7z"/>
                    <circle cx="12" cy="12" r="3"/>
                </svg>`;
    }
</script>

@endsection
