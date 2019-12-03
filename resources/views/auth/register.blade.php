@extends('layouts.app')
@section('title', 'Register')

@section('content')
    <div class="p-wrapper-l p-form-wrapper">
        <div class="p-container-m">
            <p class="p-form__logo"><a href="/"><img src={{ asset('image/sitelogo-l.svg') }}></a></p>
            <form action="{{ route('register') }}" method="post" class="p-form">
                @csrf

                <input type="text" name="name" class="p-form__input @error('name') is-error @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="{{ __('Username') }}">
                @error('name')
                    <span class="p-form__errorMsg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input type="email" name="email" class="p-form__input @error('email') is-error @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('Email') }}">
                @error('email')
                    <span class="p-form__errorMsg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input type="password" name="password" class="p-form__input @error('password') is-error @enderror" placeholder="{{ __('Password') }}" required autocomplete="new-password">
                @error('password')
                    <span class="p-form__errorMsg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input type="password" name="password_confirmation" class="p-form__input @error('password') is-error @enderror" placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">

                <button type="submit" class="p-form__submit">
                    {{ __('Register') }}
                </button>
                
            </form>
        </div>
    </div>
    <footer class="l-footer p-footer--login">
        <p class="p-footer__txt">ログインは<a class="p-footer__txt-link" href="{{ route('login') }}">こちら</a></p>
    </footer>
@endsection