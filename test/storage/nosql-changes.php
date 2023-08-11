<?php

namespace effcore;

# before:
# ----------------
# test_data
#   integer: 1
#   float: 2.3
#   boolean: true
#   string_empty: 
#   string: text
#   string_text|text
#     text: like code: new text('any text') # translated by default
#   array_empty|_empty_array
#   array
#   - item_1: item value #1
#   - item_2: item value #2
#   - item_3: item value #3
#   object_empty
#   object
#     prop_1: property value #1
#     prop_2: property value #2
#     prop_3: property value #3
#   null: null
# ----------------

Storage::get('files')->changes_insert('storage', 'insert', 'test_data/test/array', [
    'item_4' => 'item value #4 (insert)',
    'item_5' => 'item value #5 (insert)',
    'item_6' => 'item value #6 (insert)']);
Storage::get('files')->changes_insert('storage', 'insert', 'test_data/test/object', (object)[
    'prop_4' => 'property value #4',
    'prop_5' => 'property value #5',
    'prop_6' => 'property value #6']);
Storage::get('files')->changes_insert('storage', 'update', 'test_data/test/array/item_5', 'item value #5 (insert + update)');
Storage::get('files')->changes_insert('storage', 'update', 'test_data/test/object/prop_5', 'property value #5 (insert + update)');
Storage::get('files')->changes_insert('storage', 'delete', 'test_data/test/array/item_4');
Storage::get('files')->changes_insert('storage', 'delete', 'test_data/test/object/prop_4');

# after:
# ----------------
# test_data
#   integer: 1
#   float: 2.3
#   boolean: true
#   string_empty: 
#   string: text
#   string_text|text
#     text: like code: new text('any text') # translated by default
#   array_empty|_empty_array
#   array
#   - item_1: item value #1
#   - item_2: item value #2
#   - item_3: item value #3
#   - item_5: item value #5 (insert + update)
#   - item_6: item value #6 (insert)
#   object_empty
#   object
#     prop_1: property value #1
#     prop_2: property value #2
#     prop_3: property value #3
#     prop_5: property value #5 (insert + update)
#     prop_6: property value #6 (insert)
#   null: null
# ----------------
