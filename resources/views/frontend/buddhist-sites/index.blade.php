@extends('frontend.layouts.base')

@section('page-title', \App\Helpers\Utils::lingual(['Buddhist Sites', 'বৌদ্ধ স্থান']))
@section('meta-description', \App\Helpers\Utils::lingual(['Explore sacred Buddhist sites, temples, and historical landmarks across the region.', 'অঞ্চল জুড়ে পবিত্র বৌদ্ধ স্থান, মন্দির এবং ঐতিহাসিক স্থাপনা অন্বেষণ করুন।']))

@section('main-content')
    <!-- BUDDHIST SITES Section -->
    <section id="buddhist_sites" class="pd-top pd-bottom">
        <div class="container mixitup-container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ \App\Helpers\Utils::lingual(['Home', 'হোম']) }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ \App\Helpers\Utils::lingual(['Buddhist Sites', 'বৌদ্ধ স্থান']) }}</li>
                </ol>
            </nav>
            <div class="title">
                <img src="{{ asset('_common/img/title-icon.png') }}" alt="">
                <span>{{ \App\Helpers\Utils::lingual(['HIGHLIGHTS', 'হাইলাইটস']) }}</span>
                <h2>{{ \App\Helpers\Utils::lingual(['BUDDHIST SITE', 'বৌদ্ধ স্থান']) }}</h2>
            </div>
            <div class="button-group filter-button-group port-btn align-center mb-4 bdd-sites-nav">
                <button type="button" class="btn btn-primary me-0 mb-0 me-md-3 mb-md-3" data-filter="all">All</button>

                @foreach($countries as $country)
                    <button type="button" class="btn btn-primary me-0 mb-0 me-md-3 mb-md-3" data-filter=".{{ $country->iso }}">{{ $country->name }}</button>
                @endforeach
{{--                <button type="button" class="btn btn-primary me-0 mb-0 me-md-3 mb-md-3" data-filter=".bd">BANGLADESH</button>--}}
{{--                <button type="button" class="btn btn-primary me-0 mb-0 me-md-3 mb-md-3" data-filter=".in">INDIA</button>--}}
{{--                <button type="button" class="btn btn-primary me-0 mb-0 me-md-3 mb-md-3" data-filter=".np">NEPAL</button>--}}
{{--                <button type="button" class="btn btn-primary me-0 mb-0 me-md-3 mb-md-3" data-filter=".bu">BHUTAN</button>--}}
{{--                <button type="button" class="btn btn-primary me-0 mb-0 me-md-3 mb-md-3" data-filter=".jp">JAPAN</button>--}}
{{--                <button type="button" class="btn btn-primary me-0 mb-0 me-md-3 mb-md-3" data-filter=".sk">SOUTH KOREA</button>--}}
{{--                <button type="button" class="btn btn-primary me-0 mb-0 me-md-3 mb-md-3" data-filter=".cn">CHINA</button>--}}
{{--                <button type="button" class="btn btn-primary me-0 mb-0 me-md-3 mb-md-3" data-filter=".vm">VIETNAM</button>--}}
{{--                <button type="button" class="btn btn-primary mb-0 mb-md-3" data-filter=".tl">THAILAND</button>--}}
            </div>
            <div class="grid row">
                @foreach($buddhist_sites as $buddhist_site)
                    <div class="overflow-hidden col-lg-4 element-item mix {{ $buddhist_site->country->iso }}">
                        <div class="bdd-sites">
                            <div class="bdd-sites-box">
                                <div class="zoom"><img src="{{ $buddhist_site->getFeatureImageUrl() }}" loading="lazy" alt="{{ \App\Helpers\Utils::lingual([$buddhist_site->name, $buddhist_site->getJson('description', 'name', $buddhist_site->name)]) }}"></div>
                                <div class="bdd-sites-text">
                                    <a href="{{ route('buddhist-sites.show', $buddhist_site->id) }}">
                                        {{ \App\Helpers\Utils::lingual([$buddhist_site->name, $buddhist_site->getJson('description', 'name', $buddhist_site->name)]) }}
                                    </a>
                                    <div class="bdd-sites-location">
                                        {{ \App\Helpers\Utils::lingual(['at ', '']) }}{{ \App\Helpers\Utils::lingual([$buddhist_site->location_name, $buddhist_site->getJson('description', 'location_name', $buddhist_site->location_name)]) }}</div>
                                    <p>{{ strip_tags($buddhist_site->getJson('description', 'intro', '')) }}</p>
                                </div>
                                <div class="bdd-sites-view"><a href="{{ route('buddhist-sites.show', $buddhist_site->id) }}">{{ \App\Helpers\Utils::lingual(['Read More', 'আরও পড়ুন']) }} <i class="fa-solid fa-arrow-right-long"></i></a></div>
                            </div>
                        </div>
                    </div>
                @endforeach

