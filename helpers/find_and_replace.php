<?php

define('PATH_CURRENT', getcwd());

$items = new RecursiveIteratorIterator(
             new RecursiveDirectoryIterator(
                 PATH_CURRENT,
                 FilesystemIterator::UNIX_PATHS|
                 FilesystemIterator::SKIP_DOTS),
             RecursiveIteratorIterator::CHILD_FIRST);

if ($items) {
    foreach ($items as $c_path => $c_spl_info) {
        # ignore '/dir/.someDir/dir' for '.git'|'.idea'|'.nova'|'.vscode'
        if (!preg_match('%/\.[a-z]+/%S', $c_path)) {
            if (strpos($c_path, 'core/dynamic/cache') !== false) continue;
            if ($c_spl_info->isFile()) {
                $c_content = file_get_contents($c_path);
                preg_replace_callback('%some code%S', function ($c_match) use ($c_path) {
                    # some actions
                }, $c_content);
            }
        }
    }
}
