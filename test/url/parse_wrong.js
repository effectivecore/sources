
var urls = [
    ':',
    ':/',
    'http:',
    'http:/',
    'http:///',
    'http:///path/',
    'http:/domain/path?key=value',
    'javascript://%0Aalert(document.cookie)'
];

for (c_i in urls) {
    var c_value = urls[c_i];
    var c_info = new EffURL(c_value);
    if (c_info.has_error === true)
         console.log('true "'  + c_value + '"');
    else console.log('FALSE "' + c_value + '"');
}

// ─────────────────────────────────────────────────────────────────────

var result =
    '    ERROR ""' + '\n' +
    '    OK    "http"' + '\n' +
    '    ERROR "://"' + '\n' +
    '    ERROR "http://"' + '\n' +
    '    OK    "subdomain.domain"' + '\n' +
    '    OK    "httpsubdomain.domain"' + '\n' +
    '    ERROR "://subdomain.domain"' + '\n' +
    '    OK    "http://subdomain.domain"' + '\n' +
    '    ERROR ":80"' + '\n' +
    '    OK    "http:80"' + '\n' +
    '    ERROR "://:80"' + '\n' +
    '    ERROR "http://:80"' + '\n' +
    '    OK    "subdomain.domain:80"' + '\n' +
    '    OK    "httpsubdomain.domain:80"' + '\n' +
    '    ERROR "://subdomain.domain:80"' + '\n' +
    '    OK    "http://subdomain.domain:80"' + '\n' +
    '    OK    "/dir/subdir/page"' + '\n' +
    '    OK    "http/dir/subdir/page"' + '\n' +
    '    ERROR ":///dir/subdir/page"' + '\n' +
    '    ERROR "http:///dir/subdir/page"' + '\n' +
    '    OK    "subdomain.domain/dir/subdir/page"' + '\n' +
    '    OK    "httpsubdomain.domain/dir/subdir/page"' + '\n' +
    '    ERROR "://subdomain.domain/dir/subdir/page"' + '\n' +
    '    OK    "http://subdomain.domain/dir/subdir/page"' + '\n' +
    '    ERROR ":80/dir/subdir/page"' + '\n' +
    '    OK    "http:80/dir/subdir/page"' + '\n' +
    '    ERROR "://:80/dir/subdir/page"' + '\n' +
    '    ERROR "http://:80/dir/subdir/page"' + '\n' +
    '    OK    "subdomain.domain:80/dir/subdir/page"' + '\n' +
    '    OK    "httpsubdomain.domain:80/dir/subdir/page"' + '\n' +
    '    ERROR "://subdomain.domain:80/dir/subdir/page"' + '\n' +
    '    OK    "http://subdomain.domain:80/dir/subdir/page"' + '\n' +
    '    ERROR "?key=value"' + '\n' +
    '    ERROR "http?key=value"' + '\n' +
    '    ERROR "://?key=value"' + '\n' +
    '    ERROR "http://?key=value"' + '\n' +
    '    ERROR "subdomain.domain?key=value"' + '\n' +
    '    ERROR "httpsubdomain.domain?key=value"' + '\n' +
    '    ERROR "://subdomain.domain?key=value"' + '\n' +
    '    ERROR "http://subdomain.domain?key=value"' + '\n' +
    '    ERROR ":80?key=value"' + '\n' +
    '    ERROR "http:80?key=value"' + '\n' +
    '    ERROR "://:80?key=value"' + '\n' +
    '    ERROR "http://:80?key=value"' + '\n' +
    '    ERROR "subdomain.domain:80?key=value"' + '\n' +
    '    ERROR "httpsubdomain.domain:80?key=value"' + '\n' +
    '    ERROR "://subdomain.domain:80?key=value"' + '\n' +
    '    ERROR "http://subdomain.domain:80?key=value"' + '\n' +
    '    OK    "/dir/subdir/page?key=value"' + '\n' +
    '    OK    "http/dir/subdir/page?key=value"' + '\n' +
    '    ERROR ":///dir/subdir/page?key=value"' + '\n' +
    '    ERROR "http:///dir/subdir/page?key=value"' + '\n' +
    '    OK    "subdomain.domain/dir/subdir/page?key=value"' + '\n' +
    '    OK    "httpsubdomain.domain/dir/subdir/page?key=value"' + '\n' +
    '    ERROR "://subdomain.domain/dir/subdir/page?key=value"' + '\n' +
    '    OK    "http://subdomain.domain/dir/subdir/page?key=value"' + '\n' +
    '    ERROR ":80/dir/subdir/page?key=value"' + '\n' +
    '    OK    "http:80/dir/subdir/page?key=value"' + '\n' +
    '    ERROR "://:80/dir/subdir/page?key=value"' + '\n' +
    '    ERROR "http://:80/dir/subdir/page?key=value"' + '\n' +
    '    OK    "subdomain.domain:80/dir/subdir/page?key=value"' + '\n' +
    '    OK    "httpsubdomain.domain:80/dir/subdir/page?key=value"' + '\n' +
    '    ERROR "://subdomain.domain:80/dir/subdir/page?key=value"' + '\n' +
    '    OK    "http://subdomain.domain:80/dir/subdir/page?key=value"' + '\n' +
    '    ERROR "#anchor"' + '\n' +
    '    ERROR "http#anchor"' + '\n' +
    '    ERROR "://#anchor"' + '\n' +
    '    ERROR "http://#anchor"' + '\n' +
    '    ERROR "subdomain.domain#anchor"' + '\n' +
    '    ERROR "httpsubdomain.domain#anchor"' + '\n' +
    '    ERROR "://subdomain.domain#anchor"' + '\n' +
    '    ERROR "http://subdomain.domain#anchor"' + '\n' +
    '    ERROR ":80#anchor"' + '\n' +
    '    ERROR "http:80#anchor"' + '\n' +
    '    ERROR "://:80#anchor"' + '\n' +
    '    ERROR "http://:80#anchor"' + '\n' +
    '    ERROR "subdomain.domain:80#anchor"' + '\n' +
    '    ERROR "httpsubdomain.domain:80#anchor"' + '\n' +
    '    ERROR "://subdomain.domain:80#anchor"' + '\n' +
    '    ERROR "http://subdomain.domain:80#anchor"' + '\n' +
    '    OK    "/dir/subdir/page#anchor"' + '\n' +
    '    OK    "http/dir/subdir/page#anchor"' + '\n' +
    '    ERROR ":///dir/subdir/page#anchor"' + '\n' +
    '    ERROR "http:///dir/subdir/page#anchor"' + '\n' +
    '    OK    "subdomain.domain/dir/subdir/page#anchor"' + '\n' +
    '    OK    "httpsubdomain.domain/dir/subdir/page#anchor"' + '\n' +
    '    ERROR "://subdomain.domain/dir/subdir/page#anchor"' + '\n' +
    '    OK    "http://subdomain.domain/dir/subdir/page#anchor"' + '\n' +
    '    ERROR ":80/dir/subdir/page#anchor"' + '\n' +
    '    OK    "http:80/dir/subdir/page#anchor"' + '\n' +
    '    ERROR "://:80/dir/subdir/page#anchor"' + '\n' +
    '    ERROR "http://:80/dir/subdir/page#anchor"' + '\n' +
    '    OK    "subdomain.domain:80/dir/subdir/page#anchor"' + '\n' +
    '    OK    "httpsubdomain.domain:80/dir/subdir/page#anchor"' + '\n' +
    '    ERROR "://subdomain.domain:80/dir/subdir/page#anchor"' + '\n' +
    '    OK    "http://subdomain.domain:80/dir/subdir/page#anchor"' + '\n' +
    '    ERROR "?key=value#anchor"' + '\n' +
    '    ERROR "http?key=value#anchor"' + '\n' +
    '    ERROR "://?key=value#anchor"' + '\n' +
    '    ERROR "http://?key=value#anchor"' + '\n' +
    '    ERROR "subdomain.domain?key=value#anchor"' + '\n' +
    '    ERROR "httpsubdomain.domain?key=value#anchor"' + '\n' +
    '    ERROR "://subdomain.domain?key=value#anchor"' + '\n' +
    '    ERROR "http://subdomain.domain?key=value#anchor"' + '\n' +
    '    ERROR ":80?key=value#anchor"' + '\n' +
    '    ERROR "http:80?key=value#anchor"' + '\n' +
    '    ERROR "://:80?key=value#anchor"' + '\n' +
    '    ERROR "http://:80?key=value#anchor"' + '\n' +
    '    ERROR "subdomain.domain:80?key=value#anchor"' + '\n' +
    '    ERROR "httpsubdomain.domain:80?key=value#anchor"' + '\n' +
    '    ERROR "://subdomain.domain:80?key=value#anchor"' + '\n' +
    '    ERROR "http://subdomain.domain:80?key=value#anchor"' + '\n' +
    '    OK    "/dir/subdir/page?key=value#anchor"' + '\n' +
    '    OK    "http/dir/subdir/page?key=value#anchor"' + '\n' +
    '    ERROR ":///dir/subdir/page?key=value#anchor"' + '\n' +
    '    ERROR "http:///dir/subdir/page?key=value#anchor"' + '\n' +
    '    OK    "subdomain.domain/dir/subdir/page?key=value#anchor"' + '\n' +
    '    OK    "httpsubdomain.domain/dir/subdir/page?key=value#anchor"' + '\n' +
    '    ERROR "://subdomain.domain/dir/subdir/page?key=value#anchor"' + '\n' +
    '    OK    "http://subdomain.domain/dir/subdir/page?key=value#anchor"' + '\n' +
    '    ERROR ":80/dir/subdir/page?key=value#anchor"' + '\n' +
    '    OK    "http:80/dir/subdir/page?key=value#anchor"' + '\n' +
    '    ERROR "://:80/dir/subdir/page?key=value#anchor"' + '\n' +
    '    ERROR "http://:80/dir/subdir/page?key=value#anchor"' + '\n' +
    '    OK    "subdomain.domain:80/dir/subdir/page?key=value#anchor"' + '\n' +
    '    OK    "httpsubdomain.domain:80/dir/subdir/page?key=value#anchor"' + '\n' +
    '    ERROR "://subdomain.domain:80/dir/subdir/page?key=value#anchor"' + '\n' +
    '    OK    "http://subdomain.domain:80/dir/subdir/page?key=value#anchor"';

