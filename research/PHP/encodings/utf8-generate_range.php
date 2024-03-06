<?php

namespace effcore;

# note:
# ═══╦════════════════════════════════════════════════════════════════════
# L  ║ Letter (Includes the following properties: Ll, Lm, Lo, Lt and Lu.)
# Ll ║ Lower case letter
# Lm ║ Modifier letter
# Lo ║ Other letter
# Lt ║ Title case letter
# Lu ║ Upper case letter
# ───╨────────────────────────────────────────────────────────────────────
# p.s.: \\p{L} === \\p{Ll}\\p{Lm}\\p{Lo}\\p{Lt}\\p{Lu} === [:alpha:]

$file = fopen('utf8-generate_range-report.md', 'wb');
for ($i = 1; $i < 0xffffff; $i++) {
    $c_byte_1 = $i       & 0xff;
    $c_byte_2 = $i >>  8 & 0xff;
    $c_byte_3 = $i >> 16 & 0xff;
    $c_result = [];
    $c_utfchr = '';
    if ($c_byte_3) $c_utfchr.= chr($c_byte_3);
    if ($c_byte_2) $c_utfchr.= chr($c_byte_2);
    if ($c_byte_1) $c_utfchr.= chr($c_byte_1);
    if (preg_match('%^[\\p{Ll}\\p{Lm}\\p{Lo}\\p{Lt}\\p{Lu}]$%uS', $c_utfchr, $c_result)) { # '%^[[:alpha:]]$%uS'
        $c_report_line = dechex($i).' | '.
                         dechex($c_byte_3).':'.
                         dechex($c_byte_2).':'.
                         dechex($c_byte_1).' = '.$c_result[0].NL;
        print $c_report_line;
        fwrite($file, $c_report_line);
    }
}
