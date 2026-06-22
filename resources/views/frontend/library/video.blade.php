@extends('frontend.layouts.base')

@section('page-title', \App\Helpers\Utils::lingual(['Video', 'ভিডিও']))
@section('meta-description', \App\Helpers\Utils::lingual(['Watch videos on Buddhist teachings, meditation, and lectures.', 'বৌদ্ধ শিক্ষা, ধ্যান এবং বক্তৃতার ভিডিও দেখুন।']))

@section('main-content')
    <section class="pd-top pd-bottom">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ \App\Helpers\Utils::lingual(['Home', 'হোম']) }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('library.index') }}">{{ \App\Helpers\Utils::lingual(['Library', 'লাইব্রেরি']) }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ \App\Helpers\Utils::lingual(['Video', 'ভিডিও']) }}</li>
                </ol>
            </nav>
            <div class="title">
                <img src="{{ asset('_common/img/title-icon.png') }}" alt="">
                <span>Video</span>
                <h2>{{ strtoupper(in_array(Request::query('category'), \App\Repositories\VideoRepository::$categories) ? Request::query('category') : 'VIDEO COLLECTION') }}</h2>
            </div>

            <div class="row">
                @foreach($videos as $video)
                    @php
                        $isYouTube = App\Helpers\Utils::isYouTubeVideo($video->prop('video'));
                        if ($isYouTube) {
                            $thumbnailUrl = "https://img.youtube.com/vi/{$video->prop('video')}/hqdefault.jpg";
                        } else {
                            $thumbnailUrl = $video->getFeatureImageUrl();
                        }
                    @endphp
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="video-wrap card shadow-sm">
                            <a href="javascript:void(0);" class="video-link" data-video-id="{{ $video->id }}"
                               data-bs-toggle="modal" data-bs-target="#VideoModal"
                               data-video-url="{{ $isYouTube ? $video->prop('video') : asset('storage/video/' . $video->prop('video')) }}"
                               data-video-type="{{ $isYouTube ? 'youtube' : 'upload' }}"
                               data-title="{{ $video->prop('title') }}">
                                <div class="video-img-box position-relative">
                                    <div class="play-btn position-absolute top-50 start-50 translate-middle">
                                        <i class="fa-solid fa-play fs-3 text-white"></i>
                                    </div>
                                    <img src="{{ $thumbnailUrl }}" alt="{{ $video->prop('title') }}" class="img-fluid" style="height: 160px;">
                                </div>
                            </a>
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <h6 class="video-title mb-0">{{ $video->prop('title') }}</h6>
                                <!-- Share Button -->
                                <button type="button" class="btn btn-sm btn-outline-primary share-btn" data-share-id="{{ $video->id }}" data-share-param="videoId" title="Copy shareable link">
                                    <i class="fa-solid fa-share"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="video-modal modal fade" id="VideoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content bg-dark">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body p-0">
                    <div class="ratio ratio-16x9" id="videoContent">
                        <!-- Video content will be injected here -->
                    </div>
                    <div class="p-3 bg-dark">
                        <h5 id="videoTitle" class="text-white"></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var videoLinks = document.querySelectorAll('.video-link');
            var videoModal = document.getElementById('VideoModal');
            var videoContent = document.getElementById('videoContent');
            var videoTitle = document.getElementById('videoTitle');

            // Attach click listeners for video links to load the video into the modal
            videoLinks.forEach(function(link) {
                link.addEventListener('click', function() {
                    var videoUrl = this.getAttribute('data-video-url');
                    var videoType = this.getAttribute('data-video-type');
                    var title = this.getAttribute('data-title');

                    videoTitle.textContent = title;

                    if (videoType === 'youtube') {
                        // Embed YouTube iframe with autoplay
                        videoContent.innerHTML = `
                            <iframe src="https://www.youtube.com/embed/${videoUrl}?autoplay=1&rel=0" title="${title}"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen class="w-100 h-100"></iframe>
                        `;
                    } else {
                        // Embed HTML5 video player with autoplay
                        videoContent.innerHTML = `
                            <video id="videoPlayer" controls autoplay class="w-100 h-100">
                                <source src="${videoUrl}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        `;
                    }
                });
            });

            // Auto open video if videoId exists in the URL
            var urlParams = new URLSearchParams(window.location.search);
            var videoIdParam = urlParams.get('videoId');
            if (videoIdParam) {
                var targetLink = document.querySelector('.video-link[data-video-id="' + videoIdParam + '"]');
                if (targetLink) {
                    // Trigger a click on the video link to open the modal
                    targetLink.click();
                }
            }

            // Clear the video content when the modal is closed
            videoModal.addEventListener('hidden.bs.modal', function() {
                videoContent.innerHTML = '';
                videoTitle.textContent = '';
            });
        });
    </script>
@endsection
