<?php

namespace effcore;

#####################################################################
### stream: fwrite, unlink, copy, file_exists, filesize, cleaning ###
###         file_put_contents, add_file, add_from_string          ###
#####################################################################

print '<br><br>### STREAM ###<br><br>';

# simple file
$path_container = 'container://'.__DIR__.'/result/simple.picture';
$path_file      = 'container://'.__DIR__.'/result/simple.picture:file_1';
@unlink($path_container);
$handle = fopen($path_file, 'c+b');
stream_set_read_buffer ($handle, 0);
stream_set_write_buffer($handle, 0);
fwrite($handle, '0');
fwrite($handle, '12');
fwrite($handle, '345');
fwrite($handle, '67');
fwrite($handle, '8');
fwrite($handle, '9');
fclose($handle);

# simple file (read + write)
$path_container = 'container://'.__DIR__.'/result/simple-write_plus_read.picture';
$path_file      = 'container://'.__DIR__.'/result/simple-write_plus_read.picture:file_1';
@unlink($path_container);
$handle = fopen($path_file, 'c+b');
stream_set_read_buffer ($handle, 0);
stream_set_write_buffer($handle, 0);
fwrite($handle, '01234'); fseek($handle, 1); var_dump( fread($handle, 3) === '123' ); print '<br>';
fwrite($handle, '56789'); fseek($handle, 6); var_dump( fread($handle, 3) === '678' ); print '<br>';
fclose($handle);

# complex file (2 files inside)
$path_container              = 'container://'.__DIR__.'/result/complex.picture';
$path_container_fwrite_log_1 = 'container://'.__DIR__.'/result/complex-fwrite-log_1.txt';
$path_container_fwrite_log_2 = 'container://'.__DIR__.'/result/complex-fwrite-log_2.txt';
$path_container_fwrite_log_3 = 'container://'.__DIR__.'/result/complex-fwrite-log_3.txt';
$path_file_1                 = 'container://'.__DIR__.'/result/complex.picture:file_1';
$path_file_2                 = 'container://'.__DIR__.'/result/complex.picture:file_2';

@unlink($path_container);
@unlink($path_container_fwrite_log_1);
@unlink($path_container_fwrite_log_2);
@unlink($path_container_fwrite_log_3);

$handle = fopen($path_file_1, 'c+b'); stream_set_read_buffer($handle, 0); stream_set_write_buffer($handle, 0); fwrite($handle, 'abcdefghijklmnopqrstuvwxyz'); fclose($handle); copy($path_container, $path_container_fwrite_log_1);
$handle = fopen($path_file_2, 'c+b'); stream_set_read_buffer($handle, 0); stream_set_write_buffer($handle, 0); fwrite($handle, 'xyz');                        fclose($handle); copy($path_container, $path_container_fwrite_log_2);
$handle = fopen($path_file_1, 'c+b'); stream_set_read_buffer($handle, 0); stream_set_write_buffer($handle, 0); fwrite($handle, '0123456789');                 fclose($handle); copy($path_container, $path_container_fwrite_log_3);

# copy
$path_file_1_copy_to_txt       = 'container://'.__DIR__.'/result/complex-copy_to_simple-file_1.txt';
$path_file_2_copy_to_txt       = 'container://'.__DIR__.'/result/complex-copy_to_simple-file_2.txt';
$path_file_1_copy_to_container = 'container://'.__DIR__.'/result/complex-copy_to_simple-file_1.picture:file_1';
$path_file_2_copy_to_container = 'container://'.__DIR__.'/result/complex-copy_to_simple-file_2.picture:file_2';

@unlink($path_file_1_copy_to_txt);
@unlink($path_file_2_copy_to_txt);
@unlink($path_file_1_copy_to_container);
@unlink($path_file_2_copy_to_container);

copy($path_file_1, $path_file_1_copy_to_txt);
copy($path_file_2, $path_file_2_copy_to_txt);
copy($path_file_1, $path_file_1_copy_to_container);
copy($path_file_2, $path_file_2_copy_to_container);

