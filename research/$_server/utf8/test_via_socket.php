<?php

namespace effcore;

# checking for request with utf8: "http://тест/путь"
# p.s.     via browser should be: "http://xn--e1aybc/%D0%BF%D1%83%D1%82%D1%8C"

$ip = '127.0.0.1';
$host = 'тест';
$path = 'путь';

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
$socket_connect = socket_connect($socket, $ip, 80);
if ($socket_connect) {
    socket_write($socket, "GET /".$path." HTTP/1.1\r\n");
    socket_write($socket, "Host: ".$host."\r\n");
    socket_write($socket, "Connection: Close\r\n\r\n");
    while ($result = socket_read($socket, 2048)) print $result;
    socket_close($socket);
} else {
    print socket_strerror(socket_last_error());
}
