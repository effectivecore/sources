<?php

namespace effcore;

# possible transpositions of '.' + 'table_name' + 'field_name' + 'value'
# ┌───────────────────────┬─────────────┐
# │ all variants          │ is possible │
# ╞═══════════════════════╪═════════════╡
# │ table_name            │ yes         │
# │ field_name            │ yes         │
# │ value                 │ yes         │
# ├───────────────────────┼─────────────┤
# │ table_name.table_name │ no          │
# │ table_name.field_name │ yes         │
# │ table_name.value      │ no          │
# ├───────────────────────┼─────────────┤
# │ field_name.table_name │ no          │
# │ field_name.field_name │ no          │
# │ field_name.value      │ no          │
# ├───────────────────────┼─────────────┤
# │ value.table_name      │ no          │
# │ value.field_name      │ no          │
# │ value.value           │ no          │
# └───────────────────────┴─────────────┘

# possible transpositions of ',' + 'table_name' + 'field_name' + 'value' + 'table_name.field_name'
# ┌──────────────────────────────────────────────┬─────────────┐
# │ all variants                                 │ is possible │
# ╞══════════════════════════════════════════════╪═════════════╡
# │ table_name, table_name                       │ yes         │
# │ table_name, field_name                       │ no          │
# │ table_name, value                            │ no          │
# │ table_name, table_name.field_name            │ no          │
# ├──────────────────────────────────────────────┼─────────────┤
# │ field_name, table_name                       │ no          │
# │ field_name, field_name                       │ yes         │
# │ field_name, value                            │ yes         │
# │ field_name, table_name.field_name            │ yes         │
# ├──────────────────────────────────────────────┼─────────────┤
# │ value, table_name                            │ no          │
# │ value, field_name                            │ yes         │
# │ value, value                                 │ yes         │
# │ value, table_name.field_name                 │ yes         │
# ├──────────────────────────────────────────────┼─────────────┤
# │ table_name.field_name, table_name            │ no          │
# │ table_name.field_name, field_name            │ yes         │
# │ table_name.field_name, value                 │ yes         │
# │ table_name.field_name, table_name.field_name │ yes         │
# └──────────────────────────────────────────────┴─────────────┘

# possible transpositions of '=' + 'table_name' + 'field_name' + 'value' + 'table_name.field_name'
# ┌───────────────────────────────────────────────┬─────────────┐
# │ all variants                                  │ is possible │
# ╞═══════════════════════════════════════════════╪═════════════╡
# │ table_name = table_name                       │ no          │
# │ table_name = field_name                       │ no          │
# │ table_name = value                            │ no          │
# │ table_name = table_name.field_name            │ no          │
# ├───────────────────────────────────────────────┼─────────────┤
# │ field_name = table_name                       │ no          │
# │ field_name = field_name                       │ yes         │
# │ field_name = value                            │ yes         │
# │ field_name = table_name.field_name            │ yes         │
# ├───────────────────────────────────────────────┼─────────────┤
# │ value = table_name                            │ no          │
# │ value = field_name                            │ no          │
# │ value = value                                 │ no          │
# │ value = table_name.field_name                 │ no          │
# ├───────────────────────────────────────────────┼─────────────┤
# │ table_name.field_name = table_name            │ no          │
# │ table_name.field_name = field_name            │ yes         │
# │ table_name.field_name = value                 │ yes         │
# │ table_name.field_name = table_name.field_name │ yes         │
# └───────────────────────────────────────────────┴─────────────┘

