<!-- resources/views/backend/gallery_images/index.blade.php -->
@extends('components.backend.layout')

@section('page-title', 'Image Gallery')

@section('main-content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Image Gallery</h4>
            <a href="{{ route('backend.gallery-images.create') }}" class="btn btn-primary">Add New Image</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($gallery_images->count())
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Thumbnail</th>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($gallery_images as $image)
                        <tr>
                            <td>
                                <img src="{{ $image->getImageUrl('image') }}" alt="{{ $image->prop('title') }}" width="100">
                            </td>
                            <td>{{ $image->prop('title') }}</td>
                            <td>
                                <a href="{{ route('backend.gallery-images.edit', $image->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('backend.gallery-images.destroy', $image->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this image?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p>No images found. <a href="{{ route('backend.gallery-images.create') }}">Add a new image</a>.</p>
            @endif
        </div>
    </div>
@endsection
