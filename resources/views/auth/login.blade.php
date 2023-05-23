@extends('auth.master')
@section('title', 'Giriş')
@section('content')
    <h5>Hoşgeldin!</h5>
    <p>Bize katılmak için giriş yap ya da üye ol</p>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="inputs">
            <div class="input-holder">
                <label for="email">E-posta</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            @error('email')
            <div class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
            <div class="input-holder">
                <label for="password">Şifre</label>
                <input type="password" id="password" name="password" required>
            </div>
            @error('password')
            <div class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>

        <div class="forgot-password">
            <a href="{{ route('password.request') }}">Şifrenizi mi unuttunuz?</a>
        </div>

        <button type="submit" class="btn-purple">Giriş Yap</button>
    </form>

    <div class="register-divider"><span>Ya da Kayıt Ol</span></div>
    <div class="registration-links">
        <a href="{{ route('register') }}">Hesabın yok mu? Üye Ol</a>
    </div>
@endsection