parts = {
    1 : 'http', 2 : '://', 3 : 'subdomain.domain', 4 : ':80', 5 : '/dir/subdir/page', 6 : '?key=value', 7 : '#anchor'
};

var lines = [];
for (var i = 0b0000000; i <= 0b1111111; i++) { // 0 - 127
    var c_value = '';
    var is_part_active_1 = i & 0b0000001; // 1
    var is_part_active_2 = i & 0b0000010; // 2
    var is_part_active_3 = i & 0b0000100; // 4
    var is_part_active_4 = i & 0b0001000; // 8
    var is_part_active_5 = i & 0b0010000; // 16
    var is_part_active_6 = i & 0b0100000; // 32
    var is_part_active_7 = i & 0b1000000; // 64
    if (is_part_active_1) c_value += parts[1];
    if (is_part_active_2) c_value += parts[2];
    if (is_part_active_3) c_value += parts[3];
    if (is_part_active_4) c_value += parts[4];
    if (is_part_active_5) c_value += parts[5];
    if (is_part_active_6) c_value += parts[6];
    if (is_part_active_7) c_value += parts[7];
    var c_url = new EffURL(c_value);
    lines.push('    ' + (c_url.has_error ? 'ERROR' : 'OK   ') + ' "' + c_value + '"');
}

