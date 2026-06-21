<?php
$id                 = $id ?? $name;
$multiple           = $multiple ?? substr($name, -2) == '[]';
$attr_for           = !$multiple ? "for={$id}" : '';
$attr_id            = !$multiple ? "id={$id}" : '';
$fc_class           = "form-control" . (isset($fcClass) ? ' ' . $fcClass : '')
    . (isset($date) ? ' datepicker' : '')
    . (isset($datetime) ? ' datetimepicker' : '')
    . (isset($daterange) ? ' daterangepicker' : '');
?>

<div class="form-group {{ $class ?? '' }}">
    @if(isset($label))
        <label {{ $attr_for }} class="form-control-label col-xs-12">{{ @$label }}{{ isset($required) ? ' *' : '' }}</label>
    @endif
    <input type="file" name="{{ $name }}" {{ $attr_id }} class="{{ $fc_class }}"
        {{ @$readOnly ? "readonly" : "" }}
        {{ @$required ? "required" : "" }}
        @if(isset($attributes))
            @foreach($attributes as $key => $content)
                {{ "{$key}={$content}" }}
            @endforeach
        @endif
        {{ isset($accept) ? "accept={$accept}" : '' }}
    style="height: 45px;">

    <div class="image-preview-container"></div>

    @if($errors->has(@$name))
        <span class="help-block">{{ $errors->first(@$name) }}</span>
    @endif
</div>
