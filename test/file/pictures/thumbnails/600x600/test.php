<?php

namespace effcore;

$src_dirs = DIR_ROOT.'dynamic/files/pictures/';

$src_file = '600x600.png';
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-1.png',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-2.png',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-3.png',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-1.jpg',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-2.jpg',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-3.jpg',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-1.jpeg', 100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-2.jpeg', null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-3.jpeg', 100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-1.gif',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-2.gif',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-3.gif',  100,  100 ) );

$src_file = '600x600-transparent-24bit.png';
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-1.png',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-2.png',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-3.png',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-1.jpg',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-2.jpg',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-3.jpg',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-1.jpeg', 100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-2.jpeg', null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-3.jpeg', 100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-1.gif',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-2.gif',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-3.gif',  100,  100 ) );

$src_file = '600x600-transparent-8bit.png';
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-1.png',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-2.png',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-3.png',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-1.jpg',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-2.jpg',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-3.jpg',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-1.jpeg', 100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-2.jpeg', null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-3.jpeg', 100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-1.gif',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-2.gif',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-3.gif',  100,  100 ) );

$src_file = '600x600.jpg';
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-1.png',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-2.png',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-3.png',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-1.jpg',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-2.jpg',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-3.jpg',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-1.jpeg', 100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-2.jpeg', null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-3.jpeg', 100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-1.gif',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-2.gif',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-3.gif',  100,  100 ) );

$src_file = '600x600.gif';
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-1.png',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-2.png',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-3.png',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-1.jpg',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-2.jpg',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-3.jpg',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-1.jpeg', 100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-2.jpeg', null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-3.jpeg', 100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-1.gif',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-2.gif',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-3.gif',  100,  100 ) );

$src_file = '600x600-transparent.gif';
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-1.png',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-2.png',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-3.png',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-1.jpg',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-2.jpg',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-3.jpg',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-1.jpeg', 100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-2.jpeg', null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-3.jpeg', 100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-1.gif',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-2.gif',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100-3.gif',  100,  100 ) );
