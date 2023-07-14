<?php

namespace effcore;

# ─────────────────────────────────────────────────────────────────────
# check if constant is deprecated (just insert this code to PHP file)
# ─────────────────────────────────────────────────────────────────────

$consts = [];
$consts[] = ARRAY_FILTER_USE_KEY;
$consts[] = CURL_SSLVERSION_TLSv1_2;
$consts[] = CURLOPT_FOLLOWLOCATION;
$consts[] = CURLOPT_HEADER;
$consts[] = CURLOPT_HEADERFUNCTION;
$consts[] = CURLOPT_HTTPHEADER;
$consts[] = CURLOPT_PATH_AS_IS;
$consts[] = CURLOPT_POST;
$consts[] = CURLOPT_POSTFIELDS;
$consts[] = CURLOPT_PROXY;
$consts[] = CURLOPT_RETURNTRANSFER;
$consts[] = CURLOPT_SSL_VERIFYHOST;
$consts[] = CURLOPT_SSL_VERIFYPEER;
$consts[] = CURLOPT_SSLVERSION;
$consts[] = CURLOPT_TIMEOUT;
$consts[] = CURLOPT_URL;
$consts[] = DEBUG_BACKTRACE_IGNORE_ARGS;
$consts[] = DIRECTORY_SEPARATOR;
$consts[] = ENT_COMPAT;
$consts[] = ENT_HTML5;
$consts[] = FILE_APPEND;
$consts[] = FilesystemIterator::SKIP_DOTS;
$consts[] = FilesystemIterator::UNIX_PATHS;
$consts[] = FILTER_FLAG_IPV4;
$consts[] = FILTER_FLAG_IPV6;
$consts[] = FILTER_FLAG_PATH_REQUIRED;
$consts[] = FILTER_SANITIZE_URL;
$consts[] = FILTER_VALIDATE_EMAIL;
$consts[] = FILTER_VALIDATE_IP;
$consts[] = FILTER_VALIDATE_REGEXP;
$consts[] = FILTER_VALIDATE_URL;
$consts[] = IMAGETYPE_GIF;
$consts[] = IMAGETYPE_JPEG;
$consts[] = IMAGETYPE_PNG;
$consts[] = JSON_PRETTY_PRINT;
$consts[] = PCRE_VERSION;
$consts[] = PDO::FETCH_CLASS;
$consts[] = PDO::FETCH_PROPS_LATE;
$consts[] = PHP_QUERY_RFC3986;
$consts[] = PHP_VERSION;
$consts[] = PREG_OFFSET_CAPTURE;
$consts[] = PREG_SET_ORDER;
$consts[] = RecursiveIteratorIterator::CHILD_FIRST;
$consts[] = RecursiveIteratorIterator::SELF_FIRST;
$consts[] = SORT_NUMERIC;
$consts[] = STR_PAD_LEFT;
$consts[] = UPLOAD_ERR_CANT_WRITE;
$consts[] = UPLOAD_ERR_EXTENSION;
$consts[] = UPLOAD_ERR_FORM_SIZE;
$consts[] = UPLOAD_ERR_INI_SIZE;
$consts[] = UPLOAD_ERR_NO_FILE;
$consts[] = UPLOAD_ERR_NO_TMP_DIR;
$consts[] = UPLOAD_ERR_OK;
$consts[] = UPLOAD_ERR_PARTIAL;

# ─────────────────────────────────────────────────────────────────────
# find constants
# ─────────────────────────────────────────────────────────────────────

$consts = [];
foreach (file::select_recursive(DIR_ROOT, '%^.*\\.php$%') as $c_path => $c_file) {
    $c_matches = [];
    $c_path_relative = $c_file->path_get_relative();
    preg_match_all('%(?<const>[A-Z][A-Z0-9\\_]{3,})%S', $c_file->load(), $c_matches, PREG_OFFSET_CAPTURE);
    if ($c_matches && !empty($c_matches['const'])) {
        foreach ($c_matches['const'] as $c_match) {
            $consts[$c_match[0]] = $c_path_relative.' | '.$c_match[1].' | '.$c_match[0];
        }
    }
}

asort($consts);
foreach ($consts as $c_const => $c_info) {
    print $c_const.NL;
}
