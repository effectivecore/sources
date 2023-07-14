<?php

namespace effcore;

# hex ip to ip platform differences:
# ┌──────────────────────────────────┬─────────────────────────────────────────┬─────────────────────────────────────────┐
# │ hex ip                           │                        to ip on win-x86 │                        to ip on osx-x64 │
# ├──────────────────────────────────┼─────────────────────────────────────────┼─────────────────────────────────────────┤
# │ 00000000000000000000000000000000 │                                      :: │                                      :: │
# │ 0000000000000000000000000000000f │                                     ::f │                              ::0.0.0.15 │
# │ 000000000000000000000000000000ff │                                    ::ff │                             ::0.0.0.255 │
# │ 00000000000000000000000000000fff │                                   ::fff │                            ::0.0.15.255 │
# │ 0000000000000000000000000000ffff │                                  ::ffff │                           ::0.0.255.255 │
# │ 000000000000000000000000000fffff │                          ::0.15.255.255 │                          ::0.15.255.255 │
# │ 00000000000000000000000000ffffff │                         ::0.255.255.255 │                         ::0.255.255.255 │
# │ 0000000000000000000000000fffffff │                        ::15.255.255.255 │                        ::15.255.255.255 │
# │ 000000000000000000000000ffffffff │                       ::255.255.255.255 │                       ::255.255.255.255 │
# │ 00000000000000000000000fffffffff │                           ::f:ffff:ffff │                           ::f:ffff:ffff │
# │ 0000000000000000000000ffffffffff │                          ::ff:ffff:ffff │                          ::ff:ffff:ffff │
# │ 000000000000000000000fffffffffff │                         ::fff:ffff:ffff │                         ::fff:ffff:ffff │
# │ 00000000000000000000ffffffffffff │                  ::ffff:255.255.255.255 │                  ::ffff:255.255.255.255 │
# │ 0000000000000000000fffffffffffff │                      ::f:ffff:ffff:ffff │                      ::f:ffff:ffff:ffff │
# │ 000000000000000000ffffffffffffff │                     ::ff:ffff:ffff:ffff │                     ::ff:ffff:ffff:ffff │
# │ 00000000000000000fffffffffffffff │                    ::fff:ffff:ffff:ffff │                    ::fff:ffff:ffff:ffff │
# │ 0000000000000000ffffffffffffffff │                   ::ffff:ffff:ffff:ffff │                   ::ffff:ffff:ffff:ffff │
# │ 000000000000000fffffffffffffffff │                 ::f:ffff:ffff:ffff:ffff │                 ::f:ffff:ffff:ffff:ffff │
# │ 00000000000000ffffffffffffffffff │                ::ff:ffff:ffff:ffff:ffff │                ::ff:ffff:ffff:ffff:ffff │
# │ 0000000000000fffffffffffffffffff │               ::fff:ffff:ffff:ffff:ffff │               ::fff:ffff:ffff:ffff:ffff │
# │ 000000000000ffffffffffffffffffff │              ::ffff:ffff:ffff:ffff:ffff │              ::ffff:ffff:ffff:ffff:ffff │
# │ 00000000000fffffffffffffffffffff │            ::f:ffff:ffff:ffff:ffff:ffff │            ::f:ffff:ffff:ffff:ffff:ffff │
# │ 0000000000ffffffffffffffffffffff │           ::ff:ffff:ffff:ffff:ffff:ffff │           ::ff:ffff:ffff:ffff:ffff:ffff │
# │ 000000000fffffffffffffffffffffff │          ::fff:ffff:ffff:ffff:ffff:ffff │          ::fff:ffff:ffff:ffff:ffff:ffff │
# │ 00000000ffffffffffffffffffffffff │         ::ffff:ffff:ffff:ffff:ffff:ffff │         ::ffff:ffff:ffff:ffff:ffff:ffff │
# │ 0000000fffffffffffffffffffffffff |       0:f:ffff:ffff:ffff:ffff:ffff:ffff │       ::f:ffff:ffff:ffff:ffff:ffff:ffff │
# │ 000000ffffffffffffffffffffffffff |      0:ff:ffff:ffff:ffff:ffff:ffff:ffff │      ::ff:ffff:ffff:ffff:ffff:ffff:ffff │
# │ 00000fffffffffffffffffffffffffff |     0:fff:ffff:ffff:ffff:ffff:ffff:ffff │     ::fff:ffff:ffff:ffff:ffff:ffff:ffff │
# │ 0000ffffffffffffffffffffffffffff |    0:ffff:ffff:ffff:ffff:ffff:ffff:ffff │    ::ffff:ffff:ffff:ffff:ffff:ffff:ffff │
# │ 000fffffffffffffffffffffffffffff |    f:ffff:ffff:ffff:ffff:ffff:ffff:ffff │    f:ffff:ffff:ffff:ffff:ffff:ffff:ffff │
# │ 00ffffffffffffffffffffffffffffff |   ff:ffff:ffff:ffff:ffff:ffff:ffff:ffff │   ff:ffff:ffff:ffff:ffff:ffff:ffff:ffff │
# │ 0fffffffffffffffffffffffffffffff |  fff:ffff:ffff:ffff:ffff:ffff:ffff:ffff │  fff:ffff:ffff:ffff:ffff:ffff:ffff:ffff │
# │ ffffffffffffffffffffffffffffffff | ffff:ffff:ffff:ffff:ffff:ffff:ffff:ffff │ ffff:ffff:ffff:ffff:ffff:ffff:ffff:ffff │
# └──────────────────────────────────┴─────────────────────────────────────────┴─────────────────────────────────────────┘
#
#            ::ffff ==          ::0.0.255.255 == 0000000000000000000000000000ffff
#       ::ffff:ffff ==      ::255.255.255.255 == 000000000000000000000000ffffffff
#  ::ffff:ffff:ffff == ::ffff:255.255.255.255 == 00000000000000000000ffffffffffff

