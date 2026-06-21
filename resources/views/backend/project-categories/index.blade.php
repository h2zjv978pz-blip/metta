@extends('components.backend.layout')

@section('page-title', 'List of Project Categories')

@section('main-content')
    <div class="card" id="clients">
        <div class="card-header">
            <div class="card-title">Project Categories</div>
            <a href="{{ route('backend.project-categories.create') }}" class="btn btn-outline-primary pull-right"><i class="fa fa-plus"></i> Create Category</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-nowrap">
                    <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Projects</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->prop('name') }}</td>
                            <td>
                                <a href="{{ route('backend.projects.index', ['project_category_id' => $category->id]) }}">
                                    {{ $category->children_count }} <sup><i class="fa fa-arrow-up-right-from-square ml-2"></i></sup>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('backend.project-categories.edit', $category->id) }}" class="btn btn-sm btn-outline-primary"><i class="fa fa-edit"></i> Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
