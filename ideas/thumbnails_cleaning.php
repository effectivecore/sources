<?php

namespace effcore;

static function picture_thumbnails_cleaning($path, $name_prefix = '') {
    if (file_exists($path)) {
        foreach (file::select_recursive($path, '%^.*/'.preg_quote($name_prefix).'.*\\.thumb\\.(jpg|jpeg|png|gif)$%S') as $c_path => $c_file) {
            @unlink($c_path);
        }
    }
}
