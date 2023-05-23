@extends('auth.master')
@section('title', 'Parolamı Sıfırla')
@section('content')
    <h5>Parolanı sıfırla!</h5>
    <p>Parolanı e-posta adresine gönderelim.</p>
    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{$token}}">
        @error('token')
        <div class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
        <div class="inputs">
            @if(session('status'))
                <div class="success-message">{{ session('status') }}</div>
            @endif
            <div class="input-holder">
                <label for="email">E-posta</label>
                <input type="email" id="email" name="email" value="{{ old('email', $email) }}" required>
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

            <div class="input-holder">
                <label for="password-confirm">Şifre (Tekrar)</label>
                <input type="password" id="password-confirm" name="password_confirmation" required>
            </div>
            @error('password_confirmation')
            <div class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>

        <button type="submit" class="btn-purple">Parolamı Sıfırla</button>
    </form>
@endsection
