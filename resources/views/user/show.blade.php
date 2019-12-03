@extends('layouts.app')
@section('title', 'profile')

@section('content')
    <!-- Loading -->
    <div id="is-loading">
        <div id="loading">
            <img src="{{ asset('image/icon/loading.gif') }}" alt="loadingなう" />
        </div>
    </div>
    <!-- //Loading -->
    @include('layouts.header')
    <div class="p-wrapper-l">
        <div class="p-container-lm">
            <div class="p-profile-wrapper">
                <div class="p-profile">
                    @if ($user->profile_photo)
                        <figure class="c-avator p-profile-avator">
                            <img src="{{ asset('storage/user_images/' . $user->profile_photo) }}">
                        </figure>
                    @else
                        <figure class="c-avator p-profile-avator">
                            <img src={{ asset('image/blank_profile.png') }}>
                        </figure>
                    @endif
    
                    <div class="p-profile-textWrapper">
                        <h2 class="p-profile-name">
                            {{ $user->name }}
                            @auth
                                @if ($user->id == Auth::user()->id)
                                    <img class="p-profile-setting js-setting__open" src="{{ asset('image/icon/setting.svg') }}" alt="">
                                @endif
                            @endauth
                        </h2>
                        <p class="p-profile-text">{{ $user->intro }}</p>
                    </div>
                </div>
                @auth
                    @if ($user->id == Auth::user()->id)
                        <a class="p-profile-link" href="/users/edit">プロフィールを編集</a>
                    @endif
                @endauth
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
    </div>
    <div class="js-setting__wrapper p-modal__wrapper">
        <div class="js-setting__container p-modal__container">
            <img class="js-setting__close p-modal__close" src="{{ asset('image/icon/close.svg') }}" alt="">
            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="p-modal__btn">ログアウトする</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
            </form>
        </div>
    </div>
    @include('layouts.footer')
    @include('layouts.search')
@endsection
