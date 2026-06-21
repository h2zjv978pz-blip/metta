<?php
$id                 = $id ?? $name;
$multiple           = $multiple ?? substr($name, -2) == '[]';
$attr_id            = !$multiple ? "id={$id}" : '';
$attr_for           = !$multiple ? "for={$id}" : '';
$fc_class           = "form-control" . (isset($fcClass) ? ' ' . $fcClass : '');
?>

<div class="form-group">
    @if(isset($label))
        <label class="form-control-label" {{ $attr_for }}>{{ $label }}{{ isset($required) ? ' *' : '' }}</label>
    @endif
    <select name="{{ $name }}" {{ $attr_id }} class="{{ $fc_class }}{{ isset($insertable) ? ' insertable-select' : '' }}"
        @if(isset($insertable))
            data-input-placeholder="{{ $label ?? $title }}"
        @endif
        {{ isset($insertable) ? 'data-input-placeholder=' . ($label ?? $title) : '' }}
        >
        @if(isset($title))
            <option disabled="disabled" {{ !isset($useOld) ? 'selected' : '' }}>{{ $title === true ? 'Choose ' . $label : $title }}</option>
        @endif
        @if(isset($insertable))
            <option value="--insert--">+ &nbsp; Add New</option>
        @endif
        @if(isset($reset))
            <option value="">{{ $reset !== true ? $reset : 'Any' }}</option>
        @endif
        @if(isset($useKeys))
            @foreach($options as $key => $value)
                <option value="{{ $key }}" {{ @$useOld == $key ? 'selected=selected' : '' }}>{{ $value }}</option>
            @endforeach
        @else
            @foreach($options as $value)
                <option value="{{ $value }}" {{ @$useOld == $value ? 'selected=selected' : '' }}>{{ ucwords($value) }}</option>
            @endforeach
        @endif
    </select>
</div>
