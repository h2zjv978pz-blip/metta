@extends('components.backend.layout')

@section('page-title', 'Menu Settings')

@section('main-content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Logo Settings</div>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.tasks', ['task' => 'save-menu-settings']) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">
                        <div class="form-group">
                            <label class="form-control-label">Desktop Logo</label>
                            @if($data['menuSettings']?->prop('logo_desktop'))
                                <div class="mb-2">
                                    <img src="{{ asset('storage/img/' . $data['menuSettings']->prop('logo_desktop')) }}" style="max-height: 80px; max-width: 100%;">
                                </div>
                            @endif
                        </div>
                        @include('backend.partials.form.image-file', ['name' => 'logo_desktop', 'label' => 'Replace Desktop Logo'])
                        @include('backend.partials.form.input', ['name' => 'logo_desktop_width', 'label' => 'Desktop Logo Width (px)', 'type' => 'number', 'useOld' => $data['menuSettings']?->prop('logo_desktop_width'), 'placeholder' => '200'])

                        <div class="form-group">
                            <label class="form-control-label">Mobile Logo</label>
                            @if($data['menuSettings']?->prop('logo_mobile'))
                                <div class="mb-2">
                                    <img src="{{ asset('storage/img/' . $data['menuSettings']->prop('logo_mobile')) }}" style="max-height: 60px; max-width: 100%;">
                                </div>
                            @endif
                        </div>
                        @include('backend.partials.form.image-file', ['name' => 'logo_mobile', 'label' => 'Replace Mobile Logo'])
                        @include('backend.partials.form.input', ['name' => 'logo_mobile_width', 'label' => 'Mobile Logo Width (px)', 'type' => 'number', 'useOld' => $data['menuSettings']?->prop('logo_mobile_width'), 'placeholder' => '150'])

                        @include('backend.partials.form.button', ['label' => 'Submit'])
                    </div>
                </div>
            </form>
        </div>
    </div>

    @php
        $menuLabels = [
            'home' => 'HOME',
            'buddhist_sites' => 'BUDDHIST SITES',
            'teachings' => 'TEACHINGS',
            'video' => 'VIDEO',
            'about' => 'ABOUT US',
            'library' => 'LIBRARY',
            'research' => 'RESEARCH & PUBLICATION',
            'kids_corner' => "KID'S CORNER",
            'donate' => 'DONATE',
            'contact' => 'CONTACT',
        ];
    @endphp

    <div class="card">
        <div class="card-header">
            <div class="card-title">Navigation Menu Order</div>
        </div>
        <div class="card-body">
            <p class="text-muted">Drag items to set the order they appear in the site's main navigation menu, then submit.</p>

            <form action="{{ route('backend.tasks', ['task' => 'save-menu-order']) }}" method="POST">
                @csrf
                <input type="hidden" name="menu_order" id="menu-order-input" value="{{ implode(',', $data['menuOrder']) }}">

                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">
                        <ul id="menu-order-list" class="list-group">
                            @foreach($data['menuOrder'] as $key)
                                @if(isset($menuLabels[$key]))
                                    <li class="list-group-item" draggable="true" data-key="{{ $key }}" style="cursor: move;">
                                        <i class="fa fa-bars me-2"></i>{{ $menuLabels[$key] }}
                                    </li>
                                @endif
                            @endforeach
                        </ul>

                        @include('backend.partials.form.button', ['label' => 'Save Order'])
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        (function () {
            var list = document.getElementById('menu-order-list');
            var input = document.getElementById('menu-order-input');
            var dragging = null;

            if (!list) return;

            function updateInput() {
                var keys = Array.from(list.querySelectorAll('li')).map(function (li) {
                    return li.dataset.key;
                });
                input.value = keys.join(',');
            }

            list.querySelectorAll('li').forEach(function (li) {
                li.addEventListener('dragstart', function () {
                    dragging = li;
                    li.classList.add('opacity-50');
                });
                li.addEventListener('dragend', function () {
                    dragging = null;
                    li.classList.remove('opacity-50');
                    updateInput();
                });
                li.addEventListener('dragover', function (e) {
                    e.preventDefault();
                    if (!dragging || dragging === li) return;
                    var rect = li.getBoundingClientRect();
                    var before = (e.clientY - rect.top) < rect.height / 2;
                    list.insertBefore(dragging, before ? li : li.nextSibling);
                });
            });
        })();
    </script>
@endsection
