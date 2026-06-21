@extends('components.backend.layout')

@section('page-title', 'List of Projects')

@section('main-content')
    <form action="{{ route('backend.projects.sort') }}" method="POST" id="project-reorder-form">
        @csrf
        <div class="card" id="clients">
            <div class="card-header">
                <div class="card-title">Projects</div>
                @if(!Request::get('project_category_id'))
                    <button type="submit" class="btn btn-outline-secondary pull-right mr-2 reorder-btn"><i class="fa fa-sort"></i> Re-order</button>
                @endif
                <a href="{{ route('backend.projects.create') }}" class="btn btn-outline-primary pull-right"><i class="fa fa-plus"></i> Create Project</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th>Project Name</th>
                            <th>Category</th>
                            <th>Client Name</th>
                            <th>Description</th>
                            <th>Feature Image</th>
                            <th>Gallery Items</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody class="draggable-container tabular">
                        @foreach($projects as $project)
                            <tr class="{{ !Request::get('project_category_id') ? 'draggable' : '' }}" draggable="{{ !Request::get('project_category_id') ? 'true' : 'false' }}">
                                <td>
                                    {{ $project->prop('name') }}
                                    <input type="hidden" name="sort_orders[]" value="{{ $project->id }}">
                                </td>
                                <td>
                                    {{ $project->parent?->prop('name') }}
                                </td>
                                <td>{{ $project->prop('client') }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($project->prop('description', '-'), 300) }}</td>
                                <td><img src="{{ $project->getImageUrl('feature_image') }}" alt="Feature Image" style="max-height: 60px;"></td>
                                <td>{{ $project->prop('video') ? '1' : count($project->prop('gallery_images', [])) }}</td>
                                <td>
                                    <a href="{{ route('backend.projects.edit', $project->id) }}" class="btn btn-sm btn-outline-primary mb-1"><i class="fa fa-edit"></i> Edit</a>
                                    <form action="{{ route('backend.projects.destroy', $project->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        <button class="btn btn-sm btn-outline-danger mb-1" name="_method" value="DELETE"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        $('#project-reorder-form').on('submit', function (e) {
            if (dragCounter === 0) {
                alert(`You can drag project items up or down to re-order them.\nThen press this button to save the changes.`);
                return false;
            }
        });
    </script>
@endsection
