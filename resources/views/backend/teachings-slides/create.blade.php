@extends('components.backend.layout')

@section('page-title', 'Add Teachings Slide')

@section('main-content')
    <div class="card">
        <div class="card-body">
            @include('backend.partials.lsf-toggle')

            <form action="{{ route('backend.teachings-slides.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">
                        @include('backend.partials.form.lsf.lsf-input', ['name' => 'caption', 'lang_options' => ['en', 'bn'], 'labels' => ['Caption', 'ক্যাপশন'], 'required' => true])

                        <h6 class="c-h6">Slide Image <small class="info">Size: 1600 x 1000</small></h6>
                        @include('backend.partials.form.image-file', ['name' => 'image', 'label' => 'Slide Image', 'required' => true])

                        @include('backend.partials.form.button', ['label' => 'Submit'])
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
