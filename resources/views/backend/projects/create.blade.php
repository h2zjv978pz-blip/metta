@extends('components.backend.layout')

@section('page-title', 'Create Project')

@section('main-content')
    <div class="card">
        <div class="card-body">
            @include('backend.partials.lsf-toggle')

            <form action="{{ route('backend.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">
                        @include('backend.partials.form.lsf.lsf-input', ['name' => 'name', 'lang_options' => ['en', 'bn'], 'labels' => ['Project Name', 'প্রজেক্টের নাম'], 'required' => true])
                        @include('backend.partials.form.select', ['name' => 'category', 'label' => 'Project Category', 'options' => $categories, 'useKeys' => true, 'required' => true])
                        @include('backend.partials.form.input', ['name' => 'client', 'label' => 'Client Name'])
                        @include('backend.partials.form.lsf.lsf-input', ['name' => 'location', 'lang_options' => ['en', 'bn'], 'labels' => ['Location', 'অবস্থান']])
                        @include('backend.partials.form.input', ['name' => 'time', 'label' => 'Project Time'])
                        @include('backend.partials.form.lsf.lsf-textarea', ['name' => 'description', 'lang_options' => ['en', 'bn'], 'labels' => ['Project Description', 'বিবরণ'], 'row' => 4])

                        <h6 class="c-h6">Feature Image <small class="info">Size: 1000 x 1400</small></h6>
                        @include('backend.partials.form.image-file', ['name' => 'feature_image', 'label' => 'Feature Image', 'required' => true])

                        <div id="video-input" class="d-none">
                            @include('backend.partials.form.file', ['name' => 'video', 'label' => 'Video File', 'attributes' => ['accept' => 'video/mp4']])
{{--                            @include('backend.partials.form.input', ['name' => 'video', 'label' => 'Video URL'])--}}
                        </div>
                        <div id="image-input">
                            <h6 class="c-h6">Gallery Images <small class="info">Size: 2000 x 1250</small></h6>
                            @include('backend.partials.form.image-file', ['name' => 'gallery_images', 'label' => 'Gallery Images', 'multiple' => true, 'draggable' => true])
                        </div>

                        @include('backend.partials.form.button', ['label' => 'Submit'])
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#category').on('change', function () {
            const selectionText = $('option:selected', this).text();

            if (selectionText.toLowerCase() === 'video') {
                $('#image-input').addClass('d-none');
                $('#video-input').removeClass('d-none');
            }
            else {
                $('#video-input').addClass('d-none');
                $('#image-input').removeClass('d-none');
            }
        });
    </script>
@endsection
