@extends('components.backend.layout')

@section('page-title', 'Menu Settings')

@section('main-content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Logo Settings</div>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.tasks', ['task' => 'save-menu-settings']) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">
                        <div class="form-group">
                            <label class="form-control-label">Desktop Logo</label>
                            @if($data['menuSettings']?->prop('logo_desktop'))
                                <div class="mb-2">
                                    <img src="{{ asset('storage/img/' . $data['menuSettings']->prop('logo_desktop')) }}" style="max-height: 80px; max-width: 100%;">
                                </div>
                            @endif
                        </div>
                        @include('backend.partials.form.image-file', ['name' => 'logo_desktop', 'label' => 'Replace Desktop Logo'])
                        @include('backend.partials.form.input', ['name' => 'logo_desktop_width', 'label' => 'Desktop Logo Width (px)', 'type' => 'number', 'useOld' => $data['menuSettings']?->prop('logo_desktop_width'), 'placeholder' => '200'])

                        <div class="form-group">
                            <label class="form-control-label">Mobile Logo</label>
                            @if($data['menuSettings']?->prop('logo_mobile'))
                                <div class="mb-2">
                                    <img src="{{ asset('storage/img/' . $data['menuSettings']->prop('logo_mobile')) }}" style="max-height: 60px; max-width: 100%;">
                                </div>
                            @endif
                        </div>
                        @include('backend.partials.form.image-file', ['name' => 'logo_mobile', 'label' => 'Replace Mobile Logo'])
                        @include('backend.partials.form.input', ['name' => 'logo_mobile_width', 'label' => 'Mobile Logo Width (px)', 'type' => 'number', 'useOld' => $data['menuSettings']?->prop('logo_mobile_width'), 'placeholder' => '150'])

                        @include('backend.partials.form.button', ['label' => 'Submit'])
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