# unlink
$path_container        = 'container://'.__DIR__.'/result/complex.picture';
$path_container_unlink = 'container://'.__DIR__.'/result/complex-unlink_file_1.picture';
$path_file_1           = 'container://'.__DIR__.'/result/complex-unlink_file_1.picture:file_1';
@unlink($path_container_unlink);
copy($path_container, $path_container_unlink);
unlink($path_file_1);

# cleaning
$path_container_unlink          = 'container://'.__DIR__.'/result/complex-unlink_file_1.picture';
$path_container_unlink_cleaning = 'container://'.__DIR__.'/result/complex-unlink_file_1-cleaning.picture';
@unlink($path_container_unlink_cleaning);
copy($path_container_unlink, $path_container_unlink_cleaning);
var_dump( file_container::cleaning($path_container_unlink_cleaning) ); print "<br>";

# file_put_contents (note: file_get_contents not implemented due to EOF)
$path_container = 'container://'.__DIR__.'/result/complex-file_put_contents.picture';
$path_file_1    = 'container://'.__DIR__.'/result/complex-file_put_contents.picture:file_1';
$path_file_2    = 'container://'.__DIR__.'/result/complex-file_put_contents.picture:file_2';
$context = stream_context_create(['container' => []]);
@unlink($path_container);
var_dump( file_put_contents($path_file_1, 'abcdefghijklmnopqrstuvwxyz', 0, $context) === 26 ); print "<br>";
var_dump( file_put_contents($path_file_2, 'xyz',                        0, $context) ===  3 ); print "<br>";

# statistics
$path_container = 'container://'.__DIR__.'/result/complex.picture';
$path_file_1    = 'container://'.__DIR__.'/result/complex.picture:file_1';
$path_file_2    = 'container://'.__DIR__.'/result/complex.picture:file_2';

var_dump( file_exists($path_container)        ); print '<br>';
var_dump( file_exists($path_file_1)           ); print '<br>';
var_dump( file_exists($path_file_2)           ); print '<br>';
var_dump(    filesize($path_container) === 635); print '<br>';
var_dump(    filesize($path_file_1)    ===  10); print '<br>';
var_dump(    filesize($path_file_2)    ===   3); print '<br>';

# fpassthru
$path_container = 'container://'.__DIR__.'/result/complex.picture';
$path_file_1    = 'container://'.__DIR__.'/result/complex.picture:file_1';
$path_file_2    = 'container://'.__DIR__.'/result/complex.picture:file_2';
ob_start(); $handle = fopen($path_file_1, 'rb'); $result_1 = fpassthru($handle) === 10; $result_2 = ob_get_contents() === '0123456789'; fclose($handle); ob_end_clean();
ob_start(); $handle = fopen($path_file_2, 'rb'); $result_3 = fpassthru($handle) ===  3; $result_4 = ob_get_contents() === 'xyz';        fclose($handle); ob_end_clean();
var_dump($result_1); print '<br>';
var_dump($result_2); print '<br>';
var_dump($result_3); print '<br>';
var_dump($result_4); print '<br>';

# readfile
$path_container = 'container://'.__DIR__.'/result/complex.picture';
$path_file_1    = 'container://'.__DIR__.'/result/complex.picture:file_1';
$path_file_2    = 'container://'.__DIR__.'/result/complex.picture:file_2';
ob_start(); $result_1 = readfile($path_file_1) === 10; $result_2 = ob_get_contents() === '0123456789'; ob_end_clean();
ob_start(); $result_2 = readfile($path_file_2) ===  3; $result_4 = ob_get_contents() === 'xyz';        ob_end_clean();
var_dump($result_1); print '<br>';
var_dump($result_2); print '<br>';
var_dump($result_3); print '<br>';
var_dump($result_4); print '<br>';

# add_file
$path_container  = 'container://'.__DIR__.'/result/complex-add_file.picture';
$path_file_1     = 'container://'.__DIR__.'/result/complex-add_file.picture:file_1';
$path_file_2     = 'container://'.__DIR__.'/result/complex-add_file.picture:file_2';
$path_file_1_txt =                __DIR__.'/result/simple-abcdefghijklmnopqrstuvwxyz.txt';
$path_file_2_txt =                __DIR__.'/result/simple-xyz.txt';
@unlink($path_container);
var_dump( file_container::add_file($path_file_1_txt, $path_file_1) === 26 ); print '<br>';
var_dump( file_container::add_file($path_file_2_txt, $path_file_2) ===  3 ); print '<br>';

