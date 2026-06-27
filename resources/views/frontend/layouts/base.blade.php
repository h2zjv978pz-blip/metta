<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="lang-{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if(app()->getLocale() == 'bn' || ($gData['splashScreen']['font_family'] ?? null) == 'Noto Sans Bengali')
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
    <link rel="stylesheet" href="{{ asset('_frontend/css/CustomStyle.css') }}?v=1.031">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('_common/img/favicon/apple-touch-icon.png') }}?v=1.001">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('_common/img/favicon/favicon-16x16.png') }}?v=1.001">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('_common/img/favicon/favicon-32x32.png') }}?v=1.001">

    <link rel="alternate" hreflang="en" href="{{ \App\Helpers\Utils::getAlternateUrl('en') }}">
    <link rel="alternate" hreflang="bn" href="{{ \App\Helpers\Utils::getAlternateUrl('bn') }}">
    <link rel="alternate" hreflang="x-default" href="{{ \App\Helpers\Utils::getAlternateUrl('en') }}">

    @section('styles')@show

    @php
        $defaultDescription = \App\Helpers\Utils::lingual(['Welcome to Metta digital platform, a sanctuary of wisdom and serenity dedicated to exploring the profound teachings of Buddha, unraveling the sacred stories embedded in Buddhist sites, and capturing the essence of enlightenment through captivating documentaries.', 'মেত্তা ডিজিটাল প্ল্যাটফর্মে স্বাগতম, প্রজ্ঞা ও প্রশান্তির এক অভয়ারণ্য, যা বুদ্ধের গভীর শিক্ষা অন্বেষণ, বৌদ্ধ স্থানগুলোর পবিত্র কাহিনী উদ্ঘাটন এবং চিত্তাকর্ষক ডকুমেন্টারির মাধ্যমে জ্ঞানার্জনের সারমর্ম ধারণ করতে নিবেদিত।']);
        $pageDescription = trim($__env->yieldContent('meta-description')) ?: $defaultDescription;
        $pageTitle = trim($__env->yieldContent('page-title')) ?: \App\Helpers\Utils::lingual(['A Buddhist Realm', 'একটি বৌদ্ধ রাজ্য']);
        $defaultOgImage = asset('_common/img/metta-logo-11.png');
        $pageOgImage = trim($__env->yieldContent('og-image')) ?: $defaultOgImage;
    @endphp

    <meta name="description" content="{!! $pageDescription !!}">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Metta - {!! $pageTitle !!}">
    <meta property="og:description" content="{!! $pageDescription !!}">
    <meta property="og:image" content="{!! $pageOgImage !!}">
    <meta property="og:locale" content="{{ app()->getLocale() == 'bn' ? 'bn_BD' : 'en_US' }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Metta - {!! $pageTitle !!}">
    <meta name="twitter:description" content="{!! $pageDescription !!}">
    <meta name="twitter:image" content="{!! $pageOgImage !!}">

    <title>Metta - {!! $pageTitle !!}</title>

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Metta",
        "url": "{{ url('/') }}",
        "logo": "{{ $defaultOgImage }}",
        "description": {!! json_encode($defaultDescription) !!},
        "sameAs": [
            @php
                $socialLinks = array_filter([
                    $gData['socialLinks']?->prop('sLinkFaceBook'),
                    $gData['socialLinks']?->prop('sLinkTwitter'),
                    $gData['socialLinks']?->prop('sLinkInstagram'),
                    $gData['socialLinks']?->prop('sLinkLinkedIn'),
                    $gData['socialLinks']?->prop('sLinkWhatsapp'),
                ]);
            @endphp
            {!! implode(',', array_map(fn($l) => json_encode($l), $socialLinks)) !!}
        ]
    }
    </script>

    @section('structured-data')@show

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
@if($gData['splashScreen']['enabled'] ?? false)
    @php
        $splash = $gData['splashScreen'];
        $splashLogoUrl = $splash['logo'] ? asset('storage/img/' . $splash['logo']) : ($gData['menuSettings']?->prop('logo_desktop') ? asset('storage/img/' . $gData['menuSettings']->prop('logo_desktop')) : asset('_common/img/metta-logo-11.png'));
    @endphp
    @php
        $splashAlign = $splash['alignment'] ?? 'center';
        $splashAlignItems = $splashAlign === 'left' ? 'flex-start' : ($splashAlign === 'right' ? 'flex-end' : 'center');
    @endphp
    <div id="site-splash-screen" class="site-splash-screen">
        <div class="site-splash-content" style="text-align: {{ $splashAlign }}; align-items: {{ $splashAlignItems }}; font-family: '{{ $splash['font_family'] }}', sans-serif;">
            <img src="{{ $splashLogoUrl }}" style="width: {{ $splash['logo_size'] }}px; max-width: 80vw;">
            <h1 style="font-size: {{ $splash['title_font_size'] }}px;">{{ $splash['title'] }}</h1>
            <p style="font-size: {{ $splash['tagline_font_size'] }}px;">{{ $splash['tagline'] }}</p>
        </div>
    </div>
    <style>
        .site-splash-screen {
            position: fixed;
            inset: 0;
            z-index: 99999;
            background: #743233;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            transition: opacity .6s ease;
        }
        .site-splash-screen.fade-out {
            opacity: 0;
            pointer-events: none;
        }
        .site-splash-content {
            display: flex;
            flex-direction: column;
        }
        .site-splash-content h1 {
            color: #fff;
            margin: 16px 0 4px;
        }
        .site-splash-content p {
            color: #f0e6e0;
            margin: 0;
        }
    </style>
    <script>
        (function () {
            var el = document.getElementById('site-splash-screen');
            if (sessionStorage.getItem('metta_splash_shown')) {
                el.remove();
                return;
            }
            sessionStorage.setItem('metta_splash_shown', '1');
            setTimeout(function () {
                el.classList.add('fade-out');
                setTimeout(function () { el.remove(); }, 700);
            }, 1500);
        })();
    </script>
