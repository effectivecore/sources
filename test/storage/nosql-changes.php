<?php

namespace effcore;

# before:
# ----------------
# demo_data
#   demo_integer: 1
#   demo_float: 2.3
#   demo_boolean: true
#   demo_string_empty: 
#   demo_string: text
#   demo_string_text|text
#     text: like code: new text('any text') # translated by default
#   demo_array_empty|_empty_array
#   demo_array
#   - item_1: item value #1
#   - item_2: item value #2
#   - item_3: item value #3
#   demo_object_empty
#   demo_object
#     prop_1: property value #1
#     prop_2: property value #2
#     prop_3: property value #3
#   demo_null: null
# ----------------

storage::get('files')->changes_insert('storage', 'insert', 'demo_data/demo/demo_array', [
    'item_4' => 'item value #4 (insert)',
    'item_5' => 'item value #5 (insert)',
    'item_6' => 'item value #6 (insert)']);
storage::get('files')->changes_insert('storage', 'insert', 'demo_data/demo/demo_object', (object)[
    'prop_4' => 'property value #4',
    'prop_5' => 'property value #5',
    'prop_6' => 'property value #6']);
storage::get('files')->changes_insert('storage', 'update', 'demo_data/demo/demo_array/item_5', 'item value #5 (insert + update)');
storage::get('files')->changes_insert('storage', 'update', 'demo_data/demo/demo_object/prop_5', 'property value #5 (insert + update)');
storage::get('files')->changes_insert('storage', 'delete', 'demo_data/demo/demo_array/item_4');
storage::get('files')->changes_insert('storage', 'delete', 'demo_data/demo/demo_object/prop_4');

# after:
# ----------------
# demo_data
#   demo_integer: 1
#   demo_float: 2.3
#   demo_boolean: true
#   demo_string_empty: 
#   demo_string: text
#   demo_string_text|text
#     text: like code: new text('any text') # translated by default
#   demo_array_empty|_empty_array
#   demo_array
#   - item_1: item value #1
#   - item_2: item value #2
#   - item_3: item value #3
#   - item_5: item value #5 (insert + update)
#   - item_6: item value #6 (insert)
#   demo_object_empty
#   demo_object
#     prop_1: property value #1
#     prop_2: property value #2
#     prop_3: property value #3
#     prop_5: property value #5 (insert + update)
#     prop_6: property value #6 (insert)
#   demo_null: null
# ----------------