# add_from_string
$path_container = 'container://'.__DIR__.'/result/complex-add_from_string.picture';
$path_file_1    = 'container://'.__DIR__.'/result/complex-add_from_string.picture:file_1';
$path_file_2    = 'container://'.__DIR__.'/result/complex-add_from_string.picture:file_2';
@unlink($path_container);
var_dump( file_container::add_from_string('abcdefghijklmnopqrstuvwxyz', $path_file_1) === 26 ); print '<br>';
var_dump( file_container::add_from_string(                       'xyz', $path_file_2) ===  3 ); print '<br>';

print '<br>';



############################
### stream: fseek, fread ###
############################

$path_file = 'container://'.__DIR__.'/result/simple.picture:file_1';
$mode = 'rb';

# read
$handle = fopen($path_file, $mode);
    stream_set_read_buffer ($handle, 0);
    stream_set_write_buffer($handle, 0);
    var_dump(fread($handle, 1) === '0'); print '<br>';
    var_dump(fread($handle, 1) === '1'); print '<br>';
    var_dump(fread($handle, 1) === '2'); print '<br>';
    var_dump(fread($handle, 1) === '3'); print '<br>';
    var_dump(fread($handle, 1) === '4'); print '<br>';
    var_dump(fread($handle, 1) === '5'); print '<br>';
    var_dump(fread($handle, 1) === '6'); print '<br>';
    var_dump(fread($handle, 1) === '7'); print '<br>';
    var_dump(fread($handle, 1) === '8'); print '<br>';
    var_dump(fread($handle, 1) === '9'); print '<br>';
    var_dump(fread($handle, 1) === '' ); print '<br>';
fclose($handle); print '<br>';

$handle = fopen($path_file, $mode);
    stream_set_read_buffer ($handle, 0);
    stream_set_write_buffer($handle, 0);
    var_dump(fread($handle, 1) === '0'   ); print '<br>';
    var_dump(fread($handle, 2) === '12'  ); print '<br>';
    var_dump(fread($handle, 3) === '345' ); print '<br>';
    var_dump(fread($handle, 4) === '6789'); print '<br>';
    var_dump(fread($handle, 5) === ''    ); print '<br>';
fclose($handle); print '<br>';

# seek = n/a | read
$handle = fopen($path_file, $mode); stream_set_read_buffer($handle, 0); stream_set_write_buffer($handle, 0); var_dump(fread($handle,  1) === '0'         ); fclose($handle); print '<br>';
$handle = fopen($path_file, $mode); stream_set_read_buffer($handle, 0); stream_set_write_buffer($handle, 0); var_dump(fread($handle,  2) === '01'        ); fclose($handle); print '<br>';
$handle = fopen($path_file, $mode); stream_set_read_buffer($handle, 0); stream_set_write_buffer($handle, 0); var_dump(fread($handle,  3) === '012'       ); fclose($handle); print '<br>';
$handle = fopen($path_file, $mode); stream_set_read_buffer($handle, 0); stream_set_write_buffer($handle, 0); var_dump(fread($handle,  4) === '0123'      ); fclose($handle); print '<br>';
$handle = fopen($path_file, $mode); stream_set_read_buffer($handle, 0); stream_set_write_buffer($handle, 0); var_dump(fread($handle,  5) === '01234'     ); fclose($handle); print '<br>';
$handle = fopen($path_file, $mode); stream_set_read_buffer($handle, 0); stream_set_write_buffer($handle, 0); var_dump(fread($handle,  6) === '012345'    ); fclose($handle); print '<br>';
$handle = fopen($path_file, $mode); stream_set_read_buffer($handle, 0); stream_set_write_buffer($handle, 0); var_dump(fread($handle,  7) === '0123456'   ); fclose($handle); print '<br>';
$handle = fopen($path_file, $mode); stream_set_read_buffer($handle, 0); stream_set_write_buffer($handle, 0); var_dump(fread($handle,  8) === '01234567'  ); fclose($handle); print '<br>';
$handle = fopen($path_file, $mode); stream_set_read_buffer($handle, 0); stream_set_write_buffer($handle, 0); var_dump(fread($handle,  9) === '012345678' ); fclose($handle); print '<br>';
$handle = fopen($path_file, $mode); stream_set_read_buffer($handle, 0); stream_set_write_buffer($handle, 0); var_dump(fread($handle, 10) === '0123456789'); fclose($handle); print '<br>';
$handle = fopen($path_file, $mode); stream_set_read_buffer($handle, 0); stream_set_write_buffer($handle, 0); var_dump(fread($handle, 11) === '0123456789'); fclose($handle); print '<br>';
print '<br>';

