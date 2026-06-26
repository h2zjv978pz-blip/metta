@extends('frontend.layouts.base')

@section('page-title', \App\Helpers\Utils::lingual(['Books', 'বই']))
@section('meta-description', \App\Helpers\Utils::lingual(['Browse our collection of Buddhist books and spiritual literature.', 'আমাদের বৌদ্ধ বই এবং আত্মিক সাহিত্যের সংগ্রহ দেখুন।']))

@section('main-content')
    <section  class="pd-top pd-bottom">
        <div class="container d-flex align-items-center flex-column justify-content-center">
            <nav aria-label="breadcrumb" class="w-100">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ \App\Helpers\Utils::lingual(['Home', 'হোম']) }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('library.index') }}">{{ \App\Helpers\Utils::lingual(['Library', 'লাইব্রেরি']) }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ \App\Helpers\Utils::lingual(['Books', 'বই']) }}</li>
                </ol>
            </nav>
            <div class="title">
                <img src="{{ asset('_common/img/title-icon.png') }}" alt="">
                <span>BOOKS</span>
                <h2>{{ strtoupper(in_array(Request::query('category'), \App\Repositories\BookRepository::$categories) ? Request::query('category') : 'BOOKS COLLECTION') }}</h2>
            </div>

            <div class="row book-gallery-row">
                @foreach($books as $book)
                    <div class="col-6 col-xl-6 col-sm-12 book-gallery-item">
                        <div class="row book-bg book-gallery-card">
                            <div class="col-lg-2 col-md-4 book-gallery-img-col">
                                <div class="books-img">
                                    <img src="{{ $book->getFeatureImageUrl() }}" loading="lazy" alt="{{ $book->prop('title') }}">
                                    <div class="books-icons mt-2">
                                        {{--                                <a href="{{ asset('storage/doc/' . $book->prop('book_pdf')) }}" title="Download"><i class="bi bi-cloud-download"></i></a>--}}
                                        {{--                                <span>|</span>--}}
                                        <a href="{{ \App\Helpers\Utils::getBookReaderUrl($book) }}" target="_blank" title="Read"><i class="bi bi-book"></i></a>
                                        <a data-share-url="{{ \App\Helpers\Utils::getBookReaderUrl($book) }}" title="Share" aria-label="Share" class="share-btn"><i class="fa-solid fa-share"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-8 mt-4 mt-md-0 book-gallery-info">
                                <h4 class="book-name">{{ $book->prop('title') }}</h4>
                                <div class="books-info">
                                    <span>{{ $book->prop('author') }}</span>
                                    @if($book->prop('pub_year'))
                                        <span>({{ $book->prop('pub_year') }})</span>
                                    @endif
                                    <p>{{ \Illuminate\Support\Str::limit($book->prop('summary'), 350) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

{{--            <div class="row book-bg">--}}
{{--                <div class="col-lg-2 col-md-4 ">--}}
{{--                    <div class="books-img">--}}
{{--                        <img src="{{ asset('_common/img/library/books-img-01.jpg') }}">--}}
{{--                        <div class="books-icons">--}}
{{--                            <a href="{{ asset('_common/img/Ajahn-Amaro-Serenity-is-the-Final-Word.pdf') }}" title="Download"><i class="bi bi-cloud-download"></i></a>--}}
{{--                            <span>|</span>--}}
{{--                            <a href="{{ asset('_common/img/Ajahn-Amaro-Serenity-is-the-Final-Word.pdf') }}" title=Download target="_blank" title="Read"><i class="bi bi-book"></i></a>--}}

{{--                            <a href="https://docs.google.com/viewerng/viewer?url={{ asset('_common/img/Ajahn-Amaro-Serenity-is-the-Final-Word.pdf') }}" target="_blank" title="Read"><i class="bi bi-book"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-10 col-md-8 mt-4 mt-md-0">--}}
{{--                    <h4 class="book-name">Amaravati's 2022 Photobook</h4>--}}
{{--                    <div class="books-info">--}}
{{--                        <span>Amaravati Sangha </span>--}}
{{--                        <span>(2023)</span>--}}
{{--                        <p>--}}
{{--                            This photobook summarises the major events of the year 2022 at Amaravati Buddhist Monastery, UK. A beautiful hardcover copy can be perused in person at Amaravati's public library. This photobook summarises the major events of the year 2022 at Amaravati Buddhist Monastery, UK. A beautiful hardcover copy can be perused in person at Amaravati's public library. This photobook summarises the major events of the year 2022 at Amaravati Buddhist Monastery, UK. A beautiful hardcover copy can be perused in person at Amaravati's public library.--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row book-bg">--}}
{{--                <div class="col-lg-2 col-md-4 ">--}}
{{--                    <div class="books-img">--}}
{{--                        <img src="{{ asset('_common/img/library/books-img-02.jpg') }}">--}}
{{--                        <div class="books-icons">--}}
{{--                            <a href="{{ asset('_common/img/Ajahn-Amaro-Serenity-is-the-Final-Word.pdf') }}" title="Download"><i class="bi bi-cloud-download"></i></a>--}}
{{--                            <span>|</span>--}}
{{--                            <a href="https://docs.google.com/viewerng/viewer?url={{ asset('_common/img/Ajahn-Amaro-Serenity-is-the-Final-Word.pdf') }}" target="_blank" title="Read"><i class="bi bi-book"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-10 col-md-8 mt-4 mt-md-0">--}}
{{--                    <h4 class="book-name">Allowing Intuition</h4>--}}
{{--                    <div class="books-info">--}}
{{--                        <span>Ajahn Vajiro</span>--}}
{{--                        <span>(2023)</span>--}}
{{--                        <p>This booklet is an adaptation of a Zoom session offered by Ajahn Vajiro for the Theosophical Society in America on the 8th August 2022.--}}
{{--                            Ajahn Vajiro: Welcome everybody. As we gather together and settle, I can see bouncing people settling into their positions of ‘I’m going to be mindful now.’ But just remember, and recollect – as I often do – that life wishes itself well, wishes the best for itself. It may not know what is the best, or it may not have the capacity to find the best – but inherently, life strives for the optimum state. It wishes itself well. Of course, when human beings wish themselves well, they can be very confused about what’s best for them. On an occasion like this where investigation and a sense of interest are encouraged, it’s helpful to remember why we’re doing this.--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row book-bg">--}}
{{--                <div class="col-lg-2 col-md-4 ">--}}
{{--                    <div class="books-img">--}}
{{--                        <img src="{{ asset('_common/img/library/books-img-03.jpg') }}">--}}
{{--                        <div class="books-icons">--}}
{{--                            <a href="{{ asset('_common/img/Ajahn-Amaro-Serenity-is-the-Final-Word.pdf') }}" title="Download"><i class="bi bi-cloud-download"></i></a>--}}
{{--                            <span>|</span>--}}
{{--                            <a href="https://docs.google.com/viewerng/viewer?url={{ asset('_common/img/Ajahn-Amaro-Serenity-is-the-Final-Word.pdf') }}" target="_blank" title="Read"><i class="bi bi-book"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-10 col-md-8 mt-4 mt-md-0">--}}
{{--                    <h4 class="book-name">On Your Own Two Feet</h4>--}}
{{--                    <div class="books-info">--}}
{{--                        <span>Ajahn Sucitto</span>--}}
{{--                        <span>(2022)</span>--}}
{{--                        <p>--}}
{{--                            A GUIDE TO STANDING MEDITATION As standing is something that we do, why not do it with full awareness? After all, standing was one of the positions that the Buddha recommended as a proper basis for mindfulness. Wisely cultivated, it takes strain out of the body, encourages balance and inner stability – and is a support for full liberation. In this guide, Ajahn Sucitto adds practical details to the establishment and development of this practice. It is for beginners and experienced meditators alike.--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </section>
@endsection
