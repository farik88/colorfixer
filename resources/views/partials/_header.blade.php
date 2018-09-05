<header id="header">
    <div class="inner">
        <div class="logo" href="/">
            <div class="logo-image">
                <a href="{{ route('home')  }}">
                    <img src="/img/logo.png" alt="{{ trans('content.site-name') }}" title="">
                </a>
            </div>
            <div class="decor-logo-line"></div>
            <div class="emerald-title">
                <a href="#" rel="nofollow">
                    <img src="/img/emerald.jpg" alt="{{ trans('content.site-name') }}" title="">
                </a>
            </div>
        </div>
        <div class="top-part">
            <div class="up-layer">
                @yield('back-home-button')
                @yield('log-in-out-forms')
            </div>
            <div class="down-layer">
                @yield('header-slogan')
                @yield('header-menu')
            </div>
        </div>
        <div class="bottom-part">
            {{--Мобильное меню было реализовано, но видимо зря--}}
            {{--<nav class="mobile-menu">--}}
                {{--@include('partials._main-menu-list')--}}
            {{--</nav>--}}
        </div>
    </div>
</header>