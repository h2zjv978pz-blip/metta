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

                        <p class="text-muted" style="font-size: 12px;">If set, the Heading below replaces the main "Metta" heading on this slide only.</p>
                        @include('backend.partials.form.lsf.lsf-input', ['name' => 'heading', 'lang_options' => ['en', 'bn'], 'labels' => ['Heading (e.g. site/place name)', 'হেডিং (যেমন স্থানের নাম)']])

                        <div class="row">
                            <div class="col-md-4">
                                @include('backend.partials.form.input', ['name' => 'heading_font_size', 'type' => 'number', 'label' => 'Heading Font Size (px)', 'placeholder' => 'Default'])
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Heading Font</label>
                                    <select name="heading_font_family" class="form-control">
                                        <option value="">Default (Poppins)</option>
                                        @foreach(['Poppins', 'Prata', 'Rubik', 'Hind', 'Roboto', 'Noto Sans Bengali'] as $font)
                                            <option value="{{ $font }}">{{ $font }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Heading Alignment</label>
                                    <select name="heading_align" class="form-control">
                                        <option value="">Default</option>
                                        @foreach(['left' => 'Left', 'center' => 'Center', 'right' => 'Right'] as $key => $label)
                                            <option value="{{ $key }}">{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        @include('backend.partials.form.lsf.lsf-input', ['name' => 'title', 'lang_options' => ['en', 'bn'], 'labels' => ['Slide Title', 'টাইটেল']])
                        @include('backend.partials.form.input', ['name' => 'link', 'label' => 'Slide Action Link'])
                        @include('backend.partials.form.input', ['name' => 'note', 'label' => 'Admin Note (not shown on site)'])
                        @include('backend.partials.form.button', ['label' => 'Submit'])
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