# seek = -5 | read
$handle = fopen($path_file, $mode);
    stream_set_read_buffer ($handle, 0);
    stream_set_write_buffer($handle, 0);
    fseek($handle, -5, SEEK_SET); var_dump(fread($handle,  1) === '0'         ); print '<br>';
    fseek($handle, -5, SEEK_SET); var_dump(fread($handle,  2) === '01'        ); print '<br>';
    fseek($handle, -5, SEEK_SET); var_dump(fread($handle,  3) === '012'       ); print '<br>';
    fseek($handle, -5, SEEK_SET); var_dump(fread($handle,  4) === '0123'      ); print '<br>';
    fseek($handle, -5, SEEK_SET); var_dump(fread($handle,  5) === '01234'     ); print '<br>';
    fseek($handle, -5, SEEK_SET); var_dump(fread($handle,  6) === '012345'    ); print '<br>';
    fseek($handle, -5, SEEK_SET); var_dump(fread($handle,  7) === '0123456'   ); print '<br>';
    fseek($handle, -5, SEEK_SET); var_dump(fread($handle,  8) === '01234567'  ); print '<br>';
    fseek($handle, -5, SEEK_SET); var_dump(fread($handle,  9) === '012345678' ); print '<br>';
    fseek($handle, -5, SEEK_SET); var_dump(fread($handle, 10) === '0123456789'); print '<br>';
    fseek($handle, -5, SEEK_SET); var_dump(fread($handle, 11) === '0123456789'); print '<br>';
fclose($handle); print '<br>';

# seek = 0 | read
$handle = fopen($path_file, $mode);
    stream_set_read_buffer ($handle, 0);
    stream_set_write_buffer($handle, 0);
    fseek($handle, 0, SEEK_SET); var_dump(fread($handle,  1) === '0'         ); print '<br>';
    fseek($handle, 0, SEEK_SET); var_dump(fread($handle,  2) === '01'        ); print '<br>';
    fseek($handle, 0, SEEK_SET); var_dump(fread($handle,  3) === '012'       ); print '<br>';
    fseek($handle, 0, SEEK_SET); var_dump(fread($handle,  4) === '0123'      ); print '<br>';
    fseek($handle, 0, SEEK_SET); var_dump(fread($handle,  5) === '01234'     ); print '<br>';
    fseek($handle, 0, SEEK_SET); var_dump(fread($handle,  6) === '012345'    ); print '<br>';
    fseek($handle, 0, SEEK_SET); var_dump(fread($handle,  7) === '0123456'   ); print '<br>';
    fseek($handle, 0, SEEK_SET); var_dump(fread($handle,  8) === '01234567'  ); print '<br>';
    fseek($handle, 0, SEEK_SET); var_dump(fread($handle,  9) === '012345678' ); print '<br>';
    fseek($handle, 0, SEEK_SET); var_dump(fread($handle, 10) === '0123456789'); print '<br>';
    fseek($handle, 0, SEEK_SET); var_dump(fread($handle, 11) === '0123456789'); print '<br>';
fclose($handle); print '<br>';

# seek = 5 | read
$handle = fopen($path_file, $mode);
    stream_set_read_buffer ($handle, 0);
    stream_set_write_buffer($handle, 0);
    fseek($handle, 5, SEEK_SET); var_dump(fread($handle, 1) === '5'    ); print '<br>';
    fseek($handle, 5, SEEK_SET); var_dump(fread($handle, 2) === '56'   ); print '<br>';
    fseek($handle, 5, SEEK_SET); var_dump(fread($handle, 3) === '567'  ); print '<br>';
    fseek($handle, 5, SEEK_SET); var_dump(fread($handle, 4) === '5678' ); print '<br>';
    fseek($handle, 5, SEEK_SET); var_dump(fread($handle, 5) === '56789'); print '<br>';
    fseek($handle, 5, SEEK_SET); var_dump(fread($handle, 6) === '56789'); print '<br>';
