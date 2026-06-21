@extends('components.backend.layout')

@section('page-title', 'Update Audio')

@section('main-content')
    <div class="card">
        <div class="card-body">
            @include('backend.partials.lsf-toggle')

            <form action="{{ route('backend.audios.update', $audio->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">
                        @include('backend.partials.form.lsf.lsf-input', ['name' => 'title', 'lang_options' => ['en', 'bn'], 'labels' => ['Title', 'টাইটেল'], 'useOld' => [$audio, 'props', 'title', 'required' => true]])
                        @include('backend.partials.form.select', ['name' => 'category', 'label' => 'Category', 'options' => \App\Repositories\AudioRepository::$categories, 'required' => true, 'useOld' => $audio->prop('category')])

                        @include('backend.partials.form.file', ['name' => 'audio', 'label' => 'Change Audio File', 'attributes' => ['accept' => '.mp3']])

                        @include('backend.partials.form.button', ['label' => 'Submit', 'method' => 'PATCH'])
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
