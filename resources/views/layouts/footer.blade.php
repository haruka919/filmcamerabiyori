<footer class="l-footer p-footer">
    <nav>
        <ul class="p-footer-menu">
            <li class="p-footer-menu__item"><a href="/"><img src={{ asset('image/icon/home.png') }}></a></li>
            <li class="p-footer-menu__item"><a href={{ route('search') }}><img src={{ asset('image/icon/search.png') }}></a></li>
            <li class="p-footer-menu__item"><a href={{ route('new') }}><img src={{ asset('image/icon/new.png') }}></a></li>
            <li class="p-footer-menu__item"><a href="{{ route('favorite') }}"><img src={{ asset('image/icon/favorite.png') }}></a></li>

            @guest
                <li class="p-footer-menu__item"><a href={{ route('login') }}><img src={{ asset('image/login.jpg') }}></a></li>
            @else
                <li class="p-footer-menu__item -icon"><a href="/users/{{ Auth::user()->id}}">
                @if(Auth::user()->profile_photo)
                    <img class="c-avator" src="{{ asset('storage/user_images/' . Auth::user()->profile_photo) }}" alt="">
                @else
                    <img class="c-avator" src="{{ asset('image/blank_profile.png') }}> 
                @endif
                </a></li>
            @endguest
        </ul>
    </nav>
</footer>