fclose($handle); print '<br>';

# seek = 11 | read
$handle = fopen($path_file, $mode);
    stream_set_read_buffer ($handle, 0);
    stream_set_write_buffer($handle, 0);
    fseek($handle, 11, SEEK_SET); var_dump(fread($handle, 1) === ''); print '<br>';
    fseek($handle, 11, SEEK_SET); var_dump(fread($handle, 2) === ''); print '<br>';
fclose($handle); print '<br>';



###########################################
### standard: fseek, fread, ftell, feof ###
###########################################

print '<br><br>### simple ###<br><br>';

$path_file = __DIR__.'/result/simple.txt';
$mode = 'rb';

# read
$handle = fopen($path_file, $mode);
    var_dump(fread($handle, 1) === '0'); print '<br>';
    var_dump(fread($handle, 1) === '1'); print '<br>';
    var_dump(fread($handle, 1) === '2'); print '<br>';
    var_dump(fread($handle, 1) === '3'); print '<br>';
    var_dump(fread($handle, 1) === '4'); print '<br>';
    var_dump(fread($handle, 1) === '5'); print '<br>';
    var_dump(fread($handle, 1) === '6'); print '<br>';
    var_dump(fread($handle, 1) === '7'); print '<br>';
    var_dump(fread($handle, 1) === '8'); print '<br>';
    var_dump(fread($handle, 1) === '9'); print '<br>';
    var_dump(fread($handle, 1) === '' ); print '<br>';
fclose($handle); print '<br>';

$handle = fopen($path_file, $mode);
    var_dump(fread($handle, 1) === '0'   ); print '<br>';
    var_dump(fread($handle, 2) === '12'  ); print '<br>';
    var_dump(fread($handle, 3) === '345' ); print '<br>';
    var_dump(fread($handle, 4) === '6789'); print '<br>';
    var_dump(fread($handle, 5) === ''    ); print '<br>';
fclose($handle); print '<br>';

# seek = n/a | read
$handle = fopen($path_file, $mode); var_dump(ftell($handle) === 0); var_dump(fread($handle,  1) === '0'         ); var_dump(ftell($handle) ===  1); var_dump(feof($handle) === false); fclose($handle); print '<br>';
$handle = fopen($path_file, $mode); var_dump(ftell($handle) === 0); var_dump(fread($handle,  2) === '01'        ); var_dump(ftell($handle) ===  2); var_dump(feof($handle) === false); fclose($handle); print '<br>';
$handle = fopen($path_file, $mode); var_dump(ftell($handle) === 0); var_dump(fread($handle,  3) === '012'       ); var_dump(ftell($handle) ===  3); var_dump(feof($handle) === false); fclose($handle); print '<br>';
$handle = fopen($path_file, $mode); var_dump(ftell($handle) === 0); var_dump(fread($handle,  4) === '0123'      ); var_dump(ftell($handle) ===  4); var_dump(feof($handle) === false); fclose($handle); print '<br>';
$handle = fopen($path_file, $mode); var_dump(ftell($handle) === 0); var_dump(fread($handle,  5) === '01234'     ); var_dump(ftell($handle) ===  5); var_dump(feof($handle) === false); fclose($handle); print '<br>';
$handle = fopen($path_file, $mode); var_dump(ftell($handle) === 0); var_dump(fread($handle,  6) === '012345'    ); var_dump(ftell($handle) ===  6); var_dump(feof($handle) === false); fclose($handle); print '<br>';
$handle = fopen($path_file, $mode); var_dump(ftell($handle) === 0); var_dump(fread($handle,  7) === '0123456'   ); var_dump(ftell($handle) ===  7); var_dump(feof($handle) === false); fclose($handle); print '<br>';
$handle = fopen($path_file, $mode); var_dump(ftell($handle) === 0); var_dump(fread($handle,  8) === '01234567'  ); var_dump(ftell($handle) ===  8); var_dump(feof($handle) === false); fclose($handle); print '<br>';
$handle = fopen($path_file, $mode); var_dump(ftell($handle) === 0); var_dump(fread($handle,  9) === '012345678' ); var_dump(ftell($handle) ===  9); var_dump(feof($handle) === false); fclose($handle); print '<br>';
$handle = fopen($path_file, $mode); var_dump(ftell($handle) === 0); var_dump(fread($handle, 10) === '0123456789'); var_dump(ftell($handle) === 10); var_dump(feof($handle) === false); fclose($handle); print '<br>';
$handle = fopen($path_file, $mode); var_dump(ftell($handle) === 0); var_dump(fread($handle, 11) === '0123456789'); var_dump(ftell($handle) === 10); var_dump(feof($handle) !== false); fclose($handle); print '<br>';

