<?php

namespace effcore;

#####################################################
### performance in preg processing with a cut-off ###
#####################################################

$t0 = microtime(true);
for ($i = 0; $i < 10000; $i++) {
    if (preg_match('%^/'.$i.'/admin$%', '/5000/admin')) print $i.NL;
}
$t1 = microtime(true);
print 'time 1 (+): '.($t1-$t0).NL;


$t0 = microtime(true);
for ($i = 0; $i < 10000; $i++) {
    if (preg_match('%^/admin/'.$i.'$%', '/admin/5000')) print $i.NL;
}
$t1 = microtime(true);
print 'time 2 (-): '.($t1-$t0).NL;

# ─────────────────────────────────────────────────────────────────────

$t0 = microtime(true);
for ($i = 0; $i < 10000; $i++) {
    if (preg_match('%^/'.$i.'/admin(/(?<action>[a-z]+)(?<id_user>[0-9]+)|)$%', '/5000/admin')) print $i.NL;
}
$t1 = microtime(true);
print 'time 3 (+): '.($t1-$t0).NL;


$t0 = microtime(true);
for ($i = 0; $i < 10000; $i++) {
    if (preg_match('%^/admin/'.$i.'(/(?<action>[a-z]+)(?<id_user>[0-9]+)|)$%', '/admin/5000')) print $i.NL;
}
$t1 = microtime(true);
print 'time 4 (-): '.($t1-$t0).NL;



#########################
### url matching test ###
#########################

$regexp = '%^/admin/users(/(?<action>[a-z]+)/(?<id_user>[0-9]+)|)$%';
$tests[] = '/admin/users';
$tests[] = '/admin/users/';
$tests[] = '/admin/users/123';
$tests[] = '/admin/users/aaa';
$tests[] = '/admin/users/123/';
$tests[] = '/admin/users/aaa/';
$tests[] = '/admin/users/123/456';
$tests[] = '/admin/users/123/bbb';
$tests[] = '/admin/users/aaa/456';
$tests[] = '/admin/users/aaa/bbb';
$tests[] = '/admin/users/123/456/';
$tests[] = '/admin/users/123/bbb/';
$tests[] = '/admin/users/aaa/456/';
$tests[] = '/admin/users/aaa/bbb/';
$tests[] = '/admin/users/123/456/ccc';
$tests[] = '/admin/users/123/bbb/ccc';
$tests[] = '/admin/users/aaa/456/ccc';
$tests[] = '/admin/users/aaa/bbb/ccc';

$expected = 'test: /admin/users | action: no | id_user: no'.NL.
            'test: /admin/users/aaa/456 | action: aaa | id_user: 456'.NL;

$result = '';

foreach ($tests as $c_item) {
    $c_matches = [];
    if (preg_match($regexp, $c_item, $c_matches)) {
        $result.= 'test: '.$c_item.' | ';
        $result.= 'action: '. (isset($c_matches['action'])  ? $c_matches['action']  : 'no').' | ';
        $result.= 'id_user: '.(isset($c_matches['id_user']) ? $c_matches['id_user'] : 'no').NL;
    }
}

print $result;
print $result == $expected ? 'true' : 'FALSE';
