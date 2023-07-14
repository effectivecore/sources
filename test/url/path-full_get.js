
// ─────────────────────────────────────────────────────────────────────
// fullGet() test
// ─────────────────────────────────────────────────────────────────────

var urls = {
                           '/'                                 : 'http://subdomain.domain',
                           '/?key=value'                       : 'http://subdomain.domain/?key=value',
                           '/#anchor'                          : 'http://subdomain.domain/#anchor',
                           '/?key=value#anchor'                : 'http://subdomain.domain/?key=value#anchor',
                           '/dir/subdir/page'                  : 'http://subdomain.domain/dir/subdir/page',
                           '/dir/subdir/page?key=value'        : 'http://subdomain.domain/dir/subdir/page?key=value',
                           '/dir/subdir/page#anchor'           : 'http://subdomain.domain/dir/subdir/page#anchor',
                           '/dir/subdir/page?key=value#anchor' : 'http://subdomain.domain/dir/subdir/page?key=value#anchor',
           'subdomain.domain'                                  : 'http://subdomain.domain',
           'subdomain.domain/?key=value'                       : 'http://subdomain.domain/?key=value',
           'subdomain.domain/#anchor'                          : 'http://subdomain.domain/#anchor',
           'subdomain.domain/?key=value#anchor'                : 'http://subdomain.domain/?key=value#anchor',
           'subdomain.domain/dir/subdir/page'                  : 'http://subdomain.domain/dir/subdir/page',
           'subdomain.domain/dir/subdir/page?key=value'        : 'http://subdomain.domain/dir/subdir/page?key=value',
           'subdomain.domain/dir/subdir/page#anchor'           : 'http://subdomain.domain/dir/subdir/page#anchor',
           'subdomain.domain/dir/subdir/page?key=value#anchor' : 'http://subdomain.domain/dir/subdir/page?key=value#anchor',
    'http://subdomain.domain'                                  : 'http://subdomain.domain',
    'http://subdomain.domain/?key=value'                       : 'http://subdomain.domain/?key=value',
    'http://subdomain.domain/#anchor'                          : 'http://subdomain.domain/#anchor',
    'http://subdomain.domain/?key=value#anchor'                : 'http://subdomain.domain/?key=value#anchor',
    'http://subdomain.domain/dir/subdir/page'                  : 'http://subdomain.domain/dir/subdir/page',
    'http://subdomain.domain/dir/subdir/page?key=value'        : 'http://subdomain.domain/dir/subdir/page?key=value',
    'http://subdomain.domain/dir/subdir/page#anchor'           : 'http://subdomain.domain/dir/subdir/page#anchor',
    'http://subdomain.domain/dir/subdir/page?key=value#anchor' : 'http://subdomain.domain/dir/subdir/page?key=value#anchor'
};

for (c_value in urls) {
    var c_expected = urls[c_value];
    var c_info = new EffURL(c_value);
    var c_result = c_info.fullGet() === c_expected;
    if (c_result)
         console.log('true "'  + c_value + '"' + c_info.fullGet());
    else console.log('FALSE "' + c_value + '"');
}

