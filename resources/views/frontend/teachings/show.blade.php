@extends('frontend.layouts.base')

@section('page-title', 'Teaching Show')

@section('main-content')
    <section>
        <div class="breadcrumb-img" style="background-image: url('{{ $teaching->getFeatureImageUrl() }}')">
            <div class="breadcrumb-text-wrap">
                <span>{{ \App\Helpers\Utils::lingual(['Teachings', 'শিক্ষা']) }}</span>
                <h2>{{ $teaching->prop('title') }}</h2>
            </div>
        </div>
    </section>

    <section class="teaching-show pd-top pd-bottom">
        <div class="container">
            @if($teaching->prop('gallery_images'))
                <div class="row">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="fotorama" data-ratio="16/10" data-minwidth="100%" data-maxheight="75%" data-fit="cover" data-transition="slide" data-transitionduration="500" data-autoplay="4000" data-arrows="always" data-keyboard="true" data-allowfullscreen="native" data-nav="thumbs" data-transition="crossfade"  >
                            @foreach($teaching->getJson('props', 'gallery_images', []) as $gallery_image)
                                <a href="{{ $teaching->getImageLink($gallery_image) }}"><img src="{{ $teaching->getImageLink($gallery_image) }}"></a>
                            @endforeach

                            @if($teaching->getJson('props', 'video'))
                                <a href="{{ route('play-video', $teaching->getJson('props', 'video')) }}" data-video="true"><img src="{{ $teaching->getFeatureImageUrl() }}"></a>
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
