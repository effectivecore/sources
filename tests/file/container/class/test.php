<?php

namespace effcore;

#####################################################################
### stream: fwrite, unlink, copy, file_exists, filesize, cleaning ###
###         file_put_contents, add_file, add_from_string          ###
#####################################################################

print '<br><br>### STREAM ###<br><br>';


# complex file (2 files inside)
$path_container              = 'container://'.__DIR__.'/result/complex.picture';
$path_container_fwrite_log_1 = 'container://'.__DIR__.'/result/complex-fwrite-log_1.txt';
$path_container_fwrite_log_2 = 'container://'.__DIR__.'/result/complex-fwrite-log_2.txt';
$path_container_fwrite_log_3 = 'container://'.__DIR__.'/result/complex-fwrite-log_3.txt';
$path_internal_1             = 'container://'.__DIR__.'/result/complex.picture:file_1';
$path_internal_2             = 'container://'.__DIR__.'/result/complex.picture:file_2';

@unlink($path_container);
@unlink($path_container_fwrite_log_1);
@unlink($path_container_fwrite_log_2);
@unlink($path_container_fwrite_log_3);

$handle = fopen($path_internal_1, 'c+b'); stream_set_read_buffer($handle, 0); stream_set_write_buffer($handle, 0); fwrite($handle, 'abcdefghijklmnopqrstuvwxyz'); fclose($handle); copy($path_container, $path_container_fwrite_log_1);
$handle = fopen($path_internal_2, 'c+b'); stream_set_read_buffer($handle, 0); stream_set_write_buffer($handle, 0); fwrite($handle, 'xyz');                        fclose($handle); copy($path_container, $path_container_fwrite_log_2);
$handle = fopen($path_internal_1, 'c+b'); stream_set_read_buffer($handle, 0); stream_set_write_buffer($handle, 0); fwrite($handle, '0123456789');                 fclose($handle); copy($path_container, $path_container_fwrite_log_3);

# copy
$path_internal_1_copy_to_txt       = 'container://'.__DIR__.'/result/complex-copy_to_simple-file_1.txt';
$path_internal_2_copy_to_txt       = 'container://'.__DIR__.'/result/complex-copy_to_simple-file_2.txt';
$path_internal_1_copy_to_container = 'container://'.__DIR__.'/result/complex-copy_to_simple-file_1.picture:file_1';
$path_internal_2_copy_to_container = 'container://'.__DIR__.'/result/complex-copy_to_simple-file_2.picture:file_2';

@unlink($path_internal_1_copy_to_txt);
@unlink($path_internal_2_copy_to_txt);
@unlink($path_internal_1_copy_to_container);
@unlink($path_internal_2_copy_to_container);

copy($path_internal_1, $path_internal_1_copy_to_txt);
copy($path_internal_2, $path_internal_2_copy_to_txt);
copy($path_internal_1, $path_internal_1_copy_to_container);
copy($path_internal_2, $path_internal_2_copy_to_container);

# unlink
$path_container        = 'container://'.__DIR__.'/result/complex.picture';
$path_container_unlink = 'container://'.__DIR__.'/result/complex-unlink_file_1.picture';
$path_internal_1           = 'container://'.__DIR__.'/result/complex-unlink_file_1.picture:file_1';
@unlink($path_container_unlink);
copy($path_container, $path_container_unlink);
unlink($path_internal_1);

# cleaning
$path_container_unlink          = 'container://'.__DIR__.'/result/complex-unlink_file_1.picture';
$path_container_unlink_cleaning = 'container://'.__DIR__.'/result/complex-unlink_file_1-cleaning.picture';
@unlink($path_container_unlink_cleaning);
copy($path_container_unlink, $path_container_unlink_cleaning);
var_dump( File_container::cleaning($path_container_unlink_cleaning) ); print "<br>";

