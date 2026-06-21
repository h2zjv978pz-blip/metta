@extends('frontend.layouts.base')

@section('page-title', 'About Us')

@section('main-content')
    <section id="breadcrumb">
        <div class="breadcrumb-img" style="background-image: url('{{ asset('_common/img/v-thumb-05.jpg') }}')">
            <div class="breadcrumb-text-wrap">
                <span>About</span>
                <h2>About Us</h2>
            </div>
        </div>
    </section>

    <section class="about-us pd-top pd-bottom">
        <div class="container">
            <div class="">
                <h2>About Us</h2>
                <p>
                    Welcome to <strong>Metta</strong> digital platform , a sanctuary of wisdom and serenity dedicated to exploring the profound
                    teachings of Buddha, unraveling the sacred stories embedded in Buddhist sites, and capturing the essence of
                    enlightenment through captivating documentaries.
                </p>
            </div>
            <div class="mt-5">
                <h4>Our Mission</h4>
                <p>
                    At Metta, we embark on a journey to share the timeless teachings of Buddha that illuminate the path to inner
                    peace, compassion, and mindfulness. Our mission is to bring the profound wisdom of Buddhism to the digital realm,
                    making it accessible to seekers and enthusiasts worldwide.
                </p>
            </div>
            <div class="mt-5">
                <h4>Unveiling Sacred Sites</h4>
                <p>
                    Embark on a virtual pilgrimage with us as we uncover the mystique surrounding sacred Buddhist sites. From the
                    serene landscapes of Bodh Gaya, where Siddhartha Gautama attained enlightenment, to the ancient ruins of
                    Nalanda, witness the echoes of ancient wisdom that resonate through these hallowed grounds.
                </p>
            </div>
            <div class="mt-5">
                <h4>Illuminating Buddha's Teachings</h4>
                <p>
                    Dive deep into the ocean of Buddha's teachings, exploring the Dharma that forms the foundation of Buddhism.
                    Through insightful articles, discussions, and reflections, we strive to unravel the profound messages that continue to
                    guide seekers on the path to awakening.
                </p>
            </div>
            <div class="my-5">
                <h4>Explorations</h4>
                <p>
                    Enhancing our journey are captivating documentaries that weave together the threads of history, spirituality, and
                    culture. Immerse yourself in visual narratives that bring to life the stories of great masters, the evolution of Buddhist
                    philosophy, and the enduring legacy of this ancient tradition.
                </p>
                <p>
                    We invite you to be a part of our community, where the exchange of ideas and experiences enriches our
                    collective understanding. Whether you're a seasoned practitioner or a curious soul taking the rst steps on the
                    Eightfold Path, your attendance is a space for everyone seeking inspiration and enlightenment.
                </p>
                <p>
                    Embark on this transformative journey with us as we explore the intersections of Buddhist wisdom, sacred sites, and
                    the cinematic artistry that brings it all to life.
                </p>

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