@endif
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

                @include('frontend.partials.library-dropdown-content')
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

                @include('frontend.partials.kids-corner-dropdown-content')
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
                @include('frontend.partials.library-dropdown-content-mobile')
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
                @include('frontend.partials.kids-corner-dropdown-content')
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

<div id="metta-audio-player" class="metta-audio-player" style="display:none;">
    <button type="button" class="metta-audio-player-toggle" aria-label="Play/Pause">
        <i class="fa-solid fa-play"></i>
    </button>
    <div class="metta-audio-player-info">
        <div class="metta-audio-player-title"></div>
        <input type="range" class="metta-audio-player-seek" min="0" max="100" value="0">
    </div>
    <button type="button" class="metta-audio-player-close" aria-label="Close">
        <i class="fa-solid fa-xmark"></i>
    </button>
    <audio id="metta-audio-player-el" preload="metadata"></audio>
</div>

<style>
    .metta-audio-player {
        position: fixed;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 9000;
        background: #743233;
        color: #fff;
        display: flex;
        align-items: center;
        padding: 8px 14px;
        gap: 12px;
        box-shadow: 0 -2px 10px rgba(0,0,0,.2);
    }
    .metta-audio-player-toggle, .metta-audio-player-close {
        background: rgba(255,255,255,.15);
        border: none;
        color: #fff;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        flex-shrink: 0;
        cursor: pointer;
    }
    .metta-audio-player-info {
        flex: 1;
        min-width: 0;
    }
    .metta-audio-player-title {
        font-size: 13px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-bottom: 2px;
    }
    .metta-audio-player-seek {
        width: 100%;
        height: 4px;
    }
</style>

<script>
    window.MettaPlayer = (function () {
        var STORAGE_KEY = 'metta_audio_player_state';
        var bar = document.getElementById('metta-audio-player');
        var audio = document.getElementById('metta-audio-player-el');
        var toggleBtn = bar.querySelector('.metta-audio-player-toggle');
        var closeBtn = bar.querySelector('.metta-audio-player-close');
        var titleEl = bar.querySelector('.metta-audio-player-title');
        var seekEl = bar.querySelector('.metta-audio-player-seek');
        var seeking = false;

        function saveState() {
            if (!audio.src) return;
            localStorage.setItem(STORAGE_KEY, JSON.stringify({
                src: audio.src,
                title: titleEl.textContent,
                currentTime: audio.currentTime,
                paused: audio.paused,
            }));
        }

        function setIcon() {
            toggleBtn.innerHTML = audio.paused
                ? '<i class="fa-solid fa-play"></i>'
                : '<i class="fa-solid fa-pause"></i>';
        }

        function play(src, title, resumeAt) {
            bar.style.display = 'flex';
            titleEl.textContent = title || '';

            if (audio.src !== src) {
                audio.src = src;
            }

            if (resumeAt) {
                audio.currentTime = resumeAt;
            }

            audio.play().catch(function () {});
        }

        toggleBtn.addEventListener('click', function () {
            if (!audio.src) return;
            if (audio.paused) {
                audio.play().catch(function () {});
            } else {
                audio.pause();
            }
        });

        closeBtn.addEventListener('click', function () {
            audio.pause();
            audio.removeAttribute('src');
            bar.style.display = 'none';
            localStorage.removeItem(STORAGE_KEY);
        });

        audio.addEventListener('play', function () { setIcon(); saveState(); });
        audio.addEventListener('pause', function () { setIcon(); saveState(); });
        audio.addEventListener('timeupdate', function () {
            if (!seeking && audio.duration) {
                seekEl.value = (audio.currentTime / audio.duration) * 100;
            }
            saveState();
        });
        seekEl.addEventListener('input', function () { seeking = true; });
        seekEl.addEventListener('change', function () {
            if (audio.duration) {
                audio.currentTime = (seekEl.value / 100) * audio.duration;
            }
            seeking = false;
        });

        window.addEventListener('beforeunload', saveState);

        // Restore state on page load (without forcing autoplay, to respect browser policy)
        (function restore() {
            var raw = localStorage.getItem(STORAGE_KEY);
            if (!raw) return;

            try {
                var state = JSON.parse(raw);
            } catch (e) {
                return;
            }

            if (!state.src) return;

            bar.style.display = 'flex';
            titleEl.textContent = state.title || '';
            audio.src = state.src;
            audio.addEventListener('loadedmetadata', function once() {
                audio.currentTime = state.currentTime || 0;
                audio.removeEventListener('loadedmetadata', once);
            });
            setIcon();
        })();

        return { play: play };
    })();
