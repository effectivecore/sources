server: apache24
os: Mac
php: 71
https: no
url: http://effcore/category/категория?key=value&ключ=значение

$_SERVER
---------------------------------------------------------------------
- CONTENT_LENGTH: %%_CONTENT_LENGTH
- CONTENT_TYPE: %%_CONTENT_TYPE
- CONTEXT_DOCUMENT_ROOT: /var/www
- CONTEXT_PREFIX: 
- DOCUMENT_ROOT: /var/www
- GATEWAY_INTERFACE: CGI/1.1
- HTTP_ACCEPT: %%_HTTP_ACCEPT
- HTTP_ACCEPT_ENCODING: %%_HTTP_ACCEPT_ENCODING
- HTTP_ACCEPT_LANGUAGE: %%_HTTP_ACCEPT_LANGUAGE
- HTTP_CACHE_CONTROL: %%_HTTP_CACHE_CONTROL
- HTTP_CONNECTION: %%_HTTP_CONNECTION
- HTTP_COOKIE: %%_HTTP_COOKIE
- HTTP_HOST: effcore
- HTTP_USER_AGENT: %%_HTTP_USER_AGENT
- PHP_SELF: /index.php
- QUERY_STRING: key=value&ключ=значение
- REDIRECT_QUERY_STRING: key=value&ключ=значение
- REDIRECT_STATUS: 200
- REDIRECT_URL: /category/категория
- REMOTE_ADDR: 127.0.0.1
- REMOTE_PORT: %%_REMOTE_PORT
- REQUEST_METHOD: GET
- REQUEST_SCHEME: http
- REQUEST_TIME: %%_REQUEST_TIME
- REQUEST_TIME_FLOAT: %%_REQUEST_TIME_FLOAT
- REQUEST_URI: /category/категория?key=value&ключ=значение
- SCRIPT_FILENAME: /var/www/index.php
- SCRIPT_NAME: /index.php
- SERVER_ADDR: 127.0.0.1
- SERVER_NAME: effcore
- SERVER_PORT: 80
- SERVER_PROTOCOL: HTTP/1.1
- SERVER_SIGNATURE: 
- SERVER_SOFTWARE: Apache/2.4.46 (Unix) LibreSSL/2.5.5 PHP/7.1.33

$_GET
---------------------------------------------------------------------
- key: value
- ключ: значение
