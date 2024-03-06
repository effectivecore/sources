<?php

namespace effcore;

$file_src = new file(__DIR__.'/600x800.png');
$test = [
    '600x800-s-m-b.picture' => ['small', 'middle', 'big'],
    '600x800-s-m--.picture' => ['small', 'middle'       ],
    '600x800-s---b.picture' => ['small',           'big'],
    '600x800-s----.picture' => ['small'                 ],
    '600x800---m-b.picture' => [         'middle', 'big'],
    '600x800---m--.picture' => [         'middle'       ],
    '600x800-----b.picture' => ['big'                   ],
    '600x800------.picture' => [                        ],
];

foreach ($test as $c_name_dst => $c_sizes) {
    $c_info = ['thumbnails' => core::array_keys_map($c_sizes), 'original' => [
      'type' => $file_src->type_get(),
      'mime' => $file_src->mime_get(),
      'size' => $file_src->size_get() ]];
    @unlink(__DIR__.'/result/'.$c_name_dst);
    $result = media::container_make($file_src->path_get_absolute(), 'container://'.__DIR__.'/result/'.$c_name_dst, $c_info);
    print 'result: '.($result ? 'true' : 'false').                                                                                              br;
    print '<a href="http://effcore/dynamic/files/'.$c_name_dst.'"              >http://effcore/dynamic/files/'.$c_name_dst.              '</a>'.br;
    print '<a href="http://effcore/dynamic/files/'.$c_name_dst.'?thumb=unknown">http://effcore/dynamic/files/'.$c_name_dst.'?thumb=unknown</a>'.br;
    print '<a href="http://effcore/dynamic/files/'.$c_name_dst.'?thumb=small"  >http://effcore/dynamic/files/'.$c_name_dst.'?thumb=small  </a>'.br;
    print '<a href="http://effcore/dynamic/files/'.$c_name_dst.'?thumb=middle" >http://effcore/dynamic/files/'.$c_name_dst.'?thumb=middle </a>'.br;
    print '<a href="http://effcore/dynamic/files/'.$c_name_dst.'?thumb=big"    >http://effcore/dynamic/files/'.$c_name_dst.'?thumb=big    </a>'.br.br;
}
