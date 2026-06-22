<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('_frontend/vendor/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('_frontend/vendor/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ asset('_frontend/vendor/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('_frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('_frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('_frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('_frontend/css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('_frontend/vendor/fotorama-4.6.4/fotorama.css') }}">
    <link rel="stylesheet" href="{{ asset('_frontend/css/CustomStyle.css') }}?v=1.015">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('_common/img/favicon/apple-touch-icon.png') }}?v=1.001">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('_common/img/favicon/favicon-16x16.png') }}?v=1.001">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('_common/img/favicon/favicon-32x32.png') }}?v=1.001">
    @section('styles')@show

    <meta name="description" content="Welcome to Metta digital platform, a sanctuary of wisdom and serenity dedicated to exploring the profound teachings of Buddha, unraveling the sacred stories embedded in Buddhist sites, and capturing the essence of enlightenment through captivating documentaries.">
    <meta property="og:title" content="Mettabd.org - A Buddhist Realm">
    <meta property="og:description" content="Welcome to Metta digital platform, a sanctuary of wisdom and serenity dedicated to exploring the profound teachings of Buddha, unraveling the sacred stories embedded in Buddhist sites, and capturing the essence of enlightenment through captivating documentaries.">

    <title>Metta @hasSection('page-title')
            - @yield('page-title')
        @else
            - A Buddhist Realm
        @endif</title>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5P3S92M78K"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-5P3S92M78K');
    </script>

    <!-- Google Adsense -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9283966023798016" crossorigin="anonymous"></script>
