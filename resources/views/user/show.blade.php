@extends('layouts.app')
@section('title', 'profile')

@section('content')
    @include('layouts.header')
    <div class="p-wrapper-l">

        <div class="p-profile-wrapper">
            <div class="p-profile">
                @if ($user->profile_photo)
                    <img class="c-avator p-profile-avator" src="{{ asset('storage/user_images/' . $user->profile_photo) }}">
                @else
                    <img class="c-avator p-profile-avator" src={{ asset('image/blank_profile.png') }}>
                @endif

                <div class="p-profile-textWrapper">
                    <h2 class="p-profile-name">
                        {{ $user->name }}
                        @if ($user->id == Auth::user()->id)
                            <img class="p-profile-setting" src="{{ asset('image/icon/setting.png') }}" alt="">
                        @endif
                    </h2>
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
    @include('layouts.footer')
@endsection