# file_put_contents (note: file_get_contents not implemented due to EOF)
$path_container = 'container://'.__DIR__.'/result/complex-file_put_contents.picture';
$path_internal_1    = 'container://'.__DIR__.'/result/complex-file_put_contents.picture:file_1';
$path_internal_2    = 'container://'.__DIR__.'/result/complex-file_put_contents.picture:file_2';
$context = stream_context_create(['container' => []]);
@unlink($path_container);
var_dump( file_put_contents($path_internal_1, 'abcdefghijklmnopqrstuvwxyz', 0, $context) === 26 ); print "<br>";
var_dump( file_put_contents($path_internal_2, 'xyz',                        0, $context) ===  3 ); print "<br>";

# statistics
$path_container = 'container://'.__DIR__.'/result/complex.picture';
$path_internal_1    = 'container://'.__DIR__.'/result/complex.picture:file_1';
$path_internal_2    = 'container://'.__DIR__.'/result/complex.picture:file_2';

var_dump( file_exists($path_container)        );
var_dump( file_exists($path_internal_1)           );
var_dump( file_exists($path_internal_2)           );
var_dump(    filesize($path_container) === 635);
var_dump(    filesize($path_internal_1)    ===  10);
var_dump(    filesize($path_internal_2)    ===   3);

# fpassthru
$path_container = 'container://'.__DIR__.'/result/complex.picture';
$path_internal_1    = 'container://'.__DIR__.'/result/complex.picture:file_1';
$path_internal_2    = 'container://'.__DIR__.'/result/complex.picture:file_2';
ob_start(); $handle = fopen($path_internal_1, 'rb'); $result_1 = fpassthru($handle) === 10; $result_2 = ob_get_contents() === '0123456789'; fclose($handle); ob_end_clean();
ob_start(); $handle = fopen($path_internal_2, 'rb'); $result_3 = fpassthru($handle) ===  3; $result_4 = ob_get_contents() === 'xyz';        fclose($handle); ob_end_clean();
var_dump($result_1);
var_dump($result_2);
var_dump($result_3);
var_dump($result_4);

# readfile
$path_container = 'container://'.__DIR__.'/result/complex.picture';
$path_internal_1    = 'container://'.__DIR__.'/result/complex.picture:file_1';
$path_internal_2    = 'container://'.__DIR__.'/result/complex.picture:file_2';
ob_start(); $result_1 = readfile($path_internal_1) === 10; $result_2 = ob_get_contents() === '0123456789'; ob_end_clean();
ob_start(); $result_2 = readfile($path_internal_2) ===  3; $result_4 = ob_get_contents() === 'xyz';        ob_end_clean();
var_dump($result_1);
var_dump($result_2);
var_dump($result_3);
var_dump($result_4);

# add_file
$path_container  = 'container://'.__DIR__.'/result/complex-add_file.picture';
$path_internal_1     = 'container://'.__DIR__.'/result/complex-add_file.picture:file_1';
$path_internal_2     = 'container://'.__DIR__.'/result/complex-add_file.picture:file_2';
$path_internal_1_txt =                __DIR__.'/result/simple-abcdefghijklmnopqrstuvwxyz.txt';
$path_internal_2_txt =                __DIR__.'/result/simple-xyz.txt';
@unlink($path_container);
var_dump( File_container::add_file($path_internal_1_txt, $path_internal_1) === 26 );
var_dump( File_container::add_file($path_internal_2_txt, $path_internal_2) ===  3 );

# add_from_string
$path_container = 'container://'.__DIR__.'/result/complex-add_from_string.picture';
$path_internal_1    = 'container://'.__DIR__.'/result/complex-add_from_string.picture:file_1';
$path_internal_2    = 'container://'.__DIR__.'/result/complex-add_from_string.picture:file_2';
@unlink($path_container);
var_dump( File_container::add_from_string('abcdefghijklmnopqrstuvwxyz', $path_internal_1) === 26 );
var_dump( File_container::add_from_string(                       'xyz', $path_internal_2) ===  3 );

