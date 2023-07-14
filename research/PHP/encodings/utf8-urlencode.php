<?php

namespace effcore;

$file = fopen('utf8-urlencode-report.md', 'wb');
for ($i = 0; $i < 0xffff; $i++) {
    $c_byte_1 = $i       & 0xff;
    $c_byte_2 = $i >>  8 & 0xff;
    $c_byte_3 = $i >> 16 & 0xff;
    $c_utfchr = '';
    if ($c_byte_3) $c_utfchr.= chr($c_byte_3);
    if ($c_byte_2) $c_utfchr.= chr($c_byte_2);
    if ($c_byte_1) $c_utfchr.= chr($c_byte_1);
    $c_report_line = dechex($i).' | '.
                     dechex($c_byte_3).':'.
                     dechex($c_byte_2).':'.
                     dechex($c_byte_1).' = '.$c_utfchr.' | '.urlencode($c_utfchr).NL;
    print $c_report_line;
    fwrite($file, $c_report_line);
}
