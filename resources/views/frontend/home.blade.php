@extends('frontend.layouts.base')

@section('main-content')
    <section id="home">
        <div class="home-slide container-fluid">
            <div id="SlideImg" class="carousel slide carousel-fade" data-bs-ride="carousel"
                 data-bs-pause="false">
                <div class="carousel-inner">
                    @foreach($data['homeSlides'] as $homeSlide)
                        <div class="carousel-item {{ $loop->index === 0 ? 'active' : '' }} slide-contain" data-bs-interval="4500" style="background-image: url('{{ $homeSlide->getImageUrl('image') }}')">
                            <div class="carousel-caption d-md-block">
                                <div class="slide-contain-text">
                                    <h2 class="animate__animated animate__fadeInDown">Metta</h2>
                                    <p>{{ $homeSlide->prop('title', 'Following in the Buddha\'s Footsteps') }}</p>

                                    <div class="logo wheel">
                                        <img src="{{ asset('_common/img/wheel.png') }}">
                                    </div>
                                    <div class="animate__animated animate__fadeInUp my-btn-div">
                                        <a href="{{ $homeSlide->prop('link', route('about-us')) }}" class="my-btn btn-02">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
{{--                    <div class="carousel-item active slide-contain" data-bs-interval="8000">--}}
{{--                        <div class="carousel-caption d-md-block">--}}
{{--                            <div class="slide-contain-text">--}}
{{--                                <h2 class="animate__animated animate__fadeInDown">Metta</h2>--}}
{{--                                <p>Following in the Buddha's Footsteps</p>--}}

{{--                                <div class="logo wheel">--}}
{{--                                    <img src="{{ asset('_common/img/wheel.png') }}">--}}
{{--                                </div>--}}
{{--                                <div class="animate__animated animate__fadeInUp my-btn-div">--}}
{{--                                    <a href="{{ route('about-us') }}" class="my-btn btn-02">Read More</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="carousel-item slide-contain" data-bs-interval="8000">--}}
{{--                        <div class="carousel-caption d-md-block">--}}
{{--                            <div class="slide-contain-text">--}}
{{--                                <h2 class="animate__animated animate__fadeInDown">Metta</h2>--}}
{{--                                <p>Following in the Buddha's Footsteps</p>--}}

{{--                                <div class="logo wheel">--}}
{{--                                    <img src="{{ asset('_common/img/wheel.png') }}">--}}
{{--                                </div>--}}
{{--                                <div class="animate__animated animate__fadeInUp my-btn-div">--}}
{{--                                    <a href="{{ route('about-us') }}" class="my-btn btn-02">Read More</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="carousel-item slide-contain" data-bs-interval="8000">--}}
{{--                        <div class="carousel-caption d-md-block">--}}
{{--                            <div class="slide-contain-text">--}}
{{--                                <h2 class="animate__animated animate__fadeInDown">Metta</h2>--}}
{{--                                <p>Following in the Buddha's Footsteps</p>--}}

{{--                                <div class="logo wheel">--}}
{{--                                    <img src="{{ asset('_common/img/wheel.png') }}">--}}
{{--                                </div>--}}
{{--                                <div class="animate__animated animate__fadeInUp my-btn-div">--}}
{{--                                    <a href="{{ route('about-us') }}" class="my-btn btn-02">Read More</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#SlideImg"
                        data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#SlideImg"
                        data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <section class="home-about pd-top">
        <div class="container">
            <div class="title">
                <img src="{{ asset('_common/img/title-icon.png') }}" alt="">
                <span>HIGHLIGHTS</span>
                <h2>ABOUT METTA</h2>
            </div>
            <div class="home-about-bg">
                <div class="row">
                    <div class="col-12">
                        <div class="home-about-title-wrap">
                            <div class="home-about-title">
                                <h6>Welcome to Metta</h6>
                                <p>Following in the Buddha's Footsteps</p>
                            </div>
                            <p class="mb-4 home-about-tx">{{ $data['homeHighlights']?->prop('welcomeText') ?? "Welcome to Metta digital platform , a sanctuary of wisdom and serenity dedicated to exploring the profound teachings of Buddha, unraveling the sacred stories embedded in Buddhist sites, and capturing the essence of enlightenment through captivating documentaries." }}</p>
                            <a href="{{ route('about-us') }}" class="my-btn btn-03">Read More</a>
                        </div>

                    </div>
{{--                    <div class="col-lg-6 d-flex align-items-center my-4">--}}

{{--                        <div class="bdha-services-wrap">--}}

{{--                            <div class="bdha-services">--}}
{{--                                <div class="bdha-services-icon">--}}
{{--                                     <img src="{{ asset('_common/img/home/chakra.png') }}" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="text-overflow bdha-services-tx">--}}
{{--                                    <h6><a href="#">Dharma Chakra</a></h6>--}}
{{--                                    <p>{{ $data['homeHighlights']?->prop('dharmaChakra') ?? "Lorem ipsum doloet, consectetur adipiscing elit. Nunc lacin justo vel faucibus bibendum" }}</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="bdha-services">--}}
{{--                                <div class="bdha-services-icon">--}}
{{--                                     <img src="{{ asset('_common/img/home/lotus.png') }}" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="text-overflow bdha-services-tx">--}}
{{--                                    <h6><a href="#">The Lotus</a></h6>--}}
{{--                                    <p>{{ $data['homeHighlights']?->prop('theLotus') ?? "Lorem ipsum doloet, consectetur adipiscing elit. Nunc lacin justo vel faucibus bibendum" }}</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="bdha-services">--}}
{{--                                <div class="bdha-services-icon">--}}
{{--                                     <img src="{{ asset('_common/img/home/shell.png') }}" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="text-overflow bdha-services-tx">--}}
{{--                                    <h6><a href="#">Conch Shell</a></h6>--}}
{{--                                    <p>{{ $data['homeHighlights']?->prop('conchShell') ?? "Lorem ipsum doloet, consectetur adipiscing elit. Nunc lacin justo vel faucibus bibendum" }}</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}

{{--                    </div>--}}
                </div>
            </div>
        </div>
    </section>

    <section  class="pd-top">
        <div class="container">
            <div class="title">
                <img src="{{ asset('_common/img/title-icon.png') }}">
                <span>LIBRARY</span>
                <h2>OUR ARCHIVES</h2>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <h2 class="lib-header">BOOKS</h2>
                    <ul class="lib-list">
                        <li><a href="{{ route('library.books') }}">Books</a></li>
{{--                        <li><a href="{{ route('library.articles') }}">Articles</a></li>--}}
                        <li><a href="{{ route('library.books') }}">Kids Gallery</a></li>
{{--                        <li><a href="{{ route('library.books') }}">News Portal</a></li>--}}
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h2 class="lib-header lib-header-2">VIDEO</h2>
                    <ul class="lib-list">
                        <li><a href="{{ route('library.videos') }}">Latest Videos</a></li>
                        <li><a href="{{ route('library.videos', ['category' => 'Lectures']) }}">Lectures</a></li>
                        <li><a href="{{ route('library.videos', ['category' => 'Meditation']) }}">Meditation</a></li>
                        <li><a href="{{ route('library.videos', ['category' => 'Kids Gallery']) }}">Kids Gallery</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h2 class="lib-header lib-header-3">AUDIO</h2>
                    <ul class="lib-list">
                        <li><a href="{{ route('library.audios') }}">All Audios</a></li>
                        <li><a href="{{ route('library.audios', ['category' => 'Meditation']) }}">Meditation</a></li>
                        <li><a href="{{ route('library.audios', ['category' => 'Chanting']) }}">Chanting</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="bdd-sites-highlight pd-top pd-bottom">
        <div class="container">
            <div class="title">
                <img src="{{ asset('_common/img/title-icon.png') }}">
                <span>HIGHLIGHTS</span>
                <h2>BUDDHIST SITES</h2>
            </div>
            <div class="grid row owl-carousel owl-theme owl-bdd" data-bs-ride="carousel">
                @if(!empty($data['buddhistSites']))
                    @foreach($data['buddhistSites'] as $buddhist_site)
                        <div class="overflow-hidden mx-3 element-item">
                            <div class="bdd-sites">
                                <div class="bdd-sites-box">
                                    <div class="zoom"><img src="{{ $buddhist_site->getFeatureImageUrl() }}" loading="lazy"></div>
                                    <div class="bdd-sites-text">
                                        <a href="{{ route('buddhist-sites.show', $buddhist_site->id) }}">
{{--                                            {{ \App\Helpers\Utils::getContentLang() == 'en' ? $buddhist_site->name : $buddhist_site->getJson('description', 'name') }}--}}
                                            {{ \App\Helpers\Utils::lingual([$buddhist_site->name, $buddhist_site->getJson('description', 'name', $buddhist_site->name)]) }}
                                        </a>
                                        <div class="bdd-sites-location">
                                            {{ \App\Helpers\Utils::lingual(['at ', '']) }}{{ \App\Helpers\Utils::lingual([$buddhist_site->location_name, $buddhist_site->getJson('description', 'location_name', $buddhist_site->location_name)]) }}
                                        </div>
                                        <p>{{ $buddhist_site->getJson('description', 'intro') }}</p>
                                    </div>
                                    <div class="bdd-sites-view"><a href="{{ route('buddhist-sites.show', $buddhist_site->id) }}">{{ \App\Helpers\Utils::lingual(['Read More', 'আরও পড়ুন']) }} <i class="fa-solid fa-arrow-right-long"></i></a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif


{{--                <div class="overflow-hidden mx-3 element-item">--}}
{{--                    <div class="bdd-sites">--}}
{{--                        <div class="bdd-sites-box">--}}
{{--                            <div class="zoom"><img src="{{ asset('_common/img/buddhist_site/pexels-lu-zhao-16773960.jpg') }}"></div>--}}
{{--                            <div class="bdd-sites-text">--}}
{{--                                <a href="#">Temple of the Tooth Relic</a>--}}
{{--                                <div class="bdd-sites-location">at Bandarban, Bangladesh</div>--}}
{{--                                <p>In the Central Highlands, almost dead centre in the little island of Sri Lanka lays Kandy City. The crown jewel of the city is--}}
{{--                                    the famed Sri Dalada Maligawa, also known as the Temple of the Tooth.</p>--}}
{{--                            </div>--}}
{{--                            <div class="bdd-sites-view"><a href="{{ route('buddhist-sites.show', 1) }}">Read More<i class="fa-solid fa-arrow-right-long"></i></a></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="overflow-hidden  mx-3 element-item">--}}
{{--                    <div class="bdd-sites">--}}
{{--                        <div class="bdd-sites-box">--}}
{{--                            <div class="zoom"><img src="{{ asset('_common/img/buddhist_site/pexels-joel-m-b-marrinan-6060183.jpg') }}"></div>--}}
{{--                            <div class="bdd-sites-text">--}}
{{--                                <a href="#">Temple of the Tooth Relic</a>--}}
{{--                                <div class="bdd-sites-location">at Rangamati, Bangladesh</div>--}}
{{--                                <p>In the Central Highlands, almost dead centre in the little island of Sri Lanka lays Kandy City. The crown jewel of the city is--}}
{{--                                    the famed Sri Dalada Maligawa, also known as the Temple of the Tooth.</p>--}}
{{--                            </div>--}}
{{--                            <div class="bdd-sites-view"><a href="{{ route('buddhist-sites.show', 1) }}">Read More<i class="fa-solid fa-arrow-right-long"></i></a></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="overflow-hidden  mx-3 element-item">--}}
{{--                    <div class="bdd-sites">--}}
{{--                        <div class="bdd-sites-box">--}}
{{--                            <div class="zoom"><img src="{{ asset('_common/img/buddhist_site/pexels-pixabay-415708.jpg') }}"></div>--}}
{{--                            <div class="bdd-sites-text">--}}
{{--                                <a href="#">Temple of the Tooth Relic</a>--}}
{{--                                <div class="bdd-sites-location">at Khagrachari, Bangladesh</div>--}}
{{--                                <p>In the Central Highlands, almost dead centre in the little island of Sri Lanka lays Kandy City. The crown jewel of the city is--}}
{{--                                    the famed Sri Dalada Maligawa, also known as the Temple of the Tooth.</p>--}}
{{--                            </div>--}}
{{--                            <div class="bdd-sites-view"><a href="{{ route('buddhist-sites.show', 1) }}">Read More<i class="fa-solid fa-arrow-right-long"></i></a></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="overflow-hidden  mx-3 element-item">--}}
{{--                    <div class="bdd-sites">--}}
{{--                        <div class="bdd-sites-box">--}}
{{--                            <div class="zoom"><img src="{{ asset('_common/img/buddhist_site/pexels-sirinat-inopas-246935.jpg') }}"></div>--}}
{{--                            <div class="bdd-sites-text">--}}
{{--                                <a href="#">Temple of the Tooth Relic</a>--}}
{{--                                <div class="bdd-sites-location">at Bandarban, Bangladesh</div>--}}
{{--                                <p>In the Central Highlands, almost dead centre in the little island of Sri Lanka lays Kandy City. The crown jewel of the city is--}}
{{--                                    the famed Sri Dalada Maligawa, also known as the Temple of the Tooth.</p>--}}
{{--                            </div>--}}
{{--                            <div class="bdd-sites-view"><a href="{{ route('buddhist-sites.show', 1) }}">Read More<i class="fa-solid fa-arrow-right-long"></i></a></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="overflow-hidden mx-3 element-item">--}}
{{--                    <div class="bdd-sites">--}}
{{--                        <div class="bdd-sites-box">--}}
{{--                            <div class="zoom"><img src="{{ asset('_common/img/buddhist_site/pexels-lu-zhao-16773960.jpg') }}"></div>--}}
{{--                            <div class="bdd-sites-text">--}}
{{--                                <a href="#">Temple of the Tooth Relic</a>--}}
{{--                                <div class="bdd-sites-location">at Rangamati, Bangladesh</div>--}}
{{--                                <p>In the Central Highlands, almost dead centre in the little island of Sri Lanka lays Kandy City. The crown jewel of the city is--}}
{{--                                    the famed Sri Dalada Maligawa, also known as the Temple of the Tooth.</p>--}}
{{--                            </div>--}}
{{--                            <div class="bdd-sites-view"><a href="{{ route('buddhist-sites.show', 1) }}">Read More<i class="fa-solid fa-arrow-right-long"></i></a></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="overflow-hidden  mx-3 element-item">--}}
{{--                    <div class="bdd-sites">--}}
{{--                        <div class="bdd-sites-box">--}}
{{--                            <div class="zoom"><img src="{{ asset('_common/img/buddhist_site/pexels-pixabay-415708.jpg') }}"></div>--}}
{{--                            <div class="bdd-sites-text">--}}
{{--                                <a href="#">Temple of the Tooth Relic</a>--}}
{{--                                <div class="bdd-sites-location">at Khagrachari, Bangladesh</div>--}}
{{--                                <p>In the Central Highlands, almost dead centre in the little island of Sri Lanka lays Kandy City. The crown jewel of the city is--}}
{{--                                    the famed Sri Dalada Maligawa, also known as the Temple of the Tooth.</p>--}}
{{--                            </div>--}}
{{--                            <div class="bdd-sites-view"><a href="{{ route('buddhist-sites.show', 1) }}">Read More<i class="fa-solid fa-arrow-right-long"></i></a></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>

            <div class="text-center mt-4"><a href="{{ route('buddhist-sites.index') }}" class="my-btn btn-02"> View more</a></div>
        </div>
    </section>


@endsection
