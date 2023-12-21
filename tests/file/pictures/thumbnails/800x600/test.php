<?php

namespace effcore;

$src_dirs = DIR_ROOT.'dynamic/files/pictures/';

$src_file = '800x600.png';
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x75.png',   100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-133x100.png',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.png',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x75.jpg',   100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-133x100.jpg',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.jpg',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x75.jpeg',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-133x100.jpeg', null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.jpeg', 100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x75.gif',   100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-133x100.gif',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.gif',  100,  100 ) );

$src_file = '800x600-transparent-24bit.png';
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x75.png',   100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-133x100.png',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.png',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x75.jpg',   100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-133x100.jpg',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.jpg',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x75.jpeg',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-133x100.jpeg', null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.jpeg', 100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x75.gif',   100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-133x100.gif',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.gif',  100,  100 ) );

$src_file = '800x600-transparent-8bit.png';
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x75.png',   100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-133x100.png',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.png',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x75.jpg',   100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-133x100.jpg',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.jpg',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x75.jpeg',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-133x100.jpeg', null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.jpeg', 100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x75.gif',   100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-133x100.gif',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.gif',  100,  100 ) );

$src_file = '800x600.jpg';
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x75.png',   100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-133x100.png',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.png',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x75.jpg',   100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-133x100.jpg',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.jpg',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x75.jpeg',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-133x100.jpeg', null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.jpeg', 100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x75.gif',   100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-133x100.gif',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.gif',  100,  100 ) );

$src_file = '800x600.gif';
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x75.png',   100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-133x100.png',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.png',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x75.jpg',   100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-133x100.jpg',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.jpg',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x75.jpeg',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-133x100.jpeg', null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.jpeg', 100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x75.gif',   100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-133x100.gif',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.gif',  100,  100 ) );

$src_file = '800x600-transparent.gif';
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x75.png',   100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-133x100.png',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.png',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x75.jpg',   100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-133x100.jpg',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.jpg',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x75.jpeg',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-133x100.jpeg', null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.jpeg', 100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x75.gif',   100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-133x100.gif',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.gif',  100,  100 ) );