</head>
<body>
<header id="header">
    <div class="header-topper">
        <div>
            <div class="row">
                <div class="col-md-6 d-flex justify-content-center">
                    <a href="{{ route('home') }}">
                        <div class="top-logo d-none d-md-block"@if($gData['menuSettings']?->prop('logo_desktop_width')) style="max-width: {{ $gData['menuSettings']->prop('logo_desktop_width') }}px;"@endif>
                            <img src="{{ $gData['menuSettings']?->prop('logo_desktop') ? asset('storage/img/' . $gData['menuSettings']->prop('logo_desktop')) : asset('_common/img/metta-logo-11.png') . '?v=1.001' }}">
                        </div>
                        <div class="top-logo d-md-none"@if($gData['menuSettings']?->prop('logo_mobile_width')) style="max-width: {{ $gData['menuSettings']->prop('logo_mobile_width') }}px;"@endif>
                            <img src="{{ $gData['menuSettings']?->prop('logo_mobile') ? asset('storage/img/' . $gData['menuSettings']->prop('logo_mobile')) : asset('_common/img/metta-logo-11.png') . '?v=1.001' }}">
                        </div>
                    </a>
                </div>
                <div class="col-md-6">

                    <div class="header-search">
                        <form action="{{ route('search') }}" method="GET">
                            <div class="big-search-wrapper">
                                <div class="search-body">
                                    <input type="text" name="search" placeholder="Search" value="{{ Request::query('search') }}">
                                </div>
                                <button id="search-submit-btn" class="search-submit-btn" type="submit">
                                <span>
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </span>
                                </button>
                            </div>
                        </form>
                        <div class="language-select lgu-pc">
                            <div><i class="fa-solid fa-globe"></i></div>
                            <form action="{{ route('tasks', 'change-content-lang') }}" method="POST" class="content-lang-toggle-form">
                                @csrf
                                <select name="content_lang" class="select__element content-lang-toggle">
                                    <option class="" selected="" value="en">
                                        English
                                    </option>
                                    <option class="" value="bn" {{ session('content_lang') == 'bn' ? 'selected' : '' }}>
                                        বাংলা
                                    </option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="menu menu-pc">
{{--        <a href="#home">--}}
{{--            <div class="logo">--}}
{{--                <img src="{{ asset('_common/img/buddha-logo-long.png') }}">--}}
{{--            </div>--}}
{{--        </a>--}}
        <ul class="menu-ul">
            <li data-menu-key="home">
                <a href="{{ route('home') }}" class="active">
                    HOME
                </a>
            </li>
            <li data-menu-key="buddhist_sites">
                <a href="{{ route('buddhist-sites.index') }}">
                    BUDDHIST SITES
                </a>
            </li>
            <li data-menu-key="teachings">
                <a href="{{ route('teachings.index') }}">
                    TEACHINGS
                </a>
            </li>
            <li data-menu-key="video">
                <a href="{{ route('library.videos') }}">
                    VIDEO
                </a>
            </li>
            <li data-menu-key="about">
                <a href="{{ route('about-us') }}">
                    ABOUT US
                </a>
            </li>
            <li class="lib-dropdown" data-menu-key="library">
                <a href="{{ route('library.index') }}">
                    LIBRARY
                </a>

                <div class="dropdown-content">
                    <div class="pb-3">
                        <h6>BOOKS</h6>
                        <ul>
                            <li><a href="{{ route('library.books') }}">Books</a></li>
                            <li><a href="{{ route('library.books', ['category' => 'Spiritual']) }}">Spiritual</a></li>
                            <li><a href="{{ route('library.books', ['category' => 'Children Books']) }}">Children Books</a></li>
                        </ul>
                    </div>
                    <div class="pb-3">
                        <h6>VIDEO</h6>
                        <ul>
                            <li><a href="{{ route('library.videos') }}">Latest Videos</a></li>
                            <li><a href="{{ route('library.videos', ['category' => 'Lecture']) }}">Lectures</a></li>
                            <li><a href="{{ route('library.videos', ['category' => 'Meditation']) }}">Meditation</a></li>
                            <li><a href="{{ route('library.videos', ['category' => 'Kids Gallery']) }}">Kids Gallery</a></li>
                        </ul>
                    </div>
                    <div class="pb-3">
                        <h6>AUDIO</h6>
                        <ul>
                            <li><a href="{{ route('library.audios') }}">Audios</a></li>
                            <li><a href="{{ route('library.audios', ['category' => 'Meditation']) }}">Meditation</a></li>
                            <li><a href="{{ route('library.audios', ['category' => 'Chanting']) }}">Chanting</a></li>
                        </ul>
                    </div>
                    <div class="pb-3">
                        <h6>IMAGE GALLERY</h6>
                        <ul>
                            <li><a href="{{ route('library.image-gallery', ['category' => 'General']) }}">Galleries</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li data-menu-key="research">
                <a href="{{ route('blogs.index') }}">
                    RESEARCH & PUBLICATION
                </a>
            </li>
{{--            <li>--}}
{{--                <a href="{{ route('library.videos', ['category' => 'Kids Gallery']) }}">--}}
{{--                    KIDS CORNER--}}
{{--                </a>--}}
{{--            </li>--}}
            <li class="lib-dropdown" data-menu-key="kids_corner">
                <a href="{{ route('library.videos', ['category' => 'Kids Gallery']) }}">
                    KID'S CORNER
                </a>

                <div class="dropdown-content">
                    <div class="pb-3">
                        <ul>
                            <li><a href="{{ route('library.books', ['category' => 'Children Books']) }}">Children Books</a></li>
                            <li><a href="{{ route('library.videos', ['category' => 'Kids Gallery']) }}">Kids Video Gallery</a></li>
                            <li><a href="{{ route('library.image-gallery', ['category' => 'Kids Gallery']) }}">Kids Image Gallery</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li data-menu-key="donate">
                <a href="{{ route('donate') }}">
                    DONATE
                </a>
            </li>
            <li data-menu-key="contact">
                <a href="{{ route('contact-us') }}">
                    CONTACT
                </a>
            </li>
            <li class="menu-close">
                <i class="pe-7s-close"></i>
            </li>
        </ul>

        <!-- Hidden-Menu-Bar -->
        <div class="hidden-menu-bar">
            <span>
                <i class="fa-solid fa-bars"></i>
            </span>
        </div>
        <div class="language-select lgu-mb">
            <div><i class="fa-solid fa-globe"></i></div>
            <form action="{{ route('tasks', 'change-content-lang') }}" method="POST" class="content-lang-toggle-form">
                @csrf
                <select name="content_lang" class="select__element content-lang-toggle">
                    <option class="" selected="" value="en">
                        English
                    </option>
                    <option class="" value="bn" {{ session('content_lang') == 'bn' ? 'selected' : '' }}>
                        বাংলা
                    </option>
                </select>
            </form>
        </div>
        <!-- Hidden-Menu-Bar -->
    </nav>

    <nav class="menu menu-mb">
        {{--        <a href="#home">--}}
        {{--            <div class="logo">--}}
        {{--                <img src="{{ asset('_common/img/buddha-logo-long.png') }}">--}}
        {{--            </div>--}}
        {{--        </a>--}}
        <ul class="menu-ul">
            <li data-menu-key="home">
                <a href="{{ route('home') }}" class="active">
                    HOME
                </a>
            </li>
            <li data-menu-key="buddhist_sites">
                <a href="{{ route('buddhist-sites.index') }}">
                    BUDDHIST SITES
                </a>
            </li>
            <li data-menu-key="teachings">
                <a href="{{ route('teachings.index') }}">
                    TEACHINGS
                </a>
            </li>
            <li data-menu-key="video">
                <a href="{{ route('library.videos') }}">
                    VIDEO
                </a>
            </li>
            <li data-menu-key="about">
                <a href="{{ route('about-us') }}">
                    ABOUT US
                </a>
            </li>
            <li class="lib-dropdown" data-menu-key="library">
                <a href="#">
                    LIBRARY
                </a>
                <div class="dropdown-content">
                    <div class="pb-3">
                        <h6>BOOKS</h6>
                        <ul>
                            <li><a href="{{ route('library.books') }}">Books</a></li>
                            <li><a href="{{ route('library.books', ['category' => 'Spiritual']) }}">Spiritual</a></li>
                            <li><a href="{{ route('library.books', ['category' => 'Children Books']) }}">Children Books</a></li>
                        </ul>
                    </div>
                    <div class="pb-3">
                        <h6>VIDEO</h6>
                        <ul>
                            <li><a href="{{ route('library.videos') }}">Latest Videos</a></li>
                            <li><a href="{{ route('library.videos', ['category' => 'Lecture']) }}">Lectures</a></li>
                            <li><a href="{{ route('library.videos', ['category' => 'Meditation']) }}">Meditation</a></li>
                            <li><a href="{{ route('library.videos', ['category' => 'Kids Gallery']) }}">Kids Gallery</a></li>
                        </ul>
                    </div>
                    <div class="pb-3">
                        <h6>AUDIO</h6>
                        <ul>
                            <li><a href="{{ route('library.audios') }}">Audios</a></li>
                            <li><a href="{{ route('library.audios', ['category' => 'Meditation']) }}">Meditation</a></li>
                            <li><a href="{{ route('library.audios', ['category' => 'Chanting']) }}">Chanting</a></li>
                        </ul>
                    </div>
                    <div class="pb-3">
                        <h6>IMAGE GALLERY</h6>
                        <ul>
                            <li><a href="{{ route('library.image-gallery', ['category' => 'General']) }}">Galleries</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li data-menu-key="research">
                <a href="{{ route('blogs.index') }}">
                    RESEARCH & PUBLICATION
                </a>
            </li>
            <li class="lib-dropdown" data-menu-key="kids_corner">
                <a href="#">
                    KID'S CORNER
                </a>
                <div class="dropdown-content">
                    <div class="pb-3">
                        <ul>
                            <li><a href="{{ route('library.books', ['category' => 'Children Books']) }}">Children Books</a></li>
                            <li><a href="{{ route('library.videos', ['category' => 'Kids Gallery']) }}">Kids Video Gallery</a></li>
                            <li><a href="{{ route('library.image-gallery', ['category' => 'Kids Gallery']) }}">Kids Image Gallery</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li data-menu-key="donate">
                <a href="{{ route('donate') }}">
                    DONATE
                </a>
            </li>
            <li data-menu-key="contact">
                <a href="{{ route('contact-us') }}">
                    CONTACT
                </a>
            </li>
            <li class="menu-close d-none">
                <i class="pe-7s-close"></i>
            </li>
        </ul>

        <!-- Hidden-Menu-Bar -->
        <div class="hidden-menu-bar">
            <span>
                <i class="fa-solid fa-bars"></i>
            </span>
        </div>
        <div class="language-select lgu-mb">
            <div><i class="fa-solid fa-globe"></i></div>
            <form action="{{ route('tasks', 'change-content-lang') }}" method="POST" class="content-lang-toggle-form">
                @csrf
                <select name="content_lang" class="select__element content-lang-toggle">
                    <option class="" selected="" value="en">
                        English
                    </option>
                    <option class="" value="bn" {{ session('content_lang') == 'bn' ? 'selected' : '' }}>
                        বাংলা
                    </option>
                </select>
            </form>
        </div>
        <!-- Hidden-Menu-Bar -->
    </nav>
