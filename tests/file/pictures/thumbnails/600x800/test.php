<?php

namespace effcore;

$src_dirs = DIR_ROOT.'dynamic/files/pictures/';

$src_file = '600x800.png';
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x133.png',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-75x100.png',   null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.png',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x133.jpg',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-75x100.jpg',   null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.jpg',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x133.jpeg', 100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-75x100.jpeg',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.jpeg', 100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x133.gif',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-75x100.gif',   null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.gif',  100,  100 ) );

$src_file = '600x800-transparent-24bit.png';
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x133.png',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-75x100.png',   null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.png',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x133.jpg',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-75x100.jpg',   null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.jpg',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x133.jpeg', 100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-75x100.jpeg',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.jpeg', 100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x133.gif',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-75x100.gif',   null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.gif',  100,  100 ) );

$src_file = '600x800-transparent-8bit.png';
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x133.png',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-75x100.png',   null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.png',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x133.jpg',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-75x100.jpg',   null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.jpg',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x133.jpeg', 100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-75x100.jpeg',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.jpeg', 100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x133.gif',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-75x100.gif',   null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.gif',  100,  100 ) );

$src_file = '600x800.jpg';
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x133.png',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-75x100.png',   null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.png',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x133.jpg',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-75x100.jpg',   null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.jpg',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x133.jpeg', 100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-75x100.jpeg',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.jpeg', 100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x133.gif',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-75x100.gif',   null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.gif',  100,  100 ) );

$src_file = '600x800.gif';
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x133.png',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-75x100.png',   null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.png',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x133.jpg',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-75x100.jpg',   null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.jpg',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x133.jpeg', 100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-75x100.jpeg',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.jpeg', 100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x133.gif',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-75x100.gif',   null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.gif',  100,  100 ) );

$src_file = '600x800-transparent.gif';
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x133.png',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-75x100.png',   null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.png',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x133.jpg',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-75x100.jpg',   null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.jpg',  100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x133.jpeg', 100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-75x100.jpeg',  null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.jpeg', 100,  100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x133.gif',  100,  null) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-75x100.gif',   null, 100 ) );
var_dump( media::picture_thumbnail_create($src_dirs.$src_file, $src_dirs.str_replace(['.png', '.jpg', '.jpeg', '.gif'], '', $src_file).'---result-100x100.gif',  100,  100 ) );
