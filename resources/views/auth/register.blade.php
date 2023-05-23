@extends('auth.master')
@section('title', 'Üye Kayıt')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/select2/dist/css/select2.min.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('assets/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/libs/select2/dist/js/select2.min.js') }}"></script>
    <script>
        $(".select2").select2({
            width: '100%',
        });
        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });
    </script>
@endpush
@section('content')
    <h5>Hoşgeldin!</h5>
    <p>Bize katılmak için giriş yap ya da üye ol</p>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="inputs">
            @if(session('status'))
                <div class="success-message">{{ session('status') }}</div>
            @endif
            <div class="input-holder">
                <label for="name">Adınız Soyadınız</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            @error('name')
            <div class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror

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
                <input type="password" id="password" name="password" autocomplete="off" required>
            </div>
            @error('password')
            <div class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror

            <div class="input-holder">
                <label for="password-confirm">Şifre (Tekrar)</label>
                <input type="password" id="password-confirm" name="password_confirmation" autocomplete="off" required>
            </div>
            @error('password_confirmation')
            <div class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>

        <button type="submit" class="btn-purple">Kaydol</button>

        <div class="registration-links">
            <a href="{{ route('login') }}">Hesabın var mı? Giriş Yap</a>
        </div>
    </form>

@endsection
