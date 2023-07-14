<?php

namespace effcore;

$data_text_src = <<<EOD
attributes
- string: text
- string_empty: 
- string_true|_string_true
- string_false|_string_false
- integer: 123
- float: 0.000001
- boolean_true: true
- boolean_false: false
- null: null
- array_empty|_empty_array
- array
  - item_string: text
  - item_string_empty: 
  - item_string_true|_string_true
  - item_string_false|_string_false
  - item_integer: 123
  - item_float: 0.000001
  - item_boolean_true: true
  - item_boolean_false: false
  - item_null: null
  - item_array_empty|_empty_array
- object_text|text
    is_apply_tokens: false
    is_apply_translation: true
    text: some text
    weight: 0
    custom_preperty: null
- object_text_simple|text_simple
    delimiter|_string_nl
    text: some text
    weight: 0
    custom_preperty: null
EOD;

# ◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦

$data_text_dst = <<<EOD
attributes
- string: text
- string_empty: 
- string_true|_string_true
- string_false|_string_false
- integer: 123
- float: 0.000001
- boolean_true: true
- boolean_false: false
- null: null
- array_empty|_empty_array
- array
  - item_string: text
  - item_string_empty: 
  - item_string_true|_string_true
  - item_string_false|_string_false
  - item_integer: 123
  - item_float: 0.000001
  - item_boolean_true: true
  - item_boolean_false: false
  - item_null: null
  - item_array_empty|_empty_array
- object_text|text
    text: some text
    custom_preperty: null
- object_text_simple|text_simple
    text: some text
    custom_preperty: null
EOD;

# ◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦

$data = storage_nosql_data::text_to_data($data_text_src)->data;
var_dump(
    storage_nosql_data::data_to_text($data->attributes, 'attributes') === $data_text_dst
);

# ◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦◦

$data_orig = cache::select('data_original');
foreach ($data_orig as $c_root_name => $c_data_by_modules) {
    foreach ($c_data_by_modules as $c_module_id => $c_data_by_module) {
        $root_dir = '';
        if ($c_module_id === 'demo'          ) $root_dir = 'module_develop/';
        if ($c_module_id === 'test'          ) $root_dir = 'module_develop/';
        if ($c_module_id === 'project'       ) $root_dir = 'module_develop/';
        if ($c_module_id === 'translation_be') $root_dir = 'module_locale/';
        if ($c_module_id === 'translation_ru') $root_dir = 'module_locale/';
                                       $c_path = 'data_to_text/'.$root_dir.'module_'.$c_module_id.'/data/'.$c_root_name.'.data';
        if ($c_root_name === 'module') $c_path = 'data_to_text/'.$root_dir.'module_'.$c_module_id.'/'     .$c_root_name.'.data';
        if ($c_root_name === 'bundle') $c_path = 'data_to_text/'.$root_dir.                       '/'     .$c_root_name.'-'.$c_module_id.'.data';
        $c_file = new file($c_path);
        $c_file->data = storage_nosql_data::data_to_text($c_data_by_module, $c_root_name);
        $c_file->save();
    }
}
