@extends('components.backend.layout')

@section('page-title', 'Edit Client')

@section('main-content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('backend.tasks', ['task' => 'update-client', 'id' => $client->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">
                        @include('backend.partials.form.input', ['name' => 'name', 'label' => 'Client Name', 'required' => true, 'useOld' => $client->prop('name')])
                        @include('backend.partials.form.image-file', ['name' => 'logo', 'label' => 'Logo/Image', 'required' => true])
                        @include('backend.partials.form.button', ['label' => 'Submit'])
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