# ┌───────────────────────────────────────────────┬───────────────────────────────────────────────────────┬────────────────────────────────────────────────────────────────────────────────────────┐
# │ valid variants                                │ SQL syntax                                            │ how to make a code                                                                     │
# ╞═══════════════════════════════════════════════╪═══════════════════════════════════════════════════════╪════════════════════════════════════════════════════════════════════════════════════════╡
# │ table_name                                    │ `table_name`                                          │             ['key_!t' => 'table_name']                                                 │
# │ field_name                                    │ `field_name`                                          │             ['key_!f' => 'field_name']                                                 │
# │ value                                         │ "value"                                               │             ['key_!v' => 'value']                                                      │
# ├───────────────────────────────────────────────┼───────────────────────────────────────────────────────┼────────────────────────────────────────────────────────────────────────────────────────┤
# │ table_name.field_name                         │ `table_name`.`field_name`                             │ 'key_!,' => ['key_!f' => 'table_name.field_name']                                      │
# │ table_name,            table_name             │ `table_name`,              `table_name`               │ 'key_!,' => ['key1!t' => 'table_name',            'key2!t' => 'table_name']            │
# │ field_name,            field_name             │ `field_name`,              `field_name`               │ 'key_!,' => ['key1!f' => 'field_name',            'key2!f' => 'field_name']            │
# │ field_name,            value                  │ `field_name`,              "value"                    │ 'key_!,' => ['key1!f' => 'field_name',            'key2!v' => 'value']                 │
# │ field_name,            table_name.field_name  │ `field_name`,              `table_name`.`field_name`  │ 'key_!,' => ['key1!f' => 'field_name',            'key2!f' => 'table_name.field_name'] │
# │ value,                 field_name             │ "value",                   `field_name`               │ 'key_!,' => ['key1!v' => 'value',                 'key2!f' => 'field_name']            │
# │ value,                 value                  │ "value",                   "value"                    │ 'key_!,' => ['key1!v' => 'value',                 'key2!v' => 'value']                 │
# │ value,                 table_name.field_name  │ "value",                   `table_name`.`field_name`  │ 'key_!,' => ['key1!v' => 'value',                 'key2!f' => 'table_name.field_name'] │
# │ table_name.field_name, field_name             │ `table_name`.`field_name`, `field_name`               │ 'key_!,' => ['key1!f' => 'table_name.field_name', 'key2!f' => 'field_name']            │
# │ table_name.field_name, value                  │ `table_name`.`field_name`, "value"                    │ 'key_!,' => ['key1!f' => 'table_name.field_name', 'key2!v' => 'value']                 │
# │ table_name.field_name, table_name.field_name  │ `table_name`.`field_name`, `table_name`.`field_name`  │ 'key_!,' => ['key1!f' => 'table_name.field_name', 'key2!f' => 'table_name.field_name'] │
# ├───────────────────────────────────────────────┼───────────────────────────────────────────────────────┼────────────────────────────────────────────────────────────────────────────────────────┤
# │ field_name            = field_name            │ `field_name`              = `field_name`              │ 'key_!=' => ['key1!f' => 'field_name',            'key2!f' => 'field_name']            │
# │ field_name            = value                 │ `field_name`              = "value"                   │ 'key_!=' => ['key1!f' => 'field_name',            'key2!v' => 'value']                 │
# │ field_name            = table_name.field_name │ `field_name`              = `table_name`.`field_name` │ 'key_!=' => ['key1!f' => 'field_name',            'key2!f' => 'table_name.field_name'] │
# │ table_name.field_name = field_name            │ `table_name`.`field_name` = `field_name`              │ 'key_!=' => ['key1!f' => 'table_name.field_name', 'key2!f' => 'field_name']            │
# │ table_name.field_name = value                 │ `table_name`.`field_name` = "value"                   │ 'key_!=' => ['key1!f' => 'table_name.field_name', 'key2!v' => 'value']                 │
# │ table_name.field_name = table_name.field_name │ `table_name`.`field_name` = `table_name`.`field_name` │ 'key_!=' => ['key1!f' => 'table_name.field_name', 'key2!f' => 'table_name.field_name'] │
# └───────────────────────────────────────────────┴───────────────────────────────────────────────────────┴────────────────────────────────────────────────────────────────────────────────────────┘


