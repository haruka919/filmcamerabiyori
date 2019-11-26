@extends('layouts.app')
@section('title', '')

@section('content')
    <div class="p-wrapper-l p-form-wrapper">
        <p class="p-form__logo"><a href="/"><img src="./../image/sitelogo-l.svg" alt=""></a></p>
        @if (session('status'))
            <div class="" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('password.email') }}" method="post" class="p-form">
            @csrf

            <input type="email" name="email" class="p-form__input @error('email') is-error @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('Email') }}">
            @error('email')
                <span class="p-form__errorMsg" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <button type="submit" class="p-form__submit">
                {{ __('Send Password Reset Link') }}
            </button>
        </form>
    </div>
    @include('layouts.user.footer')
@endsection