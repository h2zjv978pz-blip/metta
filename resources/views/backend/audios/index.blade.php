@extends('components.backend.layout')

@section('page-title', 'List of Audios')

@section('main-content')
    <div class="card" id="clients">
        <div class="card-header">
            <div class="card-title">Audios</div>
            <a href="{{ route('backend.audios.create') }}" class="btn btn-outline-primary pull-right"><i class="fa fa-plus"></i> Add Audio</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Added</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="tabular">
                    @foreach($audios as $audio)
                        <tr>
                            <td>{{ $audio->prop('title') }}</td>
                            <td>{{ $audio->prop('category', '-') }}</td>
                            <td>{{ $audio->created_at->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('backend.audios.edit', $audio->id) }}" class="btn btn-sm btn-outline-primary mb-1"><i class="fa fa-edit"></i> Edit</a>
                                <form action="{{ route('backend.audios.destroy', $audio->id) }}" method="POST" class="d-inline-block">
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
