@extends('components.backend.layout')

@section('page-title', 'List of Books')

@section('main-content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Books</div>
            <a href="{{ route('backend.books.create') }}" class="btn btn-outline-primary pull-right"><i class="fa fa-plus"></i> Create Book</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Summary</th>
                        <th>PDF</th>
                        <th>Feature Image</th>
                        <th>Added</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="tabular">
                    @foreach($books as $book)
                        <tr>
                            <td>
                                {{ $book->prop('title') }}
                            </td>
                            <td>
                                {{ $book->prop('author', '-') }}
                            </td>
                            <td>
                                {{ \Illuminate\Support\Str::limit($book->prop('summary', '-'), 200) }}
                            </td>
                            <td>
                                <a href="{{ \App\Helpers\Utils::getBookReaderUrl($book) }}" target="_blank">
                                    <i class="fa fa-file-pdf"></i>
                                </a>
                            </td>
                            <td>
                                <img src="{{ $book->getFeatureImageUrl() }}" alt="Feature Image" style="max-height: 60px;">
                            </td>
                            <td>{{ $book->created_at->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('backend.books.edit', $book->id) }}" class="btn btn-sm btn-outline-primary mb-1"><i class="fa fa-edit"></i> Edit</a>
                                <form action="{{ route('backend.books.destroy', $book->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger mb-1" type="submit"><i class="fa fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
