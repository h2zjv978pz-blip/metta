@extends('components.backend.layout')

@section('page-title', 'About Us')

@section('main-content')
    @php $au = $data['aboutUs']; @endphp

    <div class="card">
        <div class="card-header">
            <div class="card-title">About Us Page Content</div>
        </div>
        <div class="card-body">
            @include('backend.partials.lsf-toggle')

            <form action="{{ route('backend.tasks', ['task' => 'save-about-us']) }}" method="POST">
                @csrf

                @include('backend.partials.form.input', ['name' => 'page_title', 'lsf' => 'en', 'label' => 'Page Title (English)', 'useOld' => $au['page_title']])
                @include('backend.partials.form.input', ['name' => 'page_title', 'lsf' => 'bn', 'label' => 'Page Title (বাংলা)', 'useOld' => $au['page_title_bn']])

                @include('backend.partials.form.textarea', ['name' => 'intro_body', 'lsf' => 'en', 'label' => 'Intro / Welcome (English)', 'row' => 5, 'useOld' => $au['intro_body']])
                @include('backend.partials.form.textarea', ['name' => 'intro_body', 'lsf' => 'bn', 'label' => 'Intro / Welcome (বাংলা)', 'row' => 5, 'useOld' => $au['intro_body_bn']])

                @include('backend.partials.form.textarea', ['name' => 'mission_body', 'lsf' => 'en', 'label' => 'Our Mission (English)', 'row' => 5, 'useOld' => $au['mission_body']])
                @include('backend.partials.form.textarea', ['name' => 'mission_body', 'lsf' => 'bn', 'label' => 'Our Mission (বাংলা)', 'row' => 5, 'useOld' => $au['mission_body_bn']])

                @include('backend.partials.form.textarea', ['name' => 'sites_body', 'lsf' => 'en', 'label' => 'Unveiling Sacred Sites (English)', 'row' => 5, 'useOld' => $au['sites_body']])
                @include('backend.partials.form.textarea', ['name' => 'sites_body', 'lsf' => 'bn', 'label' => 'Unveiling Sacred Sites (বাংলা)', 'row' => 5, 'useOld' => $au['sites_body_bn']])

                @include('backend.partials.form.textarea', ['name' => 'teachings_body', 'lsf' => 'en', 'label' => "Illuminating Buddha's Teachings (English)", 'row' => 5, 'useOld' => $au['teachings_body']])
                @include('backend.partials.form.textarea', ['name' => 'teachings_body', 'lsf' => 'bn', 'label' => "Illuminating Buddha's Teachings (বাংলা)", 'row' => 5, 'useOld' => $au['teachings_body_bn']])

                @include('backend.partials.form.textarea', ['name' => 'explorations_body', 'lsf' => 'en', 'label' => 'Explorations (English)', 'row' => 8, 'useOld' => $au['explorations_body']])
                @include('backend.partials.form.textarea', ['name' => 'explorations_body', 'lsf' => 'bn', 'label' => 'Explorations (বাংলা)', 'row' => 8, 'useOld' => $au['explorations_body_bn']])

                @include('backend.partials.form.button', ['label' => 'Submit'])
            </form>
        </div>
    </div>
@endsection
