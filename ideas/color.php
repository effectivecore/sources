<?php

namespace effcore;

function generate_monochrome($count) {
    $result = [];
    $offset = (int)(0xff / ($count + 1));
    for ($i = 1; $i < $count + 1; $i++) {
        $r = $i * $offset;
        $g = $i * $offset;
        $b = $i * $offset;
        $result[] = '#'.str_pad(dechex($r), 2, '0', STR_PAD_LEFT).
                        str_pad(dechex($g), 2, '0', STR_PAD_LEFT).
                        str_pad(dechex($b), 2, '0', STR_PAD_LEFT); }
    return $result;
}
