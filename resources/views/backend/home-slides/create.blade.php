@extends('components.backend.layout')

@section('page-title', 'Create Home Slide')

@section('main-content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('backend.tasks', ['task' => 'store-home-slide']) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">
                        @include('backend.partials.form.image-file', ['name' => 'slide_image', 'label' => 'Slide Image', 'required' => true])
                        @include('backend.partials.form.input', ['name' => 'title', 'label' => 'Slide Title'])
                        @include('backend.partials.form.input', ['name' => 'link', 'label' => 'Slide Action Link'])
                        @include('backend.partials.form.button', ['label' => 'Submit'])
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
