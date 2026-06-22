@extends('frontend.layouts.base')

@php
    $teachingTitle = $teaching->prop('title');
    $teachingDescription = \Illuminate\Support\Str::limit(\App\Helpers\Utils::getPlainText($teaching->prop('body', '')), 160);
    $teachingHasVideo = $teaching->getJson('props', 'video');
@endphp

@section('page-title', $teachingTitle)
@section('meta-description', $teachingDescription ?: $teachingTitle)
@section('og-image', $teaching->getFeatureImageUrl())

@section('structured-data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": {!! json_encode($teachingHasVideo ? 'VideoObject' : 'Article') !!},
    @if($teachingHasVideo)
    "name": {!! json_encode($teachingTitle) !!},
    "uploadDate": {!! json_encode($teaching->created_at?->toIso8601String()) !!},
    @else
    "headline": {!! json_encode($teachingTitle) !!},
    "datePublished": {!! json_encode($teaching->created_at?->toIso8601String()) !!},
    @endif
    "description": {!! json_encode($teachingDescription) !!},
    "thumbnailUrl": {!! json_encode($teaching->getFeatureImageUrl()) !!},
    "image": {!! json_encode($teaching->getFeatureImageUrl()) !!}
}
</script>
@endsection

@section('main-content')
    <section>
        <div class="breadcrumb-img" style="background-image: url('{{ $teaching->getFeatureImageUrl() }}')">
            <div class="breadcrumb-text-wrap">
                <span>{{ \App\Helpers\Utils::lingual(['Teachings', 'শিক্ষা']) }}</span>
                <h2>{{ $teachingTitle }}</h2>
            </div>
        </div>
    </section>

    <section class="teaching-show pd-top pd-bottom">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ \App\Helpers\Utils::lingual(['Home', 'হোম']) }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('teachings.index') }}">{{ \App\Helpers\Utils::lingual(['Teachings', 'শিক্ষা']) }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $teachingTitle }}</li>
                </ol>
            </nav>
            @if($teaching->prop('gallery_images'))
                <div class="row">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="fotorama" data-ratio="16/10" data-minwidth="100%" data-maxheight="75%" data-fit="cover" data-transition="slide" data-transitionduration="500" data-autoplay="4000" data-arrows="always" data-keyboard="true" data-allowfullscreen="native" data-nav="thumbs" data-transition="crossfade"  >
                            @foreach($teaching->getJson('props', 'gallery_images', []) as $gallery_image)
                                <a href="{{ $teaching->getImageLink($gallery_image) }}"><img src="{{ $teaching->getImageLink($gallery_image) }}" alt="{{ $teachingTitle }}"></a>
                            @endforeach

                            @if($teachingHasVideo)
                                <a href="{{ route('play-video', $teachingHasVideo) }}" data-video="true"><img src="{{ $teaching->getFeatureImageUrl() }}" alt="{{ $teachingTitle }} video"></a>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col">
                    <p>
                        {!! $teaching->prop('body') !!}
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
