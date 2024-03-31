#!/usr/bin/env php
<?php

define('PATH_CURRENT', getcwd());
define('PATH_IN',  PATH_CURRENT.'/etalon.txt');
define('PATH_OUT', PATH_CURRENT.'/etalon-0.txt');

$result = [];

$fp = @fopen(PATH_IN, 'r');
if ($fp) {
    while (($c_string = fgets($fp, 4096)) !== false) {
        if (strlen($c_string) && $c_string[0] === '/') {
            $c_matches = [];
            preg_match('%.*(?<path>/[^/]+/[^/]+/[^/]+/[^/]+[.][a-z]+)$%S', $c_string, $c_matches);
            if (isset($c_matches['path'])) {
                $result[$c_matches['path']] =
                        $c_matches['path'];
            }
        }
    }
    fclose($fp);
}

ksort($result);

@unlink(PATH_OUT);
foreach ($result as $c_line) {
    file_put_contents(PATH_OUT, $c_line."\n", FILE_APPEND);
}