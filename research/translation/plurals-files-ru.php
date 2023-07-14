<?php

namespace effcore;

# ─────────────────────────────────────────────────────────────────────
# nominative, masculine:
# ┌───────────┬────────────┬────────────┬─────────────┬─────────────┐
# │ 0 файл ов │ 10 файл ов │ 20 файл ов │ 100 файл ов │ 110 файл ов │
# │ 1 файл    │ 11 файл ов │ 21 файл    │ 101 файл    │ 111 файл ов │
# │ 2 файл а  │ 12 файл ов │ 22 файл а  │ 102 файл а  │ 112 файл ов │
# │ 3 файл а  │ 13 файл ов │ 23 файл а  │ 103 файл а  │ 113 файл ов │
# │ 4 файл а  │ 14 файл ов │ 24 файл а  │ 104 файл а  │ 114 файл ов │
# │ 5 файл ов │ 15 файл ов │ 25 файл ов │ 105 файл ов │ 115 файл ов │
# │ 6 файл ов │ 16 файл ов │ 26 файл ов │ 106 файл ов │ 116 файл ов │
# │ 7 файл ов │ 17 файл ов │ 27 файл ов │ 107 файл ов │ 117 файл ов │
# │ 8 файл ов │ 18 файл ов │ 28 файл ов │ 108 файл ов │ 118 файл ов │
# │ 9 файл ов │ 19 файл ов │ 29 файл ов │ 109 файл ов │ 119 файл ов │
# └───────────┴────────────┴────────────┴─────────────┴─────────────┘

$base_word = 'файл';
$expected = [
      0 => $base_word.'ов',
      1 => $base_word,
      2 => $base_word.'а',
      3 => $base_word.'а',
      4 => $base_word.'а',
      5 => $base_word.'ов',
      6 => $base_word.'ов',
      7 => $base_word.'ов',
      8 => $base_word.'ов',
      9 => $base_word.'ов',
     10 => $base_word.'ов',
     11 => $base_word.'ов',
     12 => $base_word.'ов',
     13 => $base_word.'ов',
     14 => $base_word.'ов',
     15 => $base_word.'ов',
     16 => $base_word.'ов',
     17 => $base_word.'ов',
     18 => $base_word.'ов',
     19 => $base_word.'ов',
     20 => $base_word.'ов',
     21 => $base_word,
     22 => $base_word.'а',
     23 => $base_word.'а',
     24 => $base_word.'а',
     25 => $base_word.'ов',
     26 => $base_word.'ов',
     27 => $base_word.'ов',
     28 => $base_word.'ов',
     29 => $base_word.'ов',
    100 => $base_word.'ов',
    101 => $base_word,
    102 => $base_word.'а',
    103 => $base_word.'а',
    104 => $base_word.'а',
    105 => $base_word.'ов',
    106 => $base_word.'ов',
    107 => $base_word.'ов',
    108 => $base_word.'ов',
    109 => $base_word.'ов',
    110 => $base_word.'ов',
    111 => $base_word.'ов',
    112 => $base_word.'ов',
    113 => $base_word.'ов',
    114 => $base_word.'ов',
    115 => $base_word.'ов',
    116 => $base_word.'ов',
    117 => $base_word.'ов',
    118 => $base_word.'ов',
    119 => $base_word.'ов'
];

$formula = '%^(?<variant_1>[05-9]|.*[1][0-9]|.*[^1][05-9])$|'.
            '^(?<variant_2>[234]|.*[^1][234])$%S';
$matches = [
    'variant_1' => 'ов',
    'variant_2' => 'а'
];

foreach ($expected as $c_num => $c_word) {
    $c_preg_matches = [];
    $c_result_word = $base_word;
    preg_match($formula, (string)$c_num, $c_preg_matches);
    if (isset($c_preg_matches['variant_1']) && strlen($c_preg_matches['variant_1'])) $c_result_word.= $matches['variant_1'];
    if (isset($c_preg_matches['variant_2']) && strlen($c_preg_matches['variant_2'])) $c_result_word.= $matches['variant_2'];
    print str_pad($c_num, 3, ' ', STR_PAD_LEFT).' ';
    print $c_word.' '.$c_result_word.' '.($c_word === $c_result_word ? 'TRUE' : 'FALSE').NL;
}
