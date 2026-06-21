@extends('components.backend.layout')

@section('page-title', 'Update Book')

@section('main-content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('backend.books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">
                        @include('backend.partials.form.input', ['name' => 'title', 'label' => 'Title', 'required' => true, 'useOld' => $book->prop('title')])
                        @include('backend.partials.form.select', ['name' => 'category', 'label' => 'Category', 'options' => \App\Repositories\BookRepository::$categories, 'required' => true, 'useOld' => $book->prop('category')])
                        @include('backend.partials.form.input', ['name' => 'author', 'label' => 'Author Name', 'required' => true, 'useOld' => $book->prop('author')])
                        @include('backend.partials.form.textarea', ['name' => 'summary', 'label' => 'Book Summary/Intro', 'row' => 8, 'required' => true, 'useOld' => $book->prop('summary')])
                        @include('backend.partials.form.input', ['name' => 'pub_year', 'label' => 'Year of Publishing', 'useOld' => $book->prop('pub_year')])

                        <h6 class="c-h6">Change Book PDF</h6>
                        @include('backend.partials.form.file', ['name' => 'book_pdf', 'label' => 'Change Book PDF', 'attributes' => ['accept' => '.pdf']])

                        <h6 class="c-h6">Book Link</h6>
                        @include('backend.partials.form.input', ['name' => 'book_url', 'label' => 'Book Link', 'type' => 'url', 'useOld' => $book->prop('book_url')])

                        <h6 class="c-h6">Feature Image <small class="info">Size: 2000 x 1250</small></h6>

                        @if(!!$book->prop('feature_image'))
                            <div style="display: flex; flex-wrap: wrap; margin: 8px 0;">
                                <img src="{{ $book->getFeatureImageUrl() }}" alt="Feature image" style="max-width: 100%; max-height: 80px;">
                            </div>
                        @endif

                        @include('backend.partials.form.image-file', ['name' => 'feature_image', 'label' => 'Change Feature Image'])

                        @include('backend.partials.form.button', ['label' => 'Submit', 'method' => 'PATCH'])
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
