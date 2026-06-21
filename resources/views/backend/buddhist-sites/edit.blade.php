@extends('components.backend.layout')

@section('page-title', 'Edit Buddhist Site')

@section('main-content')
    <form action="{{ route('backend.buddhist-sites.update', $buddhist_site->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">
                        @include('backend.partials.lsf-toggle')

                        @include('backend.partials.form.input', ['name' => 'name', 'label' => 'Site Name', 'lsf' => 'en', 'required' => true, 'useOld' => $buddhist_site->name])
                        @include('backend.partials.form.input', ['name' => 'name', 'label' => 'স্থানের নাম', 'lsf' => 'bn', 'useOld' => $buddhist_site->getJson('description', 'name_bn')])

                        @include('backend.partials.form.select', ['name' => 'country_id', 'label' => 'Country', 'options' => $countries, 'useKeys' => true, 'title' => 'Select Country', 'useOld' => $buddhist_site->country_id])
                        @include('backend.partials.form.textarea', ['name' => 'map_location', 'label' => 'Map Location (Embed Link)', 'row' => 3, 'useOld' => $buddhist_site->map_location])

                        @include('backend.partials.form.input', ['name' => 'location_name', 'label' => 'Location Name', 'lsf' => 'en', 'required' => true, 'useOld' => $buddhist_site->location_name])
                        @include('backend.partials.form.input', ['name' => 'location_name', 'label' => 'লোকেশন', 'lsf' => 'bn', 'useOld' => $buddhist_site->getJson('description', 'location_name_bn')])

                        @include('backend.partials.form.lsf.lsf-textarea', ['name' => 'intro', 'labels' => ['Intro/Overview', 'ভূমিকা'], 'wysiwyg' => true, 'row' => 6, 'required' => true, 'useOld' => [$buddhist_site, 'description', 'intro']])
                        @include('backend.partials.form.lsf.lsf-textarea', ['name' => 'history', 'labels' => ['History', 'ইতিহাস'], 'wysiwyg' => true, 'row' => 10, 'required' => true, 'useOld' => [$buddhist_site, 'description', 'history']])
                        @include('backend.partials.form.lsf.lsf-textarea', ['name' => 'architecture', 'labels' => ['Architecture Details', 'আর্কিটেকচার তথ্যাবলী'], 'wysiwyg' => true, 'row' => 10, 'useOld' => [$buddhist_site, 'description', 'architecture']])
                        @include('backend.partials.form.lsf.lsf-textarea', ['name' => 'how_to_go', 'labels' => ['How to Go', 'কিভাবে যাবেন'], 'wysiwyg' => true, 'row' => 8, 'useOld' => [$buddhist_site, 'description', 'how_to_go']])
                        @include('backend.partials.form.lsf.lsf-textarea', ['name' => 'where_to_stay', 'labels' => ['Where to Stay', 'কোথায় থাকবেন'], 'wysiwyg' => true, 'row' => 8, 'useOld' => [$buddhist_site, 'description', 'where_to_stay']])

{{--                        @include('backend.partials.form.textarea', ['name' => 'intro', 'label' => 'Intro/Overview', 'row' => 6, 'useOld' => $buddhist_site->getJson('description', 'intro')])--}}
{{--                        @include('backend.partials.form.textarea', ['name' => 'history', 'label' => 'History', 'fcClasses' => 'summernote', 'row' => 10, 'useOld' => $buddhist_site->getJson('description', 'history')])--}}
{{--                        @include('backend.partials.form.textarea', ['name' => 'architecture', 'label' => 'Architecture Details', 'fcClasses' => 'summernote', 'row' => 10, 'useOld' => $buddhist_site->getJson('description', 'architecture')])--}}
{{--                        @include('backend.partials.form.textarea', ['name' => 'how_to_go', 'label' => 'How to Go', 'row' => 8, 'fcClasses' => 'summernote', 'useOld' => $buddhist_site->getJson('description', 'how_to_go')])--}}
{{--                        @include('backend.partials.form.textarea', ['name' => 'where_to_stay', 'label' => 'Where to Stay', 'row' => 8, 'fcClasses' => 'summernote', 'useOld' => $buddhist_site->getJson('description', 'where_to_stay')])--}}

                        <h6 class="c-h6">Feature Image <small class="info">Size: 1000 x 1400</small></h6>

                        @if(!empty($buddhist_site->feature_image))
                            <div style="display: flex; flex-wrap: wrap; margin: 8px 0;">
                                <img src="{{ $buddhist_site->getFeatureImageUrl() }}" alt="Feature image" style="max-width: 100%; max-height: 80px;">
                            </div>
                        @endif

                        @include('backend.partials.form.image-file', ['name' => 'feature_image', 'label' => 'Change Feature Image'])

                        @include('backend.partials.form.file', ['name' => 'video', 'label' => 'Change Video File', 'attributes' => ['accept' => 'video/mp4']])

                        <h6 class="c-h6">Architecture Images <small class="info">Size: 2000 x 1250</small></h6>

                        @if(!empty($buddhist_site->getJson('media', 'arch_images')))
                            <div class="draggable-container" style="display: flex; flex-wrap: wrap; margin: 8px 0;">
                                @foreach($buddhist_site->getJson('media', 'arch_images') as $image_link)
                                    <div class="draggable" draggable="true" style="margin: 0 8px 10px 0; text-align: center">
                                        <img src="{{ asset('storage/img/' . $image_link) }}" alt="Architecture image {{ $loop->iteration }}" style="max-width: 100px;" draggable="false">
                                        <input type="hidden" name="curr_arch_images[]" value="{{ $image_link }}">
                                        <div class="remove-image w-fn mt-1"><i class="fa fa-close"></i> Remove</div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        @include('backend.partials.form.image-file', ['name' => 'new_arch_images', 'label' => 'Add new Architecture Images', 'multiple' => true])

                        <h6 class="c-h6">Gallery Images <small class="info">Size: 2000 x 1250</small></h6>

                        @if(!empty($buddhist_site->getJson('media', 'gallery_images')))
                            <div class="draggable-container" style="display: flex; flex-wrap: wrap; margin: 8px 0;">
                                @foreach($buddhist_site->getJson('media', 'gallery_images') as $image_link)
                                    <div class="draggable" draggable="true" style="margin: 0 8px 10px 0; text-align: center">
                                        <img src="{{ asset('storage/img/' . $image_link) }}" alt="Gallery image {{ $loop->iteration }}" style="max-width: 100px;" draggable="false">
                                        <input type="hidden" name="curr_gallery_images[]" value="{{ $image_link }}">
                                        <div class="remove-image w-fn mt-1"><i class="fa fa-close"></i> Remove</div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        @include('backend.partials.form.image-file', ['name' => 'new_gallery_images', 'label' => 'Add new Gallery Images', 'multiple' => true])

                        @include('backend.partials.form.button', ['label' => 'Submit', 'method' => 'PATCH'])
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">

                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
