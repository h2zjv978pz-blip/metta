@extends('frontend.layouts.base')

@section('page-title', \App\Helpers\Utils::lingual(['Audio', 'অডিও']))
@section('meta-description', \App\Helpers\Utils::lingual(['Listen to Buddhist chanting and meditation audio.', 'বৌদ্ধ জপ এবং ধ্যানের অডিও শুনুন।']))

@section('main-content')
    <section  class="pd-top">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ \App\Helpers\Utils::lingual(['Home', 'হোম']) }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('library.index') }}">{{ \App\Helpers\Utils::lingual(['Library', 'লাইব্রেরি']) }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ \App\Helpers\Utils::lingual(['Audio', 'অডিও']) }}</li>
                </ol>
            </nav>
            <div class="title">
                <img src="{{ asset('_common/img/title-icon.png') }}" alt="">
                <span>Audio</span>
                <h2>{{ strtoupper(in_array(Request::query('category'), \App\Repositories\AudioRepository::$categories) ? Request::query('category') : 'AUDIO COLLECTION') }}</h2>
            </div>
        </div>
    </section>

    <section class="container pd-bottom">
        <ul class="audio-playlist list-group">
            @forelse($audios ?? [] as $audio)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <button type="button" class="btn btn-link audio-play-btn" data-src="{{ asset('storage/audio/' . $audio->prop('audio')) }}" data-title="{{ $audio->prop('title') }}">
                        <i class="fa-solid fa-circle-play me-2"></i>{{ $audio->prop('title') }}
                    </button>
                    <span class="text-muted">{{ $audio->prop('category') }}</span>
                </li>
            @empty
                <li class="list-group-item">{{ \App\Helpers\Utils::lingual(['No audio available yet.', 'এখনও কোনো অডিও নেই।']) }}</li>
            @endforelse
        </ul>
    </section>

    <script>
        document.querySelectorAll('.audio-play-btn').forEach(function (btn) {
            btn.addEventListener('click', function () {
                window.MettaPlayer.play(btn.dataset.src, btn.dataset.title);
            });
        });
    </script>
@endsection
