<?php

namespace effcore;

foreach (Cache::select('data_original') as $c_root_name => $c_data_by_modules) {
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
        $c_file = new File($c_path);
        $c_file->data = Storage_Data::data_to_text($c_data_by_module, $c_root_name);
        $c_file->save();
    }
}