</script>

@php
    $waNumber = $gData['socialLinks']?->prop('sLinkWhatsapp');
    $waFloatingEnabled = $gData['socialLinks'] ? (bool) $gData['socialLinks']->prop('whatsapp_floating_enabled', true) : true;
    $zenMusic = $gData['zenMusic'] ?? null;
@endphp

@if($waNumber && $waFloatingEnabled)
    <a href="{{ $waNumber }}" target="_blank" rel="noopener" class="metta-fab metta-fab-whatsapp" aria-label="WhatsApp">
        <i class="fa-brands fa-whatsapp"></i>
    </a>
@endif

@if(($zenMusic['enabled'] ?? false) && !empty($zenMusic['file']))
    <button type="button" id="metta-zen-music-btn" class="metta-fab metta-fab-zen" aria-label="{{ \App\Helpers\Utils::lingual([$zenMusic['label'], $zenMusic['label_bn']]) }}" title="{{ \App\Helpers\Utils::lingual([$zenMusic['label'], $zenMusic['label_bn']]) }}">
        <i class="fa-solid fa-music"></i>
    </button>
    <audio id="metta-zen-music-el" loop preload="metadata" src="{{ asset('storage/audio/' . $zenMusic['file']) }}"></audio>
@endif

<style>
    .metta-fab {
        position: fixed;
        right: 18px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        color: #fff;
        z-index: 9500;
        box-shadow: 0 3px 10px rgba(0,0,0,.25);
        border: none;
        cursor: pointer;
        transition: transform .2s ease;
    }
    .metta-fab:hover {
        transform: scale(1.08);
        color: #fff;
    }
    .metta-fab-whatsapp {
        bottom: 90px;
        background: #25D366;
    }
    .metta-fab-zen {
        bottom: 150px;
        background: #743233;
    }
    .metta-fab-zen.is-playing {
        animation: metta-zen-pulse 1.6s ease-in-out infinite;
    }
    @keyframes metta-zen-pulse {
        0%, 100% { box-shadow: 0 3px 10px rgba(116,50,51,.35); }
        50% { box-shadow: 0 3px 18px rgba(116,50,51,.7); }
    }
</style>

@if(($zenMusic['enabled'] ?? false) && !empty($zenMusic['file']))
    <script>
        (function () {
            var STORAGE_KEY = 'metta_zen_music_playing';
            var btn = document.getElementById('metta-zen-music-btn');
            var audio = document.getElementById('metta-zen-music-el');
            if (!btn || !audio) return;

            audio.volume = {{ (float) ($zenMusic['volume'] ?? 0.4) }};

            function setState(playing) {
                btn.classList.toggle('is-playing', playing);
                btn.innerHTML = playing ? '<i class="fa-solid fa-pause"></i>' : '<i class="fa-solid fa-music"></i>';
            }

            btn.addEventListener('click', function () {
                if (audio.paused) {
                    audio.play().then(function () {
                        localStorage.setItem(STORAGE_KEY, '1');
                    }).catch(function () {});
                } else {
                    audio.pause();
                    localStorage.removeItem(STORAGE_KEY);
                }
            });

            audio.addEventListener('play', function () { setState(true); });
            audio.addEventListener('pause', function () { setState(false); });

            // Resume only on an explicit user gesture (first tap/click anywhere),
            // never auto-play immediately on page load — respects browser autoplay policy.
            if (localStorage.getItem(STORAGE_KEY) === '1') {
                var resumeOnce = function () {
                    audio.play().catch(function () {});
                    document.removeEventListener('click', resumeOnce);
                    document.removeEventListener('touchstart', resumeOnce);
                };
                document.addEventListener('click', resumeOnce, { once: true });
                document.addEventListener('touchstart', resumeOnce, { once: true });
            }
        })();
    </script>
@endif

</body>

</html>
