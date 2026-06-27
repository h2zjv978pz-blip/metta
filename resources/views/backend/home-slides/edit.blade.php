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

                        <p class="text-muted" style="font-size: 12px;">If set, the Heading below replaces the main "Metta" heading on this slide only.</p>
                        @include('backend.partials.form.lsf.lsf-input', ['name' => 'heading', 'lang_options' => ['en', 'bn'], 'labels' => ['Heading (e.g. site/place name)', 'হেডিং (যেমন স্থানের নাম)'], 'useOld' => [$home_slide, 'props', 'heading']])

                        <div class="row">
                            <div class="col-md-4">
                                @include('backend.partials.form.input', ['name' => 'heading_font_size', 'type' => 'number', 'label' => 'Heading Font Size (px)', 'placeholder' => 'Default', 'useOld' => $home_slide->prop('heading_font_size')])
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Heading Font</label>
                                    <select name="heading_font_family" class="form-control">
                                        <option value="" {{ !$home_slide->prop('heading_font_family') ? 'selected' : '' }}>Default (Poppins)</option>
                                        @foreach(['Poppins', 'Prata', 'Rubik', 'Hind', 'Roboto', 'Noto Sans Bengali'] as $font)
                                            <option value="{{ $font }}" {{ $home_slide->prop('heading_font_family') == $font ? 'selected' : '' }}>{{ $font }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Heading Alignment (horizontal)</label>
                                    <select name="heading_align" class="form-control">
                                        <option value="" {{ !$home_slide->prop('heading_align') ? 'selected' : '' }}>Default</option>
                                        @foreach(['left' => 'Left', 'center' => 'Center', 'right' => 'Right'] as $key => $label)
                                            <option value="{{ $key }}" {{ $home_slide->prop('heading_align') == $key ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Heading Position (vertical)</label>
                                    <select name="heading_valign" class="form-control">
                                        <option value="" {{ !$home_slide->prop('heading_valign') ? 'selected' : '' }}>Default</option>
                                        @foreach(['top' => 'Top', 'middle' => 'Middle', 'bottom' => 'Bottom'] as $key => $label)
                                            <option value="{{ $key }}" {{ $home_slide->prop('heading_valign') == $key ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

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
