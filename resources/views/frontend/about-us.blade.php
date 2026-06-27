@extends('frontend.layouts.base')

@php $au = $data['aboutUs']; @endphp

@section('page-title', \App\Helpers\Utils::lingual([$au['page_title'], $au['page_title_bn']]))

@section('main-content')
    <section id="breadcrumb">
        <div class="breadcrumb-img" style="background-image: url('{{ asset('_common/img/v-thumb-05.jpg') }}')">
            <div class="breadcrumb-text-wrap">
                <span>{{ \App\Helpers\Utils::lingual(['About', 'সম্পর্কে']) }}</span>
                <h2>{{ \App\Helpers\Utils::lingual([$au['page_title'], $au['page_title_bn']]) }}</h2>
            </div>
        </div>
    </section>

    <section class="about-us pd-top pd-bottom">
        <div class="container">
            <div class="">
                <h2>{{ \App\Helpers\Utils::lingual([$au['page_title'], $au['page_title_bn']]) }}</h2>
                <p>{!! nl2br(e(\App\Helpers\Utils::lingual([$au['intro_body'], $au['intro_body_bn']]))) !!}</p>
            </div>
            <div class="mt-5">
                <h4>{{ \App\Helpers\Utils::lingual(['Our Mission', 'আমাদের লক্ষ্য']) }}</h4>
                <p>{!! nl2br(e(\App\Helpers\Utils::lingual([$au['mission_body'], $au['mission_body_bn']]))) !!}</p>
            </div>
            <div class="mt-5">
                <h4>{{ \App\Helpers\Utils::lingual(['Unveiling Sacred Sites', 'পবিত্র স্থান উদ্ঘাটন']) }}</h4>
                <p>{!! nl2br(e(\App\Helpers\Utils::lingual([$au['sites_body'], $au['sites_body_bn']]))) !!}</p>
            </div>
            <div class="mt-5">
                <h4>{{ \App\Helpers\Utils::lingual(["Illuminating Buddha's Teachings", 'বুদ্ধের শিক্ষার আলোকপাত']) }}</h4>
                <p>{!! nl2br(e(\App\Helpers\Utils::lingual([$au['teachings_body'], $au['teachings_body_bn']]))) !!}</p>
            </div>
            <div class="my-5">
                <h4>{{ \App\Helpers\Utils::lingual(['Explorations', 'অন্বেষণ']) }}</h4>
                <p>{!! nl2br(e(\App\Helpers\Utils::lingual([$au['explorations_body'], $au['explorations_body_bn']]))) !!}</p>
            </div>


            {{--            Quote Slide--}}
            <div id="carouselExampleDark" class="carousel carousel-dark slide quote-slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000">
                        <img src="{{ asset('_common/img/about-us/pexels-pixabay-236148.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption">
                            <q>The mind can go in a thousand directions, but on this beautiful path, I walk in peace. With each step, the wind blows. With each step, a flower blooms.</q>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="{{ asset('_common/img/about-us/pexels-pixabay-236302.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption">
                            <q>The mind can go in a thousand directions, but on this beautiful path, I walk in peace. With each step, the wind blows. With each step, a flower blooms.</q>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('_common/img/about-us/pexels-pixabay-260898.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption">
                            <q>The mind can go in a thousand directions, but on this beautiful path, I walk in peace. With each step, the wind blows. With each step, a flower blooms.</q>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('_common/img/about-us/pexels-8973895.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption">
                            <q>The mind can go in a thousand directions, but on this beautiful path, I walk in peace. With each step, the wind blows. With each step, a flower blooms.</q>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fa-solid fa-circle-chevron-left"></i></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"><i class="fa-solid fa-circle-chevron-right"></i></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            {{--            Quote Slide--}}

        </div>
    </section>
@endsection
