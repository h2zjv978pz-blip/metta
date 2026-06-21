@extends('components.backend.layout')

@section('page-title', 'Create Buddhist Site')

@section('main-content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('backend.buddhist-sites.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">
                        @include('backend.partials.lsf-toggle')

                        @include('backend.partials.form.input', ['name' => 'name', 'label' => 'Site Name', 'lsf' => 'en', 'required' => true])
                        @include('backend.partials.form.input', ['name' => 'name', 'label' => 'স্থানের নাম', 'lsf' => 'bn'])

                        @include('backend.partials.form.select', ['name' => 'country_id', 'label' => 'Country', 'options' => $countries, 'useKeys' => true, 'title' => 'Select Country', 'required' => true])
                        @include('backend.partials.form.textarea', ['name' => 'map_location', 'label' => 'Map Location (Embed Link)', 'row' => 3])

                        @include('backend.partials.form.input', ['name' => 'location_name', 'label' => 'Location Name', 'lsf' => 'en', 'required' => true])
                        @include('backend.partials.form.input', ['name' => 'location_name', 'label' => 'লোকেশন', 'lsf' => 'bn'])

                        @include('backend.partials.form.lsf.lsf-textarea', ['name' => 'intro', 'labels' => ['Intro/Overview', 'ভূমিকা'], 'wysiwyg' => true, 'row' => 6, 'required' => true])
                        @include('backend.partials.form.lsf.lsf-textarea', ['name' => 'history', 'labels' => ['History', 'ইতিহাস'], 'wysiwyg' => true, 'row' => 10, 'required' => true])
                        @include('backend.partials.form.lsf.lsf-textarea', ['name' => 'architecture', 'labels' => ['Architecture Details', 'আর্কিটেকচার তথ্যাবলী'], 'wysiwyg' => true, 'row' => 10])
                        @include('backend.partials.form.lsf.lsf-textarea', ['name' => 'how_to_go', 'labels' => ['How to Go', 'কিভাবে যাবেন'], 'wysiwyg' => true, 'row' => 8])
                        @include('backend.partials.form.lsf.lsf-textarea', ['name' => 'where_to_stay', 'labels' => ['Where to Stay', 'কোথায় থাকবেন'], 'wysiwyg' => true, 'row' => 8])

                        <h6 class="c-h6">Feature Image <small class="info">Size: 2000 x 1250</small></h6>
                        @include('backend.partials.form.image-file', ['name' => 'feature_image', 'label' => 'Feature Image', 'required' => true])

                        <div id="image-input">
                            <h6 class="c-h6">Architecture Images <small class="info">Size: 2000 x 1250</small></h6>
                            @include('backend.partials.form.image-file', ['name' => 'arch_images', 'label' => 'Architecture Images', 'multiple' => true])
                        </div>

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
