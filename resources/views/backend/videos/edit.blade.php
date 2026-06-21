@extends('components.backend.layout')

@section('page-title', 'Update Video')

@section('main-content')
    <div class="card">
        <div class="card-body">
            @include('backend.partials.lsf-toggle')

            <form action="{{ route('backend.videos.update', $video->id) }}" method="POST" enctype="multipart/form-data" id="videoForm">
                @csrf
                @method('PATCH')

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

                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">
                        @include('backend.partials.form.lsf.lsf-input', [
                            'name' => 'title',
                            'lang_options' => ['en', 'bn'],
                            'labels' => ['Title', 'টাইটেল'],
                            'useOld' => [$video, 'props', 'title'],
                            'required' => true
                        ])

                        @include('backend.partials.form.select', [
                            'name' => 'category',
                            'label' => 'Category',
                            'options' => \App\Repositories\VideoRepository::$categories,
                            'useOld' => $video->prop('category'),
                            'required' => true
                        ])

                        <div class="mb-3">
                            <label for="video_type" class="form-label">Video Type
                                <span class="text-danger">*</span>
                            </label>
                            <select name="video_type" id="video_type" class="form-select @error('video_type') is-invalid @enderror" required>
                                <option value="">Select Video Type</option>
                                <option value="upload" {{ (old('video_type') ?? (\App\Helpers\Utils::isYouTubeVideo($video->prop('video')) ? 'youtube' : 'upload')) == 'upload' ? 'selected' : '' }}>
                                    Upload Video
                                </option>
                                <option value="youtube" {{ (old('video_type') ?? (\App\Helpers\Utils::isYouTubeVideo($video->prop('video')) ? 'youtube' : 'upload')) == 'youtube' ? 'selected' : '' }}>
                                    YouTube Video
                                </option>
                            </select>
                            <!-- Removed field-specific error message -->
                        </div>

                        <div id="video-input-upload" style="display: none;">
                            <h6 class="c-h6">Video File <small class="info">Format: MP4</small></h6>
                            @if(!\App\Helpers\Utils::isYouTubeVideo($video->prop('video')))
                                <div class="mb-3">
                                    <video width="320" height="240" controls class="img-thumbnail">
                                        <source src="{{ asset('storage/video/' . $video->prop('video')) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            @endif
                            @include('backend.partials.form.file', [
                                'name' => 'video_file',
                                'label' => 'Change Video File',
                                'attributes' => ['accept' => 'video/mp4']
                            ])
                        </div>

                        <div id="video-input-youtube" style="display: none;">
                            <h6 class="c-h6">YouTube URL
                                <small class="info">
                                    Example: https://www.youtube.com/watch?v=VIDEO_ID
                                </small>
                            </h6>
                            @if(\App\Helpers\Utils::isYouTubeVideo($video->prop('video')))
                                <p>Current YouTube URL: <a href="https://www.youtube.com/watch?v={{ $video->prop('video') }}" target="_blank">{{ $video->prop('video') }}</a></p>
                            @endif
                            @include('backend.partials.form.input', [
                                'name' => 'youtube_url',
                                'label' => 'YouTube Video URL',
                                'attributes' => ['placeholder' => 'Enter YouTube Video URL'],
                                'value' => \App\Helpers\Utils::isYouTubeVideo($video->prop('video')) ? "https://www.youtube.com/watch?v={$video->prop('video')}" : ''
                            ])
                        </div>

                        <h6 class="c-h6">Thumbnail Image
                            <small class="info" id="thumbnail-hint" style="display: none;">
                                (Optional for YouTube videos)
                            </small>
                        </h6>

                        @if($video->prop('feature_image'))
                            <div class="mb-3">
                                <img src="{{ $video->getFeatureImageUrl() }}" alt="Thumbnail Image" class="img-thumbnail" style="max-width: 200px;">
                            </div>
                        @endif

                        @include('backend.partials.form.image-file', [
                            'name' => 'feature_image',
                            'label' => 'Change Thumbnail Image',
                            'required' => false,
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
