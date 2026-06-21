@extends('components.backend.layout')

@section('page-title', 'Edit Project')

@section('main-content')
    <form action="{{ route('backend.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">
                        @include('backend.partials.form.input', ['name' => 'name', 'label' => 'Project Name', 'required' => true, 'useOld' => $project->prop('name')])
                        @include('backend.partials.form.select', ['name' => 'category', 'label' => 'Project Category', 'options' => $categories, 'useKeys' => true, 'required' => true, 'useOld' => $project->parent_id])
                        @include('backend.partials.form.input', ['name' => 'client', 'label' => 'Client Name', 'useOld' => $project->prop('client')])
                        @include('backend.partials.form.input', ['name' => 'location', 'label' => 'Location', 'useOld' => $project->prop('location')])
                        @include('backend.partials.form.input', ['name' => 'time', 'label' => 'Project Time', 'useOld' => $project->prop('time')])
                        @include('backend.partials.form.textarea', ['name' => 'description', 'label' => 'Project Description', 'row' => 4, 'useOld' => $project->prop('description')])

                        <h6 class="c-h6">Feature Image <small class="info">Size: 1000 x 1400</small></h6>

                        @if($project->prop('feature_image'))
                            <div style="display: flex; flex-wrap: wrap; margin: 8px 0;">
                                <img src="{{ $project->getImageUrl('feature_image') }}" alt="Feature image" style="max-width: 100%; max-height: 80px;">
                            </div>
                        @endif

                        @include('backend.partials.form.image-file', ['name' => 'feature_image', 'label' => 'Change Feature Image'])

                        @if($project->is_it('video_project'))
                            @include('backend.partials.form.file', ['name' => 'video', 'label' => 'Change Video File', 'attributes' => ['accept' => 'video/mp4']])
                        @else
                            <h6 class="c-h6">Gallery Images <small class="info">Size: 2000 x 1250</small></h6>

                            @if(!empty($project->prop('gallery_images')))
                                <div class="draggable-container" style="display: flex; flex-wrap: wrap; margin: 8px 0;">
                                    @foreach($project->prop('gallery_images') as $image_link)
                                        <div class="draggable" draggable="true" style="margin: 0 8px 10px 0; text-align: center">
                                            <img src="{{ asset('storage/img/' . $image_link) }}" alt="Project image {{ $loop->iteration }}" style="max-width: 100px;" draggable="false">
                                            <input type="hidden" name="curr_gallery_images[]" value="{{ $image_link }}">
                                            <div class="remove-image w-fn mt-1"><i class="fa fa-close"></i> Remove</div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            @include('backend.partials.form.image-file', ['name' => 'new_gallery_images', 'label' => 'Add new Gallery Images', 'multiple' => true])
                        @endif

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
