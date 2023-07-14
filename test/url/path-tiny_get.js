
// ─────────────────────────────────────────────────────────────────────
// tinyGet() test
// ─────────────────────────────────────────────────────────────────────

var urls = {
                           '/'                                 : '/',
                           '/?key=value'                       : '/?key=value',
                           '/#anchor'                          : '/#anchor',
                           '/?key=value#anchor'                : '/?key=value#anchor',
                           '/dir/subdir/page'                  : '/dir/subdir/page',
                           '/dir/subdir/page?key=value'        : '/dir/subdir/page?key=value',
                           '/dir/subdir/page#anchor'           : '/dir/subdir/page#anchor',
                           '/dir/subdir/page?key=value#anchor' : '/dir/subdir/page?key=value#anchor',
           'subdomain.domain'                                  : '/',
           'subdomain.domain/?key=value'                       : '/?key=value',
           'subdomain.domain/#anchor'                          : '/#anchor',
           'subdomain.domain/?key=value#anchor'                : '/?key=value#anchor',
           'subdomain.domain/dir/subdir/page'                  : '/dir/subdir/page',
           'subdomain.domain/dir/subdir/page?key=value'        : '/dir/subdir/page?key=value',
           'subdomain.domain/dir/subdir/page#anchor'           : '/dir/subdir/page#anchor',
           'subdomain.domain/dir/subdir/page?key=value#anchor' : '/dir/subdir/page?key=value#anchor',
    'http://subdomain.domain'                                  : '/',
    'http://subdomain.domain/?key=value'                       : '/?key=value',
    'http://subdomain.domain/#anchor'                          : '/#anchor',
    'http://subdomain.domain/?key=value#anchor'                : '/?key=value#anchor',
    'http://subdomain.domain/dir/subdir/page'                  : '/dir/subdir/page',
    'http://subdomain.domain/dir/subdir/page?key=value'        : '/dir/subdir/page?key=value',
    'http://subdomain.domain/dir/subdir/page#anchor'           : '/dir/subdir/page#anchor',
    'http://subdomain.domain/dir/subdir/page?key=value#anchor' : '/dir/subdir/page?key=value#anchor'
};


for (c_value in urls) {
    var c_expected = urls[c_value]
    var c_info = new EffURL(c_value);
    var c_result = c_info.tinyGet() === c_expected;
    if (c_result)
         console.log('true "'  + c_value + '"' + c_info.tinyGet());
    else console.log('FALSE "' + c_value + '"');
}

