@extends('components.backend.layout')

@section('page-title', 'List of Teachings Slides')

@section('main-content')
    <div class="card" id="clients">
        <div class="card-header">
            <div class="card-title">Teachings Slides</div>
            <a href="{{ route('backend.teachings-slides.create') }}" class="btn btn-outline-primary pull-right"><i class="fa fa-plus"></i> Add Slide</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th>Caption</th>
                        <th>Slide Image</th>
                        <th>Added</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="tabular">
                    @foreach($teachings_slides as $teachings_slide)
                        <tr>
                            <td>
                                {{ $teachings_slide->prop('caption') }}
                            </td>
                            <td><img src="{{ asset('storage/img/' . $teachings_slide->prop('image')) }}" alt="Feature Image" style="max-height: 60px;"></td>
                            <td>{{ $teachings_slide->created_at->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('backend.teachings-slides.edit', $teachings_slide->id) }}" class="btn btn-sm btn-outline-primary mb-1"><i class="fa fa-edit"></i> Edit</a>
                                <form action="{{ route('backend.teachings-slides.destroy', $teachings_slide->id) }}" method="POST" class="d-inline-block">
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
