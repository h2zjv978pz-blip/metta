<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="lang-{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if(app()->getLocale() == 'bn')
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@400;500;600;700&display=swap" rel="stylesheet">
    @endif
    <link rel="stylesheet" href="{{ asset('_frontend/vendor/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('_frontend/vendor/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ asset('_frontend/vendor/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('_frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('_frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('_frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('_frontend/css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('_frontend/vendor/fotorama-4.6.4/fotorama.css') }}">
    <link rel="stylesheet" href="{{ asset('_frontend/css/CustomStyle.css') }}?v=1.019">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('_common/img/favicon/apple-touch-icon.png') }}?v=1.001">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('_common/img/favicon/favicon-16x16.png') }}?v=1.001">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('_common/img/favicon/favicon-32x32.png') }}?v=1.001">

    <link rel="alternate" hreflang="en" href="{{ \App\Helpers\Utils::getAlternateUrl('en') }}">
    <link rel="alternate" hreflang="bn" href="{{ \App\Helpers\Utils::getAlternateUrl('bn') }}">
    <link rel="alternate" hreflang="x-default" href="{{ \App\Helpers\Utils::getAlternateUrl('en') }}">

    @section('styles')@show

    <meta name="description" content="{{ \App\Helpers\Utils::lingual(['Welcome to Metta digital platform, a sanctuary of wisdom and serenity dedicated to exploring the profound teachings of Buddha, unraveling the sacred stories embedded in Buddhist sites, and capturing the essence of enlightenment through captivating documentaries.', 'মেত্তা ডিজিটাল প্ল্যাটফর্মে স্বাগতম, প্রজ্ঞা ও প্রশান্তির এক অভয়ারণ্য, যা বুদ্ধের গভীর শিক্ষা অন্বেষণ, বৌদ্ধ স্থানগুলোর পবিত্র কাহিনী উদ্ঘাটন এবং চিত্তাকর্ষক ডকুমেন্টারির মাধ্যমে জ্ঞানার্জনের সারমর্ম ধারণ করতে নিবেদিত।']) }}">
    <meta property="og:title" content="{{ \App\Helpers\Utils::lingual(['Mettabd.org - A Buddhist Realm', 'Mettabd.org - একটি বৌদ্ধ রাজ্য']) }}">
    <meta property="og:description" content="{{ \App\Helpers\Utils::lingual(['Welcome to Metta digital platform, a sanctuary of wisdom and serenity dedicated to exploring the profound teachings of Buddha, unraveling the sacred stories embedded in Buddhist sites, and capturing the essence of enlightenment through captivating documentaries.', 'মেত্তা ডিজিটাল প্ল্যাটফর্মে স্বাগতম, প্রজ্ঞা ও প্রশান্তির এক অভয়ারণ্য, যা বুদ্ধের গভীর শিক্ষা অন্বেষণ, বৌদ্ধ স্থানগুলোর পবিত্র কাহিনী উদ্ঘাটন এবং চিত্তাকর্ষক ডকুমেন্টারির মাধ্যমে জ্ঞানার্জনের সারমর্ম ধারণ করতে নিবেদিত।']) }}">
    <meta property="og:locale" content="{{ app()->getLocale() == 'bn' ? 'bn_BD' : 'en_US' }}">

    <title>Metta @hasSection('page-title')
            - @yield('page-title')
        @else
            - {{ \App\Helpers\Utils::lingual(['A Buddhist Realm', 'একটি বৌদ্ধ রাজ্য']) }}
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
                                    <input type="text" name="search" placeholder="{{ \App\Helpers\Utils::lingual(['Search', 'খুঁজুন']) }}" value="{{ Request::query('search') }}">
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
                            <a href="{{ \App\Helpers\Utils::getAlternateUrl('en') }}" class="lang-switch-link {{ app()->getLocale() == 'en' ? 'active' : '' }}">English</a>
                            <a href="{{ \App\Helpers\Utils::getAlternateUrl('bn') }}" class="lang-switch-link {{ app()->getLocale() == 'bn' ? 'active' : '' }}">বাংলা</a>
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
                    {{ \App\Helpers\Utils::lingual(['HOME', 'হোম']) }}
                </a>
            </li>
            <li data-menu-key="buddhist_sites">
                <a href="{{ route('buddhist-sites.index') }}">
                    {{ \App\Helpers\Utils::lingual(['BUDDHIST SITES', 'বৌদ্ধ স্থান']) }}
                </a>
            </li>
            <li data-menu-key="teachings">
                <a href="{{ route('teachings.index') }}">
                    {{ \App\Helpers\Utils::lingual(['TEACHINGS', 'শিক্ষা']) }}
                </a>
            </li>
            <li data-menu-key="video">
                <a href="{{ route('library.videos') }}">
                    {{ \App\Helpers\Utils::lingual(['VIDEO', 'ভিডিও']) }}
                </a>
            </li>
            <li data-menu-key="about">
                <a href="{{ route('about-us') }}">
                    {{ \App\Helpers\Utils::lingual(['ABOUT US', 'আমাদের সম্পর্কে']) }}
                </a>
            </li>
            <li class="lib-dropdown" data-menu-key="library">
                <a href="{{ route('library.index') }}">
                    {{ \App\Helpers\Utils::lingual(['LIBRARY', 'লাইব্রেরি']) }}
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
                    {{ \App\Helpers\Utils::lingual(['RESEARCH & PUBLICATION', 'গবেষণা ও প্রকাশনা']) }}
                </a>
            </li>
{{--            <li>--}}
{{--                <a href="{{ route('library.videos', ['category' => 'Kids Gallery']) }}">--}}
{{--                    KIDS CORNER--}}
{{--                </a>--}}
{{--            </li>--}}
            <li class="lib-dropdown" data-menu-key="kids_corner">
                <a href="{{ route('library.videos', ['category' => 'Kids Gallery']) }}">
                    {{ \App\Helpers\Utils::lingual(["KID'S CORNER", 'শিশু কর্নার']) }}
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
                    {{ \App\Helpers\Utils::lingual(['DONATE', 'দান করুন']) }}
                </a>
            </li>
            <li data-menu-key="contact">
                <a href="{{ route('contact-us') }}">
                    {{ \App\Helpers\Utils::lingual(['CONTACT', 'যোগাযোগ']) }}
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
            <a href="{{ \App\Helpers\Utils::getAlternateUrl('en') }}" class="lang-switch-link {{ app()->getLocale() == 'en' ? 'active' : '' }}">English</a>
            <a href="{{ \App\Helpers\Utils::getAlternateUrl('bn') }}" class="lang-switch-link {{ app()->getLocale() == 'bn' ? 'active' : '' }}">বাংলা</a>
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
                    {{ \App\Helpers\Utils::lingual(['HOME', 'হোম']) }}
                </a>
            </li>
            <li data-menu-key="buddhist_sites">
                <a href="{{ route('buddhist-sites.index') }}">
                    {{ \App\Helpers\Utils::lingual(['BUDDHIST SITES', 'বৌদ্ধ স্থান']) }}
                </a>
            </li>
            <li data-menu-key="teachings">
                <a href="{{ route('teachings.index') }}">
                    {{ \App\Helpers\Utils::lingual(['TEACHINGS', 'শিক্ষা']) }}
                </a>
            </li>
            <li data-menu-key="video">
                <a href="{{ route('library.videos') }}">
                    {{ \App\Helpers\Utils::lingual(['VIDEO', 'ভিডিও']) }}
                </a>
            </li>
            <li data-menu-key="about">
                <a href="{{ route('about-us') }}">
                    {{ \App\Helpers\Utils::lingual(['ABOUT US', 'আমাদের সম্পর্কে']) }}
                </a>
            </li>
            <li class="lib-dropdown" data-menu-key="library">
                <a href="#">
                    {{ \App\Helpers\Utils::lingual(['LIBRARY', 'লাইব্রেরি']) }}
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
                    {{ \App\Helpers\Utils::lingual(['RESEARCH & PUBLICATION', 'গবেষণা ও প্রকাশনা']) }}
                </a>
            </li>
            <li class="lib-dropdown" data-menu-key="kids_corner">
                <a href="#">
                    {{ \App\Helpers\Utils::lingual(["KID'S CORNER", 'শিশু কর্নার']) }}
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
                    {{ \App\Helpers\Utils::lingual(['DONATE', 'দান করুন']) }}
                </a>
            </li>
            <li data-menu-key="contact">
                <a href="{{ route('contact-us') }}">
                    {{ \App\Helpers\Utils::lingual(['CONTACT', 'যোগাযোগ']) }}
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
            <a href="{{ \App\Helpers\Utils::getAlternateUrl('en') }}" class="lang-switch-link {{ app()->getLocale() == 'en' ? 'active' : '' }}">English</a>
            <a href="{{ \App\Helpers\Utils::getAlternateUrl('bn') }}" class="lang-switch-link {{ app()->getLocale() == 'bn' ? 'active' : '' }}">বাংলা</a>
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
                <h4>{{ \App\Helpers\Utils::lingual(['Contact Us', 'যোগাযোগ করুন']) }}</h4>
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
                    <h5>{{ \App\Helpers\Utils::lingual(['Following the footsteps of Buddha', 'বুদ্ধের পদাঙ্ক অনুসরণ করে']) }}</h5>
                    <p>
                        {{ \App\Helpers\Utils::lingual([
                            'Welcome to Metta digital platform , a sanctuary of wisdom and serenity dedicated to exploring the profound teachings of Buddha, unraveling the sacred stories embedded in Buddhist sites, and capturing the essence of enlightenment through captivating documentaries.',
                            'মেত্তা ডিজিটাল প্ল্যাটফর্মে স্বাগতম, প্রজ্ঞা ও প্রশান্তির এক অভয়ারণ্য, যা বুদ্ধের গভীর শিক্ষা অন্বেষণ, বৌদ্ধ স্থানগুলোর পবিত্র কাহিনী উদ্ঘাটন এবং চিত্তাকর্ষক ডকুমেন্টারির মাধ্যমে জ্ঞানার্জনের সারমর্ম ধারণ করতে নিবেদিত।',
                        ]) }}
                    </p>
                </div>
            </div>
            <div class="col-xl-2 col-md-12 pb-4 text-lg-end">
                <h4>{{ \App\Helpers\Utils::lingual(['Useful Links', 'প্রয়োজনীয় লিংক']) }}</h4>
                <ul class="footer-links footer-gap">
                    <li><a href="{{ route('library.index') }}">{{ \App\Helpers\Utils::lingual(['LIBRARY', 'লাইব্রেরি']) }}</a></li>
                    <li><a href="{{ route('about-us') }}">{{ \App\Helpers\Utils::lingual(['ABOUT US', 'আমাদের সম্পর্কে']) }}</a></li>
                    <li><a href="{{ route('blogs.index') }}">{{ \App\Helpers\Utils::lingual(['BLOGS', 'ব্লগ']) }}</a></li>
                    <li><a href="{{ route('donate') }}">{{ \App\Helpers\Utils::lingual(['DONATE', 'দান করুন']) }}</a></li>
                    <li><a href="{{ route('contact-us') }}">{{ \App\Helpers\Utils::lingual(['CONTACT', 'যোগাযোগ']) }}</a></li>
                </ul>
            </div>
        </div>
        <div class="row footer-line">
            <div class="col-12 col-sm-6 p-4 ">{{ \App\Helpers\Utils::lingual(['© Copyright Mettabd.org. All Rights Reserved', '© কপিরাইট Mettabd.org। সর্বস্বত্ব সংরক্ষিত']) }}</div>
            <div class="col-12 col-sm-6 p-4 text-lg-end text-xs-start">{{ \App\Helpers\Utils::lingual(['Designed by', 'ডিজাইন করেছে']) }} <a href="https://beethemes.xyz" target="_blank">Bee-Themes</a>
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
<script src="{{ asset('_frontend/js/morph.js') }}?v=1.005"></script>

<script>
    (function () {
        var menuOrder = @json($gData['menuOrder'] ?? []);
        if (!menuOrder || !menuOrder.length) return;

        document.querySelectorAll('nav.menu > .menu-ul').forEach(function (ul) {
            var unkeyed = Array.from(ul.querySelectorAll(':scope > li:not([data-menu-key])'));

            menuOrder.forEach(function (key) {
                var li = ul.querySelector(':scope > li[data-menu-key="' + key + '"]');
                if (li) ul.appendChild(li);
            });

            unkeyed.forEach(function (li) { ul.appendChild(li); });
        });
    })();
</script>

@section('scripts')@show

</body>

</html>
