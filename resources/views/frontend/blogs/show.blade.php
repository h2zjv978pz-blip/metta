@extends('frontend.layouts.base')

@php
    $blogTitle = $blog->prop('title');
    $blogDescription = \Illuminate\Support\Str::limit(\App\Helpers\Utils::getPlainText($blog->prop('body', '')), 160);
@endphp

@section('page-title', 'Research & Publication - ' . $blogTitle)
@section('meta-description', $blogDescription ?: $blogTitle)
@section('og-image', $blog->getFeatureImageUrl())

@section('structured-data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Article",
    "headline": {!! json_encode($blogTitle) !!},
    "description": {!! json_encode($blogDescription) !!},
    "image": {!! json_encode($blog->getFeatureImageUrl()) !!},
    "author": {
        "@type": "Person",
        "name": {!! json_encode($blog->prop('author', 'Metta')) !!}
    },
    "datePublished": {!! json_encode($blog->created_at?->toIso8601String()) !!},
    "dateModified": {!! json_encode($blog->updated_at?->toIso8601String()) !!},
    "mainEntityOfPage": {!! json_encode(url()->current()) !!}
}
</script>
@endsection

@section('main-content')
    <section>
        <div class="blog-breadcrumb-img sm" style="background-image: url('{{ asset('_common/img/blogs/blogs_13.jpg') }}')">
            <div class="breadcrumb-text-wrap">
                <span>{{ \App\Helpers\Utils::lingual(['Research & Publication', 'গবেষণা ও প্রকাশনা']) }}</span>
                <h2>{{ $blogTitle }}</h2>
            </div>
        </div>
    </section>
    <section class="blog-d pd-top pd-bottom">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ \App\Helpers\Utils::lingual(['Home', 'হোম']) }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('blogs.index') }}">{{ \App\Helpers\Utils::lingual(['Research & Publication', 'গবেষণা ও প্রকাশনা']) }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $blogTitle }}</li>
                </ol>
            </nav>
            @if($blog->prop('gallery_images'))
                <div class="row">
                    <div class="col-12 d-flex\ align-items-center justify-content-center">
                        <div class="fotorama" data-ratio="16/10" data-minwidth="100%" data-maxheight="75%" data-fit="cover" data-transition="slide" data-transitionduration="500" data-autoplay="4000" data-arrows="always" data-keyboard="true" data-allowfullscreen="native" data-nav="thumbs" data-transition="crossfade"  >
                            @foreach($blog->getJson('props', 'gallery_images', []) as $gallery_image)
                                <a href="{{ $blog->getImageLink($gallery_image) }}"><img src="{{ $blog->getImageLink($gallery_image) }}" alt="{{ $blogTitle }}"></a>
                            @endforeach

                            @if($blog->getJson('props', 'video'))
                                <a href="{{ route('play-video', $blog->getJson('props', 'video')) }}" data-video="true"><img src="{{ $blog->getFeatureImageUrl() }}" alt="{{ $blogTitle }} video"></a>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
            <div class="row pd-top">
                <div class="col-lg-8">
                    @if($blog->prop('pdf_file'))
                        <div class="my-5">
                            <a href="{{ \App\Helpers\Utils::getGDriveReadUrl(asset('storage/doc/' . $blog->prop('pdf_file'))) }}" class="btn btn-lg btn-maroon">
                                <i class="fa fa-file-pdf" style="margin-right: 3px;"></i> View PDF
                            </a>
                        </div>
                    @endif

                    {!! $blog->prop('body') !!}
                </div>
                <div class="col-lg-4 mt-4 mt-lg-0">
                    <h4 class="op-header">{{ \App\Helpers\Utils::lingual(['Other Posts', 'আরও প্রকাশনা']) }}</h4>

                    @if(!empty($more_blogs))
                        @foreach($more_blogs as $blog)
                            <div class="op">
                                <div class="op-img">
                                    <a href="{{ route('blogs.show', $blog->id) }}"><img src="{{ $blog->getFeatureImageUrl() }}" alt="{{ $blog->prop('title') }}"></a>
                                </div>
                                <div class="op-text">
                                    <h6><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->prop('title') }}</a></h6>
                                    <p>
                                        <a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->prop('author') }}</a>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @endif

{{--                    <div class="op">--}}
{{--                        <div class="op-img">--}}
{{--                            <a href=""><img src="{{ asset('_common/img/blogs/blogs_13.jpg') }}"></a>--}}
{{--                        </div>--}}
{{--                        <div class="op-text">--}}
{{--                            <h6><a href="">The Origin and Essence of Yoga and its Relation to Buddhism</a></h6>--}}
{{--                            <p>--}}
{{--                                <a href="">The Editors</a>--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="op">--}}
{{--                        <div class="op-img">--}}
{{--                            <a href=""><img src="{{ asset('_common/img/blogs/blogs_12.jpg') }}"></a>--}}
{{--                        </div>--}}
{{--                        <div class="op-text">--}}
{{--                            <h6><a href="">The Road to Nirvana Is Paved with Skillful Intentions</a></h6>--}}
{{--                            <p>--}}
{{--                                <a href="">Thānissaro Bhikkhu</a>--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="op">--}}
{{--                        <div class="op-img">--}}
{{--                            <a href=""><img src="{{ asset('_common/img/blogs/blog_02.jpg') }}"></a>--}}
{{--                        </div>--}}
{{--                        <div class="op-text">--}}
{{--                            <h6><a href="">The Path of Concentration & Mindfulness</a></h6>--}}
{{--                            <p>--}}
{{--                                <a href="">Thānissaro Bhikkhu</a>--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="op">--}}
{{--                        <div class="op-img">--}}
{{--                            <a href=""><img src="{{ asset('_common/img/blogs/blog_01.jpg') }}"></a>--}}
{{--                        </div>--}}
{{--                        <div class="op-text">--}}
{{--                            <h6><a href="">The Road to Nirvana Is Paved with Skillful Intentions</a></h6>--}}
{{--                            <p>--}}
{{--                                <a href="">Thānissaro Bhikkhu</a>--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="op">--}}
{{--                        <div class="op-img">--}}
{{--                            <a href=""><img src="{{ asset('_common/img/blogs/blog_02.jpg') }}"></a>--}}
{{--                        </div>--}}
{{--                        <div class="op-text">--}}
{{--                            <h6><a href="">The Road to Nirvana Is Paved with Skillful Intentions</a></h6>--}}
{{--                            <p>--}}
{{--                                <a href="">Thānissaro Bhikkhu</a>--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </section>
@endsection

