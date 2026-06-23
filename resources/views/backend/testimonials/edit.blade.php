@extends('components.backend.layout')

@section('page-title', 'Edit Testimonial')

@section('main-content')
    <div class="card">
        <div class="card-body">
            @include('backend.partials.lsf-toggle')

            <form action="{{ route('backend.tasks', ['task' => 'update-testimonial', 'id' => $testimonial->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">
                        @include('backend.partials.form.lsf.lsf-textarea', ['name' => 'testimonial', 'lang_options' => ['en', 'bn'], 'labels' => ['Testimonial Text', 'মতামত'], 'row' => 3, 'required' => true, 'useOld' => [$testimonial, 'props', 'testimonial']])
                        @include('backend.partials.form.input', ['name' => 'person', 'label' => 'Person Name', 'required' => true, 'useOld' => $testimonial->prop('person')])
                        @include('backend.partials.form.lsf.lsf-input', ['name' => 'designation', 'lang_options' => ['en', 'bn'], 'labels' => ['Designation/Title', 'পদবি'], 'required' => true, 'useOld' => [$testimonial, 'props', 'designation']])
                        @include('backend.partials.form.image-file', ['name' => 'photo', 'label' => 'Person Photo'])
                        @include('backend.partials.form.button', ['label' => 'Submit'])
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
