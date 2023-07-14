<?php

namespace effcore;

###################
### manual test ###
###################

$fields = [
    'field_1_file'              => ['name' => 'file.png',                           'type' => 'image/png',                          'tmp_name' => '/tmp/phpxxxxxxxx',                                 'error' => 0,                'size' => 1000                  ],
    'field_1_file_multiple'     => ['name' => [0 => 'file.png'                   ], 'type' => [0 => 'image/png'                  ], 'tmp_name' => [0 => '/tmp/phpxxxxxxxx'                         ], 'error' => [0 => 0        ], 'size' => [0 => 1000           ]],
    'field_1_file_ws_empty'     => ['name' => [0 => '',          1 => 'file.png' ], 'type' => [0 => '',          1 => 'image/png'], 'tmp_name' => [0 => '',                 1 => '/tmp/phpyyyyyyyy'], 'error' => [0 => 4, 1 => 0], 'size' => [0 => 0,    1 => 2000]],
    'field_2_files'             => ['name' => [0 => 'file1.png', 1 => 'file2.png'], 'type' => [0 => 'image/png', 1 => 'image/png'], 'tmp_name' => [0 => '/tmp/phpxxxxxxxx', 1 => '/tmp/phpyyyyyyyy'], 'error' => [0 => 0, 1 => 0], 'size' => [0 => 1000, 1 => 2000]],
    'field_ws_error_1'          => ['name' => 'file.png',                           'type' => '',                                   'tmp_name' => '',        'size' => 0,                             'error' => UPLOAD_ERR_INI_SIZE                               ],
    'field_ws_error_2'          => ['name' => 'file.png',                           'type' => '',                                   'tmp_name' => '',        'size' => 0,                             'error' => UPLOAD_ERR_FORM_SIZE                              ],
    'field_ws_error_3'          => ['name' => 'file.png',                           'type' => '',                                   'tmp_name' => '',        'size' => 0,                             'error' => UPLOAD_ERR_PARTIAL                                ],
    'field_ws_error_4'          => ['name' => '',                                   'type' => '',                                   'tmp_name' => '',        'size' => 0,                             'error' => UPLOAD_ERR_NO_FILE                                ],
    'field_ws_error_6'          => ['name' => 'file.png',                           'type' => '',                                   'tmp_name' => '',        'size' => 0,                             'error' => UPLOAD_ERR_NO_TMP_DIR                             ],
    'field_ws_error_7'          => ['name' => 'file.png',                           'type' => '',                                   'tmp_name' => '',        'size' => 0,                             'error' => UPLOAD_ERR_CANT_WRITE                             ],
    'field_ws_error_8'          => ['name' => 'file.png',                           'type' => '',                                   'tmp_name' => '',        'size' => 0,                             'error' => UPLOAD_ERR_EXTENSION                              ],
    'field_ws_error_X'          => ['name' => 'file.png',                           'type' => '',                                   'tmp_name' => '',        'size' => 0,                             'error' => 'X'                                               ],
    'field_ws_error_1_multiple' => ['name' => [0 => 'error.png'],                   'type' => [0 => ''],                            'tmp_name' => [0 => ''], 'size' => [0 => 0],                      'error' => [0 => UPLOAD_ERR_INI_SIZE                        ]],
    'field_ws_error_2_multiple' => ['name' => [0 => 'error.png'],                   'type' => [0 => ''],                            'tmp_name' => [0 => ''], 'size' => [0 => 0],                      'error' => [0 => UPLOAD_ERR_FORM_SIZE                       ]],
    'field_ws_error_3_multiple' => ['name' => [0 => 'error.png'],                   'type' => [0 => ''],                            'tmp_name' => [0 => ''], 'size' => [0 => 0],                      'error' => [0 => UPLOAD_ERR_PARTIAL                         ]],
    'field_ws_error_4_multiple' => ['name' => [0 => ''         ],                   'type' => [0 => ''],                            'tmp_name' => [0 => ''], 'size' => [0 => 0],                      'error' => [0 => UPLOAD_ERR_NO_FILE                         ]],
    'field_ws_error_6_multiple' => ['name' => [0 => 'error.png'],                   'type' => [0 => ''],                            'tmp_name' => [0 => ''], 'size' => [0 => 0],                      'error' => [0 => UPLOAD_ERR_NO_TMP_DIR                      ]],
    'field_ws_error_7_multiple' => ['name' => [0 => 'error.png'],                   'type' => [0 => ''],                            'tmp_name' => [0 => ''], 'size' => [0 => 0],                      'error' => [0 => UPLOAD_ERR_CANT_WRITE                      ]],
    'field_ws_error_8_multiple' => ['name' => [0 => 'error.png'],                   'type' => [0 => ''],                            'tmp_name' => [0 => ''], 'size' => [0 => 0],                      'error' => [0 => UPLOAD_ERR_EXTENSION                       ]],
    'field_ws_error_X_multiple' => ['name' => [0 => 'error.png'],                   'type' => [0 => ''],                            'tmp_name' => [0 => ''], 'size' => [0 => 0],                      'error' => [0 => 'X'                                        ]],
];


