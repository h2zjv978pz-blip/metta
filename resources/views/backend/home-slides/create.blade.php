@extends('components.backend.layout')

@section('page-title', 'Create Home Slide')

@section('main-content')
    <div class="card">
        <div class="card-body">
            @include('backend.partials.lsf-toggle')

            <form action="{{ route('backend.tasks', ['task' => 'store-home-slide']) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">
                        @include('backend.partials.form.image-file', ['name' => 'slide_image', 'label' => 'Slide Image', 'required' => true])
                        @include('backend.partials.form.lsf.lsf-input', ['name' => 'title', 'lang_options' => ['en', 'bn'], 'labels' => ['Slide Title', 'টাইটেল']])
                        @include('backend.partials.form.input', ['name' => 'link', 'label' => 'Slide Action Link'])
                        @include('backend.partials.form.button', ['label' => 'Submit'])
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
