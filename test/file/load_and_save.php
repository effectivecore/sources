<?php

namespace effcore;

$test = new File(DIR_DYNAMIC.'test.txt');
$data = $test->data_get();
$data.= url::get_current()->full_get();
$data.= "\n";
$test->data_set($data);
$test->save();
