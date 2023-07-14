<?php

namespace effcore;

$validation_matrix = [
    ''   => 0, '-'   => 0, '0'   => 1, '-0'   => 0, '1'   => 1, '-1'   => 1, '01'   => 0, '-01'   => 0, '12'   => 1, '-12'   => 1, '012'   => 0, '-012'   => 0,
    '.'  => 0, '-.'  => 0, '0.'  => 0, '-0.'  => 0, '1.'  => 0, '-1.'  => 0, '01.'  => 0, '-01.'  => 0, '12.'  => 0, '-12.'  => 0, '012.'  => 0, '-012.'  => 0,
    '.0' => 0, '-.0' => 0, '0.1' => 1, '-0.1' => 1, '1.2' => 1, '-1.2' => 1, '01.2' => 0, '-01.2' => 0, '12.3' => 1, '-12.3' => 1, '012.3' => 0, '-012.3' => 0,
];

foreach ($validation_matrix as $c_item => $is_right) {
    $result = preg_match('%^(?<integer>[-]?[1-9][0-9]*|0)$|'.
                          '^(?<float_s>[-]?[0-9][.][0-9]+)$|'.
                          '^(?<float_l>[-]?[1-9][0-9]+[.][0-9]+)$%S', $c_item, $match);
    print(($result == $is_right ? 'true' : 'FALSE')."\n");
    print('check item = "'.$c_item.'"'."\n");
    print('еxpected result = '.$is_right."\n");
    print('preg_match result = '.$result."\n");
    print_R($match);
    print("\n\n");
}
