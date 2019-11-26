@extends('layouts.app')

@section('title', '詳細画面')
@section('content')
    <div class="p-search-wrapper">
        <h2 class="p-search-title">#タグを探す</h2>
        <ul class="p-search-tags c-tags">
            @foreach ($tags as $tag)
                <li class="p-search-tag c-tag"><a href="/posts/{{ $tag->id }}/tag">#{{ $tag->name }}</a></li>
            @endforeach
        </ul>
        <p class="p-search-close"><img src="img/close-icon.svg" alt=""></p>
    </div>
@endsection