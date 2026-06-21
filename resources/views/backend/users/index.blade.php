@extends('components.backend.layout')

@section('page-title', 'List of Users')

@section('main-content')
    <form action="#" method="POST" id="project-reorder-form">
        @csrf
        <div class="card" id="clients">
            <div class="card-header">
                <div class="card-title">Users</div>
                <a href="{{ route('backend.users.create') }}" class="btn btn-outline-primary pull-right"><i class="fa fa-plus"></i> Create User</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Added</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody class="tabular">
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    {{ $user->username }}
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {{ $user->level_name }}
                                </td>
                                <td>
                                    {{ !empty($user->created_at) ? $user->created_at->format('Y-m-d') : '-' }}
                                </td>
                                <td>
                                    <a href="{{ route('backend.users.edit', $user->id) }}" class="btn btn-sm btn-outline-primary mb-1"><i class="fa fa-edit"></i> Edit</a>
{{--                                    <form action="{{ route('backend.users.destroy', $user->id) }}" method="POST" class="d-inline-block">--}}
{{--                                        @csrf--}}
{{--                                        <button class="btn btn-sm btn-outline-danger mb-1" type="submit" name="_method" value="DELETE"><i class="fa fa-trash"></i> Delete</button>--}}
{{--                                    </form>--}}
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
@endsection
