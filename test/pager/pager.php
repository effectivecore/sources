<?php

namespace effcore;

#                                             ERR_CODE_MAX_LT_MIN ──────────────────┐
#                                             ERR_CODE_CUR_GT_MAX ──────────────┐   │
#                                             ERR_CODE_CUR_LT_MIN ──────────┐   │   │
#                                             ERR_CODE_CUR_NO_INT ──────┐   │   │   │
#                                                     ERR_CODE_OK ──┐   │   │   │   │
#                                                                   ▼   ▼   ▼   ▼   ▼
# ──────────────────────────────────────┬────────────┬────────────┬───┬───┬───┬───┬───┐
# http://domain/path                    │ max: 0 → 1 │ out cur: 1 │   │   │   │   │ + │
# http://domain/path?page               │ max: 0 → 1 │ out cur: 1 │   │   │   │   │ + │
# http://domain/path?page=-1            │ max: 0 → 1 │ out cur: 1 │   │   │ + │   │ + │
# http://domain/path?page=0             │ max: 0 → 1 │ out cur: 1 │   │   │ + │   │ + │
# http://domain/path?page=1             │ max: 0 → 1 │ out cur: 1 │   │   │   │   │ + │
# http://domain/path?page=3             │ max: 0 → 1 │ out cur: 1 │   │   │   │ + │ + │
# http://domain/path?page=value         │ max: 0 → 1 │ out cur: 1 │   │ + │   │   │ + │
# http://domain/path?page[]=            │ max: 0 → 1 │ out cur: 1 │   │   │   │   │ + │
# http://domain/path?page[]=-1          │ max: 0 → 1 │ out cur: 1 │   │   │ + │   │ + │
# http://domain/path?page[]=0           │ max: 0 → 1 │ out cur: 1 │   │   │ + │   │ + │
# http://domain/path?page[]=1           │ max: 0 → 1 │ out cur: 1 │   │   │   │   │ + │
# http://domain/path?page[]=3           │ max: 0 → 1 │ out cur: 1 │   │   │   │ + │ + │
# http://domain/path?page[]=value       │ max: 0 → 1 │ out cur: 1 │   │ + │   │   │ + │
# http://domain/path?page[1]=           │ max: 0 → 1 │ out cur: 1 │   │   │   │   │ + │
# http://domain/path?page[1]=-1         │ max: 0 → 1 │ out cur: 1 │   │   │   │   │ + │
# http://domain/path?page[1]=0          │ max: 0 → 1 │ out cur: 1 │   │   │   │   │ + │
# http://domain/path?page[1]=1          │ max: 0 → 1 │ out cur: 1 │   │   │   │   │ + │
# http://domain/path?page[1]=3          │ max: 0 → 1 │ out cur: 1 │   │   │   │   │ + │
# http://domain/path?page[1]=value      │ max: 0 → 1 │ out cur: 1 │   │   │   │   │ + │
# ──────────────────────────────────────┼────────────┼────────────┼───┼───┼───┼───┼───┤
# http://domain/path                    │ max: 1 → 1 │ out cur: 1 │ + │   │   │   │   │
# http://domain/path?page               │ max: 1 → 1 │ out cur: 1 │ + │   │   │   │   │
# http://domain/path?page=-1            │ max: 1 → 1 │ out cur: 1 │   │   │ + │   │   │
# http://domain/path?page=0             │ max: 1 → 1 │ out cur: 1 │   │   │ + │   │   │
# http://domain/path?page=1             │ max: 1 → 1 │ out cur: 1 │ + │   │   │   │   │
# http://domain/path?page=3             │ max: 1 → 1 │ out cur: 1 │   │   │   │ + │   │
# http://domain/path?page=value         │ max: 1 → 1 │ out cur: 1 │   │ + │   │   │   │
# http://domain/path?page[]=            │ max: 1 → 1 │ out cur: 1 │ + │   │   │   │   │
# http://domain/path?page[]=-1          │ max: 1 → 1 │ out cur: 1 │   │   │ + │   │   │
# http://domain/path?page[]=0           │ max: 1 → 1 │ out cur: 1 │   │   │ + │   │   │
# http://domain/path?page[]=1           │ max: 1 → 1 │ out cur: 1 │ + │   │   │   │   │
# http://domain/path?page[]=3           │ max: 1 → 1 │ out cur: 1 │   │   │   │ + │   │
# http://domain/path?page[]=value       │ max: 1 → 1 │ out cur: 1 │   │ + │   │   │   │
# http://domain/path?page[1]=           │ max: 1 → 1 │ out cur: 1 │ + │   │   │   │   │
# http://domain/path?page[1]=-1         │ max: 1 → 1 │ out cur: 1 │ + │   │   │   │   │
# http://domain/path?page[1]=0          │ max: 1 → 1 │ out cur: 1 │ + │   │   │   │   │
# http://domain/path?page[1]=1          │ max: 1 → 1 │ out cur: 1 │ + │   │   │   │   │
# http://domain/path?page[1]=3          │ max: 1 → 1 │ out cur: 1 │ + │   │   │   │   │
# http://domain/path?page[1]=value      │ max: 1 → 1 │ out cur: 1 │ + │   │   │   │   │
# ──────────────────────────────────────┼────────────┼────────────┼───┼───┼───┼───┼───┤
# http://domain/path                    │ max: 2 → 2 │ out cur: 1 │ + │   │   │   │   │
# http://domain/path?page               │ max: 2 → 2 │ out cur: 1 │ + │   │   │   │   │
# http://domain/path?page=-1            │ max: 2 → 2 │ out cur: 1 │   │   │ + │   │   │
# http://domain/path?page=0             │ max: 2 → 2 │ out cur: 1 │   │   │ + │   │   │
# http://domain/path?page=1             │ max: 2 → 2 │ out cur: 1 │ + │   │   │   │   │
# http://domain/path?page=3             │ max: 2 → 2 │ out cur: 2 │   │   │   │ + │   │
# http://domain/path?page=value         │ max: 2 → 2 │ out cur: 1 │   │ + │   │   │   │
# http://domain/path?page[]=            │ max: 2 → 2 │ out cur: 1 │ + │   │   │   │   │
# http://domain/path?page[]=-1          │ max: 2 → 2 │ out cur: 1 │   │   │ + │   │   │
# http://domain/path?page[]=0           │ max: 2 → 2 │ out cur: 1 │   │   │ + │   │   │
# http://domain/path?page[]=1           │ max: 2 → 2 │ out cur: 1 │ + │   │   │   │   │
# http://domain/path?page[]=3           │ max: 2 → 2 │ out cur: 2 │   │   │   │ + │   │
# http://domain/path?page[]=value       │ max: 2 → 2 │ out cur: 1 │   │ + │   │   │   │
# http://domain/path?page[1]=           │ max: 2 → 2 │ out cur: 1 │ + │   │   │   │   │
# http://domain/path?page[1]=-1         │ max: 2 → 2 │ out cur: 1 │ + │   │   │   │   │
# http://domain/path?page[1]=0          │ max: 2 → 2 │ out cur: 1 │ + │   │   │   │   │
# http://domain/path?page[1]=1          │ max: 2 → 2 │ out cur: 1 │ + │   │   │   │   │
# http://domain/path?page[1]=3          │ max: 2 → 2 │ out cur: 1 │ + │   │   │   │   │
# http://domain/path?page[1]=value      │ max: 2 → 2 │ out cur: 1 │ + │   │   │   │   │
# ──────────────────────────────────────┴────────────┴────────────┴───┴───┴───┴───┴───┘

