<?php

namespace effcore;

$base = 'dynamic/files/galleries/';
$test = [
    'gallery-main-0.picture' => ['src_name' => '0--1000x1500-01.png', 'size' => ['small', 'middle', 'big']],
    'gallery-main-1.picture' => ['src_name' => '1--1000x1500-02.png', 'size' => ['small', 'middle', 'big']],
    'gallery-main-2.picture' => ['src_name' => '2--1000x1500-03.png', 'size' => ['small', 'middle', 'big']],
    'gallery-main-3.picture' => ['src_name' => '3--1500x1000-04.png', 'size' => ['small', 'middle', 'big']],
    'gallery-main-4.picture' => ['src_name' => '4--1500x1000-05.png', 'size' => ['small', 'middle', 'big']],
    'gallery-main-5.picture' => ['src_name' => '5--1500x1000-06.png', 'size' => ['small', 'middle', 'big']],
    'gallery-main-6.audio'   => ['src_name' => '6--audio-01.mp3',     'size' => ['small', 'middle', 'big'], 'cover'  => '6--audio-01-cover.png'],
    'gallery-main-7.video'   => ['src_name' => '7--video-01.mp4',     'size' => ['small', 'middle', 'big'], 'poster' => '7--video-01-poster.png'],
    'gallery-main-8.mp4'     => ['src_name' => '8--video-02.mp4'],
    'gallery-main-9.mp3'     => ['src_name' => '9--audio-02.mp3'],
];

foreach ($test as $c_dst_name => $c_info) {
    switch ((new File($c_dst_name))->type_get()) {
        case 'picture':
            $c_file_hostory = new File_history;
            if ($c_file_hostory->init_from_fin($base.'src/'.$c_info['src_name'])) {
                $c_file_hostory->container_picture_make(core::array_keys_map($c_info['size']));
                $c_file = new File($c_file_hostory->get_current_path());
                $c_file->move(DIR_ROOT.$base.'result/', $c_dst_name);
            }
            break;
        case 'video':
            $c_file_hostory = new File_history;
            if ($c_file_hostory->init_from_fin($base.'src/'.$c_info['src_name'])) {
                if (isset($c_info['poster']))
                     $c_file_hostory->container_video_make(core::array_keys_map($c_info['size']), DIR_ROOT.$base.'src/'.$c_info['poster']);
                else $c_file_hostory->container_video_make(core::array_keys_map($c_info['size']));
                $c_file = new File($c_file_hostory->get_current_path());
                $c_file->move(DIR_ROOT.$base.'result/', $c_dst_name);
                if (isset($c_info['poster'])) {
                    @unlink(DIR_ROOT.$base.$c_info['poster']);
                }
            }
            break;
        case 'audio':
            $c_file_hostory = new File_history;
            if ($c_file_hostory->init_from_fin($base.'src/'.$c_info['src_name'])) {
                if (isset($c_info['cover']))
                     $c_file_hostory->container_audio_make(core::array_keys_map($c_info['size']), DIR_ROOT.$base.'src/'.$c_info['cover']);
                else $c_file_hostory->container_audio_make(core::array_keys_map($c_info['size']));
                $c_file = new File($c_file_hostory->get_current_path());
                $c_file->move(DIR_ROOT.$base.'result/', $c_dst_name);
                if (isset($c_info['cover'])) {
                    @unlink(DIR_ROOT.$base.$c_info['cover']);
                }
            }
            break;
        case 'mp3':
        case 'mp4':
            $c_file = new File(DIR_ROOT.$base.   'src/'. $c_info['src_name']);
            $c_file->     move(DIR_ROOT.$base.'result/', $c_dst_name);
            break;
    }
}
