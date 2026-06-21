@extends('components.backend.layout')

@section('page-title', 'Edit Testimonial')

@section('main-content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('backend.tasks', ['task' => 'update-testimonial', 'id' => $testimonial->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">
                        @include('backend.partials.form.textarea', ['name' => 'testimonial', 'label' => 'Testimonial Text', 'row' => 3, 'required' => true, 'useOld' => $testimonial->prop('testimonial')])
                        @include('backend.partials.form.input', ['name' => 'person', 'label' => 'Person Name', 'required' => true, 'useOld' => $testimonial->prop('person')])
                        @include('backend.partials.form.input', ['name' => 'designation', 'label' => 'Designation/Title', 'required' => true, 'useOld' => $testimonial->prop('designation')])
                        @include('backend.partials.form.image-file', ['name' => 'photo', 'label' => 'Person Photo'])
                        @include('backend.partials.form.button', ['label' => 'Submit'])
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