$_GET = [];                       $pager = new pager(1, 0);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_MAX_LT_MIN                             ) );
$_GET['page'] = '';               $pager = new pager(1, 0);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_MAX_LT_MIN                             ) );
$_GET['page'] = '-1';             $pager = new pager(1, 0);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_MAX_LT_MIN | pager::ERR_CODE_CUR_LT_MIN) );
$_GET['page'] = '0';              $pager = new pager(1, 0);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_MAX_LT_MIN | pager::ERR_CODE_CUR_LT_MIN) );
$_GET['page'] = '1';              $pager = new pager(1, 0);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_MAX_LT_MIN                             ) );
$_GET['page'] = '3';              $pager = new pager(1, 0);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_MAX_LT_MIN | pager::ERR_CODE_CUR_GT_MAX) );
$_GET['page'] = 'value';          $pager = new pager(1, 0);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_MAX_LT_MIN | pager::ERR_CODE_CUR_NO_INT) );
$_GET['page'] = [];               $pager = new pager(1, 0);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_MAX_LT_MIN                             ) );
$_GET['page'] = [0 => ''];        $pager = new pager(1, 0);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_MAX_LT_MIN                             ) );
$_GET['page'] = [0 => '-1'];      $pager = new pager(1, 0);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_MAX_LT_MIN | pager::ERR_CODE_CUR_LT_MIN) );
$_GET['page'] = [0 => '0'];       $pager = new pager(1, 0);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_MAX_LT_MIN | pager::ERR_CODE_CUR_LT_MIN) );
$_GET['page'] = [0 => '1'];       $pager = new pager(1, 0);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_MAX_LT_MIN                             ) );
$_GET['page'] = [0 => '3'];       $pager = new pager(1, 0);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_MAX_LT_MIN | pager::ERR_CODE_CUR_GT_MAX) );
$_GET['page'] = [0 => 'value'];   $pager = new pager(1, 0);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_MAX_LT_MIN | pager::ERR_CODE_CUR_NO_INT) );
$_GET['page'] = [1 => ''];        $pager = new pager(1, 0);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_MAX_LT_MIN                             ) );
$_GET['page'] = [1 => '-1'];      $pager = new pager(1, 0);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_MAX_LT_MIN                             ) );
$_GET['page'] = [1 => '0'];       $pager = new pager(1, 0);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_MAX_LT_MIN                             ) );
$_GET['page'] = [1 => '1'];       $pager = new pager(1, 0);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_MAX_LT_MIN                             ) );
$_GET['page'] = [1 => '3'];       $pager = new pager(1, 0);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_MAX_LT_MIN                             ) );
$_GET['page'] = [1 => 'value'];   $pager = new pager(1, 0);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_MAX_LT_MIN                             ) );

