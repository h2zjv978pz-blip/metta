@extends('components.backend.layout')

@section('page-title', 'Add Teaching')

@section('main-content')
    <div class="card">
        <div class="card-body">
            @include('backend.partials.lsf-toggle')

            <form action="{{ route('backend.teachings.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">
                        @include('backend.partials.form.lsf.lsf-input', ['name' => 'title', 'lang_options' => ['en', 'bn'], 'labels' => ['Title', 'টাইটেল'], 'required' => true])
                        @include('backend.partials.form.lsf.lsf-input', ['name' => 'author', 'lang_options' => ['en', 'bn'], 'labels' => ['Author Name', 'লেখক']])
                        @include('backend.partials.form.lsf.lsf-textarea', ['name' => 'body', 'lang_options' => ['en', 'bn'], 'labels' => ['Teaching Content', 'কন্টেন্ট'], 'row' => 15, 'wysiwyg' => true, 'required' => true])

                        <h6 class="c-h6">Feature Image <small class="info">Size: 2000 x 1250</small></h6>
                        @include('backend.partials.form.image-file', ['name' => 'feature_image', 'label' => 'Feature Image', 'required' => true])

                        <div id="image-input">
                            <h6 class="c-h6">Gallery Images <small class="info">Size: 2000 x 1250</small></h6>
                            @include('backend.partials.form.image-file', ['name' => 'gallery_images', 'label' => 'Gallery Images', 'multiple' => true, 'draggable' => true])
                        </div>

                        <div id="video-input">
                            <h6 class="c-h6">Gallery Video <small class="info">Format: MP4</small></h6>

                            @include('backend.partials.form.file', ['name' => 'video', 'label' => 'Video File', 'attributes' => ['accept' => 'video/mp4']])
                        </div>

                        @include('backend.partials.form.button', ['label' => 'Submit'])
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