</header>

<main>
    @section('main-content')@show
</main>

<footer>
    <div class="container pd-top">
        <div class="row">
            <div class="col-xl-2 col-md-12 pb-4 order">
                <h4>Contact Us</h4>
                <ul class="footer-icon footer-gap">
                    <li><i class="fa-solid fa-location-dot"></i> {{ $gData['contactInfo']?->prop('address', null) ?? 'House# 100 A, Road-# 6A, Banani Old DOHS, Banani, Dhaka' }}</li>
                    <li><i class="fa-solid fa-envelope"></i> {{ $gData['contactInfo']?->prop('email', null) ?? 'info@mettabd.org' }}</li>
                    <li><i class="fa-solid fa-headset"></i> {{ $gData['contactInfo']?->prop('phoneNumber', null) ?? '01711034941' }}</li>
                    <li><i class="fa-solid fa-headset"></i> {{ $gData['contactInfo']?->prop('phoneNumber2', null) ?? '01845160729' }}</li>
                </ul>
                <ul class="social-media-icons mt-2">
                    <li><a href="{{ $gData['socialLinks']?->prop('sLinkFaceBook', null) ?? 'javascript:void(0)' }}"><img src="{{ asset('_common/img/icon-social-facebook.svg') }}" alt="Facebook"></a></li>
                    <li><a href="{{ $gData['socialLinks']?->prop('sLinkWhatsapp', null) ?? 'javascript:void(0)' }}"><img src="{{ asset('_common/img/icon-social-whatsapp.svg') }}" alt="Whatsapp"></a></li>
                    <li><a href="{{ $gData['socialLinks']?->prop('sLinkTwitter', null) ?? 'javascript:void(0)' }}"><img src="{{ asset('_common/img/icon-social-twitter.svg') }}" alt="Twitter"></a></li>
                    <li><a href="{{ $gData['socialLinks']?->prop('sLinkInstagram', null) ?? 'javascript:void(0)' }}"><img src="{{ asset('_common/img/icon-social-instagram.svg') }}" alt="Instagram"></a></li>
                    <li><a href="{{ $gData['socialLinks']?->prop('sLinkLinkedIn', null) ?? 'javascript:void(0)' }}"><img src="{{ asset('_common/img/icon-social-linkedin.svg') }}" alt="LinkedIn"></a></li>
                </ul>
            </div>
            <div class="col-xl-8 col-md-12 pb-4">
                <div class="d-flex align-items-center flex-column">
                    <div class="wheel logo">
                        <img src="{{ asset('_common/img/wheel.png') }}">
                    </div>
                    <h3>Metta</h3>
                    <h5>Following the footsteps of Buddha</h5>
                    <p>
                        Welcome to Metta digital platform , a sanctuary of wisdom and serenity dedicated to exploring
                        the profound teachings of Buddha, unraveling the sacred stories embedded in Buddhist sites, and
                        capturing the essence of enlightenment through captivating documentaries.
                    </p>
                </div>
            </div>
            <div class="col-xl-2 col-md-12 pb-4 text-lg-end">
                <h4>Useful Links</h4>
                <ul class="footer-links footer-gap">
                    <li><a href="{{ route('library.index') }}">LIBRARY</a></li>
                    <li><a href="{{ route('about-us') }}">ABOUT US</a></li>
                    <li><a href="{{ route('blogs.index') }}">BLOGS</a></li>
                    <li><a href="{{ route('donate') }}">DONATE</a></li>
                    <li><a href="{{ route('contact-us') }}">CONTACT</a></li>
                </ul>
            </div>
        </div>
        <div class="row footer-line">
            <div class="col-12 col-sm-6 p-4 ">© Copyright Mettabd.org. All Rights Reserved</div>
            <div class="col-12 col-sm-6 p-4 text-lg-end text-xs-start">Designed by <a href="https://beethemes.xyz" target="_blank">Bee-Themes</a>
            </div>
        </div>
    </div>
