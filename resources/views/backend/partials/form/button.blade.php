<?php
$attr_id            = isset($id) ? "id={$id}" : '';
$attr_name          = isset($name) ? "name={$name}" : '';
$fc_class           = $fcClass ?? 'btn btn-primary';
$icon               = isset($icon) ? "<i class='fa {$icon}'></i> " : '';
?>

<div class="form-group">
    <button {{ isset($method) ? 'name=_method value=' . $method : '' }} {{ $attr_name }} {{ $attr_id }} class="{{ $fc_class }}" type="submit">{!! $icon !!}{{ $label }}</button>
</div>