print NL;

$_GET = [];                       $pager = new pager(1, 1);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_OK        ) );
$_GET['page'] = '';               $pager = new pager(1, 1);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_OK        ) );
$_GET['page'] = '-1';             $pager = new pager(1, 1);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_CUR_LT_MIN) );
$_GET['page'] = '0';              $pager = new pager(1, 1);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_CUR_LT_MIN) );
$_GET['page'] = '1';              $pager = new pager(1, 1);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_OK        ) );
$_GET['page'] = '3';              $pager = new pager(1, 1);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_CUR_GT_MAX) );
$_GET['page'] = 'value';          $pager = new pager(1, 1);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_CUR_NO_INT) );
$_GET['page'] = [];               $pager = new pager(1, 1);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_OK        ) );
$_GET['page'] = [0 => ''];        $pager = new pager(1, 1);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_OK        ) );
$_GET['page'] = [0 => '-1'];      $pager = new pager(1, 1);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_CUR_LT_MIN) );
$_GET['page'] = [0 => '0'];       $pager = new pager(1, 1);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_CUR_LT_MIN) );
$_GET['page'] = [0 => '1'];       $pager = new pager(1, 1);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_OK        ) );
$_GET['page'] = [0 => '3'];       $pager = new pager(1, 1);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_CUR_GT_MAX) );
$_GET['page'] = [0 => 'value'];   $pager = new pager(1, 1);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_CUR_NO_INT) );
$_GET['page'] = [1 => ''];        $pager = new pager(1, 1);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_OK        ) );
$_GET['page'] = [1 => '-1'];      $pager = new pager(1, 1);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_OK        ) );
$_GET['page'] = [1 => '0'];       $pager = new pager(1, 1);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_OK        ) );
$_GET['page'] = [1 => '1'];       $pager = new pager(1, 1);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_OK        ) );
$_GET['page'] = [1 => '3'];       $pager = new pager(1, 1);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_OK        ) );
$_GET['page'] = [1 => 'value'];   $pager = new pager(1, 1);  $pager->build();  var_dump( $pager->max === 1 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_OK        ) );

