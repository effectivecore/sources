<?php

namespace effcore;

# checking for request with utf8: "http://effcore/category/категория?key=value&ключ=значение"
# p.s.     via browser should be: "http://effcore/category/%D0%BA%D0%B0%D1%82%D0%B5%D0%B3%D0%BE%D1%80%D0%B8%D1%8F?key=value&%D0%BA%D0%BB%D1%8E%D1%87=%D0%B7%D0%BD%D0%B0%D1%87%D0%B5%D0%BD%D0%B8%D0%B5"

$ip = '127.0.0.1';
$host = 'effcore';
$path = 'category/категория?key=value&ключ=значение';

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
