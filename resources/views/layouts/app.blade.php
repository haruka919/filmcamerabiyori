<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'filmcamerabiyori') }} | @yield('title', 'Home')</title>

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@filmbiyori" />
    <meta property="og:url" content="{{ config('app.url') }}" />
    <meta property="og:title" content="フィルムカメラ日和。" />
    <meta property="og:description" content="フィルムカメラで撮った写真を投稿＆閲覧できるサイトです。" />
    <meta property="og:image" content="https://filmbiyori.paruko.net/image/twitter.jpg" />
    <link rel="shortcut icon" href="//filmbiyori.paruko.net/favicon.ico">
    <link rel="apple-touch-icon-precomposed" href="/image/twitter.jpg">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c:500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7f19bc1ee0.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//webfonts.sakura.ne.jp/js/sakura.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
    <body>
        @yield('content')
    </body>
</html>
