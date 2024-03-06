<?php

namespace effcore;

$files = [];
foreach (file::select_recursive(DIR_SYSTEM,  '%^.*\\.(php|data|tpl)$%') +
         file::select_recursive(DIR_MODULES, '%^.*\\.(php|data|tpl)$%') as $c_path => $c_file) {
    if ($c_file->file_get() === 'translations-ru.data') continue;
    if ($c_file->file_get() === 'translations-be.data') continue;
    $files[$c_path] = $c_file;
    $c_file->load();
}

$translations = translation::select_all_by_code('ru');
foreach ($translations as $en => $ru) {
    print 'phrase: "'.$en.'"'.NL;
    foreach ($files as $c_path => $c_file) {
        $c_is_php_file = $c_file->type_get() === 'php' ? true : false;
        if (strpos($c_file->data, $c_is_php_file ? "'".$en."'" : $en) !== false) {
            print '- '.$c_file->path_get_relative().NL;
        }
    }
    print NL;
}
