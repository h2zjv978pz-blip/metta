<!-- resources/views/backend/gallery_images/create.blade.php -->
@extends('components.backend.layout')

@section('page-title', 'Add New Image')

@section('main-content')
    <div class="card">
        <div class="card-header">
            <h4>Add New Gallery</h4>
        </div>
        <div class="card-body">
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('backend.gallery-images.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

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
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                </div>

                @include('backend.partials.form.select', ['name' => 'category', 'label' => 'Category', 'options' => \App\Repositories\GalleryImageRepository::$categories, 'required' => true])

                <h6 class="c-h6">Feature Image</h6>
                @include('backend.partials.form.image-file', ['name' => 'feature_image', 'label' => 'Feature Image File', 'required' => true])

                <div id="image-input">
                    <h6 class="c-h6">Gallery Images</h6>
                    @include('backend.partials.form.image-file', ['name' => 'gallery_images', 'label' => 'Gallery Images', 'multiple' => true, 'draggable' => true])
                </div>

                <div class="mb-3">
{{--                    <a href="{{ route('backend.gallery-images.index') }}" class="btn btn-secondary">Back to Gallery</a>--}}
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
