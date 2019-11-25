<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'filmcamerabiyori') }}</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
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
            <div class="c-posts">
                @foreach ($posts as $post)
                    <div class="c-post">
                        <a href="/posts/{{ $post->id }}">
                            <figure class="c-post-image">
                                <img src="/storage/post_images/{{ $post->id }}.jpg" alt="">
                            </figure>
                        </a>
                        <div class="c-post-textWrapper">
                            <h2 class="c-post-title">{{ $post->title }}</h2>
                            <div class="c-post-info">
                                <span>
                                    <a href="/users/{{ $post->user_id }}">
                                        <img class="c-post-info__avator c-avator" src="/storage/user_images/{{ $post->user_id }}.jpg" alt="">
                                        <span class="c-post-info__author">{{ $post->user->name }}</span>
                                    </a>
                                </span>
                            <time class="c-post-info__date" datetime="2019-10-11">{{ $post->created_at->format('Y.m.d')}}</time>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="p-search-wrapper js-show-tags">
                <h2 class="p-search-title">#タグを探す</h2>
                <ul class="p-search-tags c-tags">
                    <li class="p-search-tag c-tag"><a href="">#フィルムカメラ</a></li>
                    <li class="p-search-tag c-tag"><a href="">#業務用フィルム</a></li>
                    <li class="p-search-tag c-tag"><a href="">#フィルム</a></li>
                    <li class="p-search-tag c-tag"><a href="">#カメラ</a></li>
                    <li class="p-search-tag c-tag"><a href="">#フィルムカメラ</a></li>
                    <li class="p-search-tag c-tag"><a href="">#業務用フィルム</a></li>
                    <li class="p-search-tag c-tag"><a href="">#フィルム</a></li>
                    <li class="p-search-tag c-tag"><a href="">#カメラ</a></li>
                    <li class="p-search-tag c-tag"><a href="">#フィルムカメラ</a></li>
                    <li class="p-search-tag c-tag"><a href="">#業務用フィルム</a></li>
                    <li class="p-search-tag c-tag"><a href="">#フィルム</a></li>
                    <li class="p-search-tag c-tag"><a href="">#カメラ</a></li>
                </ul>
                <p class="p-search-close"><img src="img/close-icon.svg" alt=""></p>
            </div>
    
        </div>
    </main>
    <footer class="l-footer p-footer">
        <nav>
            <ul class="p-footer-menu">
                <li class="p-footer-menu__item"><a href="/"><img src="image/menu-home.svg" alt=""></a></li>
                <li class="p-footer-menu__item js-search-tags"><img src="image/menu-search.svg" alt=""></li>
                <li class="p-footer-menu__item"><a href="{{ route('new') }}"><img src="image/menu-post.svg" alt=""></a></li>
                <li class="p-footer-menu__item"><a href="/filmcamerabiyori-dev/search.php"><img src="image/menu-favorite.svg" alt=""></a></li>
                @guest
                <li class="p-footer-menu__item"><a href="{{ route('login') }}"><img src="image/login.jpg" alt=""></a></li>
                @else
                <li class="p-footer-menu__item"><a href="/users/{{ Auth::user()->id}}"><img src="image/update/author/author01.png" alt=""></a></li>
                @endguest
            </ul>
        </nav>
    </footer>
</body>

</html>