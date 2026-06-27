@extends('components.backend.layout')

@section('page-title', 'Edit Home Slide')

@section('main-content')
    <div class="card">
        <div class="card-body">
            @include('backend.partials.lsf-toggle')

            <form action="{{ route('backend.tasks', ['task' => 'update-home-slide', 'id' => $home_slide->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">
                        @include('backend.partials.form.image-file', ['name' => 'slide_image', 'label' => 'Slide Image', 'useOld' => $home_slide->prop('image')])
                        @include('backend.partials.form.lsf.lsf-input', ['name' => 'title', 'lang_options' => ['en', 'bn'], 'labels' => ['Slide Title', 'টাইটেল'], 'useOld' => [$home_slide, 'props', 'title']])
                        @include('backend.partials.form.input', ['name' => 'link', 'label' => 'Slide Action Link', 'useOld' => $home_slide->prop('link')])
                        @include('backend.partials.form.input', ['name' => 'note', 'label' => 'Admin Note (not shown on site)', 'useOld' => $home_slide->prop('note')])
                        @include('backend.partials.form.button', ['label' => 'Submit'])
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
