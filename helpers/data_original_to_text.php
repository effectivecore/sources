<?php

namespace effcore;

$root_path = Dynamic::DIR_FILES.'data_to_text/';

foreach (Cache::select('data_original') as $c_root_name => $c_data_by_modules) {
    foreach ($c_data_by_modules as $c_module_id => $c_data_by_module) {

                                                $c_module_path = 'system/module_'.$c_module_id.'/';
        if ($c_module_id === 'demo'           ) $c_module_path = 'system/module_develop/module_demo/';
        if ($c_module_id === 'test'           ) $c_module_path = 'system/module_develop/module_test/';
        if ($c_module_id === 'project'        ) $c_module_path = 'system/module_develop/module_project/';
        if ($c_module_id === 'translation_ru' ) $c_module_path = 'system/module_locale/module_translation_ru/';
        if ($c_module_id === 'translation_be' ) $c_module_path = 'system/module_locale/module_translation_be/';
        if ($c_module_id === 'translation_uk' ) $c_module_path = 'system/module_locale/module_translation_uk/';
        if ($c_module_id === 'profile_default') $c_module_path = 'system/profiles/profile_default/';
        if ($c_module_id === 'examples'       ) $c_module_path = 'modules/examples/';
        if ($c_module_id === 'profile_classic') $c_module_path = 'modules/examples/profile_classic/';
        if ($c_module_id === 'vendors'        ) $c_module_path = 'modules/vendors/';
        
        if (in_array($c_root_name, ['forms', 'pages', 'tests', 'markup', 'translations', 'data_validators'])) {
            foreach ($c_data_by_module as $c_row_id => $c_data_by_instance) {

                if ($c_root_name === 'forms'          ) $c_path = $root_path.$c_module_path.'data/'.'form'          .'--'.$c_row_id.'.data';
                if ($c_root_name === 'pages'          ) $c_path = $root_path.$c_module_path.'data/'.'page'          .'--'.$c_row_id.'.data';
                if ($c_root_name === 'tests'          ) $c_path = $root_path.$c_module_path.'data/'.'test'          .'--'.$c_row_id.'.data';
                if ($c_root_name === 'markup'         ) $c_path = $root_path.$c_module_path.'data/'.'markup'        .'--'.$c_row_id.'.data';
                if ($c_root_name === 'translations'   ) $c_path = $root_path.$c_module_path.'data/'.'translations'  .'--'.$c_row_id.'.data';
                if ($c_root_name === 'data_validators') $c_path = $root_path.$c_module_path.'data/'.'data_validator'.'--'.$c_row_id.'.data';

                $c_file = new File($c_path);
                $c_file->data = Storage_Data::data_to_text(
                    [$c_row_id => $c_data_by_instance], $c_root_name
                );
                $c_file->save();

            }
        } else {

                                                                        $c_path = $root_path.$c_module_path.'data/'.$c_root_name.'.data';
            if ($c_root_name === 'module'                             ) $c_path = $root_path.$c_module_path.'module'            .'.data';
            if ($c_root_name === 'bundle'                             ) $c_path = $root_path.$c_module_path.'bundle'            .'.data';
            if ($c_root_name === 'bundle' && $c_module_id === 'system') $c_path = $root_path.'system/'     .'bundle'            .'.data';

            $c_file = new File($c_path);
            $c_file->data = Storage_Data::data_to_text($c_data_by_module, $c_root_name);
            $c_file->save();

        }
    }
}