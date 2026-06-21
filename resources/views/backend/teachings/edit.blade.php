@extends('components.backend.layout')

@section('page-title', 'Update Teaching')

@section('main-content')
    <div class="card">
        <div class="card-body">
            @include('backend.partials.lsf-toggle')

            <form action="{{ route('backend.teachings.update', $teaching->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">
                        @include('backend.partials.form.lsf.lsf-input', ['name' => 'title', 'lang_options' => ['en', 'bn'], 'labels' => ['Title', 'টাইটেল'], 'useOld' => [$teaching, 'props', 'title', 'required' => true]])
                        @include('backend.partials.form.lsf.lsf-input', ['name' => 'author', 'lang_options' => ['en', 'bn'], 'labels' => ['Author Name', 'লেখক'], 'useOld' => [$teaching, 'props', 'author']])
                        @include('backend.partials.form.lsf.lsf-textarea', ['name' => 'body', 'lang_options' => ['en', 'bn'], 'labels' => ['Teaching Content', 'কন্টেন্ট'], 'row' => 15, 'wysiwyg' => true, 'useOld' => [$teaching, 'props', 'body', 'required' => true]])

                        <h6 class="c-h6">Feature Image <small class="info">Size: 2000 x 1250</small></h6>

                        @if(!!$teaching->prop('feature_image'))
                            <div style="display: flex; flex-wrap: wrap; margin: 8px 0;">
                                <img src="{{ $teaching->getFeatureImageUrl() }}" alt="Feature image" style="max-width: 100%; max-height: 80px;">
                            </div>
                        @endif

                        @include('backend.partials.form.image-file', ['name' => 'feature_image', 'label' => 'Change Feature Image'])

                        <h6 class="c-h6">Gallery Images <small class="info">Size: 2000 x 1250</small></h6>

                        @if(!empty($teaching->prop('gallery_images')))
                            <div class="draggable-container" style="display: flex; flex-wrap: wrap; margin: 8px 0;">
                                @foreach($teaching->prop('gallery_images') as $image_link)
                                    <div class="draggable" draggable="true" style="margin: 0 8px 10px 0; text-align: center">
                                        <img src="{{ asset('storage/img/' . $image_link) }}" alt="Gallery image {{ $loop->iteration }}" style="max-width: 100px;" draggable="false">
                                        <input type="hidden" name="curr_gallery_images[]" value="{{ $image_link }}">
                                        <div class="remove-image w-fn mt-1"><i class="fa fa-close"></i> Remove</div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        @include('backend.partials.form.image-file', ['name' => 'new_gallery_images', 'label' => 'Add new Gallery Images', 'multiple' => true])

                        @include('backend.partials.form.file', ['name' => 'video', 'label' => 'Change Video File', 'attributes' => ['accept' => 'video/mp4']])

                        @include('backend.partials.form.button', ['label' => 'Submit', 'method' => 'PATCH'])
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
