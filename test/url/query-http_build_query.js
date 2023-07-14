
// ─────────────────────────────────────────────────────────────────────
// buildUrlQuery() test
// ─────────────────────────────────────────────────────────────────────

var queries = {
    ''                                                        : {},
    'key_1='                                                  : {'key_1' : ''},
    'key_1=value_1'                                           : {'key_1' : 'value_1'},
    'key_1=value_1%3Dstill_value_1'                           : {'key_1' : 'value_1=still_value_1'},
    'key_1=&key_2='                                           : {'key_1' : '', 'key_2' : ''},
    'key_1=value_1&key_arr[0]=value_2&key_arr[1]=value_3'     : {'key_1' : 'value_1', 'key_arr' : {0 : 'value_2', 1 : 'value_3'}},
    'key_1=value_1&key_arr[2]=value_2&key_arr[3]=value_3'     : {'key_1' : 'value_1', 'key_arr' : {2 : 'value_2', 3 : 'value_3'}},
    'key_1=value_1&key_arr[k-1]=value_2&key_arr[k-2]=value_3' : {'key_1' : 'value_1', 'key_arr' : {'k-1' : 'value_2', 'k-2' : 'value_3'}},
    '%D0%BA%D0%BB%D1%8E%D1%87=%D0%BC%D0%BE%D1%91%20%D0%B7%D0%BD%D0%B0%D1%87%D0%B5%D0%BD%D0%B8%D0%B5' : {'ключ' : 'моё значение'},
    '%D0%BA%D0%BB%D1%8E%D1%87=%D0%BC%D0%BE%D1%91%2B%D0%B7%D0%BD%D0%B0%D1%87%D0%B5%D0%BD%D0%B8%D0%B5' : {'ключ' : 'моё+значение'}
};


for (c_expected in queries) {
    var c_value = queries[c_expected];
    var c_info = EffURL.prototype.buildUrlQuery(c_value);
    var c_result = JSON.stringify(c_info) === JSON.stringify(c_expected);
    if (c_result)
         console.log('true "'  + c_expected + '"');
    else console.log('FALSE "' + c_expected + '"');
}

