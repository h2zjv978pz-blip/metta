@extends('components.backend.layout')

@section('page-title', 'Add Audio')

@section('main-content')
    <div class="card">
        <div class="card-body">
            @include('backend.partials.lsf-toggle')

            <form action="{{ route('backend.audios.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">
                        @include('backend.partials.form.lsf.lsf-input', ['name' => 'title', 'lang_options' => ['en', 'bn'], 'labels' => ['Title', 'টাইটেল'], 'required' => true])
                        @include('backend.partials.form.select', ['name' => 'category', 'label' => 'Category', 'options' => \App\Repositories\AudioRepository::$categories, 'required' => true])

                        <div id="video-input">
                            <h6 class="c-h6">Audio File <small class="info">Format: MP3</small></h6>
                            @include('backend.partials.form.file', ['name' => 'audio', 'label' => 'Audio File', 'attributes' => ['accept' => '.mp3'], 'required' => true])
                        </div>

                        @include('backend.partials.form.button', ['label' => 'Submit'])
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
