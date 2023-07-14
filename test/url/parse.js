
// ─────────────────────────────────────────────────────────────────────
// parse() test
// ─────────────────────────────────────────────────────────────────────

var urls = {
                           '/'                                         : {'protocol' : 'http', 'domain' : 'current.subdomain.domain',    'path' : '/',                    'query' : '',              'anchor' : ''      },
                           '/?key=value'                               : {'protocol' : 'http', 'domain' : 'current.subdomain.domain',    'path' : '/',                    'query' : 'key=value',     'anchor' : ''      },
                           '/#anchor'                                  : {'protocol' : 'http', 'domain' : 'current.subdomain.domain',    'path' : '/',                    'query' : '',              'anchor' : 'anchor'},
                           '/?key=value#anchor'                        : {'protocol' : 'http', 'domain' : 'current.subdomain.domain',    'path' : '/',                    'query' : 'key=value',     'anchor' : 'anchor'},
                           '/dir/subdir/page'                          : {'protocol' : 'http', 'domain' : 'current.subdomain.domain',    'path' : '/dir/subdir/page',     'query' : '',              'anchor' : ''      },
                           '/dir/subdir/page?key=value'                : {'protocol' : 'http', 'domain' : 'current.subdomain.domain',    'path' : '/dir/subdir/page',     'query' : 'key=value',     'anchor' : ''      },
                           '/dir/subdir/page#anchor'                   : {'protocol' : 'http', 'domain' : 'current.subdomain.domain',    'path' : '/dir/subdir/page',     'query' : '',              'anchor' : 'anchor'},
                           '/dir/subdir/page?key=value#anchor'         : {'protocol' : 'http', 'domain' : 'current.subdomain.domain',    'path' : '/dir/subdir/page',     'query' : 'key=value',     'anchor' : 'anchor'},
           'subdomain.domain'                                          : {'protocol' : 'http', 'domain' :         'subdomain.domain',    'path' : '/',                    'query' : '',              'anchor' : ''      },
           'subdomain.domain/?key=value'                               : {'protocol' : 'http', 'domain' :         'subdomain.domain',    'path' : '/',                    'query' : 'key=value',     'anchor' : ''      },
           'subdomain.domain/#anchor'                                  : {'protocol' : 'http', 'domain' :         'subdomain.domain',    'path' : '/',                    'query' : '',              'anchor' : 'anchor'},
           'subdomain.domain/?key=value#anchor'                        : {'protocol' : 'http', 'domain' :         'subdomain.domain',    'path' : '/',                    'query' : 'key=value',     'anchor' : 'anchor'},
           'subdomain.domain/dir/subdir/page'                          : {'protocol' : 'http', 'domain' :         'subdomain.domain',    'path' : '/dir/subdir/page',     'query' : '',              'anchor' : ''      },
           'subdomain.domain/dir/subdir/page?key=value'                : {'protocol' : 'http', 'domain' :         'subdomain.domain',    'path' : '/dir/subdir/page',     'query' : 'key=value',     'anchor' : ''      },
           'subdomain.domain/dir/subdir/page#anchor'                   : {'protocol' : 'http', 'domain' :         'subdomain.domain',    'path' : '/dir/subdir/page',     'query' : '',              'anchor' : 'anchor'},
           'subdomain.domain/dir/subdir/page?key=value#anchor'         : {'protocol' : 'http', 'domain' :         'subdomain.domain',    'path' : '/dir/subdir/page',     'query' : 'key=value',     'anchor' : 'anchor'},
           'subdomain.domain:80'                                       : {'protocol' : 'http', 'domain' :         'subdomain.domain:80', 'path' : '/',                    'query' : '',              'anchor' : ''      },
           'subdomain.domain:80/?key=value'                            : {'protocol' : 'http', 'domain' :         'subdomain.domain:80', 'path' : '/',                    'query' : 'key=value',     'anchor' : ''      },
           'subdomain.domain:80/#anchor'                               : {'protocol' : 'http', 'domain' :         'subdomain.domain:80', 'path' : '/',                    'query' : '',              'anchor' : 'anchor'},
           'subdomain.domain:80/?key=value#anchor'                     : {'protocol' : 'http', 'domain' :         'subdomain.domain:80', 'path' : '/',                    'query' : 'key=value',     'anchor' : 'anchor'},
           'subdomain.domain:80/dir/subdir/page'                       : {'protocol' : 'http', 'domain' :         'subdomain.domain:80', 'path' : '/dir/subdir/page',     'query' : '',              'anchor' : ''      },
           'subdomain.domain:80/dir/subdir/page?key=value'             : {'protocol' : 'http', 'domain' :         'subdomain.domain:80', 'path' : '/dir/subdir/page',     'query' : 'key=value',     'anchor' : ''      },
           'subdomain.domain:80/dir/subdir/page#anchor'                : {'protocol' : 'http', 'domain' :         'subdomain.domain:80', 'path' : '/dir/subdir/page',     'query' : '',              'anchor' : 'anchor'},
           'subdomain.domain:80/dir/subdir/page?key=value#anchor'      : {'protocol' : 'http', 'domain' :         'subdomain.domain:80', 'path' : '/dir/subdir/page',     'query' : 'key=value',     'anchor' : 'anchor'},
    'http://subdomain.domain'                                          : {'protocol' : 'http', 'domain' :         'subdomain.domain',    'path' : '/',                    'query' : '',              'anchor' : ''      },
    'http://subdomain.domain/?key=value'                               : {'protocol' : 'http', 'domain' :         'subdomain.domain',    'path' : '/',                    'query' : 'key=value',     'anchor' : ''      },
    'http://subdomain.domain/#anchor'                                  : {'protocol' : 'http', 'domain' :         'subdomain.domain',    'path' : '/',                    'query' : '',              'anchor' : 'anchor'},
    'http://subdomain.domain/?key=value#anchor'                        : {'protocol' : 'http', 'domain' :         'subdomain.domain',    'path' : '/',                    'query' : 'key=value',     'anchor' : 'anchor'},
    'http://subdomain.domain/dir/subdir/page'                          : {'protocol' : 'http', 'domain' :         'subdomain.domain',    'path' : '/dir/subdir/page',     'query' : '',              'anchor' : ''      },
    'http://subdomain.domain/dir/subdir/page?key=value'                : {'protocol' : 'http', 'domain' :         'subdomain.domain',    'path' : '/dir/subdir/page',     'query' : 'key=value',     'anchor' : ''      },
    'http://subdomain.domain/dir/subdir/page#anchor'                   : {'protocol' : 'http', 'domain' :         'subdomain.domain',    'path' : '/dir/subdir/page',     'query' : '',              'anchor' : 'anchor'},
    'http://subdomain.domain/dir/subdir/page?key=value#anchor'         : {'protocol' : 'http', 'domain' :         'subdomain.domain',    'path' : '/dir/subdir/page',     'query' : 'key=value',     'anchor' : 'anchor'},
    'http://subdomain.domain:80'                                       : {'protocol' : 'http', 'domain' :         'subdomain.domain:80', 'path' : '/',                    'query' : '',              'anchor' : ''      },
    'http://subdomain.domain:80/?key=value'                            : {'protocol' : 'http', 'domain' :         'subdomain.domain:80', 'path' : '/',                    'query' : 'key=value',     'anchor' : ''      },
    'http://subdomain.domain:80/#anchor'                               : {'protocol' : 'http', 'domain' :         'subdomain.domain:80', 'path' : '/',                    'query' : '',              'anchor' : 'anchor'},
    'http://subdomain.domain:80/?key=value#anchor'                     : {'protocol' : 'http', 'domain' :         'subdomain.domain:80', 'path' : '/',                    'query' : 'key=value',     'anchor' : 'anchor'},
    'http://subdomain.domain:80/dir/subdir/page'                       : {'protocol' : 'http', 'domain' :         'subdomain.domain:80', 'path' : '/dir/subdir/page',     'query' : '',              'anchor' : ''      },
    'http://subdomain.domain:80/dir/subdir/page?key=value'             : {'protocol' : 'http', 'domain' :         'subdomain.domain:80', 'path' : '/dir/subdir/page',     'query' : 'key=value',     'anchor' : ''      },
    'http://subdomain.domain:80/dir/subdir/page#anchor'                : {'protocol' : 'http', 'domain' :         'subdomain.domain:80', 'path' : '/dir/subdir/page',     'query' : '',              'anchor' : 'anchor'},
    'http://subdomain.domain:80/dir/subdir/page?key=value#anchor'      : {'protocol' : 'http', 'domain' :         'subdomain.domain:80', 'path' : '/dir/subdir/page',     'query' : 'key=value',     'anchor' : 'anchor'},
                         '/?ключ=значение'                             : {'protocol' : 'http', 'domain' : 'current.subdomain.domain',    'path' : '/',                    'query' : 'ключ=значение', 'anchor' : ''      },
                         '/#якорь'                                     : {'protocol' : 'http', 'domain' : 'current.subdomain.domain',    'path' : '/',                    'query' : '',              'anchor' : 'якорь' },
                         '/?ключ=значение#якорь'                       : {'protocol' : 'http', 'domain' : 'current.subdomain.domain',    'path' : '/',                    'query' : 'ключ=значение', 'anchor' : 'якорь' },
                         '/дир/субдир/страница'                        : {'protocol' : 'http', 'domain' : 'current.subdomain.domain',    'path' : '/дир/субдир/страница', 'query' : '',              'anchor' : ''      },
                         '/дир/субдир/страница?ключ=значение'          : {'protocol' : 'http', 'domain' : 'current.subdomain.domain',    'path' : '/дир/субдир/страница', 'query' : 'ключ=значение', 'anchor' : ''      },
                         '/дир/субдир/страница#якорь'                  : {'protocol' : 'http', 'domain' : 'current.subdomain.domain',    'path' : '/дир/субдир/страница', 'query' : '',              'anchor' : 'якорь' },
                         '/дир/субдир/страница?ключ=значение#якорь'    : {'protocol' : 'http', 'domain' : 'current.subdomain.domain',    'path' : '/дир/субдир/страница', 'query' : 'ключ=значение', 'anchor' : 'якорь' },
           'субдомен.домен/?ключ=значение'                             : {'protocol' : 'http', 'domain' :           'субдомен.домен',    'path' : '/',                    'query' : 'ключ=значение', 'anchor' : ''      },
           'субдомен.домен/#якорь'                                     : {'protocol' : 'http', 'domain' :           'субдомен.домен',    'path' : '/',                    'query' : '',              'anchor' : 'якорь' },
           'субдомен.домен/?ключ=значение#якорь'                       : {'protocol' : 'http', 'domain' :           'субдомен.домен',    'path' : '/',                    'query' : 'ключ=значение', 'anchor' : 'якорь' },
           'субдомен.домен/дир/субдир/страница'                        : {'protocol' : 'http', 'domain' :           'субдомен.домен',    'path' : '/дир/субдир/страница', 'query' : '',              'anchor' : ''      },
           'субдомен.домен/дир/субдир/страница?ключ=значение'          : {'protocol' : 'http', 'domain' :           'субдомен.домен',    'path' : '/дир/субдир/страница', 'query' : 'ключ=значение', 'anchor' : ''      },
           'субдомен.домен/дир/субдир/страница#якорь'                  : {'protocol' : 'http', 'domain' :           'субдомен.домен',    'path' : '/дир/субдир/страница', 'query' : '',              'anchor' : 'якорь' },
           'субдомен.домен/дир/субдир/страница?ключ=значение#якорь'    : {'protocol' : 'http', 'domain' :           'субдомен.домен',    'path' : '/дир/субдир/страница', 'query' : 'ключ=значение', 'anchor' : 'якорь' },
           'субдомен.домен:80/?ключ=значение'                          : {'protocol' : 'http', 'domain' :           'субдомен.домен:80', 'path' : '/',                    'query' : 'ключ=значение', 'anchor' : ''      },
           'субдомен.домен:80/#якорь'                                  : {'protocol' : 'http', 'domain' :           'субдомен.домен:80', 'path' : '/',                    'query' : '',              'anchor' : 'якорь' },
           'субдомен.домен:80/?ключ=значение#якорь'                    : {'protocol' : 'http', 'domain' :           'субдомен.домен:80', 'path' : '/',                    'query' : 'ключ=значение', 'anchor' : 'якорь' },
           'субдомен.домен:80/дир/субдир/страница'                     : {'protocol' : 'http', 'domain' :           'субдомен.домен:80', 'path' : '/дир/субдир/страница', 'query' : '',              'anchor' : ''      },
           'субдомен.домен:80/дир/субдир/страница?ключ=значение'       : {'protocol' : 'http', 'domain' :           'субдомен.домен:80', 'path' : '/дир/субдир/страница', 'query' : 'ключ=значение', 'anchor' : ''      },
           'субдомен.домен:80/дир/субдир/страница#якорь'               : {'protocol' : 'http', 'domain' :           'субдомен.домен:80', 'path' : '/дир/субдир/страница', 'query' : '',              'anchor' : 'якорь' },
           'субдомен.домен:80/дир/субдир/страница?ключ=значение#якорь' : {'protocol' : 'http', 'domain' :           'субдомен.домен:80', 'path' : '/дир/субдир/страница', 'query' : 'ключ=значение', 'anchor' : 'якорь' },
    'http://субдомен.домен/?ключ=значение'                             : {'protocol' : 'http', 'domain' :           'субдомен.домен',    'path' : '/',                    'query' : 'ключ=значение', 'anchor' : ''      },
    'http://субдомен.домен/#якорь'                                     : {'protocol' : 'http', 'domain' :           'субдомен.домен',    'path' : '/',                    'query' : '',              'anchor' : 'якорь' },
    'http://субдомен.домен/?ключ=значение#якорь'                       : {'protocol' : 'http', 'domain' :           'субдомен.домен',    'path' : '/',                    'query' : 'ключ=значение', 'anchor' : 'якорь' },
    'http://субдомен.домен/дир/субдир/страница'                        : {'protocol' : 'http', 'domain' :           'субдомен.домен',    'path' : '/дир/субдир/страница', 'query' : '',              'anchor' : ''      },
    'http://субдомен.домен/дир/субдир/страница?ключ=значение'          : {'protocol' : 'http', 'domain' :           'субдомен.домен',    'path' : '/дир/субдир/страница', 'query' : 'ключ=значение', 'anchor' : ''      },
    'http://субдомен.домен/дир/субдир/страница#якорь'                  : {'protocol' : 'http', 'domain' :           'субдомен.домен',    'path' : '/дир/субдир/страница', 'query' : '',              'anchor' : 'якорь' },
    'http://субдомен.домен/дир/субдир/страница?ключ=значение#якорь'    : {'protocol' : 'http', 'domain' :           'субдомен.домен',    'path' : '/дир/субдир/страница', 'query' : 'ключ=значение', 'anchor' : 'якорь' },
    'http://субдомен.домен:80/?ключ=значение'                          : {'protocol' : 'http', 'domain' :           'субдомен.домен:80', 'path' : '/',                    'query' : 'ключ=значение', 'anchor' : ''      },
    'http://субдомен.домен:80/#якорь'                                  : {'protocol' : 'http', 'domain' :           'субдомен.домен:80', 'path' : '/',                    'query' : '',              'anchor' : 'якорь' },
    'http://субдомен.домен:80/?ключ=значение#якорь'                    : {'protocol' : 'http', 'domain' :           'субдомен.домен:80', 'path' : '/',                    'query' : 'ключ=значение', 'anchor' : 'якорь' },
    'http://субдомен.домен:80/дир/субдир/страница'                     : {'protocol' : 'http', 'domain' :           'субдомен.домен:80', 'path' : '/дир/субдир/страница', 'query' : '',              'anchor' : ''      },
    'http://субдомен.домен:80/дир/субдир/страница?ключ=значение'       : {'protocol' : 'http', 'domain' :           'субдомен.домен:80', 'path' : '/дир/субдир/страница', 'query' : 'ключ=значение', 'anchor' : ''      },
    'http://субдомен.домен:80/дир/субдир/страница#якорь'               : {'protocol' : 'http', 'domain' :           'субдомен.домен:80', 'path' : '/дир/субдир/страница', 'query' : '',              'anchor' : 'якорь' },
    'http://субдомен.домен:80/дир/субдир/страница?ключ=значение#якорь' : {'protocol' : 'http', 'domain' :           'субдомен.домен:80', 'path' : '/дир/субдир/страница', 'query' : 'ключ=значение', 'anchor' : 'якорь' },
};

// ─────────────────────────────────────────────────────────────────────
// result
// ─────────────────────────────────────────────────────────────────────

for (c_value in urls) {
    var c_expected = urls[c_value];
    var c_info = new EffURL(c_value);
    var c_result = c_expected.protocol === c_info.protocol &&
                   c_expected.domain   === c_info.domain   &&
                   c_expected.path     === c_info.path     &&
                   c_expected.query    === c_info.query    &&
                   c_expected.anchor   === c_info.anchor;
    if (c_result)
         console.log('true "'  + c_value + '"');
    else console.log('FALSE "' + c_value + '"');
}

