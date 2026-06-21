<?php
$id                 = $id ?? $name;
$lsf                = $lsf ?? false;
$multiple           = $multiple ?? substr($name, -2) == '[]';
$attr_for           = !$multiple ? "for={$id}" : '';
$attr_id            = !$multiple ? "id={$id}" : '';
$fc_class           = "form-control" . (isset($fcClass) ? ' ' . $fcClass : '')
    . (isset($date) ? ' datepicker' : '')
    . (isset($datetime) ? ' datetimepicker' : '')
    . (isset($daterange) ? ' daterangepicker' : '')
    . (isset($endDate) ? ' end-date' : '');
?>

<div class="form-group {{ $class ?? '' }}{{ $lsf ? " lsf {$lsf}" : '' }}">
    @if(isset($label))
        <label {{ $attr_for }} class="form-control-label col-xs-12">{{ $label }}{{ !empty($required) ? ' *' : '' }}</label>
    @endif
    <input type="{{ @$type ? $type : 'text' }}" name="{{ $name }}{{ $lsf && $lsf != 'en' ? "_{$lsf}" : '' }}" {{ $attr_id }} class="{{ $fc_class }}" value="{{ @$useOld }}" placeholder="{{ @$placeholder ? $placeholder : '' }}"
        {{ @$readOnly ? "readonly" : "" }}
        {{ @$required ? "required" : "" }}
        @if(isset($attributes))
            @foreach($attributes as $key => $content)
                {{ "{$key}={$content}" }}
            @endforeach
        @endif
        autocomplete="off"
    >
    @if(isset($errors) && $errors->has(@$name))
        <span class="help-block">{{ $errors->first(@$name) }}</span>
    @endif
</div>
