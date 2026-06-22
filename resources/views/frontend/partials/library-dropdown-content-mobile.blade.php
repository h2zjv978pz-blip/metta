<div class="dropdown-content">
    <div class="pb-3">
        <ul>
            <li><a href="{{ route('library.books') }}">{{ \App\Helpers\Utils::lingual(['Books', 'বই']) }}</a></li>
            <li><a href="{{ route('library.videos') }}">{{ \App\Helpers\Utils::lingual(['Videos', 'ভিডিও']) }}</a></li>
            <li><a href="{{ route('library.audios') }}">{{ \App\Helpers\Utils::lingual(['Audios', 'অডিও']) }}</a></li>
            <li><a href="{{ route('library.image-gallery', ['category' => 'General']) }}">{{ \App\Helpers\Utils::lingual(['Image Gallery', 'ছবির গ্যালারি']) }}</a></li>
        </ul>
    </div>
</div>
