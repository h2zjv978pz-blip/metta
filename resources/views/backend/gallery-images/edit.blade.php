<!-- resources/views/backend/gallery_images/create.blade.php -->
@extends('components.backend.layout')

@section('page-title', 'Update Image')

@section('main-content')
    <div class="card">
        <div class="card-header">
            <h4>Update Image Gallery</h4>
        </div>
        <div class="card-body">
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('backend.gallery-images.update', $gallery_image->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- General Error Summary -->
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                        <strong>There were some problems with your input:</strong>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="mb-3">
                    <label for="title" class="form-label">Gallery Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $gallery_image->prop('title')) }}" required>
                </div>

                @include('backend.partials.form.select', ['name' => 'category', 'label' => 'Category', 'options' => \App\Repositories\GalleryImageRepository::$categories, 'required' => true, 'useOld' => $gallery_image->prop('category')])

                <h6 class="c-h6">Feature Image <small class="info">Size: 1000 x 1400</small></h6>

                @if(!empty($gallery_image->prop('feature_image')))
                    <div style="display: flex; flex-wrap: wrap; margin: 8px 0;">
                        <img src="{{ $gallery_image->getFeatureImageUrl() }}" alt="Feature image" style="max-width: 100%; max-height: 80px;">
                    </div>
                @endif

                @include('backend.partials.form.image-file', ['name' => 'feature_image', 'label' => 'Change Feature Image'])

                <h6 class="c-h6">Gallery Images <small class="info">Size: 2000 x 1250</small></h6>

                @if(!empty($gallery_image->getJson('props', 'gallery_images')))
                    <div class="draggable-container" style="display: flex; flex-wrap: wrap; margin: 8px 0;">
                        @foreach($gallery_image->getJson('props', 'gallery_images') as $image_link)
                            <div class="draggable" draggable="true" style="margin: 0 8px 10px 0; text-align: center">
                                <img src="{{ asset('storage/img/' . $image_link) }}" alt="Gallery image {{ $loop->iteration }}" style="max-width: 100px;" draggable="false">
                                <input type="hidden" name="curr_gallery_images[]" value="{{ $image_link }}">
                                <div class="remove-image w-fn mt-1"><i class="fa fa-close"></i> Remove</div>
                            </div>
                        @endforeach
                    </div>
                @endif

                @include('backend.partials.form.image-file', ['name' => 'new_gallery_images', 'label' => 'Add new Gallery Images', 'multiple' => true])


                <div class="mb-3">
{{--                    <a href="{{ route('backend.gallery-images.index') }}" class="btn btn-secondary">Back to Gallery</a>--}}
                    <button type="submit" class="btn btn-primary">Update Gallery</button>
                </div>
            </form>
        </div>
    </div>
@endsection