# ─────────────────────────────────────────────────────────────────────
# ip to hex
# ─────────────────────────────────────────────────────────────────────

$test_ip_to_hex[                                '0.0.0.0'] = '00000000';
$test_ip_to_hex[                                '0.0.0.1'] = '00000001';
$test_ip_to_hex[                              '127.0.0.0'] = '7f000000';
$test_ip_to_hex[                              '127.0.0.1'] = '7f000001';
$test_ip_to_hex[                        '255.255.255.255'] = 'ffffffff';
$test_ip_to_hex[                                     '::'] = '00000000000000000000000000000000';
$test_ip_to_hex[                                    '::1'] = '00000000000000000000000000000001';
$test_ip_to_hex[                                 '::0001'] = '00000000000000000000000000000001';
$test_ip_to_hex[                                 '::ffff'] = '0000000000000000000000000000ffff'; # → ::0.0.255.255
$test_ip_to_hex[                          '::0.0.255.255'] = '0000000000000000000000000000ffff';
$test_ip_to_hex[                            '::ffff:ffff'] = '000000000000000000000000ffffffff'; # → ::255.255.255.255
$test_ip_to_hex[                      '::255.255.255.255'] = '000000000000000000000000ffffffff';
$test_ip_to_hex[                       '::ffff:ffff:ffff'] = '00000000000000000000ffffffffffff'; # → ::ffff:255.255.255.255
$test_ip_to_hex[                 '::ffff:255.255.255.255'] = '00000000000000000000ffffffffffff';
$test_ip_to_hex[                  '::ffff:ffff:ffff:ffff'] = '0000000000000000ffffffffffffffff';
$test_ip_to_hex[             '::ffff:ffff:ffff:ffff:ffff'] = '000000000000ffffffffffffffffffff';
$test_ip_to_hex[        '::ffff:ffff:ffff:ffff:ffff:ffff'] = '00000000ffffffffffffffffffffffff';
$test_ip_to_hex[   '::ffff:ffff:ffff:ffff:ffff:ffff:ffff'] = '0000ffffffffffffffffffffffffffff'; # error (on 32-bit platform)
$test_ip_to_hex['ffff:ffff:ffff:ffff:ffff:ffff:ffff:ffff'] = 'ffffffffffffffffffffffffffffffff';
$test_ip_to_hex[                             'ffff::ffff'] = 'ffff000000000000000000000000ffff';
$test_ip_to_hex[                        'ffff::ffff:ffff'] = 'ffff00000000000000000000ffffffff';
$test_ip_to_hex[                        'ffff:ffff::ffff'] = 'ffffffff00000000000000000000ffff';

foreach ($test_ip_to_hex as $c_ip => $c_ip_hex) {
    print $c_ip.' == '.ip_to_hex($c_ip, false);
    print ip_to_hex($c_ip, false) == $c_ip_hex ? ' (true) ' : ' (FALSE) ';
    print NL;
}

print NL.NL.NL;

# ─────────────────────────────────────────────────────────────────────
# hex to ip
# ─────────────────────────────────────────────────────────────────────

