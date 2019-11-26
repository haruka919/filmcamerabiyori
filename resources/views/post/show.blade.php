@extends('layouts.app')

@section('title', '詳細画面')
@section('content')
    @include('layouts.header')
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
    </div>
@endsection


{{-- <script type="text/javascript">
    $('#post_image').bind('change', function() {
        var size_in_megabytes = this.files[0].size/1024/1024;
        if (size_in_megabytes > 1) {
        alert('ファイルサイズの最大は1MBまでです。違う画像を選んでください。');
    }
    });
</script> --}}