# seek = -5 | read
$handle = fopen($path_file, $mode);
    # PHP bug → fseek($handle, -5, SEEK_SET); var_dump(ftell($handle) === 0); var_dump(fread($handle,  1) === '0'); var_dump(ftell($handle) === 1); var_dump(feof($handle) === false); print '<br>';
    # PHP bug → fseek($handle, -5, SEEK_SET); var_dump(ftell($handle) === 1); var_dump(fread($handle,  2) === '' ); var_dump(ftell($handle) === 1); var_dump(feof($handle) !== false); print '<br>';
    # PHP bug → fseek($handle, -5, SEEK_SET); var_dump(ftell($handle) === 1); var_dump(fread($handle,  3) === '' ); var_dump(ftell($handle) === 1); var_dump(feof($handle) !== false); print '<br>';
    # PHP bug → fseek($handle, -5, SEEK_SET); var_dump(ftell($handle) === 1); var_dump(fread($handle,  4) === '' ); var_dump(ftell($handle) === 1); var_dump(feof($handle) !== false); print '<br>';
    # PHP bug → fseek($handle, -5, SEEK_SET); var_dump(ftell($handle) === 1); var_dump(fread($handle,  5) === '' ); var_dump(ftell($handle) === 1); var_dump(feof($handle) !== false); print '<br>';
    # PHP bug → fseek($handle, -5, SEEK_SET); var_dump(ftell($handle) === 1); var_dump(fread($handle,  6) === '' ); var_dump(ftell($handle) === 1); var_dump(feof($handle) !== false); print '<br>';
    # PHP bug → fseek($handle, -5, SEEK_SET); var_dump(ftell($handle) === 1); var_dump(fread($handle,  7) === '' ); var_dump(ftell($handle) === 1); var_dump(feof($handle) !== false); print '<br>';
    # PHP bug → fseek($handle, -5, SEEK_SET); var_dump(ftell($handle) === 1); var_dump(fread($handle,  8) === '' ); var_dump(ftell($handle) === 1); var_dump(feof($handle) !== false); print '<br>';
    # PHP bug → fseek($handle, -5, SEEK_SET); var_dump(ftell($handle) === 1); var_dump(fread($handle,  9) === '' ); var_dump(ftell($handle) === 1); var_dump(feof($handle) !== false); print '<br>';
    # PHP bug → fseek($handle, -5, SEEK_SET); var_dump(ftell($handle) === 1); var_dump(fread($handle, 10) === '' ); var_dump(ftell($handle) === 1); var_dump(feof($handle) !== false); print '<br>';
    # PHP bug → fseek($handle, -5, SEEK_SET); var_dump(ftell($handle) === 1); var_dump(fread($handle, 11) === '' ); var_dump(ftell($handle) === 1); var_dump(feof($handle) !== false); print '<br>';
fclose($handle); print '<br>';

