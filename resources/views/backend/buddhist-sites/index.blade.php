@extends('components.backend.layout')

@section('page-title', 'List of Buddhist Sites')

@section('main-content')
    <form action="#" method="POST" id="project-reorder-form">
        @csrf
        <div class="card" id="clients">
            <div class="card-header">
                <div class="card-title">Buddhist Sites</div>
                <a href="{{ route('backend.buddhist-sites.create') }}" class="btn btn-outline-primary pull-right"><i class="fa fa-plus"></i> Create Buddhist Site</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Country</th>
                            <th>Location Name</th>
                            <th>Intro</th>
                            <th>Feature Image</th>
                            <th>Gallery Images</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody class="tabular">
                        @foreach($buddhist_sites as $buddhist_site)
                            <tr>
                                <td>
                                    {{ $buddhist_site->name }}
                                    <input type="hidden" name="sort_orders[]" value="{{ $buddhist_site->id }}">
                                </td>
                                <td>
                                    {{ $buddhist_site->country->nicename }}
                                </td>
                                <td>{{ $buddhist_site->location_name }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($buddhist_site->prop('description', '-'), 300) }}</td>
                                <td><img src="{{ $buddhist_site->getFeatureImageUrl() }}" alt="Feature Image" style="max-height: 60px;"></td>
                                <td>{{ count($buddhist_site->getJson('media', 'gallery_images', [])) }}</td>
                                <td>
                                    <a href="{{ route('backend.buddhist-sites.edit', $buddhist_site->id) }}" class="btn btn-sm btn-outline-primary mb-1"><i class="fa fa-edit"></i> Edit</a>
                                    <form action="{{ route('backend.buddhist-sites.destroy', $buddhist_site->id) }}" method="POST" class="d-inline-block">
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
