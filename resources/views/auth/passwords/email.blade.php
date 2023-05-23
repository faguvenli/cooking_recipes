@extends('auth.master')
@section('title', 'Parolamı Unuttum')
@section('content')
    <h5>Parolanı mı unuttun?</h5>
    <p>Parolanı e-posta adresine gönderelim.</p>
    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <div class="inputs">
            @if(session('status'))
            <div class="success-message">{{ session('status') }}</div>
            @endif
            <div class="input-holder">
                <label for="email">E-posta</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            @error('email')
            <div class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>

        <button type="submit" class="btn-purple">Giriş Yap</button>
    </form>
@endsection