console.log('\n' + 'BEGIN TEST:' + '\n' + lines.join('\n'))
if (lines.join('\n') === result) {
    console.log('PASSED');
}

// ─────────────────────────────────────────────────────────────────────

var result =
    '    ERROR ""' + '\n' +
    '    OK    "http"' + '\n' +
    '    ERROR "://"' + '\n' +
    '    ERROR "http://"' + '\n' +
    '    OK    "subdomain.domain"' + '\n' +
    '    OK    "httpsubdomain.domain"' + '\n' +
    '    ERROR "://subdomain.domain"' + '\n' +
    '    OK    "http://subdomain.domain"' + '\n' +
    '    ERROR ":80"' + '\n' +
    '    OK    "http:80"' + '\n' +
    '    ERROR "://:80"' + '\n' +
    '    ERROR "http://:80"' + '\n' +
    '    OK    "subdomain.domain:80"' + '\n' +
    '    OK    "httpsubdomain.domain:80"' + '\n' +
    '    ERROR "://subdomain.domain:80"' + '\n' +
    '    OK    "http://subdomain.domain:80"' + '\n' +
    '    OK    "/"' + '\n' +
    '    OK    "http/"' + '\n' +
    '    ERROR ":///"' + '\n' +
    '    ERROR "http:///"' + '\n' +
    '    OK    "subdomain.domain/"' + '\n' +
    '    OK    "httpsubdomain.domain/"' + '\n' +
    '    ERROR "://subdomain.domain/"' + '\n' +
    '    OK    "http://subdomain.domain/"' + '\n' +
    '    ERROR ":80/"' + '\n' +
    '    OK    "http:80/"' + '\n' +
    '    ERROR "://:80/"' + '\n' +
    '    ERROR "http://:80/"' + '\n' +
    '    OK    "subdomain.domain:80/"' + '\n' +
    '    OK    "httpsubdomain.domain:80/"' + '\n' +
    '    ERROR "://subdomain.domain:80/"' + '\n' +
    '    OK    "http://subdomain.domain:80/"' + '\n' +
    '    ERROR "?key=value"' + '\n' +
    '    ERROR "http?key=value"' + '\n' +
    '    ERROR "://?key=value"' + '\n' +
    '    ERROR "http://?key=value"' + '\n' +
    '    ERROR "subdomain.domain?key=value"' + '\n' +
    '    ERROR "httpsubdomain.domain?key=value"' + '\n' +
    '    ERROR "://subdomain.domain?key=value"' + '\n' +
    '    ERROR "http://subdomain.domain?key=value"' + '\n' +
    '    ERROR ":80?key=value"' + '\n' +
    '    ERROR "http:80?key=value"' + '\n' +
    '    ERROR "://:80?key=value"' + '\n' +
    '    ERROR "http://:80?key=value"' + '\n' +
    '    ERROR "subdomain.domain:80?key=value"' + '\n' +
    '    ERROR "httpsubdomain.domain:80?key=value"' + '\n' +
    '    ERROR "://subdomain.domain:80?key=value"' + '\n' +
    '    ERROR "http://subdomain.domain:80?key=value"' + '\n' +
    '    OK    "/?key=value"' + '\n' +
    '    OK    "http/?key=value"' + '\n' +
    '    ERROR ":///?key=value"' + '\n' +
    '    ERROR "http:///?key=value"' + '\n' +
    '    OK    "subdomain.domain/?key=value"' + '\n' +
    '    OK    "httpsubdomain.domain/?key=value"' + '\n' +
    '    ERROR "://subdomain.domain/?key=value"' + '\n' +
    '    OK    "http://subdomain.domain/?key=value"' + '\n' +
    '    ERROR ":80/?key=value"' + '\n' +
    '    OK    "http:80/?key=value"' + '\n' +
    '    ERROR "://:80/?key=value"' + '\n' +
    '    ERROR "http://:80/?key=value"' + '\n' +
    '    OK    "subdomain.domain:80/?key=value"' + '\n' +
    '    OK    "httpsubdomain.domain:80/?key=value"' + '\n' +
    '    ERROR "://subdomain.domain:80/?key=value"' + '\n' +
    '    OK    "http://subdomain.domain:80/?key=value"' + '\n' +
    '    ERROR "#anchor"' + '\n' +
    '    ERROR "http#anchor"' + '\n' +
    '    ERROR "://#anchor"' + '\n' +
    '    ERROR "http://#anchor"' + '\n' +
    '    ERROR "subdomain.domain#anchor"' + '\n' +
    '    ERROR "httpsubdomain.domain#anchor"' + '\n' +
    '    ERROR "://subdomain.domain#anchor"' + '\n' +
    '    ERROR "http://subdomain.domain#anchor"' + '\n' +
    '    ERROR ":80#anchor"' + '\n' +
    '    ERROR "http:80#anchor"' + '\n' +
    '    ERROR "://:80#anchor"' + '\n' +
    '    ERROR "http://:80#anchor"' + '\n' +
    '    ERROR "subdomain.domain:80#anchor"' + '\n' +
    '    ERROR "httpsubdomain.domain:80#anchor"' + '\n' +
    '    ERROR "://subdomain.domain:80#anchor"' + '\n' +
    '    ERROR "http://subdomain.domain:80#anchor"' + '\n' +
    '    OK    "/#anchor"' + '\n' +
    '    OK    "http/#anchor"' + '\n' +
    '    ERROR ":///#anchor"' + '\n' +
    '    ERROR "http:///#anchor"' + '\n' +
    '    OK    "subdomain.domain/#anchor"' + '\n' +
    '    OK    "httpsubdomain.domain/#anchor"' + '\n' +
    '    ERROR "://subdomain.domain/#anchor"' + '\n' +
    '    OK    "http://subdomain.domain/#anchor"' + '\n' +
    '    ERROR ":80/#anchor"' + '\n' +
    '    OK    "http:80/#anchor"' + '\n' +
    '    ERROR "://:80/#anchor"' + '\n' +
    '    ERROR "http://:80/#anchor"' + '\n' +
    '    OK    "subdomain.domain:80/#anchor"' + '\n' +
    '    OK    "httpsubdomain.domain:80/#anchor"' + '\n' +
    '    ERROR "://subdomain.domain:80/#anchor"' + '\n' +
    '    OK    "http://subdomain.domain:80/#anchor"' + '\n' +
    '    ERROR "?key=value#anchor"' + '\n' +
    '    ERROR "http?key=value#anchor"' + '\n' +
    '    ERROR "://?key=value#anchor"' + '\n' +
    '    ERROR "http://?key=value#anchor"' + '\n' +
    '    ERROR "subdomain.domain?key=value#anchor"' + '\n' +
    '    ERROR "httpsubdomain.domain?key=value#anchor"' + '\n' +
    '    ERROR "://subdomain.domain?key=value#anchor"' + '\n' +
    '    ERROR "http://subdomain.domain?key=value#anchor"' + '\n' +
    '    ERROR ":80?key=value#anchor"' + '\n' +
    '    ERROR "http:80?key=value#anchor"' + '\n' +
    '    ERROR "://:80?key=value#anchor"' + '\n' +
    '    ERROR "http://:80?key=value#anchor"' + '\n' +
    '    ERROR "subdomain.domain:80?key=value#anchor"' + '\n' +
    '    ERROR "httpsubdomain.domain:80?key=value#anchor"' + '\n' +
    '    ERROR "://subdomain.domain:80?key=value#anchor"' + '\n' +
    '    ERROR "http://subdomain.domain:80?key=value#anchor"' + '\n' +
    '    OK    "/?key=value#anchor"' + '\n' +
    '    OK    "http/?key=value#anchor"' + '\n' +
    '    ERROR ":///?key=value#anchor"' + '\n' +
    '    ERROR "http:///?key=value#anchor"' + '\n' +
    '    OK    "subdomain.domain/?key=value#anchor"' + '\n' +
    '    OK    "httpsubdomain.domain/?key=value#anchor"' + '\n' +
    '    ERROR "://subdomain.domain/?key=value#anchor"' + '\n' +
    '    OK    "http://subdomain.domain/?key=value#anchor"' + '\n' +
    '    ERROR ":80/?key=value#anchor"' + '\n' +
    '    OK    "http:80/?key=value#anchor"' + '\n' +
    '    ERROR "://:80/?key=value#anchor"' + '\n' +
    '    ERROR "http://:80/?key=value#anchor"' + '\n' +
    '    OK    "subdomain.domain:80/?key=value#anchor"' + '\n' +
    '    OK    "httpsubdomain.domain:80/?key=value#anchor"' + '\n' +
    '    ERROR "://subdomain.domain:80/?key=value#anchor"' + '\n' +
    '    OK    "http://subdomain.domain:80/?key=value#anchor"';

