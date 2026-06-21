<?php
$id                 = $id ?? $name;
$multiple           = $multiple ?? substr($name, -2) === '[]';
$attr_for           = !$multiple ? "for={$id}" : '';
$attr_id            = !$multiple ? "id={$id}" : '';
$fc_class           = "form-control" . (isset($fcClass) ? ' ' . $fcClass : '')
    . (isset($date) ? ' datepicker' : '')
    . (isset($datetime) ? ' datetimepicker' : '')
    . (isset($daterange) ? ' daterangepicker' : '');
?>

<div class="form-group {{ $class ?? '' }}">
    @if(isset($label))
        <label {{ $attr_for }} class="form-control-label">{{ @$label }}{{ !empty($required) ? ' *' : '' }}</label>
    @endif
    <input type="file" name="{{ $name }}{{ $multiple ? '[]' : '' }}" data-og-name="{{ $name }}" {{ $attr_id }} class="{{ $fc_class }} file-with-preview" accept="image/jpeg, image/png"
        {{ @$multiple ? "multiple" : "" }}
        {{ @$readOnly ? "readonly" : "" }}
        {{ !empty($required) ? "required" : "" }}
        @if(isset($attributes))
            @foreach($attributes as $key => $content)
                {{ "{$key}={$content}" }}
            @endforeach
        @endif
    style="height: 45px;">

    <div class="image-preview-container {{ isset($draggable) ? 'draggable-container' : '' }}"></div>
{{--    <span class="image-dimension"></span>--}}

    @if($errors->has(@$name))
        <span class="help-block">{{ $errors->first(@$name) }}</span>
    @endif
</div>
