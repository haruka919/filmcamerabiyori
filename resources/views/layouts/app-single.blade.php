<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'filmcamerabiyori') }} | @yield('title', 'Home')</title>

    {{-- twitterカード --}}

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@filmbiyori" />
    <meta property="og:url" content="{{ config('app.url') }}posts/{{ $post->id }}">
    <meta property="og:title" content="フィルムカメラ日和。" />
    <meta property="og:description" content="{{ $post->title }}">
    <meta property="og:image" content="{{ config('app.url') }}storage/post_images/{{ $post->photo }}.jpg" /> 

    <link rel="shortcut icon" href="//filmbiyori.paruko.net/favicon.ico">
    <link rel="apple-touch-icon-precomposed" href="//filmbiyori.paruko.net/apple-touch-icon.png">

    
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
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
