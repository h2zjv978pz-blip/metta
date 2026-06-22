@extends('frontend.layouts.base')

@php
    $bsName = \App\Helpers\Utils::lingual([$buddhist_site->name, $buddhist_site->getJson('description', 'name', $buddhist_site->name)]);
    $bsLocation = \App\Helpers\Utils::lingual([$buddhist_site->location_name, $buddhist_site->getJson('description', 'location_name', $buddhist_site->location_name)]);
    $bsIntro = \Illuminate\Support\Str::limit(\App\Helpers\Utils::getPlainText($buddhist_site->getJson('description', 'intro', '')), 160);
@endphp

@section('page-title', $bsName)
@section('meta-description', $bsIntro ?: $bsName)
@section('og-image', $buddhist_site->getFeatureImageUrl())

@section('structured-data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "LandmarksOrHistoricalBuildings",
    "name": {!! json_encode($bsName) !!},
    "description": {!! json_encode($bsIntro) !!},
    "image": {!! json_encode($buddhist_site->getFeatureImageUrl()) !!},
    "address": {!! json_encode($bsLocation) !!},
    "url": {!! json_encode(url()->current()) !!}
}
</script>
@endsection

@section('main-content')
    <section  class="pd-top pd-bottom">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ \App\Helpers\Utils::lingual(['Home', 'হোম']) }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('buddhist-sites.index') }}">{{ \App\Helpers\Utils::lingual(['Buddhist Sites', 'বৌদ্ধ স্থান']) }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $bsName }}</li>
                </ol>
            </nav>
            <div class="title">
                <img src="{{ asset('_common/img/title-icon.png') }}" alt="">
                <span>{{ \App\Helpers\Utils::lingual(['Buddhist Site', 'বৌদ্ধ স্থান']) }}</span>
                <h2>{{ $bsName }}</h2>
            </div>

            <div class="row">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="fotorama" data-ratio="16/10" data-minwidth="100%" data-maxheight="75%" data-fit="cover" data-transition="slide" data-transitionduration="500" data-autoplay="4000" data-arrows="always" data-keyboard="true" data-allowfullscreen="native" data-nav="thumbs" data-transition="crossfade"  >
                        @foreach($buddhist_site->getJson('media', 'gallery_images', []) as $gallery_image)
                            <a href="{{ $buddhist_site->getImageLink($gallery_image) }}"><img src="{{ $buddhist_site->getImageLink($gallery_image) }}" alt="{{ $bsName }}"></a>
                        @endforeach

