<footer class="l-footer p-footer js-footer">
    {{-- <nav>
        <ul class="p-footer-menu">
            <li class="p-footer-menu__item js-footer-menu"><a href="/"><img src={{ asset('image/icon/home.svg') }}></a></li>
            <li class="p-footer-menu__item js-search__open"><img src={{ asset('image/icon/search.svg') }}></li>
            <li class="p-footer-menu__item js-footer-menu"><a href={{ route('new') }}><img src={{ asset('image/icon/edit.svg') }}></a></li>
            <li class="p-footer-menu__item js-footer-menu"><a href="{{ route('favorite') }}"><img src={{ asset('image/icon/heart.svg') }}></a></li>

            @guest
                <li class="p-footer-menu__item js-footer-menu"><a href={{ route('login') }}><img src={{ asset('image/icon/user.svg') }}></a></li>
            @else
                <li class="p-footer-menu__item -cover -icon"><a href="/users/{{ Auth::user()->id}}">
                @if(Auth::user()->profile_photo)
                    <figure class="c-avator p-footer-menu__avator">
                        <img src="{{ asset('storage/user_images/' . Auth::user()->profile_photo) }}" alt="">
                    </figure>
                @else
                    <figure class="c-avator p-footer-menu__avator">
                        <img src="{{ asset('image/blank_profile.png') }} ">
                    </figure>
                @endif
            </a></li>
            @endguest
        </ul>
    </nav> --}}
    <p class="p-footer-copyright">©︎フィルムカメラ日和。</p>
</footer>
