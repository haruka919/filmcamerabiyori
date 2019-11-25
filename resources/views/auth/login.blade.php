<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'filmcamerabiyori') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <main>
        <div class="p-wrapper-l p-form-wrapper">
            <p class="p-form__logo"><a href="/"><img src="image/sitelogo-l.svg" alt=""></a></p>
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
    </main>
    <footer class="l-footer p-footer--login">
        <p class="p-footer__txt">アカウントをお持ちでない方は登録は<a class="p-footer__txt-link" href="{{ route('register') }}">こちら</a></p>
    </footer>
</body>

</html>