</footer>

<!-- GO TO TOP -->
<div class="top-div ">
    <a href="#" class="top gotop d-none animate__animated animate__fadeInDown"><i class="fa-solid fa-angles-up"></i></a>
</div>
<!-- GO TO TOP -->

<!-- PRE LOADER -->
<div class="preloader">
    <div class="loader">
        <div class="loader-div loader-effect"></div>
    </div>
</div>
<!-- PRE LOADER -->

<script src="{{ asset('_frontend/js/jquery-2.x-git.min.js') }}"></script>
<script src="{{ asset('_frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('_frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('_frontend/js/waypoints.min.js') }}"></script>
<script src="{{ asset('_frontend/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('_frontend/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('_frontend/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('_frontend/vendor/fotorama-4.6.4/fotorama.js') }}"></script>
<script src="{{ asset('_frontend/vendor/mixitup-3/mixitup.min.js') }}"></script>
<script src="{{ asset('_frontend/js/morph.js') }}?v=1.004"></script>

<script>
    $(document).ready(function () {
        $('.content-lang-toggle').on('change', function () {
            $(this).closest('.content-lang-toggle-form')[0].submit();
        });
    });

    (function () {
        var menuOrder = @json($gData['menuOrder'] ?? []);
        if (!menuOrder || !menuOrder.length) return;

        document.querySelectorAll('nav.menu .menu-ul').forEach(function (ul) {
            var unkeyed = Array.from(ul.querySelectorAll('li:not([data-menu-key])'));

            menuOrder.forEach(function (key) {
                var li = ul.querySelector('li[data-menu-key="' + key + '"]');
                if (li) ul.appendChild(li);
            });

            unkeyed.forEach(function (li) { ul.appendChild(li); });
        });
    })();
</script>

@section('scripts')@show

</body>

</html>
