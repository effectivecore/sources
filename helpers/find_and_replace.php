<?php

if (file_exists('core')) {

    $items = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator('core', \FilesystemIterator::UNIX_PATHS|\FilesystemIterator::SKIP_DOTS), \RecursiveIteratorIterator::CHILD_FIRST);
    foreach ($items as $c_path => $c_spl_file_info) {
        if (strpos($c_path, '/.git' ) !== false) continue;
        if (strpos($c_path, '/.idea') !== false) continue;
        if (strpos($c_path, '/.nova') !== false) continue;
        if (strpos($c_path, 'core/dynamic/cache') !== false) continue;
        if ($c_spl_file_info->isFile()) {
            $c_content = file_get_contents($c_path);
            preg_replace_callback('%some code%S', function ($c_match) use ($c_path) {
                # some actions
            }, $c_content);
        }
    }

}
