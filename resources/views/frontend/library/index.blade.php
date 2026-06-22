@extends('frontend.layouts.base')

@section('page-title', \App\Helpers\Utils::lingual(['Library', 'লাইব্রেরি']))
@section('meta-description', \App\Helpers\Utils::lingual(['Browse books, videos, audios, and image galleries in our digital archive.', 'আমাদের ডিজিটাল আর্কাইভে বই, ভিডিও, অডিও এবং ছবির গ্যালারি দেখুন।']))

@section('main-content')
<section  class="pd-top pd-bottom">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ \App\Helpers\Utils::lingual(['Home', 'হোম']) }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ \App\Helpers\Utils::lingual(['Library', 'লাইব্রেরি']) }}</li>
            </ol>
        </nav>
        <div class="title">
            <img src="{{ asset('_common/img/title-icon.png') }}" alt="">
            <span>LIBRARY</span>
            <h2>OUR ARCHIVES</h2>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <h2 class="lib-header">BOOKS</h2>
                <ul class="lib-list">
                    <li><a href="{{ route('library.books') }}">Books</a></li>
{{--                    <li><a href="{{ route('library.articles') }}">Articles</a></li>--}}
                    <li><a href="{{ route('library.books') }}">Kids Gallery</a></li>
{{--                    <li><a href="{{ route('library.books') }}">News Portal</a></li>--}}
                </ul>
            </div>
            <div class="col-lg-4">
                <h2 class="lib-header lib-header-2">VIDEO</h2>
                <ul class="lib-list">
                    <li><a href="{{ route('library.videos') }}">All Videos</a></li>
                    <li><a href="{{ route('library.videos', ['category' => 'Lecture']) }}">Lectures</a></li>
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

        {{--            Quote Slide--}}
        <div id="carouselExampleDark" class="carousel carousel-dark slide quote-slide pd-top">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="{{ asset('_common/img/library/pexels-rdne-stock-project-8711443.jpg') }}" class="d-block w-100" alt="">
                    <div class="carousel-caption">
                        <q>The mind can go in a thousand directions, but on this beautiful path, I walk in peace. With each step, the wind blows. With each step, a flower blooms.</q>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="{{ asset('_common/img/library/pexels-pixabay-220650.jpg') }}" class="d-block w-100" alt="">
                    <div class="carousel-caption">
                        <q>The mind can go in a thousand directions, but on this beautiful path, I walk in peace. With each step, the wind blows. With each step, a flower blooms.</q>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('_common/img/library/pexels-rdne-stock-project-8711124.jpg') }}" class="d-block w-100" alt="">
                    <div class="carousel-caption">
                        <q>The mind can go in a thousand directions, but on this beautiful path, I walk in peace. With each step, the wind blows. With each step, a flower blooms.</q>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('_common/img/library/pexels-aleksandar-pasaric-1344472.jpg') }}" class="d-block w-100" alt="">
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
