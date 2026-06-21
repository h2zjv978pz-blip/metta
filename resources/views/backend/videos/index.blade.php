@extends('components.backend.layout')

@section('page-title', 'List of Videos')

@section('main-content')
    <div class="card" id="clients">
        <div class="card-header">
            <div class="card-title">Videos</div>
            <a href="{{ route('backend.videos.create') }}" class="btn btn-outline-primary pull-right"><i class="fa fa-plus"></i> Add Video</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Thumbnail</th>
                        <th>Added</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="tabular">
                    @foreach($videos as $video)
                        @php
                            $isYouTube = App\Helpers\Utils::isYouTubeVideo($video->prop('video'));
                            if ($isYouTube) {
                                $thumbnailUrl = "https://img.youtube.com/vi/{$video->prop('video')}/hqdefault.jpg";
                            } else {
                                $thumbnailUrl = $video->getFeatureImageUrl();
                            }
                        @endphp
                        <tr>
                            <td>{{ $video->prop('title') }}</td>
                            <td>{{ $video->prop('category', '-') }}</td>
                            <td><img src="{{ $thumbnailUrl }}" alt="Thumbnail" style="max-height: 60px;"></td>
                            <td>{{ $video->created_at->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('backend.videos.edit', $video->id) }}" class="btn btn-sm btn-outline-primary mb-1"><i class="fa fa-edit"></i> Edit</a>
                                <form action="{{ route('backend.videos.destroy', $video->id) }}" method="POST" class="d-inline-block">
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
