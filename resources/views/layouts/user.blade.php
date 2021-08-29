<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/home1.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link rel="icon" href="{{asset('images/logo-icon.png')}}" type="image/png" />
    {!! Meta::toHtml() !!}
    @yield('style')
</head>
<body>

    <!-- Header -->
    <header class="header border-b" id="header">
        <nav class="nav container">
            <a href="{{ url('/') }}" class="nav__logo"> Kader Kesehatan Meri</a>
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list grid">
                    <li class="nav__item">
                        <a href="{{ route('user.home') }}" class="nav__link @yield('nav-home')">
                            <i class="uil uil-estate nav__icon"></i> Home
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="{{ route('user.video') }}" class="nav__link @yield('nav-video')">
                            <i class="uil uil-video nav__icon"></i> Videos
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="{{ route('user.article') }}" class="nav__link @yield('nav-article')">
                            <i class="uil uil-book-alt nav__icon"></i> Article
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="{{ route('user.instagram') }}" class="nav__link @yield('nav-instagram')">
                            <i class="uil uil-instagram nav__icon"></i> Instagram
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="{{ route('user.review') }}" class="nav__link @yield('nav-event')"><sup class="text-red-600 ml-10">Hot</sup>
                            <i class="uil uil-user nav__icon"></i> Review
                        </a>
                    </li>
                </ul>
                <i class="uil uil-times nav__close nav__icon" id="nav-close"></i>
            </div>
            <div class="nav__btns" id="nav__btns">
                <i class="uil uil-moon change-theme" id="theme-button"></i>
                <div class="nav__toggle" id="nav-toggle">
                    <i class="uil uil-apps nav__icon"></i>
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class=" px-2 md:px-32 py-6 flex justify-between">
        <a href="#">Created By Spydercode</a>
        <ul class="flex justify-center">
            <li class="mr-4"><a href="https://www.instagram.com/kader.kesehatan_meri/">Instagram</a></li>
            <li class="mr-4"><a href="https://www.youtube.com/channel/UC20uqMBck0IEu0FfgUBxnWA">Youtube</a></li>
        </ul>
    </footer>

    <!--==================== SCROLL TOP ====================-->
    <a href="#header" class="scrollup" id="scroll-up">
        <i class="uil uil-arrow-up scrollup__icon"></i>
    </a>

    <script src="{{ asset('assets') }}/js/home.js"></script>
    @yield('script')
</body>
</html>
