@extends('layouts.app-single')

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
                <figure class="c-post-image p-singlePost-image">
                    <img src="/storage/post_images/{{ $post->photo }}.jpg" alt="">
                </figure>
                <div class="c-post-textWrapper">
                    <h2 class="c-post-title p-singlePost-title">{{ $post->title }}</h2>
                    <div class="c-post-info">
                        <span>
                            <a href="/users/{{ $post->user_id }}">
                                <figure class="c-avator c-post-info__avator">
                                    <img src="/storage/user_images/{{ $post->user->profile_photo }}.jpg" alt="">
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
                <div class="p-singlePost-shareWrapper">
                    <h3 class="p-singlePost-shareTitle">\素敵な写真を見つけたらsnsにシェアしよう/</h3>
                    <div class="p-singlePost-shareBtns">
                        <a class="p-singlePost-shareBtn" href="https://twitter.com/share?url=https://filmbiyori.paruko.net/posts/{{ $post->id }}&text=「{{ $post->title }}」&related={{ @h9h1h7 }}&hashtags=フィルムカメラ日和" target="_blank">
                            <svg class="as_twitter" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 37.45 31.21">
                            <path id="Twitter" class="cls-1" d="M36.42.58a15.43,15.43,0,0,1-4.88,1.91A7.59,7.59,0,0,0,25.93,0a7.78,7.78,0,0,0-7.68,7.88,7.5,7.5,0,0,0,.2,1.79A21.63,21.63,0,0,1,2.61,1.44a8,8,0,0,0-1,4A7.9,7.9,0,0,0,5,12,7.67,7.67,0,0,1,1.5,11v.1A7.83,7.83,0,0,0,7.67,18.8a7.09,7.09,0,0,1-2,.28,7.67,7.67,0,0,1-1.45-.14,7.71,7.71,0,0,0,7.18,5.47,15.21,15.21,0,0,1-9.55,3.37A13.84,13.84,0,0,1,0,27.67a21.32,21.32,0,0,0,11.78,3.54c14.13,0,21.86-12,21.86-22.42,0-.34,0-.68,0-1a15.51,15.51,0,0,0,3.83-4.08A14.52,14.52,0,0,1,33,4.93,7.8,7.8,0,0,0,36.42.58Z"/>
                            </svg>
                        </a>

                        <a class="p-singlePost-shareBtn" href="http://www.facebook.com/share.php?u=https://filmbiyori.paruko.net/posts/{{ $post->id }}" rel="nofollow" target="_blank">
                            <svg class="as_facebook" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36.71 36.71">
                                <path id="Facebook" d="M36.71,34.68a2,2,0,0,1-2,2H25.33V22.49H30.1L30.82,17H25.33V13.42c0-1.61.45-2.7,2.75-2.7H31v-5a41.29,41.29,0,0,0-4.28-.22c-4.23,0-7.12,2.59-7.12,7.33V17H14.82v5.54h4.79V36.71H2a2,2,0,0,1-2-2V2A2,2,0,0,1,2,0H34.69a2,2,0,0,1,2,2Z"/>
                            </svg>
                        </a>
                    </div>  
                </div>   
            </div>      
            <div class="p-returnLink">
                <a href="/">
                    <img class="p-returnLink-icon" src="{{ asset('image/icon/return.svg') }}" alt="">
                    <span>topに戻る</span>
                </a>
            </div>
       </div>

    </div>
    <div class="js-setting__wrapper p-modal__wrapper">
        <div class="js-setting__container p-modal__container">
            <img class="js-setting__close p-modal__close" src="{{ asset('image/icon/close.svg') }}" alt="">
            <a href="/posts/delete/{{ $post->id }}" class="p-modal__btn">削除する</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
            </form>
        </div>
    </div>
    @include('layouts.footer')
    @include('layouts.search')
@endsection

{{-- <script type="text/javascript">
    $('#post_image').bind('change', function() {
        var size_in_megabytes = this.files[0].size/1024/1024;
        if (size_in_megabytes > 1) {
        alert('ファイルサイズの最大は1MBまでです。違う画像を選んでください。');
    }
    });
</script> --}}
