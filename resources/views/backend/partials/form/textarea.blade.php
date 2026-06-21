<?php
$id                 = $id ?? $name;
$lsf                = $lsf ?? false;
$attr_id            = !isset($multiple) ? "id={$id}" : '';
$attr_for           = !isset($multiple) ? "for={$id}" : '';
$fc_classes         = "form-control" . (isset($fcClasses) ? ' ' . $fcClasses : '') . (!empty($wysiwyg) ? ' summernote' : '');
$attr_row           = "rows=" . ($row ?? '2');
?>

<div class="form-group {{ $class ?? '' }}{{ $lsf ? " lsf {$lsf}" : '' }}">
    @if(isset($label))
        <label class="form-control-label" {{ $attr_for }}>{{ $label }}{{ isset($required) ? ' *' : '' }}</label>
    @endif
   <textarea name="{{ $name }}{{ $lsf && $lsf != 'en' ? "_{$lsf}" : '' }}"" data-toggle="autosize" {{ $attr_row }} placeholder="{{ $placeholder ?? '' }}" class="{{ $fc_classes }}" spellcheck="false">{{ $useOld ?? '' }}</textarea>
</div>
