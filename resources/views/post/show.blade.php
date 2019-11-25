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
        <h1 class="p-header__logo"><a href="/filmcamerabiyori-dev/"><img src="./../image/sitelogo.svg" alt="フィルムカメラ日和"></a></h1>
    </header>
    <main>
            <div class="p-wrapper-l">
                    <div class="c-posts">
                        <div class="c-post p-singlePost">
                            <a href="">
                                <figure class="c-post-image">
                                    <img src="/storage/post_images/{{ $post->id }}.jpg" alt="">
                                </figure>
                            </a>
                            <div class="c-post-textWrapper">
                                <h2 class="c-post-title">{{ $post->title }}</h2>
                                <div class="c-post-info">
                                    <span>
                                        <a href="/users/{{ $post->user_id }}">
                                            <img class="c-avator c-post-info__avator" src="/storage/user_images/{{ $post->user->id }}.jpg" alt="">
                                            <span class="c-post-info__author">{{ $post->user->name }}</span>
                                        </a>
                                    </span>
                                <time class="c-post-info__date" datetime="{{ $post->created_at->format('Y-m-d') }}">{{ $post->created_at->format('Y.m.d')}}</time>
                                </div>
                            </div>
                            <ul class="c-tags">
                                @foreach($post->tags as $tag)
                                <li class="c-tag"><a href="/posts/{{ $tag->id }}/tag">#{{ $tag->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
        
                    <div class="p-returnLink">
                        <a href="/filmcamerabiyori-dev/">
                            <img class="p-returnLink-icon" src="img/return.svg" alt="">
                            <span href="{{ url()->previous() }}">一覧に戻る</span>
                        </a>
                    </div>
        
                    <div class="p-search-wrapper">
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
                <li class="p-footer-menu__item"><a href="/filmcamerabiyori-dev/"><img src="image/menu-home.svg" alt=""></a></li>
                <li class="p-footer-menu__item"><a href="/filmcamerabiyori-dev/search.php"><img src="image/menu-search.svg" alt=""></a></li>
                <li class="p-footer-menu__item"><a href="/filmcamerabiyori-dev/edit.php"><img src="image/menu-post.svg" alt=""></a></li>
                <li class="p-footer-menu__item"><a href="/filmcamerabiyori-dev/favorite.php"><img src="image/menu-favorite.svg" alt=""></a></li>
                @guest
                <li class="p-footer-menu__item"><a href="{{ route('login') }}"><img src="image/login.jpg" alt=""></a></li>
                @else
                <li class="p-footer-menu__item"><a href="/users/{{ Auth::user()->id}}"><img src="image/update/author/author01.png" alt=""></a></li>
                @endguest

            </ul>
        </nav>
    </footer>
    <script type="text/javascript">
        $('#post_image').bind('change', function() {
            var size_in_megabytes = this.files[0].size/1024/1024;
            if (size_in_megabytes > 1) {
            alert('ファイルサイズの最大は1MBまでです。違う画像を選んでください。');
        }
        });
    </script>
</body>
</html>