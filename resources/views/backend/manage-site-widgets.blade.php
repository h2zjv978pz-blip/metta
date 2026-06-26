@extends('components.backend.layout')

@section('page-title', 'Site Widgets')

@section('main-content')
    @php
        $quickLinks = $data['quickLinks'];
        $zenMusic = $data['zenMusic'];
        $whatsappNumber = $data['socialLinks']?->prop('sLinkWhatsapp');
        $whatsappFloatingEnabled = $data['socialLinks'] ? (bool) $data['socialLinks']->prop('whatsapp_floating_enabled', true) : true;
    @endphp

    <div class="card" id="quick-links">
        <div class="card-header">
            <div class="card-title">Quick Link Buttons (Homepage)</div>
        </div>
        <div class="card-body">
            <p class="text-muted">Shows a row of quick-access buttons under the homepage hero (e.g. Videos, Books). Leave empty and disabled to hide.</p>

            <form action="{{ route('backend.tasks', ['task' => 'save-quick-links']) }}" method="POST">
                @csrf

                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" name="enabled" id="quick-links-enabled" value="1" {{ $quickLinks['enabled'] ? 'checked' : '' }}>
                    <label class="form-check-label" for="quick-links-enabled">Show quick link buttons on homepage</label>
                </div>

                <div id="quick-links-rows">
                    @forelse($quickLinks['links'] as $i => $link)
                        <div class="row quick-link-row align-items-end mb-3">
                            <div class="col-md-3">
                                <label class="form-control-label">Label (English)</label>
                                <input type="text" name="links[{{ $i }}][label]" class="form-control" value="{{ $link['label'] }}">
                            </div>
                            <div class="col-md-3">
                                <label class="form-control-label">Label (বাংলা)</label>
                                <input type="text" name="links[{{ $i }}][label_bn]" class="form-control" value="{{ $link['label_bn'] ?? '' }}">
                            </div>
                            <div class="col-md-5">
                                <label class="form-control-label">URL</label>
                                <input type="text" name="links[{{ $i }}][url]" class="form-control" value="{{ $link['url'] }}">
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-outline-danger remove-quick-link-row"><i class="fa fa-trash"></i></button>
                            </div>
                        </div>
                    @empty
                        <div class="row quick-link-row align-items-end mb-3">
                            <div class="col-md-3">
                                <label class="form-control-label">Label (English)</label>
                                <input type="text" name="links[0][label]" class="form-control" value="Videos">
                            </div>
                            <div class="col-md-3">
                                <label class="form-control-label">Label (বাংলা)</label>
                                <input type="text" name="links[0][label_bn]" class="form-control" value="ভিডিও">
                            </div>
                            <div class="col-md-5">
                                <label class="form-control-label">URL</label>
                                <input type="text" name="links[0][url]" class="form-control" value="{{ route('library.videos', ['locale' => 'en']) }}">
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-outline-danger remove-quick-link-row"><i class="fa fa-trash"></i></button>
                            </div>
                        </div>
                        <div class="row quick-link-row align-items-end mb-3">
                            <div class="col-md-3">
                                <label class="form-control-label">Label (English)</label>
                                <input type="text" name="links[1][label]" class="form-control" value="Books">
                            </div>
                            <div class="col-md-3">
                                <label class="form-control-label">Label (বাংলা)</label>
                                <input type="text" name="links[1][label_bn]" class="form-control" value="বই">
                            </div>
                            <div class="col-md-5">
                                <label class="form-control-label">URL</label>
                                <input type="text" name="links[1][url]" class="form-control" value="{{ route('library.books', ['locale' => 'en']) }}">
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-outline-danger remove-quick-link-row"><i class="fa fa-trash"></i></button>
                            </div>
                        </div>
                    @endforelse
                </div>

                <button type="button" id="add-quick-link-row" class="btn btn-outline-primary mb-4"><i class="fa fa-plus"></i> Add Button</button>
                <br>

                @include('backend.partials.form.button', ['label' => 'Submit'])
            </form>
        </div>
    </div>

    <div class="card" id="whatsapp-floating">
        <div class="card-header">
            <div class="card-title">Floating WhatsApp Button</div>
        </div>
        <div class="card-body">
            <p class="text-muted">
                Shows a floating WhatsApp icon on every page so visitors can message you directly.
                Uses the WhatsApp number set under <a href="{{ route('backend.tasks', ['task' => 'manage-general-info']) }}#achievement-counters">General Info &rarr; Social Links</a>.
            </p>

            @if($whatsappNumber)
                <p>Current link: <a href="{{ $whatsappNumber }}" target="_blank">{{ $whatsappNumber }}</a></p>
            @else
                <p class="text-danger">No WhatsApp number set yet. Add one under General Info &rarr; Social Links first.</p>
            @endif

            <form action="{{ route('backend.tasks', ['task' => 'save-whatsapp-floating']) }}" method="POST">
                @csrf
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" name="whatsapp_floating_enabled" id="whatsapp-floating-enabled" value="1" {{ $whatsappFloatingEnabled ? 'checked' : '' }}>
                    <label class="form-check-label" for="whatsapp-floating-enabled">Show floating WhatsApp button</label>
                </div>
                @include('backend.partials.form.button', ['label' => 'Submit'])
            </form>
        </div>
    </div>

    <div class="card" id="zen-music">
        <div class="card-header">
            <div class="card-title">Zen / Ambient Music Button</div>
        </div>
        <div class="card-body">
            <p class="text-muted">Shows a floating button that lets visitors play a calm ambient/meditation track while browsing the site. Never autoplays — only starts when the visitor clicks it.</p>

            <form action="{{ route('backend.tasks', ['task' => 'save-zen-music']) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" name="enabled" id="zen-enabled" value="1" {{ $zenMusic['enabled'] ? 'checked' : '' }}>
                    <label class="form-check-label" for="zen-enabled">Show floating zen music button</label>
                </div>

                <div class="form-group">
                    <label class="form-control-label">Ambient Audio Track</label>
                    @if($zenMusic['file'])
                        <p>
                            Current: <audio controls src="{{ asset('storage/audio/' . $zenMusic['file']) }}" style="height: 32px; vertical-align: middle;"></audio>
                        </p>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="remove_audio" id="remove-audio" value="1">
                            <label class="form-check-label" for="remove-audio">Remove current track</label>
                        </div>
                    @endif
                </div>
                @include('backend.partials.form.file', ['name' => 'zen_audio', 'label' => 'Upload Audio (mp3)', 'accept' => 'audio/*'])

                @include('backend.partials.form.input', ['name' => 'label', 'label' => 'Button Label (English)', 'useOld' => $zenMusic['label']])
                @include('backend.partials.form.input', ['name' => 'label_bn', 'label' => 'Button Label (বাংলা)', 'useOld' => $zenMusic['label_bn']])

                <div class="form-group">
                    <label class="form-control-label">Default Volume</label>
                    <input type="range" class="form-range" name="volume" min="0.05" max="1" step="0.05" value="{{ $zenMusic['volume'] }}">
                </div>

                @include('backend.partials.form.button', ['label' => 'Submit'])
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var rowsWrap = document.getElementById('quick-links-rows');
            var addBtn = document.getElementById('add-quick-link-row');

            if (!rowsWrap || !addBtn) return;

            function nextIndex() {
                return rowsWrap.querySelectorAll('.quick-link-row').length;
            }

            addBtn.addEventListener('click', function () {
                var i = nextIndex();
                var row = document.createElement('div');
                row.className = 'row quick-link-row align-items-end mb-3';
                row.innerHTML =
                    '<div class="col-md-3"><label class="form-control-label">Label (English)</label>' +
                    '<input type="text" name="links[' + i + '][label]" class="form-control"></div>' +
                    '<div class="col-md-3"><label class="form-control-label">Label (বাংলা)</label>' +
                    '<input type="text" name="links[' + i + '][label_bn]" class="form-control"></div>' +
                    '<div class="col-md-5"><label class="form-control-label">URL</label>' +
                    '<input type="text" name="links[' + i + '][url]" class="form-control"></div>' +
                    '<div class="col-md-1"><button type="button" class="btn btn-outline-danger remove-quick-link-row"><i class="fa fa-trash"></i></button></div>';
                rowsWrap.appendChild(row);
            });

            rowsWrap.addEventListener('click', function (e) {
                var btn = e.target.closest('.remove-quick-link-row');
                if (btn) {
                    btn.closest('.quick-link-row').remove();
                }
            });
        });
    </script>
@endsection
