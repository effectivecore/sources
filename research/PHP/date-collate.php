<?php

namespace effcore;

$c_timestamp = strtotime('2017-06-30');
$c_date      = date('Y-m-d', $c_timestamp);
for ($i = -300; $i < 300; $i++) {
    $i_timestamp = $c_timestamp + (60 * 60 * 24 * $i);
    $i_date = date('Y-m-d', $i_timestamp);
    print $i_date.' <= '.$c_date.' = '.($i_date <= $c_date ? 'true' : 'FALSE').' | '.
          $i_date.' >= '.$c_date.' = '.($i_date >= $c_date ? 'true' : 'FALSE').br;
}

$c_time = '01:00:00';
for ($i = -(60 * 60); $i <= 60 * 60; $i++) {
    $i_timestamp = strtotime($c_time) + $i;
    $i_time = date('H:i:s', $i_timestamp);
    print $i_time.' <= '.$c_time.' = '.($i_time <= $c_time ? 'true' : 'FALSE').' | '.
          $i_time.' >= '.$c_time.' = '.($i_time >= $c_time ? 'true' : 'FALSE').br;
}
