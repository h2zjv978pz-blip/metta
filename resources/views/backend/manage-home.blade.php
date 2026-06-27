@extends('components.backend.layout')

@section('page-title', 'Home Page Contents')

@section('main-content')
    @php $hero = $data['heroSettings']; @endphp
    <div class="card" id="hero-settings">
        <div class="card-header">
            <div class="card-title">Hero Section</div>
        </div>
        <div class="card-body">
            <p class="text-muted">Controls the main "Metta" heading, the "Read More" button, and mobile text alignment shown on every homepage slide.</p>

            @include('backend.partials.lsf-toggle')

            <form action="{{ route('backend.tasks', ['task' => 'save-hero-settings']) }}" method="POST">
                @csrf

                @include('backend.partials.form.input', ['name' => 'heading', 'class' => 'lsf en', 'label' => 'Main Heading (English)', 'useOld' => $hero['heading']])
                @include('backend.partials.form.input', ['name' => 'heading_bn', 'class' => 'lsf bn', 'label' => 'Main Heading (বাংলা)', 'useOld' => $hero['heading_bn']])

                @include('backend.partials.form.input', ['name' => 'read_more_label', 'class' => 'lsf en', 'label' => '"Read More" Button Label (English)', 'useOld' => $hero['read_more_label']])
                @include('backend.partials.form.input', ['name' => 'read_more_label_bn', 'class' => 'lsf bn', 'label' => '"Read More" Button Label (বাংলা)', 'useOld' => $hero['read_more_label_bn']])

                <div class="form-group">
                    <label class="form-control-label">"Read More" Button Link</label>
                    <p class="text-muted" style="font-size: 12px;">Leave empty to send visitors to the Buddhist Sites page. Individual slides can still override this with their own link.</p>
                    <input type="text" name="read_more_link" class="form-control" value="{{ $hero['read_more_link'] }}" placeholder="{{ route('buddhist-sites.index', ['locale' => 'en']) }}">
                </div>

                <div class="form-group">
                    <label class="form-control-label">Text Alignment on Mobile</label>
                    <select name="mobile_align" class="form-control">
                        @foreach(['left' => 'Left', 'center' => 'Center', 'right' => 'Right'] as $key => $label)
                            <option value="{{ $key }}" {{ $hero['mobile_align'] == $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-control-label">Vertical Position of Hero Text (%)</label>
                    <p class="text-muted" style="font-size: 12px;">Lower number = higher up, higher number = lower down. Applies to all slides unless a slide's own Heading Position (Top/Bottom) overrides it.</p>
                    <input type="range" class="form-range" name="vertical_position" id="hero-vpos" min="10" max="65" value="{{ $hero['vertical_position'] }}" oninput="document.getElementById('hero-vpos-output').innerText = this.value + '%'">
                    <span id="hero-vpos-output">{{ $hero['vertical_position'] }}%</span>
                </div>

                @include('backend.partials.form.button', ['label' => 'Submit'])
            </form>
        </div>
    </div>

    <div class="card" id="home-slides">
        <div class="card-header">
            <div class="card-title">Slideshow</div>
            <a href="{{ route('backend.tasks', ['task' => 'create-home-slide']) }}" class="btn btn-outline-primary pull-right"><i class="fa fa-plus"></i> Create Slide</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-nowrap">
                    <thead>
                    <tr>
                        <th>Slide No.</th>
                        <th>Heading</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Note</th>
                        <th>Link</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['homeSlides'] as $homeSlide)
                        <tr>
                            <td>#{{ $loop->index + 1 }}</td>
                            <td>{{ $homeSlide->prop('heading', '-') }}</td>
                            <td>{{ $homeSlide->prop('title', '-') }}</td>
                            <td><img src="{{ asset("storage/img/{$homeSlide->prop('image')}") }}" alt="Slide Image" style="max-width: 30%; max-height: 100px;"></td>
                            <td>{{ $homeSlide->prop('note', '-') }}</td>
                            <td>{{ $homeSlide->prop('link', '-') }}</td>
                            <td>
                                <a href="{{ route('backend.tasks', ['task' => 'edit-home-slide', 'id' => $homeSlide->id]) }}" class="btn btn-sm btn-outline-primary"><i class="fa fa-edit"></i> Edit</a>
                                <a href="{{ route('backend.tasks', ['task' => 'delete-home-slide', 'id' => $homeSlide->id]) }}" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

{{--    <div class="card" id="testimonials">--}}
{{--        <div class="card-header">--}}
{{--            <div class="card-title">Highlights</div>--}}
{{--            <a href="{{ route('backend.tasks', ['task' => 'create-testimonial']) }}" class="btn btn-outline-primary pull-right"><i class="fa fa-plus"></i> Create Testimonial</a>--}}
{{--        </div>--}}
{{--        <div class="card-body">--}}
{{--            <div class="table-responsive">--}}
{{--                <table class="table table-sm table-nowrap">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th>SL No.</th>--}}
{{--                        <th>Person Name</th>--}}
{{--                        <th>Designation</th>--}}
{{--                        <th>Photo</th>--}}
{{--                        <th>Testimonial</th>--}}
{{--                        <th>Actions</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    @foreach($data['testimonials'] as $testimonial)--}}
{{--                        <tr>--}}
{{--                            <td>#{{ $loop->index + 1 }}</td>--}}
{{--                            <td>{{ $testimonial->prop('person', '-') }}</td>--}}
{{--                            <td>{{ $testimonial->prop('designation', '-') }}</td>--}}
{{--                            <td><img src="{{ $testimonial->getImageUrl('photo') }}" alt="Person Photo" style="max-width: 30%; max-height: 80px;"></td>--}}
{{--                            <td>{{ $testimonial->prop('testimonial') }}</td>--}}
{{--                            <td>--}}
{{--                                <a href="{{ route('backend.tasks', ['task' => 'edit-testimonial', 'id' => $testimonial->id]) }}" class="btn btn-sm btn-outline-primary"><i class="fa fa-edit"></i> Edit</a>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="card" id="home-slides-order">
        <div class="card-header">
            <div class="card-title">Reorder Slides</div>
        </div>
        <div class="card-body">
            <p class="text-muted">Drag slides to set the order they appear in the homepage slideshow, then submit.</p>

            <form action="{{ route('backend.tasks', ['task' => 'save-home-slides-order']) }}" method="POST">
                @csrf
                <input type="hidden" name="slide_order" id="slide-order-input" value="{{ $data['homeSlides']->pluck('id')->implode(',') }}">

                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">
                        <ul id="slide-order-list" class="list-group">
                            @foreach($data['homeSlides'] as $homeSlide)
                                <li class="list-group-item d-flex align-items-center" draggable="true" data-key="{{ $homeSlide->id }}" style="cursor: move;">
                                    <i class="fa fa-bars me-3"></i>
                                    <img src="{{ asset("storage/img/{$homeSlide->prop('image')}") }}" alt="Slide Image" style="max-height: 50px; margin-right: 12px;">
                                    <span>{{ $homeSlide->prop('heading') ?: $homeSlide->prop('title', 'Slide #' . $homeSlide->id) }}</span>
                                </li>
                            @endforeach
                        </ul>

                        @include('backend.partials.form.button', ['label' => 'Save Order'])
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card" id="achievement-counters">
        <div class="card-header">
            <div class="card-title">Highlights</div>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.tasks', ['task' => 'save-home-highlights']) }}" method="POST">
                @csrf

                @include('backend.partials.lsf-toggle')

                <div class="row">
                    @foreach(['welcomeText'] as $key)
                        <div class="col-12">
                            @include('backend.partials.form.textarea', ['name' => "highlights[{$key}]", 'label' => ucwords(preg_replace('/([a-z])([A-Z])/', "$1 $2", $key)), 'row' => 8, 'class' => 'lsf en', 'useOld' => $data['homeHighlights']?->getJson('props', $key)])
                            @include('backend.partials.form.textarea', ['name' => "highlights[{$key}_bn]", 'label' => 'ওয়েলকাম টেক্সট', 'row' => 8, 'class' => 'lsf bn', 'useOld' => $data['homeHighlights']?->getJson('props', $key . '_bn')])
                        </div>
                    @endforeach
                </div>

                @include('backend.partials.form.button', ['label' => 'Submit'])
            </form>
        </div>
    </div>

    <script>
        (function () {
            var list = document.getElementById('slide-order-list');
            var input = document.getElementById('slide-order-input');
            var dragging = null;

            if (!list) return;

            function updateInput() {
                var keys = Array.from(list.querySelectorAll('li')).map(function (li) {
                    return li.dataset.key;
                });
                input.value = keys.join(',');
            }

            list.querySelectorAll('li').forEach(function (li) {
                li.addEventListener('dragstart', function () {
                    dragging = li;
                    li.classList.add('opacity-50');
                });
                li.addEventListener('dragend', function () {
                    dragging = null;
                    li.classList.remove('opacity-50');
                    updateInput();
                });
                li.addEventListener('dragover', function (e) {
                    e.preventDefault();
                    if (!dragging || dragging === li) return;
                    var rect = li.getBoundingClientRect();
                    var before = (e.clientY - rect.top) < rect.height / 2;
                    list.insertBefore(dragging, before ? li : li.nextSibling);
                });
            });
        })();
    </script>
@endsection
