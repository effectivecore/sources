
// ─────────────────────────────────────────────────────────────────────
// queryArgDelete() test
// ─────────────────────────────────────────────────────────────────────

var url_href_src = 'http://example.com/?key_1=value_1&key_array_1[0]=value_2&key_array_1[x]=value_3';
var url_href_dst = 'http://example.com/?' +          'key_array_1[0]=value_2&key_array_1[x]=value_3';
var url = new EffURL(url_href_src);
url.queryArgDelete('key_1');
console.log(url.fullGet() === url_href_dst);

var url_href_src = 'http://example.com/?key_1=value_1&key_array_1[0]=value_2&key_array_1[x]=value_3';
var url_href_dst = 'http://example.com/?key_1=value_1';
var url = new EffURL(url_href_src);
url.queryArgDelete('key_array_1');
console.log(url.fullGet() === url_href_dst);

var url_href_src = 'http://example.com/?key_1=value_1&key_array_1[0]=value_2&key_array_1[x]=value_3';
var url_href_dst = 'http://example.com';
var url = new EffURL(url_href_src);
url.queryArgDelete('key_1');
url.queryArgDelete('key_array_1');
console.log(url.fullGet() === url_href_dst);

// ─────────────────────────────────────────────────────────────────────
// queryArgInsert() test
// ─────────────────────────────────────────────────────────────────────

var url_href_src = 'http://example.com/';
var url_href_dst = 'http://example.com/?key_1=value_1';
var url = new EffURL(url_href_src);
url.queryArgInsert('key_1', 'value_1');
console.log(url.fullGet() === url_href_dst);

var url_href_src = 'http://example.com/';
var url_href_dst = 'http://example.com/?key_array_1[0]=value_2&key_array_1[x]=value_3';
var url = new EffURL(url_href_src);
url.queryArgInsert('key_array_1', {0 : 'value_2', 'x' : 'value_3'});
console.log(url.fullGet() === url_href_dst);

var url_href_src = 'http://example.com/';
var url_href_dst = 'http://example.com/?key_1=value_1&key_array_1[0]=value_2&key_array_1[x]=value_3';
var url = new EffURL(url_href_src);
url.queryArgInsert('key_1', 'value_1');
url.queryArgInsert('key_array_1', {0 : 'value_2', 'x' : 'value_3'});
console.log(url.fullGet() === url_href_dst);

var url_href_src = 'http://example.com/?key_1=value_1&key_array_1[0]=value_2&key_array_1[x]=value_3';
var url_href_dst = 'http://example.com/?key_1=value_X&key_array_1[0]=value_2&key_array_1[x]=value_3';
var url = new EffURL(url_href_src);
url.queryArgInsert('key_1', 'value_X');
console.log(url.fullGet() === url_href_dst);

var url_href_src = 'http://example.com/?key_1=value_1&key_array_1[0]=value_2&key_array_1[x]=value_3';
var url_href_dst = 'http://example.com/?key_1=value_1&key_array_1[0]=value_Y&key_array_1[x]=value_Z';
var url = new EffURL(url_href_src);
url.queryArgInsert('key_array_1', {0 : 'value_Y', 'x' : 'value_Z'});
console.log(url.fullGet() === url_href_dst);

var url_href_src = 'http://example.com/?key_1=value_1&key_array_1[0]=value_2&key_array_1[x]=value_3';
var url_href_dst = 'http://example.com/?key_1=value_X&key_array_1[0]=value_Y&key_array_1[x]=value_Z';
var url = new EffURL(url_href_src);
url.queryArgInsert('key_1', 'value_X');
url.queryArgInsert('key_array_1', {0 : 'value_Y', 'x' : 'value_Z'});
console.log(url.fullGet() === url_href_dst);

