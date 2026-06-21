<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('_frontend/assets/vendor/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('_frontend/assets/vendor/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}">
{{--    <link rel="stylesheet" href="{{ asset('_frontend/assets/vendor/bootstrap/css/bootstrap.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('_frontend/assets/css/owl.carousel.min.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('_frontend/assets/css/owl.theme.default.min.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('_frontend/assets/css/magnific-popup.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('_frontend/assets/css/perfect-scrollbar.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('_frontend/assets/css/morph.css') }}?v=1.001">
    <link rel="stylesheet" href="{{ asset('_frontend/assets/vendor/fotorama-4.6.4/fotorama.css') }}">
    <link rel="stylesheet" href="{{ asset('_frontend/assets/css/CustomStyle.css') }}?v=1.009">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('_common/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('_common/img/favicon/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('_common/img/favicon/favicon-32x32.png') }}">
    <meta name="theme-color" content="#ffffff">
    <title>@yield('title', 'Home') - arch_CELL</title>
</head>
<body>
<header id="header">
    <nav class="menu transparent">
        <a href="{{ route('home') }}">
            <div id="logo">
                <img src="{{ asset('_common/img/logo.png') }}" alt="Arch_cell">
            </div>
        </a>
        <ul class="menu-ul">
            <li>
                <a href="{{ route('home') }}" class="active">
                    HOME
                </a>
            </li>
            <li>
                <a href="{{ route('home') }}#projects">
                    PROJECTS
                </a>
            </li>
            <li>
                <a href="{{ route('about-us') }}" >
                    ABOUT
                </a>
            </li>
            <li>
                <a href="{{ route('home') }}#services">
                    SERVICES
                </a>
            </li>
            <li>
                <a href="{{ route('team-members.index') }}">
                    TEAM
                </a>
            </li>
            <li>
                <a href="{{ route('contact') }}">
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
        <!-- Hidden-Menu-Bar -->
    </nav>
</header>

@section('main-content')@show

<!-- Prefooter -->
<div class="container">
    <div class="prefooter-div">
        <div class="prefooter">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 p-5">
                    <div class="ctn-box">
                        <h6 class="pt-2">Interested in working with us?</h6>
                        <h2 class="py-4">Contact us to imagine more with your next project.</h2>
                        <a href="{{ route('contact') }}">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Prefooter -->


<footer>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-md-6 col-sm-12 p-4">
                <div>
                    <div id="logo">
                        <img src="{{ asset('_common/img/logo.png') }}">
                    </div>
                    <p>Arch_cell is a renowned conglomerate consultancy firm offering a whole spectrum of Engineering and architectural design, planning and implementation solutions with a rainbow of services. The group has earned an immaculate reputation for tailoring innovative solutions for diverse sectors, blending technology, form and functionality creating ergonomic, aesthetic buildings and infrastructure.
                    </p>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12 p-4">
                <h4>Useful Links</h4>
                <ul class="footer-icon footer-gap">
                    <li><i class="fa-solid fa-chevron-right"></i><a href="{{ route('home') }}">Home Page</a></li>
                    <li><i class="fa-solid fa-chevron-right"></i><a href="{{ route('about-us') }}">About Us</a></li>
                    <li><i class="fa-solid fa-chevron-right"></i><a href="{{ route('home') }}#services">Services</a></li>
                    <li><i class="fa-solid fa-chevron-right"></i><a href="{{ route('team-members.index') }}">Team</a></li>
                    <li><i class="fa-solid fa-chevron-right"></i><a href="#">Terms of service</a></li>
                    <li><i class="fa-solid fa-chevron-right"></i><a href="#">Privacy policy</a></li>
                </ul>
            </div>
            {{--<div class="col-xl-4 col-md-6 col-sm-12 p-4">
                <h4>Timing</h4>
                <ul class="footer-gap">
                    <li>Fri-Sat : 8.00 am - 10.00 am</li>
                    <li>Fri-Sat : 10.30 am - 12.30 pm</li>
                    <li>Fri-Sat : 3.00 pm - 5.00 pm</li>
                </ul>
            </div>--}}
            <div class="col-xl-3 col-md-6 col-sm-12 p-4">
                <h4>Get In Touch</h4>
                <ul class="footer-icon footer-gap">
                    <li><i class="fa-solid fa-location-dot"></i>{{ $gData['contactInfo']?->prop('hqAddress', null) ?? '-' }}</li>
                    <li><i class="fa-solid fa-headset"></i>{{ $gData['contactInfo']?->prop('phoneNumber', null) ?? '-' }}</li>
                    <li><i class="fa-solid fa-envelope"></i>{{ $gData['contactInfo']?->prop('email', null) ?? '-' }}</li>
                </ul>
                <div class="social-icons">
                    <ul>
                        <li>
                            <a href="#" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank"><i class="fa-brands fa-facebook-messenger"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6 p-4 ">© Copyright arch_CELL. All Rights Reserved </div>
            <div class="col-12 col-sm-6 p-4 text-lg-end text-xs-start">Developed by <a href="#" class="c-01">Bee-Themes</a></div>
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

{{--<script src="{{ asset('_frontend/assets/js/jquery-2.x-git.min.js') }}"></script>--}}
{{--<script src="{{ asset('_frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>--}}
{{--<script src="{{ asset('_frontend/assets/js/owl.carousel.min.js') }}"></script>--}}
{{--<script src="{{ asset('_frontend/assets/js/waypoints.min.js') }}"></script>--}}
{{--<script src="{{ asset('_frontend/assets/js/jquery.counterup.min.js') }}"></script>--}}
{{--<script src="{{ asset('_frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>--}}
{{--<script src="{{ asset('_frontend/assets/js/isotope.pkgd.min.js') }}"></script>--}}
{{--<script src="{{ asset('_frontend/assets/vendor/fotorama-4.6.4/fotorama.js') }}"></script>--}}
{{--<script src="{{ asset('_frontend/assets/vendor/mixitup-3/mixitup.min.js') }}"></script>--}}
{{--<script src="{{ asset('_frontend/assets/js/myscript.js') }}?v=1.001"></script>--}}

<script src="{{ asset('_frontend/assets/js/morph.js') }}?v=1.001"></script>

@section('scripts')@show
</body>
</html>
