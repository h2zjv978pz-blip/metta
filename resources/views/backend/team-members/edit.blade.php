@extends('components.backend.layout')

@section('page-title', 'Edit Team Member')

@section('main-content')
    <div class="card">
        <div class="card-body">
            @include('backend.partials.lsf-toggle')

            <form action="{{ route('backend.team-members.update', $team_member->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">
                        @include('backend.partials.form.input', ['name' => 'name', 'label' => 'Full Name', 'required' => true, 'useOld' => $team_member->prop('name')])
                        @include('backend.partials.form.select', ['name' => 'team', 'label' => 'Team', 'options' => $teams, 'required' => true, 'useOld' => $team_member->prop('team')])
                        @include('backend.partials.form.lsf.lsf-input', ['name' => 'designation', 'lang_options' => ['en', 'bn'], 'labels' => ['Designation', 'পদবি'], 'required' => true, 'useOld' => [$team_member, 'props', 'designation']])
                        @include('backend.partials.form.lsf.lsf-input', ['name' => 'qualification_l1', 'lang_options' => ['en', 'bn'], 'labels' => ['Qualification Info (Line 1)', 'যোগ্যতা (লাইন ১)'], 'useOld' => [$team_member, 'props', 'qualification_l1']])
                        @include('backend.partials.form.lsf.lsf-input', ['name' => 'qualification_l2', 'lang_options' => ['en', 'bn'], 'labels' => ['Qualification Info (Line 2)', 'যোগ্যতা (লাইন ২)'], 'useOld' => [$team_member, 'props', 'qualification_l2']])
                        @include('backend.partials.form.image-file', ['name' => 'photo', 'label' => 'Change Profile Photo'])

                        <h6 class="c-h6">Social Links</h6>

                        <div class="row">
                            @foreach(['Facebook', 'Behance', 'Pinterest', 'Whatsapp'] as $sm)
                                <div class="col-6">
                                    @include('backend.partials.form.input', ['name' => 'social_links[' . $sm . ']', 'placeholder' => $sm, 'useOld' => $team_member->prop('social_links')[$sm] ?? ''])
                                </div>
                            @endforeach
                        </div>
                        @include('backend.partials.form.button', ['label' => 'Submit', 'method' => 'PATCH'])
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
