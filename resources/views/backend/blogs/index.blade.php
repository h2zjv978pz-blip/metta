@extends('components.backend.layout')

@section('page-title', 'List of Research & Publications')

@section('main-content')
    <div class="card" id="clients">
        <div class="card-header">
            <div class="card-title">Research & Publications</div>
            <a href="{{ route('backend.blogs.create') }}" class="btn btn-outline-primary pull-right"><i class="fa fa-plus"></i> Create New</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Post</th>
                        <th>Length</th>
                        <th>Feature Image</th>
                        <th>Added</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="tabular">
                    @foreach($blogs as $blog)
                        <tr>
                            <td>
                                {{ $blog->prop('title') }}
                            </td>
                            <td>
                                {{ $blog->prop('author', '-') }}
                            </td>
                            <td>
                                {{ \Illuminate\Support\Str::limit(\App\Helpers\Utils::getPlainText($blog->prop('body', '-')), 400) }}
                            </td>
                            <td>
                                {{ $blog->prop('word_count', '0') }} words
                            </td>
                            <td><img src="{{ $blog->getFeatureImageUrl() }}" alt="Feature Image" style="max-height: 60px;"></td>
                            <td>{{ $blog->created_at->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('backend.blogs.edit', $blog->id) }}" class="btn btn-sm btn-outline-primary mb-1"><i class="fa fa-edit"></i> Edit</a>
                                <form action="{{ route('backend.blogs.destroy', $blog->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-danger mb-1" type="submit" name="_method" value="DELETE"><i class="fa fa-trash"></i> Delete</button>
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
    <script>

    </script>
@endsection
