@extends('layouts.app')

@section('title', 'Top')

@section('content')
    @include('layouts.header')
    <div class="p-wrapper-l">
        <div class="c-posts">
            @foreach ($posts as $post)
                <div class="c-post">
                    <a href="/posts/{{ $post->id }}">
                        <figure class="c-post-image">
                            <img src="/storage/post_images/{{ $post->id }}.jpg" alt="">
                        </figure>
                    </a>
                    <div class="c-post-titleWrapper">
                        <h2 class="c-post-title">{{ $post->title }}</h2>
                        <div class="c-post__likeIcon-wrapper">
                            @if ($post->likedBy(Auth::user())->count() > 0)
                                <a class="c-post__likeIcon -loved" data-remote="true" rel="nofollow" data-method="DELETE" href="/likes/{{ $post->likedBy(Auth::user())->firstOrFail()->id }}"><img src="{{ asset('image/icon/favorite.png')}}" alt=""></a>
                            @else
                                <a class="c-post__likeIcon -love" data-remote="true" rel="nofollow" data-method="POST" href="/posts/{{ $post->id }}/likes">いいね</a>
                            @endif
                        </div>
                    </div>
                    <div class="c-post-info">
                        <span>
                            <a href="/users/{{ $post->user_id }}">
                                <img class="c-post-info__avator c-avator" src="/storage/user_images/{{ $post->user_id }}.jpg" alt="">
                                <span class="c-post-info__author">{{ $post->user->name }}</span>
                            </a>
                        </span>
                    <time class="c-post-info__date" datetime="2019-10-11">{{ $post->created_at->format('Y.m.d')}}</time>
                    </div>
                    <div class="c-post-delete">
                        @if ($post->user->id == Auth::user()->id)
                        <a class="c-post-delete__icon" rel="nofollow" href="/posts/delete/{{ $post->id }}">
                            <img src="{{ asset('image/icon/trash.png')}}" alt="">
                        </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('layouts.footer')
@endsection