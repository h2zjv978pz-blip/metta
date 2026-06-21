@extends('components.backend.layout')

@section('page-title', 'Add Book')

@section('main-content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('backend.books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">
                        @include('backend.partials.form.input', ['name' => 'title', 'label' => 'Title', 'required' => true])
                        @include('backend.partials.form.select', ['name' => 'category', 'label' => 'Category', 'options' => \App\Repositories\BookRepository::$categories, 'required' => true])
                        @include('backend.partials.form.input', ['name' => 'author', 'label' => 'Author Name', 'required' => true])
                        @include('backend.partials.form.textarea', ['name' => 'summary', 'label' => 'Book Summary/Intro', 'row' => 8, 'required' => true])
                        @include('backend.partials.form.input', ['name' => 'pub_year', 'label' => 'Year of Publishing'])

                        <h6 class="c-h6">Book PDF</h6>
                        @include('backend.partials.form.file', ['name' => 'book_pdf', 'label' => 'Book PDF', 'attributes' => ['accept' => '.pdf']])

                        <h6 class="c-h6">Book Link</h6>
                        @include('backend.partials.form.input', ['name' => 'book_url', 'label' => 'Book Link', 'type' => 'url'])

                        <h6 class="c-h6">Feature Image <small class="info">Size: 2000 x 1250</small></h6>
                        @include('backend.partials.form.image-file', ['name' => 'feature_image', 'label' => 'Feature Image', 'required' => true])

                        @include('backend.partials.form.button', ['label' => 'Submit'])
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
