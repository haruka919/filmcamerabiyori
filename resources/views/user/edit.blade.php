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
        <div class="p-profileEdit-wrapper">
            <form class="p-profileEdit" action="/users/update" method="post"  accept-charset="UTF-8" enctype="multipart/form-data">
                <input name="utf8" type="hidden" value="✓" />
                <input type="hidden" name="id" value="{{ $user->id }}" />
                @csrf
                <div class="p-profileEdit-header">
                    <div class="p-profileEdit-header__inner">
                        <a class="p-profileEdit-header__cancel" href="{{ url()->previous() }}">キャンセル</a>
                        <h1 class="p-profileEdit-header__title">#編集する</h1>
                        <input type="submit" name="commit" value="保存" class="p-profileEdit-header__submit">
                    </div>
                </div>
                <div class="p-wrapper-l">
                    <div class="p-profileEdit-form">
                        <div class="p-profileEdit-form__pic-wrapper">
                            <label class="p-profileEdit-form__pic js-form-pic">
                                <input type="hidden" name="MAX_FILE_SIZE" value="3145728">
                                <input type="file" class="p-profileEdit-form__pic-input js-form-picFile" name="user_profile_photo"  value="{{ old('user_profile_photo',$user->id) }}" accept="image/jpeg,image/gif,image/png" />
                                @if ($user->profile_photo)
                                    <img class="js-form-preview" src="{{ asset('storage/user_images/' .$user->profile_photo) }}" alt="avatar" />
                                @else
                                    <img class="js-form-preview" src="image/dammy.jpg" alt="">
                                @endif
                                <i class="fas fa-plus profile-icon"></i>
                            </label>
                        </div>

                        <dl>
                            <dt>
                                <label for="name">ユーザー名</label>
                            </dt>
                            <dd>
                                <input type="text" name="name" id="name" class="@error('name') is-error @enderror" value="{{ old('name', $user->name) }}" autofocus>
                                @error('name')
                                    <span class="p-form__errorMsg" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </dd>
                        </dl>
                        
                        <dl>
                            <dt>
                                <label for="intro">自己紹介</label>
                            </dt>
                            <dd>
                                <textarea name="intro" id="intro" cols="30" rows="5" class="@error('intro') is-error @enderror" autofocus>{{ old('intro', $user->intro) }}</textarea>
                                @error('intro')
                                    <span class="p-form__errorMsg" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <label for="email">Email</label>
                            </dt>
                            <dd>
                                <input type="email" name="email" id="email" class="@error('email') is-error @enderror" value="{{ old('email', $user->email) }}" autofocus>
                                @error('email')
                                    <span class="p-form__errorMsg" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </dd>
                        </dl>
                    </div>
                </div>
            </form>
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