# seek = 0 | read
$handle = fopen($path_file, $mode);
    fseek($handle, 0, SEEK_SET); var_dump(ftell($handle) === 0); var_dump(fread($handle,  1) === '0'         ); var_dump(ftell($handle) ===  1); var_dump(feof($handle) === false); print '<br>';
    fseek($handle, 0, SEEK_SET); var_dump(ftell($handle) === 0); var_dump(fread($handle,  2) === '01'        ); var_dump(ftell($handle) ===  2); var_dump(feof($handle) === false); print '<br>';
    fseek($handle, 0, SEEK_SET); var_dump(ftell($handle) === 0); var_dump(fread($handle,  3) === '012'       ); var_dump(ftell($handle) ===  3); var_dump(feof($handle) === false); print '<br>';
    fseek($handle, 0, SEEK_SET); var_dump(ftell($handle) === 0); var_dump(fread($handle,  4) === '0123'      ); var_dump(ftell($handle) ===  4); var_dump(feof($handle) === false); print '<br>';
    fseek($handle, 0, SEEK_SET); var_dump(ftell($handle) === 0); var_dump(fread($handle,  5) === '01234'     ); var_dump(ftell($handle) ===  5); var_dump(feof($handle) === false); print '<br>';
    fseek($handle, 0, SEEK_SET); var_dump(ftell($handle) === 0); var_dump(fread($handle,  6) === '012345'    ); var_dump(ftell($handle) ===  6); var_dump(feof($handle) === false); print '<br>';
    fseek($handle, 0, SEEK_SET); var_dump(ftell($handle) === 0); var_dump(fread($handle,  7) === '0123456'   ); var_dump(ftell($handle) ===  7); var_dump(feof($handle) === false); print '<br>';
    fseek($handle, 0, SEEK_SET); var_dump(ftell($handle) === 0); var_dump(fread($handle,  8) === '01234567'  ); var_dump(ftell($handle) ===  8); var_dump(feof($handle) === false); print '<br>';
    fseek($handle, 0, SEEK_SET); var_dump(ftell($handle) === 0); var_dump(fread($handle,  9) === '012345678' ); var_dump(ftell($handle) ===  9); var_dump(feof($handle) === false); print '<br>';
    fseek($handle, 0, SEEK_SET); var_dump(ftell($handle) === 0); var_dump(fread($handle, 10) === '0123456789'); var_dump(ftell($handle) === 10); var_dump(feof($handle) === false); print '<br>';
    fseek($handle, 0, SEEK_SET); var_dump(ftell($handle) === 0); var_dump(fread($handle, 11) === '0123456789'); var_dump(ftell($handle) === 10); var_dump(feof($handle) !== false); print '<br>';
fclose($handle); print '<br>';

# seek = 5 | read
$handle = fopen($path_file, $mode);
    fseek($handle, 5, SEEK_SET); var_dump(ftell($handle) === 5); var_dump(fread($handle, 1) === '5'    ); var_dump(ftell($handle) ===  6); var_dump(feof($handle) === false); print '<br>';
    fseek($handle, 5, SEEK_SET); var_dump(ftell($handle) === 5); var_dump(fread($handle, 2) === '56'   ); var_dump(ftell($handle) ===  7); var_dump(feof($handle) === false); print '<br>';
    fseek($handle, 5, SEEK_SET); var_dump(ftell($handle) === 5); var_dump(fread($handle, 3) === '567'  ); var_dump(ftell($handle) ===  8); var_dump(feof($handle) === false); print '<br>';
    fseek($handle, 5, SEEK_SET); var_dump(ftell($handle) === 5); var_dump(fread($handle, 4) === '5678' ); var_dump(ftell($handle) ===  9); var_dump(feof($handle) === false); print '<br>';
    fseek($handle, 5, SEEK_SET); var_dump(ftell($handle) === 5); var_dump(fread($handle, 5) === '56789'); var_dump(ftell($handle) === 10); var_dump(feof($handle) === false); print '<br>';
    fseek($handle, 5, SEEK_SET); var_dump(ftell($handle) === 5); var_dump(fread($handle, 6) === '56789'); var_dump(ftell($handle) === 10); var_dump(feof($handle) !== false); print '<br>';
fclose($handle); print '<br>';

# seek = 11 | read
$handle = fopen($path_file, $mode);
    fseek($handle, 11, SEEK_SET); var_dump(ftell($handle) === 11); var_dump(fread($handle, 1) === ''); var_dump(ftell($handle) === 11); var_dump(feof($handle) !== false); print '<br>';
    fseek($handle, 11, SEEK_SET); var_dump(ftell($handle) === 11); var_dump(fread($handle, 2) === ''); var_dump(ftell($handle) === 11); var_dump(feof($handle) !== false); print '<br>';
fclose($handle); print '<br>';
