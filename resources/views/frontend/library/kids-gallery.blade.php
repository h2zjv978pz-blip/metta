@extends('frontend.layouts.base')

@section('page-title', 'Kids Gallery')

@section('main-content')
    <section  class="pd-top ">
        <div class="container d-flex align-items-center flex-column justify-content-center">
            <div class="title">
                <img src="{{ asset('_common/img/title-icon.png') }}">
                <span>BOOKS</span>
                <h2>KIDS GALLERY</h2>
            </div>
            <div class="row book-bg">
                <div class="col-lg-2 col-md-4 ">
                    <div class="books-img">
                        <img src="{{ asset('_common/img/library/books-img-01.jpg') }}">
                        <div class="books-icons">
                            <a href="{{ asset('_common/img/Ajahn-Amaro-Serenity-is-the-Final-Word.pdf') }}"><i class="bi bi-cloud-download"></i></a>
                            <span>|</span>
                            {{--                            <a href="{{ asset('_common/img/Ajahn-Amaro-Serenity-is-the-Final-Word.pdf') }}"><i class="bi bi-book"></i></a>--}}

                            <a href="{{ asset('_common/img/Ajahn-Amaro-Serenity-is-the-Final-Word.pdf') }}"><i class="bi bi-book"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 col-md-8 mt-4 mt-md-0">
                    <h4 class="book-name">Amaravati's 2022 Photobook</h4>
                    <div class="books-info">
                        <span>Amaravati Sangha </span>
                        <span>(2023)</span>
                        <p>
                            This photobook summarises the major events of the year 2022 at Amaravati Buddhist Monastery, UK. A beautiful hardcover copy can be perused in person at Amaravati's public library. This photobook summarises the major events of the year 2022 at Amaravati Buddhist Monastery, UK. A beautiful hardcover copy can be perused in person at Amaravati's public library. This photobook summarises the major events of the year 2022 at Amaravati Buddhist Monastery, UK. A beautiful hardcover copy can be perused in person at Amaravati's public library.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row book-bg">
                <div class="col-lg-2 col-md-4 ">
                    <div class="books-img">
                        <img src="{{ asset('_common/img/library/books-img-02.jpg') }}">
                        <div class="books-icons">
                            <a href=""><i class="bi bi-cloud-download"></i></a>
                            <span>|</span>
                            <a href=""><i class="bi bi-book"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 col-md-8 mt-4 mt-md-0">
                    <h4 class="book-name">Allowing Intuition</h4>
                    <div class="books-info">
                        <span>Ajahn Vajiro</span>
                        <span>(2023)</span>
                        <p>This booklet is an adaptation of a Zoom session offered by Ajahn Vajiro for the Theosophical Society in America on the 8th August 2022.
                            Ajahn Vajiro: Welcome everybody. As we gather together and settle, I can see bouncing people settling into their positions of ‘I’m going to be mindful now.’ But just remember, and recollect – as I often do – that life wishes itself well, wishes the best for itself. It may not know what is the best, or it may not have the capacity to find the best – but inherently, life strives for the optimum state. It wishes itself well. Of course, when human beings wish themselves well, they can be very confused about what’s best for them. On an occasion like this where investigation and a sense of interest are encouraged, it’s helpful to remember why we’re doing this.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row book-bg">
                <div class="col-lg-2 col-md-4 ">
                    <div class="books-img">
                        <img src="{{ asset('_common/img/library/books-img-03.jpg') }}">
                        <div class="books-icons">
                            <a href=""><i class="bi bi-cloud-download"></i></a>
                            <span>|</span>
                            <a href=""><i class="bi bi-book"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 col-md-8 mt-4 mt-md-0">
                    <h4 class="book-name">On Your Own Two Feet</h4>
                    <div class="books-info">
                        <span>Ajahn Sucitto</span>
                        <span>(2022)</span>
                        <p>
                            A GUIDE TO STANDING MEDITATION As standing is something that we do, why not do it with full awareness? After all, standing was one of the positions that the Buddha recommended as a proper basis for mindfulness. Wisely cultivated, it takes strain out of the body, encourages balance and inner stability – and is a support for full liberation. In this guide, Ajahn Sucitto adds practical details to the establishment and development of this practice. It is for beginners and experienced meditators alike.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
