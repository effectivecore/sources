#!/usr/bin/env php
<?php

#  RUN: git filter-branch --tree-filter 'path/to/this'

define('PATH_LOG', $_SERVER['argv'][0].'.log');
define('PATH_CURRENT', getcwd());
define('PATH_GIT_COMMIT_INFO', PATH_CURRENT.'/../'.'commit');

report('');
# report('current path: '.PATH_CURRENT);

$items = new RecursiveIteratorIterator(
             new RecursiveDirectoryIterator(
                 PATH_CURRENT,
                 FilesystemIterator::UNIX_PATHS|
                 FilesystemIterator::SKIP_DOTS),
             RecursiveIteratorIterator::CHILD_FIRST);

if ($items) {
    $is_print_header = false;
    foreach ($items as $c_path => $c_spl_info) {
        if ($c_spl_info->isFile()) {
            #if (preg_match('%\\.php$|\\.data$%', $c_path)) {
                if ($is_print_header === false) {
                    $is_print_header = true;
                    if (file_exists(PATH_GIT_COMMIT_INFO)) {
                        report(file_get_contents(PATH_GIT_COMMIT_INFO));
                    }
                }
                report(str_replace(PATH_CURRENT, '', $c_path));
            #}
        }
    }
} else {
    report('no files found');
}

function report($line) {
    file_put_contents(PATH_LOG, $line."\n", FILE_APPEND);
}

exit();