{{--                        <a href="{{ asset('_common/img/buddhist_site/pexels-lu-zhao-16773960.jpg') }}"><img src="{{ asset('_common/img/buddhist_site/pexels-lu-zhao-16773960.jpg') }}"></a>--}}
{{--                        <a href="{{ asset('_common/img/buddhist_site/pexels-pixabay-415708.jpg')}}"><img src="{{ asset('_common/img/buddhist_site/pexels-pixabay-415708.jpg')}}"></a>--}}
{{--                        <a href="{{ asset('_common/img/buddhist_site/pexels-joel-m-b-marrinan-6060183.jpg') }}"><img src="{{ asset('_common/img/buddhist_site/pexels-joel-m-b-marrinan-6060183.jpg') }}"></a>--}}
{{--                        <a href="{{ asset('_common/img/buddhist_site/pexels-sirinat-inopas-246935.jpg') }}"><img src="{{ asset('_common/img/buddhist_site/pexels-sirinat-inopas-246935.jpg') }}"></a>--}}
{{--                        <a href="{{ asset('_common/img/buddhist_site/pexels-pixabay-415708.jpg')}}"><img src="{{ asset('_common/img/buddhist_site/pexels-pixabay-415708.jpg')}}"></a>--}}
{{--                        <a href="{{ asset('_common/img/buddhist_site/pexels-joel-m-b-marrinan-6060183.jpg') }}"><img src="{{ asset('_common/img/buddhist_site/pexels-joel-m-b-marrinan-6060183.jpg') }}"></a>--}}
{{--                        <a href="{{ asset('_common/img/buddhist_site/pexels-sirinat-inopas-246935.jpg') }}"><img src="{{ asset('_common/img/buddhist_site/pexels-sirinat-inopas-246935.jpg') }}"></a>--}}
{{--                        <a href="{{ asset('_common/img/buddhist_site/pexels-lu-zhao-16773960.jpg') }}"><img src="{{ asset('_common/img/buddhist_site/pexels-lu-zhao-16773960.jpg') }}"></a>--}}
                        @if($buddhist_site->getJson('media', 'video'))
                            <a href="{{ route('play-video', $buddhist_site->getJson('media', 'video')) }}" data-video="true"><img src="{{ $buddhist_site->getFeatureImageUrl() }}" alt="{{ $bsName }} video"></a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="bdd-sites-d-tx mt-5">
                <h2>{{ $bsName }}, {{ $bsLocation }}</h2>
                <p>
                    {!! $buddhist_site->getJson('description', 'intro') !!}
                </p>

                @if($buddhist_site->getJson('description', 'history'))
                    <div class="row bdd-sites-d-tx mt-5">
                        <div class="col-lg-6 col-12">
                            <h3>{{ \App\Helpers\Utils::lingual(['History', 'ইতিহাস']) }}</h3>
                            <p>
                                {!! $buddhist_site->getJson('description', 'history') !!}
                            </p>
                        </div>
                        <div class="col-lg-6 col-12 d-flex align-items-center flex-column SinglePopUpImg mb-4">
                            <a href="{{ $buddhist_site->getFeatureImageUrl() }}"><img src="{{ $buddhist_site->getFeatureImageUrl() }}" alt="{{ $bsName }}"></a>
                            <p class="pt-1">Image: {{ $bsName }}</p>
                        </div>
                    </div>
                @endif
            </div>

            <div class="row PopUpImg bdd-sites-d-tx">
                @if($buddhist_site->getJson('description', 'architecture'))
                    <div class="col-lg-6 col-12">
                        <h3>{{ \App\Helpers\Utils::getContentLang() == 'bn' ? 'আর্কিটেকচার তথ্যাবলী' : 'Architecture' }}</h3>
                        <p>
                            {!! $buddhist_site->getJson('description', 'architecture') !!}
                        </p>
                    </div>
                @endif
                @if($buddhist_site->getJson('media', 'arch_images'))
                    @if(!$buddhist_site->getJson('description', 'architecture'))
                        <h3 class="col-12">{{ \App\Helpers\Utils::getContentLang() == 'bn' ? 'আর্কিটেকচার তথ্যাবলী' : 'Architecture' }}</h3>
                    @endif

                    <div class="{{ $buddhist_site->getJson('description', 'architecture') ? 'col-lg-6' : '' }} col-12">
                        <div class="row">
                            @foreach($buddhist_site->getJson('media', 'arch_images') as $image)
                                <div class="col-lg-6 col-md-6 col-12 mt-4"><a href="{{ $buddhist_site->getImageLink($image)  }}"><img src="{{ $buddhist_site->getImageLink($image)  }}" alt="{{ $bsName }} architecture"></a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <div class="row bdd-sites-d-tx pt-5">
               @if($buddhist_site->getJson('description', 'how_to_go'))
                    <div class="col-lg-6 col-12">
                        <h4>{{ \App\Helpers\Utils::getContentLang() == 'bn' ? 'কিভাবে যাবেন' : 'How to Go' }}</h4>
                        <p>
                            {!! $buddhist_site->getJson('description', 'how_to_go') !!}
                        </p>
                    </div>
               @endif
               @if($buddhist_site->getJson('description', 'where_to_stay'))
                       <div class="col-lg-6 col-12">
                           <h4>{{ \App\Helpers\Utils::getContentLang() == 'bn' ? 'কোথায় থাকবেন' : 'Where to stay' }}</h4>
                           <p>
                               {!! $buddhist_site->getJson('description', 'where_to_stay') !!}
                           </p>
                       </div>
               @endif
            </div>

            {{--MAP--}}
            @if(!empty($buddhist_site->map_location))
                <div class="my-4">
                    <iframe src="{{ $buddhist_site->map_location }}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            @endif

{{--            <div class="d-flex align-items-center flex-column SinglePopUpImg">--}}
{{--                <a href="{{ asset('_common/img/buddhist_site/pexels-pixabay-415708.jpg')}}"><img src="{{ asset('_common/img/buddhist_site/pexels-pixabay-415708.jpg')}}"></a>--}}
{{--            </div>--}}
        </div>
    </section>
@endsection