$test_hex_to_ip[                        '00000000'] =                                 '0.0.0.0';
$test_hex_to_ip[                        '00000001'] =                                 '0.0.0.1';
$test_hex_to_ip[                        '7f000000'] =                               '127.0.0.0';
$test_hex_to_ip[                        '7f000001'] =                               '127.0.0.1';
$test_hex_to_ip[                        'ffffffff'] =                         '255.255.255.255';
$test_hex_to_ip['00000000000000000000000000000000'] =                                      '::';
$test_hex_to_ip['00000000000000000000000000000001'] =                                     '::1';
$test_hex_to_ip['0000000000000000000000000000ffff'] = php_uname('m') == 'i586' ?       '::ffff':
                                                                                '::0.0.255.255';
$test_hex_to_ip['000000000000000000000000ffffffff'] =                       '::255.255.255.255';
$test_hex_to_ip['00000000000000000000ffffffffffff'] =                  '::ffff:255.255.255.255';
$test_hex_to_ip['0000000000000000ffffffffffffffff'] =                   '::ffff:ffff:ffff:ffff';
$test_hex_to_ip['000000000000ffffffffffffffffffff'] =              '::ffff:ffff:ffff:ffff:ffff';
$test_hex_to_ip['00000000ffffffffffffffffffffffff'] =         '::ffff:ffff:ffff:ffff:ffff:ffff';
$test_hex_to_ip['0000ffffffffffffffffffffffffffff'] = php_uname('m') == 'i586' ?
                                                         '0:ffff:ffff:ffff:ffff:ffff:ffff:ffff':
                                                         '::ffff:ffff:ffff:ffff:ffff:ffff:ffff';
$test_hex_to_ip['ffffffffffffffffffffffffffffffff'] = 'ffff:ffff:ffff:ffff:ffff:ffff:ffff:ffff';
$test_hex_to_ip['ffff000000000000000000000000ffff'] =                              'ffff::ffff';
$test_hex_to_ip['ffff00000000000000000000ffffffff'] =                         'ffff::ffff:ffff';
$test_hex_to_ip['ffffffff00000000000000000000ffff'] =                         'ffff:ffff::ffff';

$test_hex_to_ip['00000000000000000000000000000000'] = php_uname('m') == 'i586' ?                '::' :                '::';
$test_hex_to_ip['0000000000000000000000000000000f'] = php_uname('m') == 'i586' ?               '::f' :        '::0.0.0.15';
$test_hex_to_ip['000000000000000000000000000000ff'] = php_uname('m') == 'i586' ?              '::ff' :       '::0.0.0.255';
$test_hex_to_ip['00000000000000000000000000000fff'] = php_uname('m') == 'i586' ?             '::fff' :      '::0.0.15.255';
$test_hex_to_ip['0000000000000000000000000000ffff'] = php_uname('m') == 'i586' ?            '::ffff' :     '::0.0.255.255';
$test_hex_to_ip['000000000000000000000000000fffff'] = php_uname('m') == 'i586' ?    '::0.15.255.255' :    '::0.15.255.255';
$test_hex_to_ip['00000000000000000000000000ffffff'] = php_uname('m') == 'i586' ?   '::0.255.255.255' :   '::0.255.255.255';
$test_hex_to_ip['0000000000000000000000000fffffff'] = php_uname('m') == 'i586' ?  '::15.255.255.255' :  '::15.255.255.255';
$test_hex_to_ip['000000000000000000000000ffffffff'] = php_uname('m') == 'i586' ? '::255.255.255.255' : '::255.255.255.255';

foreach ($test_hex_to_ip as $c_ip_hex => $c_ip) {
    print $c_ip_hex.' == '.hex_to_ip($c_ip_hex);
    print hex_to_ip($c_ip_hex) == $c_ip ? ' (true) ' : ' (FALSE) ';
    print NL;
}

# ─────────────────────────────────────────────────────────────────────
# functions
# ─────────────────────────────────────────────────────────────────────

function ip_to_hex($ip, $ip_v6_allways = true) {
    $ip_hex = '';
    $inaddr = inet_pton($ip);
    foreach (str_split($inaddr, 1) as $c_char) {
        $ip_hex.= str_pad(dechex(ord($c_char)), 2, '0', STR_PAD_LEFT);
    }
    return !$ip_v6_allways ? $ip_hex :
                     str_pad($ip_hex, 32, '0', STR_PAD_LEFT);
}

function hex_to_ip($ip_hex) {
    $inaddr = '';
    foreach (str_split($ip_hex, 2) as $c_part) {
        $inaddr.= chr(hexdec($c_part));
    }
    return inet_ntop($inaddr);
}