$test = [
    '01' => ['data'   => ['key_!t' => 'table_name'                                                ]],
    '02' => ['data'   => ['key_!f' => 'field_name'                                                ]],
    '03' => ['data'   => ['key_!v' => 'value'                                                     ]],
    '04' => ['data'   => ['key_!f' => 'table_name.field_name'                                     ]],
    '05' => ['data!,' => ['key1!t' => 'table_name',            'key2!t' => 'table_name'           ]],
    '06' => ['data!,' => ['key1!f' => 'field_name',            'key2!f' => 'field_name'           ]],
    '07' => ['data!,' => ['key1!f' => 'field_name',            'key2!v' => 'value'                ]],
    '08' => ['data!,' => ['key1!f' => 'field_name',            'key2!f' => 'table_name.field_name']],
    '09' => ['data!,' => ['key1!v' => 'value',                 'key2!f' => 'field_name'           ]],
    '10' => ['data!,' => ['key1!v' => 'value',                 'key2!v' => 'value'                ]],
    '11' => ['data!,' => ['key1!v' => 'value',                 'key2!f' => 'table_name.field_name']],
    '12' => ['data!,' => ['key1!f' => 'table_name.field_name', 'key2!f' => 'field_name'           ]],
    '13' => ['data!,' => ['key1!f' => 'table_name.field_name', 'key2!v' => 'value'                ]],
    '14' => ['data!,' => ['key1!f' => 'table_name.field_name', 'key2!f' => 'table_name.field_name']],
    '15' => ['data!=' => ['key1!f' => 'field_name',            'key2!f' => 'field_name'           ]],
    '16' => ['data!=' => ['key1!f' => 'field_name',            'key2!v' => 'value'                ]],
    '17' => ['data!=' => ['key1!f' => 'field_name',            'key2!f' => 'table_name.field_name']],
    '18' => ['data!=' => ['key1!f' => 'table_name.field_name', 'key2!f' => 'field_name'           ]],
    '19' => ['data!=' => ['key1!f' => 'table_name.field_name', 'key2!v' => 'value'                ]],
    '20' => ['data!=' => ['key1!f' => 'table_name.field_name', 'key2!f' => 'table_name.field_name']],
];

$expected = [
    '01' => ['data'   => ['key_!t' => '`table_name`'                                                                ]],
    '02' => ['data'   => ['key_!f' => '`field_name`'                                                                ]],
    '03' => ['data'   => ['key_!v' => '?'                                                                           ]],
    '04' => ['data'   => ['key_!f' => '`table_name`.`field_name`'                                                   ]],
    '05' => ['data!,' => ['key1!t' => '`table_name`',              0 => ',', 'key2!t' => '`table_name`'             ]],
    '06' => ['data!,' => ['key1!f' => '`field_name`',              0 => ',', 'key2!f' => '`field_name`'             ]],
    '07' => ['data!,' => ['key1!f' => '`field_name`',              0 => ',', 'key2!v' => '?'                        ]],
    '08' => ['data!,' => ['key1!f' => '`field_name`',              0 => ',', 'key2!f' => '`table_name`.`field_name`']],
    '09' => ['data!,' => ['key1!v' => '?',                         0 => ',', 'key2!f' => '`field_name`'             ]],
    '10' => ['data!,' => ['key1!v' => '?',                         0 => ',', 'key2!v' => '?'                        ]],
    '11' => ['data!,' => ['key1!v' => '?',                         0 => ',', 'key2!f' => '`table_name`.`field_name`']],
    '12' => ['data!,' => ['key1!f' => '`table_name`.`field_name`', 0 => ',', 'key2!f' => '`field_name`'             ]],
    '13' => ['data!,' => ['key1!f' => '`table_name`.`field_name`', 0 => ',', 'key2!v' => '?'                        ]],
    '14' => ['data!,' => ['key1!f' => '`table_name`.`field_name`', 0 => ',', 'key2!f' => '`table_name`.`field_name`']],
    '15' => ['data!=' => ['key1!f' => '`field_name`',              0 => '=', 'key2!f' => '`field_name`'             ]],
    '16' => ['data!=' => ['key1!f' => '`field_name`',              0 => '=', 'key2!v' => '?'                        ]],
    '17' => ['data!=' => ['key1!f' => '`field_name`',              0 => '=', 'key2!f' => '`table_name`.`field_name`']],
    '18' => ['data!=' => ['key1!f' => '`table_name`.`field_name`', 0 => '=', 'key2!f' => '`field_name`'             ]],
    '19' => ['data!=' => ['key1!f' => '`table_name`.`field_name`', 0 => '=', 'key2!v' => '?'                        ]],
    '20' => ['data!=' => ['key1!f' => '`table_name`.`field_name`', 0 => '=', 'key2!f' => '`table_name`.`field_name`']],
];


$storage = storage::get('sql');
foreach ($test as $c_key => $c_value) {
    $c_query = $c_value;
    $storage->query_prepare($c_query);
    $c_result = ($c_query == $expected[$c_key]);
    if ($c_result)
         print 'true ' .$c_key.NL;
    else print 'FALSE '.$c_key.NL;
}
