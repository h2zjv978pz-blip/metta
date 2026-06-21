@extends('components.backend.layout')

@section('page-title', 'List of Team Members')

@section('main-content')
    <div class="card" id="clients">
        <div class="card-header">
            <div class="card-title">Team Members</div>
            <a href="{{ route('backend.team-members.create') }}" class="btn btn-outline-primary pull-right"><i class="fa fa-plus"></i> Create Member</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-nowrap">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Team</th>
                        <th>Designation</th>
                        <th>Details</th>
                        <th>Photo</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($team_members as $team_member)
                        <tr>
                            <td>{{ $team_member->prop('name') }}</td>
                            <td>{{ $team_member->prop('team') }}</td>
                            <td>{{ $team_member->prop('designation') }}</td>
                            <td>
                                @if($team_member->prop('qualification_l1'))
                                    <div>{{ $team_member->prop('qualification_l1') }}</div>
                                @endif
                                @if($team_member->prop('qualification_l2'))
                                    <div>{{ $team_member->prop('qualification_l2') }}</div>
                                @endif
                            </td>
                            <td>
                                <img src="{{ $team_member->getImageUrl('photo') }}" alt="{{ $team_member->prop('name') . ' Photo' }}" style="max-height: 80px;">
                            </td>
                            <td>
                                <a href="{{ route('backend.team-members.edit', $team_member->id) }}" class="btn btn-sm btn-outline-primary"><i class="fa fa-edit"></i> Edit</a>
                                <form action="{{ route('backend.team-members.destroy', $team_member->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-danger" name="_method" value="DELETE"><i class="fa fa-trash"></i> Delete</button>
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
