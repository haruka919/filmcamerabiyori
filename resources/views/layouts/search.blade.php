<div class="p-search-wrapper js-search__wrapper">
    <div class="p-wrapper-l">
        <div class="p-container-l">
            <h2 class="p-search-title">#タグを探す</h2>
            <ul class="p-search-tags c-tags">
                @foreach ($tagmenus as $tagmenu)
                    <li class="p-search-tag c-tag"><a href="/posts/{{ $tagmenu->id }}/tag">#{{ $tagmenu->name }}</a></li>
                @endforeach
            </ul>
            <p class="p-search-close js-search__close"><img src="{{ asset('image/icon/close.svg') }}" alt=""></p>
        </div>
    </div>
</div>