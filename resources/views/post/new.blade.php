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
        <div class="p-wrapper-l" style="background: #000;">
            <form action="{{ url('posts') }}" enctype="multipart/form-data" method="post" class="p-form" accept-charset="UTF-8" method="POST">
                @csrf

                <input type="text" name="title" class="p-form__input @error('title') is-error @enderror"　value="{{ old('title') }}"required placeholder="タイトルを書く">
                @error('title')
                <span class="p-form__errorMsg" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <input type="text" name="caption" class="p-form__input @error('caption') is-error @enderror" value="{{ old('caption') }}" placeholder="キャプションを書く">
                @error('caption')
                <span class="p-form__errorMsg" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                @for ($i = 1; $i <= 2; $i++)
                    <input type="text" name="tags[]" class="p-form__input @error('tags[]'.$i) is-error @enderror"　value="{{ old('tags[]'.$i) }}" placeholder="タグを書く">

                    @error('tags[]'.$i)
                    <span class="p-form__errorMsg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                @endfor

                <input type="file" name="photo" accept="image/jpeg,image/gif,image/png">

                <button type="submit" class="p-form__submit">
                    {{ __('Register') }}
                </button>
                
            </form>
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