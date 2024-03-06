<?php

namespace effcore;

function binstr_to_hexstr($binstr) {
    $hexstr = '';
    foreach (str_split($binstr, 8) as $c_chunk) {
        $hexstr.= str_pad(base_convert(str_pad($c_chunk, 8, '0'), 2, 16), 2, '0', STR_PAD_LEFT);
    }
    return $hexstr;
}

function hexstr_to_binstr($hexstr) {
    $binstr = '';
    foreach (str_split($hexstr, 2) as $c_chunk) {
        $binstr.= str_pad(base_convert($c_chunk, 16, 2), 8, '0', STR_PAD_LEFT);
    }
    return $binstr;
}
