@extends('layouts.app')

@section('title', 'Top')

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
        <div class="p-container-l">
            <h2 class="c-posts-title">#{{ $tag->name}}で検索</h2>
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
                                @guest
                                <a class="c-post__likeIcon -love" data-remote="true" rel="nofollow" data-method="POST" href="/posts/{{ $post->id }}/likes">いいね</a>
                                @endguest
                                @auth
                                    @if ($post->likedBy(Auth::user())->count() > 0)
                                        <a class="c-post__likeIcon -loved" data-remote="true" rel="nofollow" data-method="DELETE" href="/likes/{{ $post->likedBy(Auth::user())->firstOrFail()->id }}"></a>
                                    @else
                                        <a class="c-post__likeIcon -love" data-remote="true" rel="nofollow" data-method="POST" href="/posts/{{ $post->id }}/likes">いいね</a>
                                    @endif
                                @endauth
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
                    </div>
                @endforeach
                @empty($post)
                <p>まだ投稿がこざいません。</p>  
                @endempty
            </div>
        </div>
    </div>
    @include('layouts.footer')
    @include('layouts.search')
@endsection