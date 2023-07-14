<?php

namespace effcore;

# ─────────────────────────────────────────────────────────────────────
# nominative, feminine:
# ┌────────────┬───────────┬─────────────┬──────────────┬────────────┐
# │ 0 секунд   │ 10 секунд │ 20 секунд   │ 100 секунд   │ 110 секунд │
# │ 1 секунд а │ 11 секунд │ 21 секунд а │ 101 секунд а │ 111 секунд │
# │ 2 секунд ы │ 12 секунд │ 22 секунд ы │ 102 секунд ы │ 112 секунд │
# │ 3 секунд ы │ 13 секунд │ 23 секунд ы │ 103 секунд ы │ 113 секунд │
# │ 4 секунд ы │ 14 секунд │ 24 секунд ы │ 104 секунд ы │ 114 секунд │
# │ 5 секунд   │ 15 секунд │ 25 секунд   │ 105 секунд   │ 115 секунд │
# │ 6 секунд   │ 16 секунд │ 26 секунд   │ 106 секунд   │ 116 секунд │
# │ 7 секунд   │ 17 секунд │ 27 секунд   │ 107 секунд   │ 117 секунд │
# │ 8 секунд   │ 18 секунд │ 28 секунд   │ 108 секунд   │ 118 секунд │
# │ 9 секунд   │ 19 секунд │ 29 секунд   │ 109 секунд   │ 119 секунд │
# └────────────┴───────────┴─────────────┴──────────────┴────────────┘

# │   1 секунд а
# │  11 секунд
# │  21 секунд а
# │  31 секунд а
# │  91 секунд а
# --------------
# │ 101 секунд а
# │ 111 секунд
# │ 121 секунд а
# │ 131 секунд а
# │ 191 секунд а

# │   2 секунд ы
# │   3 секунд ы
# │   4 секунд ы
# | ------------
# │  12 секунд
# │  13 секунд
# │  14 секунд
# │  22 секунд ы
# │  23 секунд ы
# │  24 секунд ы
# │  92 секунд ы
# │  93 секунд ы
# │  94 секунд ы
# | ------------
# │ 102 секунд ы
# │ 103 секунд ы
# │ 104 секунд ы
# │ 112 секунд
# │ 113 секунд
# │ 114 секунд
# │ 122 секунд ы
# │ 123 секунд ы
# │ 124 секунд ы
# │ 192 секунд ы
# │ 193 секунд ы
# │ 194 секунд ы

$base_word = 'секунд';
$expected = [
      0 => $base_word,
      1 => $base_word.'а',
      2 => $base_word.'ы',
      3 => $base_word.'ы',
      4 => $base_word.'ы',
      5 => $base_word,
      6 => $base_word,
      7 => $base_word,
      8 => $base_word,
      9 => $base_word,
     10 => $base_word,
     11 => $base_word,
     12 => $base_word,
     13 => $base_word,
     14 => $base_word,
     15 => $base_word,
     16 => $base_word,
     17 => $base_word,
     18 => $base_word,
     19 => $base_word,
     20 => $base_word,
     21 => $base_word.'а',
     22 => $base_word.'ы',
     23 => $base_word.'ы',
     24 => $base_word.'ы',
     25 => $base_word,
     26 => $base_word,
     27 => $base_word,
     28 => $base_word,
     29 => $base_word,
    100 => $base_word,
    101 => $base_word.'а',
    102 => $base_word.'ы',
    103 => $base_word.'ы',
    104 => $base_word.'ы',
    105 => $base_word,
    106 => $base_word,
    107 => $base_word,
    108 => $base_word,
    109 => $base_word,
    110 => $base_word,
    111 => $base_word,
    112 => $base_word,
    113 => $base_word,
    114 => $base_word,
    115 => $base_word,
    116 => $base_word,
    117 => $base_word,
    118 => $base_word,
    119 => $base_word
];

$formula = '%^(?<variant_1>1|.*[^1]1)$|'.
            '^(?<variant_2>[234]|.*[^1][234])$%S';
$matches = [
    'variant_1' => 'а',
    'variant_2' => 'ы'
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
