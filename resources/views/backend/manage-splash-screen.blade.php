@extends('components.backend.layout')

@section('page-title', 'Splash Screen')

@section('main-content')
    @php
        $splash = $data['splashScreen'];
        $fallbackLogo = $data['menuSettings']?->prop('logo_desktop') ? asset('storage/img/' . $data['menuSettings']->prop('logo_desktop')) : asset('_common/img/metta-logo-11.png');
        $currentLogoUrl = $splash['logo'] ? asset('storage/img/' . $splash['logo']) : $fallbackLogo;
    @endphp

    <div class="card">
        <div class="card-header">
            <div class="card-title">Opening / Splash Screen Animation</div>
        </div>
        <div class="card-body">
            <p class="text-muted">
                Shows a full-screen branded splash (logo, title, tagline) that fades in and out when the site first
                loads — similar to a mobile app's opening screen.
            </p>

            <form action="{{ route('backend.tasks', ['task' => 'save-splash-screen']) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-lg-7">
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" name="enabled" id="splash-enabled" value="1" {{ $splash['enabled'] ? 'checked' : '' }}>
                            <label class="form-check-label" for="splash-enabled">Show opening splash screen</label>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Splash Logo</label>
                            <p class="text-muted" style="font-size: 12px;">Optional — leave empty to use your main site logo.</p>
                            @if($splash['logo'])
                                <div class="mb-2">
                                    <img id="splash-logo-current" src="{{ $currentLogoUrl }}" style="max-height: 80px;">
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="remove_logo" id="remove-logo" value="1">
                                    <label class="form-check-label" for="remove-logo">Remove custom logo (use main site logo)</label>
                                </div>
                            @endif
                        </div>
                        @include('backend.partials.form.image-file', ['name' => 'splash_logo', 'label' => 'Upload Splash Logo'])

                        <div class="form-group">
                            <label class="form-control-label">Logo Size (px)</label>
                            <input type="range" class="form-range" name="logo_size" id="splash-logo-size" min="80" max="500" value="{{ $splash['logo_size'] }}" oninput="document.getElementById('splash-size-output').innerText = this.value + 'px'; document.getElementById('preview-logo').style.width = this.value + 'px';">
                            <span id="splash-size-output">{{ $splash['logo_size'] }}px</span>
                        </div>

                        @include('backend.partials.form.input', ['name' => 'title', 'label' => 'Title', 'useOld' => $splash['title'], 'attributes' => ['oninput' => "document.getElementById('preview-title').innerText = this.value"]])
                        @include('backend.partials.form.input', ['name' => 'tagline', 'label' => 'Tagline', 'useOld' => $splash['tagline'], 'attributes' => ['oninput' => "document.getElementById('preview-tagline').innerText = this.value"]])

                        <div class="form-group">
                            <label class="form-control-label">Text Alignment</label>
                            <select name="alignment" class="form-control" onchange="document.getElementById('preview-text-wrap').style.textAlign = this.value; document.getElementById('preview-text-wrap').style.alignItems = this.value === 'left' ? 'flex-start' : (this.value === 'right' ? 'flex-end' : 'center');">
                                @foreach(['left' => 'Left', 'center' => 'Center', 'right' => 'Right'] as $key => $label)
                                    <option value="{{ $key }}" {{ $splash['alignment'] == $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Font</label>
                            <select name="font_family" class="form-control" onchange="document.getElementById('preview-text-wrap').style.fontFamily = this.value;">
                                @foreach(['Poppins' => 'Poppins (Default)', 'Prata' => 'Prata (Serif)', 'Rubik' => 'Rubik', 'Hind' => 'Hind', 'Roboto' => 'Roboto', 'Noto Sans Bengali' => 'Noto Sans Bengali (বাংলা)'] as $key => $label)
                                    <option value="{{ $key }}" {{ $splash['font_family'] == $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Title Font Size (px)</label>
                            <input type="range" class="form-range" name="title_font_size" min="16" max="72" value="{{ $splash['title_font_size'] }}" oninput="document.getElementById('title-size-output').innerText = this.value + 'px'; document.getElementById('preview-title').style.fontSize = this.value + 'px';">
                            <span id="title-size-output">{{ $splash['title_font_size'] }}px</span>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Tagline Font Size (px)</label>
                            <input type="range" class="form-range" name="tagline_font_size" min="10" max="40" value="{{ $splash['tagline_font_size'] }}" oninput="document.getElementById('tagline-size-output').innerText = this.value + 'px'; document.getElementById('preview-tagline').style.fontSize = this.value + 'px';">
                            <span id="tagline-size-output">{{ $splash['tagline_font_size'] }}px</span>
                        </div>

                        @include('backend.partials.form.button', ['label' => 'Submit'])
                    </div>

                    <div class="col-lg-5">
                        <label class="form-control-label text-muted">LIVE PREVIEW</label>
                        <div style="background: #743233; border-radius: 8px; padding: 40px 20px; min-height: 280px; display: flex; align-items: center; justify-content: center;">
                            <div id="preview-text-wrap" style="display: flex; flex-direction: column; text-align: {{ $splash['alignment'] }}; align-items: {{ $splash['alignment'] === 'left' ? 'flex-start' : ($splash['alignment'] === 'right' ? 'flex-end' : 'center') }}; font-family: '{{ $splash['font_family'] }}', sans-serif;">
                                <img id="preview-logo" src="{{ $currentLogoUrl }}" style="width: {{ $splash['logo_size'] }}px; max-width: 100%; margin-bottom: 16px;">
                                <h3 id="preview-title" style="color: #fff; margin: 0; font-size: {{ $splash['title_font_size'] }}px;">{{ $splash['title'] }}</h3>
                                <p id="preview-tagline" style="color: #f0e6e0; margin: 4px 0 0; font-size: {{ $splash['tagline_font_size'] }}px;">{{ $splash['tagline'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