# check file
$_FILES = ['file' => $fields['field_1_file']];
# check files
$_FILES = ['file' => $fields['field_1_file_multiple']];
$_FILES = ['file' => $fields['field_1_file_ws_empty']];
$_FILES = ['file' => $fields['field_2_files'        ]];
# check error
$_FILES = ['file' => $fields['field_ws_error_1']];
$_FILES = ['file' => $fields['field_ws_error_2']];
$_FILES = ['file' => $fields['field_ws_error_3']];
$_FILES = ['file' => $fields['field_ws_error_4']]; # alert if required is enabled
$_FILES = ['file' => $fields['field_ws_error_6']];
$_FILES = ['file' => $fields['field_ws_error_7']];
$_FILES = ['file' => $fields['field_ws_error_8']];
$_FILES = ['file' => $fields['field_ws_error_X']];
# check errors
$_FILES = ['file' => $fields['field_ws_error_1_multiple']];
$_FILES = ['file' => $fields['field_ws_error_2_multiple']];
$_FILES = ['file' => $fields['field_ws_error_3_multiple']];
$_FILES = ['file' => $fields['field_ws_error_4_multiple']]; # alert if required is enabled
$_FILES = ['file' => $fields['field_ws_error_6_multiple']];
$_FILES = ['file' => $fields['field_ws_error_7_multiple']];
$_FILES = ['file' => $fields['field_ws_error_8_multiple']];
$_FILES = ['file' => $fields['field_ws_error_X_multiple']];
# check files + errors
$_FILES = ['file' => [
    'name'     => [$fields['field_1_file_multiple']['name'    ][0], $fields['field_ws_error_1_multiple']['name'    ][0]],
    'type'     => [$fields['field_1_file_multiple']['type'    ][0], $fields['field_ws_error_1_multiple']['type'    ][0]],
    'tmp_name' => [$fields['field_1_file_multiple']['tmp_name'][0], $fields['field_ws_error_1_multiple']['tmp_name'][0]],
    'error'    => [$fields['field_1_file_multiple']['error'   ][0], $fields['field_ws_error_1_multiple']['error'   ][0]],
    'size'     => [$fields['field_1_file_multiple']['size'    ][0], $fields['field_ws_error_1_multiple']['size'    ][0]]
]];
$_FILES = ['file' => [
    'name'     => [$fields['field_1_file_multiple']['name'    ][0], $fields['field_ws_error_2_multiple']['name'    ][0]],
    'type'     => [$fields['field_1_file_multiple']['type'    ][0], $fields['field_ws_error_2_multiple']['type'    ][0]],
    'tmp_name' => [$fields['field_1_file_multiple']['tmp_name'][0], $fields['field_ws_error_2_multiple']['tmp_name'][0]],
    'error'    => [$fields['field_1_file_multiple']['error'   ][0], $fields['field_ws_error_2_multiple']['error'   ][0]],
    'size'     => [$fields['field_1_file_multiple']['size'    ][0], $fields['field_ws_error_2_multiple']['size'    ][0]]
]];
$_FILES = ['file' => [
    'name'     => [$fields['field_1_file_multiple']['name'    ][0], $fields['field_ws_error_3_multiple']['name'    ][0]],
    'type'     => [$fields['field_1_file_multiple']['type'    ][0], $fields['field_ws_error_3_multiple']['type'    ][0]],
    'tmp_name' => [$fields['field_1_file_multiple']['tmp_name'][0], $fields['field_ws_error_3_multiple']['tmp_name'][0]],
    'error'    => [$fields['field_1_file_multiple']['error'   ][0], $fields['field_ws_error_3_multiple']['error'   ][0]],
    'size'     => [$fields['field_1_file_multiple']['size'    ][0], $fields['field_ws_error_3_multiple']['size'    ][0]]
]];
$_FILES = ['file' => [
    'name'     => [$fields['field_1_file_multiple']['name'    ][0], $fields['field_ws_error_4_multiple']['name'    ][0]],
    'type'     => [$fields['field_1_file_multiple']['type'    ][0], $fields['field_ws_error_4_multiple']['type'    ][0]],
    'tmp_name' => [$fields['field_1_file_multiple']['tmp_name'][0], $fields['field_ws_error_4_multiple']['tmp_name'][0]],
    'error'    => [$fields['field_1_file_multiple']['error'   ][0], $fields['field_ws_error_4_multiple']['error'   ][0]],
    'size'     => [$fields['field_1_file_multiple']['size'    ][0], $fields['field_ws_error_4_multiple']['size'    ][0]]
]];
$_FILES = ['file' => [
    'name'     => [$fields['field_1_file_multiple']['name'    ][0], $fields['field_ws_error_6_multiple']['name'    ][0]],
    'type'     => [$fields['field_1_file_multiple']['type'    ][0], $fields['field_ws_error_6_multiple']['type'    ][0]],
    'tmp_name' => [$fields['field_1_file_multiple']['tmp_name'][0], $fields['field_ws_error_6_multiple']['tmp_name'][0]],
    'error'    => [$fields['field_1_file_multiple']['error'   ][0], $fields['field_ws_error_6_multiple']['error'   ][0]],
    'size'     => [$fields['field_1_file_multiple']['size'    ][0], $fields['field_ws_error_6_multiple']['size'    ][0]]
]];
$_FILES = ['file' => [
    'name'     => [$fields['field_1_file_multiple']['name'    ][0], $fields['field_ws_error_7_multiple']['name'    ][0]],
    'type'     => [$fields['field_1_file_multiple']['type'    ][0], $fields['field_ws_error_7_multiple']['type'    ][0]],
    'tmp_name' => [$fields['field_1_file_multiple']['tmp_name'][0], $fields['field_ws_error_7_multiple']['tmp_name'][0]],
    'error'    => [$fields['field_1_file_multiple']['error'   ][0], $fields['field_ws_error_7_multiple']['error'   ][0]],
    'size'     => [$fields['field_1_file_multiple']['size'    ][0], $fields['field_ws_error_7_multiple']['size'    ][0]]
]];
$_FILES = ['file' => [
    'name'     => [$fields['field_1_file_multiple']['name'    ][0], $fields['field_ws_error_8_multiple']['name'    ][0]],
    'type'     => [$fields['field_1_file_multiple']['type'    ][0], $fields['field_ws_error_8_multiple']['type'    ][0]],
    'tmp_name' => [$fields['field_1_file_multiple']['tmp_name'][0], $fields['field_ws_error_8_multiple']['tmp_name'][0]],
    'error'    => [$fields['field_1_file_multiple']['error'   ][0], $fields['field_ws_error_8_multiple']['error'   ][0]],
    'size'     => [$fields['field_1_file_multiple']['size'    ][0], $fields['field_ws_error_8_multiple']['size'    ][0]]
]];
$_FILES = ['file' => [
    'name'     => [$fields['field_1_file_multiple']['name'    ][0], $fields['field_ws_error_X_multiple']['name'    ][0]],
    'type'     => [$fields['field_1_file_multiple']['type'    ][0], $fields['field_ws_error_X_multiple']['type'    ][0]],
    'tmp_name' => [$fields['field_1_file_multiple']['tmp_name'][0], $fields['field_ws_error_X_multiple']['tmp_name'][0]],
    'error'    => [$fields['field_1_file_multiple']['error'   ][0], $fields['field_ws_error_X_multiple']['error'   ][0]],
    'size'     => [$fields['field_1_file_multiple']['size'    ][0], $fields['field_ws_error_X_multiple']['size'    ][0]]
]];



