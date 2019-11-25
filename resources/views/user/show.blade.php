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
    <header class="l-header p-header">
        <h1 class="p-header__logo"><a href="/filmcamerabiyori-dev/"><img src="image/sitelogo.svg" alt="フィルムカメラ日和"></a></h1>
    </header>
    <main>
        <div class="p-wrapper-l">
            <div class="p-profile-wrapper">
                <div class="p-profile">

                    @if ($user->profile_photo)
                        <img class="c-avator p-profile-avator" src="{{ asset('storage/user_images/' . $user->profile_photo) }}">
                    @else
                        <img class="c-avator p-profile-avator" src="./../image/blank_profile.jpg">
                    @endif

                    <div class="p-profile-textWrapper">
                        <h2 class="p-profile-name">{{ $user->name }}</h2>
                        <p class="p-profile-text">{{ $user->intro }}</p>
                    </div>
                </div>
                @if ($user->id == Auth::user()->id)
                    <a class="p-profile-link" href="/users/edit">プロフィールを編集</a>
                @endif
                <p class="p-profileEdit-link">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span>ログアウト</span></a>する</p>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
                </form>
            </div>
            <div class="c-posts p-profile-posts">
                @foreach ($posts as $post)
                    <div class="c-post p-profile-post">
                        <a href="/posts/{{ $post->id }}">
                            <figure class="c-post-image">
                                <img src="/storage/post_images/{{ $post->id }}.jpg" alt="">
                            </figure>
                        </a>
                        <div class="p-profile-post-textWrapper c-post-textWrapper">
                            <h2 class="c-post-title p-profile-post-title">{{ $post->title }}</h2>
                            <time class="c-post-info__date" datetime="2019-10-11">{{ $post->created_at->format('Y.m.d')}}</time>
                        </div>
                    </div>              
                @endforeach
            </div>

        </div>
    </main>

    <footer class="l-footer p-footer">
        <nav>
            <ul class="p-footer-menu">
                <li class="p-footer-menu__item"><a href="/filmcamerabiyori-dev/"><img src="./../image/menu-home.svg" alt=""></a></li>
                <li class="p-footer-menu__item"><a href="/filmcamerabiyori-dev/search.php"><img src="./../image/menu-search.svg" alt=""></a></li>
                <li class="p-footer-menu__item"><a href="/filmcamerabiyori-dev/edit.php"><img src="./../image/menu-post.svg" alt=""></a></li>
                <li class="p-footer-menu__item"><a href="/filmcamerabiyori-dev/favorite.php"><img src="./../image/menu-favorite.svg" alt=""></a></li>
                @guest
                <li class="p-footer-menu__item"><a href="{{ route('login') }}"><img src="./../image/login.jpg" alt=""></a></li>
                @else
                <li class="p-footer-menu__item"><a href="/filmcamerabiyori-dev/profile.php"><img src="./../image/update/author/author01.png" alt=""></a></li>
                @endguest
            </ul>
        </nav>
    </footer>
    </body>

</html>