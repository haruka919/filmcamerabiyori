@extends('layouts.app')

@section('title', 'Top')

@section('content')
    @include('layouts.header')
    <div class="p-wrapper-l">
        <h2>#{{ $tag->name}}で検索</h2>
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
    </div>
    @include('layouts.footer')
@endsection