###################################
### sanitization for file names ###
###################################

$data_for_sanitize_names = [
    'file_name_01' => [
        'name'     => 'file.png',
        'type'     => 'image/png',
        'tmp_name' => '/var/tmp/demo.png',
        'error'    => 0,
        'size'     => 1000
    ],
    'file_name_02' => [
        'name'     => 'web.config',
        'type'     => 'image/png',
        'tmp_name' => '/var/tmp/demo.png',
        'error'    => 0,
        'size'     => 1000
    ],
    'file_name_03' => [
        'name'     => 'file /...htaccess',
        'type'     => 'image/png',
        'tmp_name' => '/var/tmp/demo.png',
        'error'    => 0,
        'size'     => 1000
    ],
    'file_name_04' => [
        'name'     => 'file \\...htaccess',
        'type'     => 'image/png',
        'tmp_name' => '/var/tmp/demo.png',
        'error'    => 0,
        'size'     => 1000
    ],
    'file_name_05' => [
        'name'     => 'file with unix path parts /...png',
        'type'     => 'image/png',
        'tmp_name' => '/var/tmp/demo.png',
        'error'    => 0,
        'size'     => 1000
    ],
    'file_name_06' => [
        'name'     => 'file with windows path parts \...png',
        'type'     => 'image/png',
        'tmp_name' => '/var/tmp/demo.png',
        'error'    => 0,
        'size'     => 1000
    ],
    'file_name_07' => [
        'name'     => '.file with dot prefix.png',
        'type'     => 'image/png',
        'tmp_name' => '/var/tmp/demo.png',
        'error'    => 0,
        'size'     => 1000
    ],
    'file_name_08' => [
        'name'     => 'file with dot suffix.png.',
        'type'     => 'image/png',
        'tmp_name' => '/var/tmp/demo.png',
        'error'    => 0,
        'size'     => 1000
    ],
    'file_name_09' => [
        'name'     => 'file with many dots 1.....png',
        'type'     => 'image/png',
        'tmp_name' => '/var/tmp/demo.png',
        'error'    => 0,
        'size'     => 1000
    ],
    'file_name_10' => [
        'name'     => '....file with many dots 2.png',
        'type'     => 'image/png',
        'tmp_name' => '/var/tmp/demo.png',
        'error'    => 0,
        'size'     => 1000
    ],
    'file_name_11' => [
        'name'     => 'file with .... many dots 3.png',
        'type'     => 'image/png',
        'tmp_name' => '/var/tmp/demo.png',
        'error'    => 0,
        'size'     => 1000
    ],
    'file_name_12' => [
        'name'     => 'file with many dots 4.png....',
        'type'     => 'image/png',
        'tmp_name' => '/var/tmp/demo.png',
        'error'    => 0,
        'size'     => 1000
    ],
    'file_name_13' => [
        'name'     => 'file without extension',
        'type'     => 'image/png',
        'tmp_name' => '/var/tmp/demo.png',
        'error'    => 0,
        'size'     => 1000
    ],
    'file_name_14' => [
        'name'     => 'file with long name'.str_repeat('x', 500).'.png',
        'type'     => 'image/png',
        'tmp_name' => '/var/tmp/demo.png',
        'error'    => 0,
        'size'     => 1000
    ],
    'file_name_15' => [
        'name'     => 'file with long extension.png'.str_repeat('x', 500),
        'type'     => 'image/png',
        'tmp_name' => '/var/tmp/demo.png',
        'error'    => 0,
        'size'     => 1000
    ],
    'file_name_16' => [
        'name'     => 'file with double.types.sh____spaces',
        'type'     => 'image/png',
        'tmp_name' => '/var/tmp/demo.png',
        'error'    => 0,
        'size'     => 1000
    ],
    'file_name_17' => [
        'name'     => "file ' with single quotation mark.png",
        'type'     => 'image/png',
        'tmp_name' => '/var/tmp/demo.png',
        'error'    => 0,
        'size'     => 1000
    ],
    'file_name_18' => [
        'name'     => 'file " with double quotation mark.png',
        'type'     => 'image/png',
        'tmp_name' => '/var/tmp/demo.png',
        'error'    => 0,
        'size'     => 1000
    ],
    'file_name_19' => [
        'name'     => 'file ../ with unix path parts.png',
        'type'     => 'image/png',
        'tmp_name' => '/var/tmp/demo.png',
        'error'    => 0,
        'size'     => 1000
    ],
    'file_name_20' => [
        'name'     => 'file \\.. with windows path parts.png',
        'type'     => 'image/png',
        'tmp_name' => '/var/tmp/demo.png',
        'error'    => 0,
        'size'     => 1000
    ],
    'file_name_21' => [
        'name'     => 'file Ффф with unicode.png',
        'type'     => 'image/png',
        'tmp_name' => '/var/tmp/demo.png',
        'error'    => 0,
        'size'     => 1000
    ],
    'file_name_22' => [
        'name'     => 'file with null \0 byte 1.png',
        'type'     => 'image/png',
        'tmp_name' => '/var/tmp/demo.png',
        'error'    => 0,
        'size'     => 1000
    ],
    'file_name_23' => [
        'name'     => "file with null \0 byte 2.png",
        'type'     => 'image/png',
        'tmp_name' => '/var/tmp/demo.png',
        'error'    => 0,
        'size'     => 1000
    ]
];