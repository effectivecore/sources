<?php

namespace effcore;

# ┌─────────────────╥───────┬────────────────╥────────┐
# │        ╲  modes ║       │                ║        │
# │ server  ╲       ║ HTTPS │ REQUEST_SCHEME ║ result │
# ╞═════════════════╬═══════╪════════════════╬════════╡
# │ Apache v2.4     ║ -     │ http           ║ http   │
# │ Apache v2.4 SSL ║ on    │ https          ║ https  │
# │ NGINX  v1.1     ║ -     │ http           ║ http   │
# │ NGINX  v1.1 SSL ║ on    │ https          ║ https  │
# │ IIS    v7.5     ║ off   │ -              ║ http   │
# │ IIS    v7.5 SSL ║ on    │ -              ║ https  │
# └─────────────────╨───────┴────────────────╨────────┘

# nginx-mac-php80.md
# nginx-mac-php80-https.md
# nginx-mac-php71.md
# nginx-mac-php71-https.md
# apache24-mac-php71.md
# apache24-mac-php71-https.md
# iis75-win-php71.md
# iis75-win-php71-https.md
# apache24-win-php71.md

$url_http  =  'http://effcore/category/категория?key=value&ключ=значение';
$url_https = 'https://effcore/category/категория?key=value&ключ=значение';
$server_real_www_path = '/usr/local/var/www';
$server_www_path = '/var/www';

$software_info = request::software_get_info();
if ($software_info->name === 'nginx') $server = 'nginx';
if ($software_info->name === 'apache' && version_compare($software_info->version, '2.1.0', '>') && version_compare($software_info->version, '2.1.100', '<')) $server = 'apache21';
if ($software_info->name === 'apache' && version_compare($software_info->version, '2.2.0', '>') && version_compare($software_info->version, '2.2.100', '<')) $server = 'apache22';
if ($software_info->name === 'apache' && version_compare($software_info->version, '2.3.0', '>') && version_compare($software_info->version, '2.3.100', '<')) $server = 'apache23';
if ($software_info->name === 'apache' && version_compare($software_info->version, '2.4.0', '>') && version_compare($software_info->version, '2.4.100', '<')) $server = 'apache24';
if ($software_info->name === 'microsoft-iis'                                      ) $server = 'iis';
if ($software_info->name === 'microsoft-iis' && $software_info->version === '7.5' ) $server = 'iis75';
if ($software_info->name === 'microsoft-iis' && $software_info->version === '10.0') $server = 'iis10';

$php_is_on_win = core::php_is_on_win();
if ($php_is_on_win === true) $os = 'Win';
if ($php_is_on_win !== true) $os = 'Mac';

$scheme = request::scheme_get();
if ($scheme === 'https') $is_https = 1;
if ($scheme !== 'https') $is_https = 0;

$phpversion = phpversion();
if (version_compare($phpversion, '7.1.0', '>') && version_compare($phpversion, '7.1.100', '<')) $php = '71';
if (version_compare($phpversion, '7.2.0', '>') && version_compare($phpversion, '7.2.100', '<')) $php = '72';
if (version_compare($phpversion, '7.3.0', '>') && version_compare($phpversion, '7.3.100', '<')) $php = '73';
if (version_compare($phpversion, '7.4.0', '>') && version_compare($phpversion, '7.4.100', '<')) $php = '74';
if (version_compare($phpversion, '8.0.0', '>') && version_compare($phpversion, '8.0.100', '<')) $php = '80';

$report_name = $server.'-'.strtolower($os).'-php'.$php.($is_https ? '-https' : '').'.md';

header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.$report_name);
header('Cache-Control: private, no-cache, no-store, must-revalidate');
header('Expires: 0');

$_SERVER['CONTENT_LENGTH']       = '%%_CONTENT_LENGTH';
$_SERVER['CONTENT_TYPE']         = '%%_CONTENT_TYPE';
$_SERVER['HTTP_ACCEPT_ENCODING'] = '%%_HTTP_ACCEPT_ENCODING';
$_SERVER['HTTP_ACCEPT_LANGUAGE'] = '%%_HTTP_ACCEPT_LANGUAGE';
$_SERVER['HTTP_ACCEPT']          = '%%_HTTP_ACCEPT';
$_SERVER['HTTP_CACHE_CONTROL']   = '%%_HTTP_CACHE_CONTROL';
$_SERVER['HTTP_CONNECTION']      = '%%_HTTP_CONNECTION';
$_SERVER['HTTP_COOKIE']          = '%%_HTTP_COOKIE';
$_SERVER['HTTP_USER_AGENT']      = '%%_HTTP_USER_AGENT';
$_SERVER['REMOTE_PORT']          = '%%_REMOTE_PORT';
$_SERVER['REQUEST_TIME_FLOAT']   = '%%_REQUEST_TIME_FLOAT';
$_SERVER['REQUEST_TIME']         = '%%_REQUEST_TIME';
unset($_SERVER['_FCGI_X_PIPE_']);
unset($_SERVER['ALLUSERSPROFILE']);
unset($_SERVER['APP_POOL_CONFIG']);
unset($_SERVER['APP_POOL_ID']);
unset($_SERVER['APPDATA']);
unset($_SERVER['APPL_MD_PATH']);
unset($_SERVER['APPL_PHYSICAL_PATH']);
unset($_SERVER['CommonProgramFiles']);
unset($_SERVER['COMPUTERNAME']);
unset($_SERVER['ComSpec']);
unset($_SERVER['COMSPEC']);
unset($_SERVER['HOME']);
unset($_SERVER['HTTP_DNT']);
unset($_SERVER['INSTANCE_ID']);
unset($_SERVER['INSTANCE_META_PATH']);
unset($_SERVER['LOCALAPPDATA']);
unset($_SERVER['NUMBER_OF_PROCESSORS']);
unset($_SERVER['OS']);
unset($_SERVER['Path']);
unset($_SERVER['PATH']);
unset($_SERVER['PATHEXT']);
unset($_SERVER['PROCESSOR_ARCHITECTURE']);
unset($_SERVER['PROCESSOR_IDENTIFIER']);
unset($_SERVER['PROCESSOR_LEVEL']);
unset($_SERVER['PROCESSOR_REVISION']);
unset($_SERVER['ProgramData']);
unset($_SERVER['ProgramFiles']);
unset($_SERVER['PSModulePath']);
unset($_SERVER['PUBLIC']);
unset($_SERVER['SERVER_ADMIN']);
unset($_SERVER['SystemDrive']);
unset($_SERVER['SystemRoot']);
unset($_SERVER['TEMP']);
unset($_SERVER['TMP']);
unset($_SERVER['USER']);
unset($_SERVER['USERDOMAIN']);
unset($_SERVER['USERNAME']);
unset($_SERVER['USERPROFILE']);
unset($_SERVER['windir']);
unset($_SERVER['WINDIR']);
ksort($_SERVER);

print 'server: '.$server.NL;
print 'os: '.    $os.NL;
print 'php: '.   $php.NL;
print 'https: '.($is_https ? 'yes' : 'no').NL;
print 'url: '.  ($is_https ? $url_https : $url_http).NL;
print NL;

print '$_SERVER'.NL;
print '---------------------------------------------------------------------'.NL;
foreach ($_SERVER as $c_key => $c_value) {
    $c_value = str_replace($server_real_www_path, $server_www_path, $c_value);
    print '- '.$c_key.': '.$c_value.NL;
}

print NL.'$_GET'.NL;
print '---------------------------------------------------------------------'.NL;
foreach ($_GET as $c_key => $c_value) {
    print '- '.$c_key.': '.$c_value.NL;
}
