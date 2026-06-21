@extends('frontend.layouts.base')

@section('page-title', 'Image Gallery')

@section('styles')
    <link href="{{ asset('_frontend/vendor/lightbox2/css/lightbox.css') }}" rel="stylesheet" />
@endsection

@section('main-content')
    <section class="pd-top pd-bottom">
        <div class="container">
            <div class="title">
                <img src="{{ asset('_common/img/title-icon.png') }}">
                <span>IMAGE GALLERY</span>
                <h2>
                    @if(!empty($image_gallery))
                        {{ strtoupper($image_gallery->prop('title')) }}
                    @else
                        GALLERIES
                    @endif
                </h2>
            </div>

            @if(!empty($image_gallery) && isset($gallery_images) && $gallery_images->count())
                <div class="row">
                    @foreach($gallery_images as $image)
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                            <div class="card h-100">
                                <a href="{{ asset('storage/img/' . $image) }}" data-lightbox="gallery" data-title="{{ $image_gallery->prop('title') }} Image {{ $loop->iteration }}">
                                    <img src="{{ asset('storage/img/' . $image) }}" class="card-img-top img-thumbnail" alt="{{ $image_gallery->prop('title') }} Image {{ $loop->iteration }}" style="height: 200px; object-fit: cover;">
                                </a>
{{--                                <div class="card-body">--}}
{{--                                    <h5 class="card-title text-center">{{ $image->prop('title') }}</h5>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    @endforeach
                </div>
            @elseif(isset($image_galleries) && $image_galleries->count())
                <div class="row">
                    @foreach($image_galleries as $gallery)
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                            <div class="card h-100">
                                <a href="{{ route('library.image-gallery', ['image_gallery_id' => $gallery->id]) }}">
                                    <img src="{{ $gallery->getImageUrl('feature_image') }}" class="card-img-top img-thumbnail" alt="{{ $gallery->prop('title') }}" style="height: 200px; object-fit: cover;">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{ $gallery->prop('title') }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center">No items found in the gallery.</p>
            @endif
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('_frontend/vendor/lightbox2/js/lightbox.js') }}"></script>
@endsection