{{--                <div class="overflow-hidden col-lg-4 element-item mix np">--}}
{{--                    <div class="bdd-sites">--}}
{{--                        <div class="bdd-sites-box">--}}
{{--                            <div class="zoom"><img src="{{ asset('_common/img/buddhist_site/pexels-pixabay-415708.jpg') }}"></div>--}}
{{--                            <div class="bdd-sites-text">--}}
{{--                                <a href="{{ route('buddhist-sites.show', 1) }}">Temple of the Tooth Relic</a>--}}
{{--                                <div class="bdd-sites-location">at Rangamati, Bangladesh</div>--}}
{{--                                <p>In the Central Highlands, almost dead centre in the little island of Sri Lanka lays Kandy City. The crown jewel of the city is--}}
{{--                                    the famed Sri Dalada Maligawa, also known as the Temple of the Tooth.</p>--}}
{{--                            </div>--}}
{{--                            <div class="bdd-sites-view"><a href="{{ route('buddhist-sites.show', 1) }}">Read More<i class="fa-solid fa-arrow-right-long"></i></a></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="overflow-hidden col-lg-4 element-item mix in">--}}
{{--                    <div class="bdd-sites">--}}
{{--                        <div class="bdd-sites-box">--}}
{{--                            <div class="zoom"><img src="{{ asset('_common/img/buddhist_site/pexels-joel-m-b-marrinan-6060183.jpg') }}"></div>--}}
{{--                            <div class="bdd-sites-text">--}}
{{--                                <a href="{{ route('buddhist-sites.show', 1) }}">Temple of the Tooth Relic</a>--}}
{{--                                <div class="bdd-sites-location">at Khagrachari, Bangladesh</div>--}}
{{--                                <p>In the Central Highlands, almost dead centre in the little island of Sri Lanka lays Kandy City. The crown jewel of the city is--}}
{{--                                    the famed Sri Dalada Maligawa, also known as the Temple of the Tooth.</p>--}}
{{--                            </div>--}}
{{--                            <div class="bdd-sites-view"><a href="{{ route('buddhist-sites.show', 1) }}">Read More<i class="fa-solid fa-arrow-right-long"></i></a></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="overflow-hidden col-lg-4 element-item mix np">--}}
{{--                    <div class="bdd-sites">--}}
{{--                        <div class="bdd-sites-box">--}}
{{--                            <div class="zoom"><img src="{{ asset('_common/img/buddhist_site/pexels-pixabay-415708.jpg') }}"></div>--}}
{{--                            <div class="bdd-sites-text">--}}
{{--                                <a href="{{ route('buddhist-sites.show', 1) }}">Temple of the Tooth Relic</a>--}}
{{--                                <div class="bdd-sites-location">at Bandarban, Bangladesh</div>--}}
{{--                                <p>In the Central Highlands, almost dead centre in the little island of Sri Lanka lays Kandy City. The crown jewel of the city is--}}
{{--                                    the famed Sri Dalada Maligawa, also known as the Temple of the Tooth.</p>--}}
{{--                            </div>--}}
{{--                            <div class="bdd-sites-view"><a href="{{ route('buddhist-sites.show', 1) }}">Read More<i class="fa-solid fa-arrow-right-long"></i></a></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="overflow-hidden col-lg-4 element-item mix bd">--}}
{{--                    <div class="bdd-sites">--}}
{{--                        <div class="bdd-sites-box">--}}
{{--                            <div class="zoom"><img src="{{ asset('_common/img/buddhist_site/pexels-sirinat-inopas-246935.jpg') }}"></div>--}}
{{--                            <div class="bdd-sites-text">--}}
{{--                                <a href="{{ route('buddhist-sites.show', 1) }}">Temple of the Tooth Relic</a>--}}
{{--                                <div class="bdd-sites-location">at Rangamati, Bangladesh</div>--}}
{{--                                <p>In the Central Highlands, almost dead centre in the little island of Sri Lanka lays Kandy City. The crown jewel of the city is--}}
{{--                                    the famed Sri Dalada Maligawa, also known as the Temple of the Tooth.</p>--}}
{{--                            </div>--}}
{{--                            <div class="bdd-sites-view"><a href="{{ route('buddhist-sites.show', 1) }}">Read More<i class="fa-solid fa-arrow-right-long"></i></a></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="overflow-hidden col-lg-4 element-item mix bu">--}}
{{--                    <div class="bdd-sites">--}}
{{--                        <div class="bdd-sites-box">--}}
{{--                            <div class="zoom"><img src="{{ asset('_common/img/buddhist_site/pexels-lu-zhao-16773960.jpg') }}"></div>--}}
{{--                            <div class="bdd-sites-text">--}}
{{--                                <a href="{{ route('buddhist-sites.show', 1) }}">Temple of the Tooth Relic</a>--}}
{{--                                <div class="bdd-sites-location">at Khagrachari, Bangladesh</div>--}}
{{--                                <p>In the Central Highlands, almost dead centre in the little island of Sri Lanka lays Kandy City. The crown jewel of the city is--}}
{{--                                    the famed Sri Dalada Maligawa, also known as the Temple of the Tooth.</p>--}}
{{--                            </div>--}}
{{--                            <div class="bdd-sites-view"><a href="{{ route('buddhist-sites.show', 1) }}">Read More<i class="fa-solid fa-arrow-right-long"></i></a></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="overflow-hidden col-lg-4 element-item mix bd">--}}
{{--                    <div class="bdd-sites">--}}
{{--                        <div class="bdd-sites-box">--}}
{{--                            <div class="zoom"><img src="{{ asset('_common/img/buddhist_site/pexels-joel-m-b-marrinan-6060183.jpg') }}"></div>--}}
{{--                            <div class="bdd-sites-text">--}}
{{--                                <a href="{{ route('buddhist-sites.show', 1) }}">Temple of the Tooth Relic</a>--}}
{{--                                <div class="bdd-sites-location">at Bandarban, Bangladesh</div>--}}
{{--                                <p>In the Central Highlands, almost dead centre in the little island of Sri Lanka lays Kandy City. The crown jewel of the city is--}}
{{--                                    the famed Sri Dalada Maligawa, also known as the Temple of the Tooth.</p>--}}
{{--                            </div>--}}
{{--                            <div class="bdd-sites-view"><a href="{{ route('buddhist-sites.show', 1) }}">Read More<i class="fa-solid fa-arrow-right-long"></i></a></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="overflow-hidden col-lg-4 element-item mix jp">--}}
{{--                    <div class="bdd-sites">--}}
{{--                        <div class="bdd-sites-box">--}}
{{--                            <div class="zoom"><img src="{{ asset('_common/img/buddhist_site/pexels-sirinat-inopas-246935.jpg') }}"></div>--}}
{{--                            <div class="bdd-sites-text">--}}
{{--                                <a href="{{ route('buddhist-sites.show', 1) }}">Temple of the Tooth Relic</a>--}}
{{--                                <div class="bdd-sites-location">at Rangamati, Bangladesh</div>--}}
{{--                                <p>In the Central Highlands, almost dead centre in the little island of Sri Lanka lays Kandy City. The crown jewel of the city is--}}
{{--                                    the famed Sri Dalada Maligawa, also known as the Temple of the Tooth.</p>--}}
{{--                            </div>--}}
{{--                            <div class="bdd-sites-view"><a href="{{ route('buddhist-sites.show', 1) }}">Read More<i class="fa-solid fa-arrow-right-long"></i></a></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="overflow-hidden col-lg-4 element-item mix sk">--}}
{{--                    <div class="bdd-sites">--}}
{{--                        <div class="bdd-sites-box">--}}
{{--                            <div class="zoom"><img src="{{ asset('_common/img/buddhist_site/pexels-pixabay-415708.jpg') }}"></div>--}}
{{--                            <div class="bdd-sites-text">--}}
{{--                                <a href="{{ route('buddhist-sites.show', 1) }}">Temple of the Tooth Relic</a>--}}
{{--                                <div class="bdd-sites-location">at Khagrachari, Bangladesh</div>--}}
{{--                                <p>In the Central Highlands, almost dead centre in the little island of Sri Lanka lays Kandy City. The crown jewel of the city is--}}
{{--                                    the famed Sri Dalada Maligawa, also known as the Temple of the Tooth.</p>--}}
{{--                            </div>--}}
{{--                            <div class="bdd-sites-view"><a href="{{ route('buddhist-sites.show', 1) }}">Read More<i class="fa-solid fa-arrow-right-long"></i></a></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="overflow-hidden col-lg-4 element-item mix cn">--}}
{{--                    <div class="bdd-sites">--}}
{{--                        <div class="bdd-sites-box">--}}
{{--                            <div class="zoom"><img src="{{ asset('_common/img/buddhist_site/pexels-sirinat-inopas-246935.jpg') }}"></div>--}}
{{--                            <div class="bdd-sites-text">--}}
{{--                                <a href="{{ route('buddhist-sites.show', 1) }}">Temple of the Tooth Relic</a>--}}
{{--                                <div class="bdd-sites-location">at Bandarban, Bangladesh</div>--}}
{{--                                <p>In the Central Highlands, almost dead centre in the little island of Sri Lanka lays Kandy City. The crown jewel of the city is--}}
{{--                                    the famed Sri Dalada Maligawa, also known as the Temple of the Tooth.</p>--}}
{{--                            </div>--}}
{{--                            <div class="bdd-sites-view"><a href="{{ route('buddhist-sites.show', 1) }}">Read More<i class="fa-solid fa-arrow-right-long"></i></a></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="overflow-hidden col-lg-4 element-item mix vm">--}}
{{--                    <div class="bdd-sites">--}}
{{--                        <div class="bdd-sites-box">--}}
{{--                            <div class="zoom"><img src="{{ asset('_common/img/buddhist_site/pexels-joel-m-b-marrinan-6060183.jpg') }}"></div>--}}
{{--                            <div class="bdd-sites-text">--}}
{{--                                <a href="{{ route('buddhist-sites.show', 1) }}">Temple of the Tooth Relic</a>--}}
{{--                                <div class="bdd-sites-location">at Rangamati, Bangladesh</div>--}}
{{--                                <p>In the Central Highlands, almost dead centre in the little island of Sri Lanka lays Kandy City. The crown jewel of the city is--}}
{{--                                    the famed Sri Dalada Maligawa, also known as the Temple of the Tooth.</p>--}}
{{--                            </div>--}}
{{--                            <div class="bdd-sites-view"><a href="{{ route('buddhist-sites.show', 1) }}">Read More<i class="fa-solid fa-arrow-right-long"></i></a></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="overflow-hidden col-lg-4 element-item mix tl">--}}
{{--                    <div class="bdd-sites">--}}
{{--                        <div class="bdd-sites-box">--}}
{{--                            <div class="zoom"><img src="{{ asset('_common/img/buddhist_site/pexels-lu-zhao-16773960.jpg') }}"></div>--}}
{{--                            <div class="bdd-sites-text">--}}
{{--                                <a href="{{ route('buddhist-sites.show', 1) }}">Temple of the Tooth Relic</a>--}}
{{--                                <div class="bdd-sites-location">at Khagrachari, Bangladesh</div>--}}
{{--                                <p>In the Central Highlands, almost dead centre in the little island of Sri Lanka lays Kandy City. The crown jewel of the city is--}}
{{--                                    the famed Sri Dalada Maligawa, also known as the Temple of the Tooth.</p>--}}
{{--                            </div>--}}
{{--                            <div class="bdd-sites-view"><a href="{{ route('buddhist-sites.show', 1) }}">Read More<i class="fa-solid fa-arrow-right-long"></i></a></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

            </div>
        </div>
    </section>
    <!-- BUDDHIST SITES Section -->
@endsection