print NL;

$_GET = [];                       $pager = new pager(1, 2);  $pager->build();  var_dump( $pager->max === 2 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_OK        ) );
$_GET['page'] = '';               $pager = new pager(1, 2);  $pager->build();  var_dump( $pager->max === 2 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_OK        ) );
$_GET['page'] = '-1';             $pager = new pager(1, 2);  $pager->build();  var_dump( $pager->max === 2 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_CUR_LT_MIN) );
$_GET['page'] = '0';              $pager = new pager(1, 2);  $pager->build();  var_dump( $pager->max === 2 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_CUR_LT_MIN) );
$_GET['page'] = '1';              $pager = new pager(1, 2);  $pager->build();  var_dump( $pager->max === 2 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_OK        ) );
$_GET['page'] = '3';              $pager = new pager(1, 2);  $pager->build();  var_dump( $pager->max === 2 );  var_dump( $pager->cur === 2 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_CUR_GT_MAX) );
$_GET['page'] = 'value';          $pager = new pager(1, 2);  $pager->build();  var_dump( $pager->max === 2 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_CUR_NO_INT) );
$_GET['page'] = [];               $pager = new pager(1, 2);  $pager->build();  var_dump( $pager->max === 2 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_OK        ) );
$_GET['page'] = [0 => ''];        $pager = new pager(1, 2);  $pager->build();  var_dump( $pager->max === 2 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_OK        ) );
$_GET['page'] = [0 => '-1'];      $pager = new pager(1, 2);  $pager->build();  var_dump( $pager->max === 2 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_CUR_LT_MIN) );
$_GET['page'] = [0 => '0'];       $pager = new pager(1, 2);  $pager->build();  var_dump( $pager->max === 2 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_CUR_LT_MIN) );
$_GET['page'] = [0 => '1'];       $pager = new pager(1, 2);  $pager->build();  var_dump( $pager->max === 2 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_OK        ) );
$_GET['page'] = [0 => '3'];       $pager = new pager(1, 2);  $pager->build();  var_dump( $pager->max === 2 );  var_dump( $pager->cur === 2 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_CUR_GT_MAX) );
$_GET['page'] = [0 => 'value'];   $pager = new pager(1, 2);  $pager->build();  var_dump( $pager->max === 2 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_CUR_NO_INT) );
$_GET['page'] = [1 => ''];        $pager = new pager(1, 2);  $pager->build();  var_dump( $pager->max === 2 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_OK        ) );
$_GET['page'] = [1 => '-1'];      $pager = new pager(1, 2);  $pager->build();  var_dump( $pager->max === 2 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_OK        ) );
$_GET['page'] = [1 => '0'];       $pager = new pager(1, 2);  $pager->build();  var_dump( $pager->max === 2 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_OK        ) );
$_GET['page'] = [1 => '1'];       $pager = new pager(1, 2);  $pager->build();  var_dump( $pager->max === 2 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_OK        ) );
$_GET['page'] = [1 => '3'];       $pager = new pager(1, 2);  $pager->build();  var_dump( $pager->max === 2 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_OK        ) );
$_GET['page'] = [1 => 'value'];   $pager = new pager(1, 2);  $pager->build();  var_dump( $pager->max === 2 );  var_dump( $pager->cur === 1 );  var_dump( $pager->error_code_get() === (pager::ERR_CODE_OK        ) );
