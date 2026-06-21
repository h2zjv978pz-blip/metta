@extends('components.backend.layout')

@section('page-title', 'Add Video')

@section('main-content')
    <div class="card">
        <div class="card-body">
            @include('backend.partials.lsf-toggle')

            <form action="{{ route('backend.videos.store') }}" method="POST" enctype="multipart/form-data" id="videoForm">
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
                    </div>
                @endif

                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">
                        @include('backend.partials.form.lsf.lsf-input', [
                            'name' => 'title',
                            'lang_options' => ['en', 'bn'],
                            'labels' => ['Title', 'টাইটেল'],
                            'required' => true
                        ])

                        @include('backend.partials.form.select', [
                            'name' => 'category',
                            'label' => 'Category',
                            'options' => \App\Repositories\VideoRepository::$categories,
                            'required' => true
                        ])

                        <div class="mb-3">
                            <label for="video_type" class="form-label">Video Type
                                <span class="text-danger">*</span>
                            </label>
                            <select name="video_type" id="video_type" class="form-select @error('video_type') is-invalid @enderror" required>
                                <option value="">Select Video Type</option>
                                <option value="upload" {{ old('video_type') == 'upload' ? 'selected' : '' }}>Upload Video</option>
                                <option value="youtube" {{ old('video_type') == 'youtube' ? 'selected' : '' }}>YouTube Video</option>
                            </select>
                            <!-- Removed field-specific error message -->
                        </div>

                        <div id="video-input-upload" style="display: none;">
                            <h6 class="c-h6">Video File <small class="info">Format: MP4</small></h6>
                            @include('backend.partials.form.file', [
                                'name' => 'video_file',
                                'label' => 'Video File',
                                'attributes' => ['accept' => 'video/mp4']
                            ])
                        </div>

                        <div id="video-input-youtube" style="display: none;">
                            <h6 class="c-h6">YouTube URL
                                <small class="info">
                                    Example: https://www.youtube.com/watch?v=VIDEO_ID
                                </small>
                            </h6>
                            @include('backend.partials.form.input', [
                                'name' => 'youtube_url',
                                'label' => 'YouTube Video URL',
                                'attributes' => ['placeholder' => 'Enter YouTube Video URL']
                            ])
                        </div>

                        <h6 class="c-h6">Thumbnail Image
                            <small class="info" id="thumbnail-hint" style="display: none;">
                                (Optional for YouTube videos)
                            </small>
                        </h6>
                        @include('backend.partials.form.image-file', [
                            'name' => 'feature_image',
                            'label' => 'Thumbnail Image',
                            'required' => true,
                        ])

                        @include('backend.partials.form.button', ['label' => 'Submit'])
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const videoTypeSelect = document.getElementById('video_type');
            const uploadInput = document.getElementById('video-input-upload');
            const youtubeInput = document.getElementById('video-input-youtube');
            const featureImageInput = document.querySelector('input[name="feature_image"]');
            const thumbnailHint = document.getElementById('thumbnail-hint');

            function toggleVideoInputs() {
                if (videoTypeSelect.value === 'upload') {
                    uploadInput.style.display = 'block';
                    youtubeInput.style.display = 'none';
                    featureImageInput.required = true;
                    thumbnailHint.style.display = 'none';
                } else if (videoTypeSelect.value === 'youtube') {
                    uploadInput.style.display = 'none';
                    youtubeInput.style.display = 'block';
                    featureImageInput.required = false;
                    thumbnailHint.style.display = 'block';
                } else {
                    uploadInput.style.display = 'none';
                    youtubeInput.style.display = 'none';
                    featureImageInput.required = true;
                    thumbnailHint.style.display = 'none';
                }
            }

            // Initial toggle based on existing value
            toggleVideoInputs();

            videoTypeSelect.addEventListener('change', toggleVideoInputs);
        });
    </script>
@endsection
