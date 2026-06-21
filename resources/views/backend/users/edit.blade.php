@extends('components.backend.layout')

@section('page-title', 'Update User')

@section('main-content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('backend.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">
                        @include('backend.partials.form.input', ['name' => 'username', 'label' => 'Login Username', 'required' => true, 'useOld' => $user->username])
                        @include('backend.partials.form.input', ['name' => 'name', 'label' => 'Full Name', 'required' => true, 'useOld' => $user->name])
                        @include('backend.partials.form.input', ['name' => 'password', 'label' => 'Change Password'])
                        @include('backend.partials.form.select', ['name' => 'level', 'label' => 'User Role', 'options' => config('site.user_roles'), 'useKeys' => true, 'required' => true, 'useOld' => $user->level])

                        @include('backend.partials.form.button', ['label' => 'Submit', 'method' => 'PATCH'])
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
