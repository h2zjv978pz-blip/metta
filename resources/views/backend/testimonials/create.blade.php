@extends('components.backend.layout')

@section('page-title', 'Create Testimonial')

@section('main-content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('backend.tasks', ['task' => 'store-testimonial']) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">
                        @include('backend.partials.form.textarea', ['name' => 'testimonial', 'label' => 'Testimonial Text', 'row' => 3, 'required' => true])
                        @include('backend.partials.form.input', ['name' => 'person', 'label' => 'Person Name', 'required' => true])
                        @include('backend.partials.form.input', ['name' => 'designation', 'label' => 'Designation/Title', 'required' => true])
                        @include('backend.partials.form.image-file', ['name' => 'photo', 'label' => 'Person Photo'])
                        @include('backend.partials.form.button', ['label' => 'Submit'])
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
