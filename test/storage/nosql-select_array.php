<?php

namespace effcore;

var_dump( storage::get('files')->select_array('demo_data/demo/demo_string')       === ['text']);
var_dump( storage::get('files')->select_array('demo_data/demo/demo_string_empty') === ['']);
var_dump( storage::get('files')->select_array('demo_data/demo/demo_integer')      === [1]);
var_dump( storage::get('files')->select_array('demo_data/demo/demo_float')        === [2.3]);
var_dump( storage::get('files')->select_array('demo_data/demo/demo_boolean')      === [true]);
var_dump( storage::get('files')->select_array('demo_data/demo/demo_null')         === []);
var_dump( storage::get('files')->select_array('demo_data/demo/demo_array_empty')  === []);
var_dump( storage::get('files')->select_array('demo_data/demo/demo_object_empty') === []);

var_dump( storage::get('files')->select_array('demo_data/demo/demo_array') === [
    'item_1' => 'item value 1',
    'item_2' => 'item value 2',
    'item_3' => 'item value 3',
    'item_5' => 'item value 5 [new] + [modified]',
    'item_6' => 'item value 6 [new]'
]);

var_dump( storage::get('files')->select_array('demo_data/demo/demo_object') === [
    'prop_1' => 'property value 1',
    'prop_2' => 'property value 2',
    'prop_3' => 'property value 3',
    'prop_5' => 'property value 5 [new] + [modified]',
    'prop_6' => 'property value 6 [new]'
]);