parts = {
    1 : 'http', 2 : '://', 3 : 'subdomain.domain', 4 : ':80', 5 : '/', 6 : '?key=value', 7 : '#anchor'
};

var lines = [];
for (var i = 0b0000000; i <= 0b1111111; i++) { // 0 - 127
    var c_value = '';
    var is_part_active_1 = i & 0b0000001; // 1
    var is_part_active_2 = i & 0b0000010; // 2
    var is_part_active_3 = i & 0b0000100; // 4
    var is_part_active_4 = i & 0b0001000; // 8
    var is_part_active_5 = i & 0b0010000; // 16
    var is_part_active_6 = i & 0b0100000; // 32
    var is_part_active_7 = i & 0b1000000; // 64
    if (is_part_active_1) c_value += parts[1];
    if (is_part_active_2) c_value += parts[2];
    if (is_part_active_3) c_value += parts[3];
    if (is_part_active_4) c_value += parts[4];
    if (is_part_active_5) c_value += parts[5];
    if (is_part_active_6) c_value += parts[6];
    if (is_part_active_7) c_value += parts[7];
    var c_url = new EffURL(c_value);
    lines.push('    ' + (c_url.has_error ? 'ERROR' : 'OK   ') + ' "' + c_value + '"');
}

console.log('\n' + 'BEGIN TEST:' + '\n' + lines.join('\n'))
if (lines.join('\n') === result) {
    console.log('PASSED');
}

