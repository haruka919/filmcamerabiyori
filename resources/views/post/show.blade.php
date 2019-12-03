@extends('layouts.app')

@section('title', '詳細画面')
@section('content')
    @include('layouts.header')
    <div class="p-wrapper-l">
       <div class="p-container-m">
            <div class="c-post p-singlePost">
                @auth
                    @if ($post->user->id == Auth::user()->id)
                        <span class="p-singlePost-deleteIcon js-setting__open">
                            <img src="{{ asset('image/icon/trash.svg')}}" alt="">
                        </span>
                    @endif                    
                @endauth
                <figure class="c-post-image">
                    <img src="/storage/post_images/{{ $post->id }}.jpg" alt="">
                </figure>
                <div class="c-post-textWrapper">
                    <h2 class="c-post-title">{{ $post->title }}</h2>
                    <div class="c-post-info">
                        <span>
                            <a href="/users/{{ $post->user_id }}">
                                <figure class="c-avator c-post-info__avator">
                                    <img src="/storage/user_images/{{ $post->user->id }}.jpg" alt="">
                                </figure>
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
            <div class="p-returnLink">
                <a href="{{ url()->previous() }}">
                    <img class="p-returnLink-icon" src="{{ asset('image/icon/return.svg') }}" alt="">
                    <span>一覧に戻る</span>
                </a>
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
@endsection

{{-- <script type="text/javascript">
    $('#post_image').bind('change', function() {
        var size_in_megabytes = this.files[0].size/1024/1024;
        if (size_in_megabytes > 1) {
        alert('ファイルサイズの最大は1MBまでです。違う画像を選んでください。');
    }
    });
</script> --}}
