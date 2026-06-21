@extends('components.backend.layout')

@section('page-title', 'Home Page Contents')

@section('main-content')
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
                        <th>Title</th>
                        <th>Image</th>
                        <th>Link</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['homeSlides'] as $homeSlide)
                        <tr>
                            <td>#{{ $loop->index + 1 }}</td>
                            <td>{{ $homeSlide->prop('title', '-') }}</td>
                            <td><img src="{{ asset("storage/img/{$homeSlide->prop('image')}") }}" alt="Slide Image" style="max-width: 30%; max-height: 100px;"></td>
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

    <div class="card" id="achievement-counters">
        <div class="card-header">
            <div class="card-title">Highlights</div>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.tasks', ['task' => 'save-home-highlights']) }}" method="POST">
                @csrf

                <div class="row">
                    @foreach(['welcomeText'] as $key)
                        <div class="col-12">
                            @include('backend.partials.form.textarea', ['name' => "highlights[{$key}]", 'label' => ucwords(preg_replace('/([a-z])([A-Z])/', "$1 $2", $key)), 'row' => 8, 'useOld' => $data['homeHighlights']?->prop($key)])
                        </div>
                    @endforeach
                </div>

                @include('backend.partials.form.button', ['label' => 'Submit'])
            </form>
        </div>
    </div>
@endsection
