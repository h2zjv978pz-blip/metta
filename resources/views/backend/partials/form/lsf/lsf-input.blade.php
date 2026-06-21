<?php
$fields = [];
$lang_options = $lang_options ?? ['en', 'bn'];

for ($i = 0; $i < sizeof($lang_options); $i++) {
    $lang_option = $lang_options[$i];
    $label = $labels[$i];
    $input_params['name']   = $name;
    $input_params['label']  = $label;
    $input_params['lsf']    = $lang_option;
    $input_params['useOld'] = isset($useOld) ? $useOld[0]->getJson($useOld[1], $useOld[2] . ($lang_option != 'en' ? "_{$lang_option}" : '')) : '';
    $input_params['required'] = $i === 0 && isset($required);

    $fields[] = $input_params;
}
?>

@foreach ($fields as $field)
    @include('backend.partials.form.input', $field)
@endforeach
