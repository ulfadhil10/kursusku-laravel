@extends('layouts.app')

@section('title', 'Reset Password - KursusKu')

@section('content')
<section class="section">
    <div class="form-card" style="max-width: 460px;">
        <div class="page-intro" style="margin-top: 0;">
            <span class="eyebrow">Pemulihan Akun</span>
            <h1>Password Baru</h1>
            <p>Silakan masukkan password baru untuk akun Anda.</p>
        </div>

        @if ($errors->any())
            <div class="alert-success" style="background: #F8E2D5;">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <input type="hidden" name="token" value="{{ request()->route('token') }}">

            <div class="form-group">
                <label for="email">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ request('email') }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="password">Password Baru</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password baru"
                    required
                >
            </div>

            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Ulangi password baru"
                    required
                >
            </div>

            <button type="submit" class="btn-primary" style="width: 100%;">
                Simpan Password Baru
            </button>
        </form>
    </div>
</section>
@endsection
