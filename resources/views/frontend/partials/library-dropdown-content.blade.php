<div class="dropdown-content">
    <div class="pb-3">
        <h6>BOOKS</h6>
        <ul>
            <li><a href="{{ route('library.books') }}">Books</a></li>
            <li><a href="{{ route('library.books', ['category' => 'Spiritual']) }}">Spiritual</a></li>
            <li><a href="{{ route('library.books', ['category' => 'Children Books']) }}">Children Books</a></li>
        </ul>
    </div>
    <div class="pb-3">
        <h6>VIDEO</h6>
        <ul>
            <li><a href="{{ route('library.videos') }}">Latest Videos</a></li>
            <li><a href="{{ route('library.videos', ['category' => 'Lecture']) }}">Lectures</a></li>
            <li><a href="{{ route('library.videos', ['category' => 'Meditation']) }}">Meditation</a></li>
            <li><a href="{{ route('library.videos', ['category' => 'Kids Gallery']) }}">Kids Gallery</a></li>
        </ul>
    </div>
    <div class="pb-3">
        <h6>AUDIO</h6>
        <ul>
            <li><a href="{{ route('library.audios') }}">Audios</a></li>
            <li><a href="{{ route('library.audios', ['category' => 'Meditation']) }}">Meditation</a></li>
            <li><a href="{{ route('library.audios', ['category' => 'Chanting']) }}">Chanting</a></li>
        </ul>
    </div>
    <div class="pb-3">
        <h6>IMAGE GALLERY</h6>
        <ul>
            <li><a href="{{ route('library.image-gallery', ['category' => 'General']) }}">Galleries</a></li>
        </ul>
    </div>
</div>
