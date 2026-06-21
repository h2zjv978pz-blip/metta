@extends('components.backend.layout')

@section('page-title', 'Update Teachings Slide')

@section('main-content')
    <div class="card">
        <div class="card-body">
            @include('backend.partials.lsf-toggle')

            <form action="{{ route('backend.teachings-slides.update', $teachings_slide->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">
                        @include('backend.partials.form.lsf.lsf-input', ['name' => 'caption', 'lang_options' => ['en', 'bn'], 'labels' => ['Caption', 'ক্যাপশন'], 'useOld' => [$teachings_slide, 'props', 'caption', 'required' => true]])

                        <h6 class="c-h6">Slide Image <small class="info">Size: 1600 x 1000</small></h6>

                        @if(!!$teachings_slide->prop('image'))
                            <div style="display: flex; flex-wrap: wrap; margin: 8px 0;">
                                <img src="{{ asset('storage/img/' . $teachings_slide->prop('image')) }}" alt="Slide image" style="max-width: 100%; max-height: 80px;">
                            </div>
                        @endif

                        @include('backend.partials.form.image-file', ['name' => 'image', 'label' => 'Change Slide Image'])

                        @include('backend.partials.form.button', ['label' => 'Submit', 'method' => 'PATCH'])
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
