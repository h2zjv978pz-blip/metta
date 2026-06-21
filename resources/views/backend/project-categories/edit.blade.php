@extends('components.backend.layout')

@section('page-title', 'Edit Project Category')

@section('main-content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('backend.project-categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">
                        @include('backend.partials.form.input', ['name' => 'name', 'label' => 'Category Name', 'required' => true, 'useOld' => $category->prop('name')])
                        @include('backend.partials.form.button', ['label' => 'Submit', 'method' => 'PATCH'])
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
