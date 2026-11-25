@extends('layouts.app')

@section('title', 'Lupa Password - KursusKu')

@section('content')
<section class="section">
    <div class="form-card" style="max-width: 460px;">
        <div class="page-intro" style="margin-top: 0;">
            <span class="eyebrow">Pemulihan Akun</span>
            <h1>Lupa Password?</h1>
            <p>Masukkan email akun untuk mendapatkan tautan reset password.</p>
        </div>

        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert-success" style="background: #F8E2D5;">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email akun"
                    required
                >
            </div>

            <button type="submit" class="btn-primary" style="width: 100%;">
                Kirim Link Reset
            </button>

            <p style="text-align: center; margin-top: 18px;">
                <a href="{{ route('login') }}" style="color: #365004;">
                    Kembali ke Login
                </a>
            </p>
        </form>
    </div>
</section>
@endsection
