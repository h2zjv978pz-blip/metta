@extends('components.backend.layout')

@section('page-title', 'List of Teachings')

@section('main-content')
    <div class="card" id="clients">
        <div class="card-header">
            <div class="card-title">Teachings</div>
            <a href="{{ route('backend.teachings-slides.index') }}" class="btn btn-outline-info pull-right mr-2"><i class="fa fa-images"></i> Manage Slides</a>
            <a href="{{ route('backend.teachings.create') }}" class="btn btn-outline-primary pull-right"><i class="fa fa-plus"></i> Add Teaching</a>
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
                    @foreach($teachings as $teaching)
                        <tr>
                            <td>
                                {{ $teaching->prop('title') }}
                            </td>
                            <td>
                                {{ $teaching->prop('author', '-') }}
                            </td>
                            <td>
                                {{ \Illuminate\Support\Str::limit(\App\Helpers\Utils::getPlainText($teaching->prop('body', '-')), 400) }}
                            </td>
                            <td>
                                {{ $teaching->prop('word_count', '0') }} words
                            </td>
                            <td><img src="{{ $teaching->getFeatureImageUrl() }}" alt="Feature Image" style="max-height: 60px;"></td>
                            <td>{{ $teaching->created_at->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('backend.teachings.edit', $teaching->id) }}" class="btn btn-sm btn-outline-primary mb-1"><i class="fa fa-edit"></i> Edit</a>
                                <form action="{{ route('backend.teachings.destroy', $teaching->id) }}" method="POST" class="d-inline-block">
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

@endsection
