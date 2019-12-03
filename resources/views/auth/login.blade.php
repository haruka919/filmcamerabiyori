@extends('layouts.app')
@section('title', 'Login')

@section('content')
    <div class="p-wrapper-l p-form-wrapper">
        <div class="p-container-m">
            <p class="p-form__logo"><a href="/"><img src={{ asset('image/sitelogo-l.svg') }}></a></p>
            <form action="{{ route('login') }}" method="post" class="p-form">
                @csrf

                <input type="email" name="email" class="p-form__input @error('email') is-error @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="メールアドレス">
                @error('email')
                    <span class="p-form__errorMsg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input type="password" name="password" class="p-form__input @error('password') is-error @enderror" placeholder="パスワード" required autocomplete="current-password">
                @error('password')
                    <span class="p-form__errorMsg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <button type="submit" class="p-form__submit">
                    {{ __('Login') }}
                </button>
            
                @if (Route::has('password.request'))
                    <p class="p-form__txt">パスワードを忘れた方は<a class="p-form__txt-link" href="{{ route('password.request') }}">こちら</a></p>
                @endif
            </form>
        </div>
    </div>
    @include('layouts.user.footer')
@endsection
