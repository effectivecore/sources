<?php

namespace effcore;

# ─────────────────────────────────────────────────────────────────────
# Available components
# ─────────────────────────────────────────────────────────────────────
# protocol: '', 'protocol'
# dirs: '', '/', 'dirs/', '/dirs/'
# file: '', name, .type, name.type
# ─────────────────────────────────────────────────────────────────────

# ┌────────────────────────────┐
# │ Basic transposition        │
# ├───┬────────────────────────┤
# │ 0 │                        │
# │ 1 │                   file │
# │ 2 │            dirs        │
# │ 3 │            dirs + file │
# │ 4 │ protocol               │
# │ 5 │ protocol          file │
# │ 6 │ protocol + dirs        │
# │ 7 │ protocol + dirs + file │
# └───┴────────────────────────┘

# ─────────────────────────────────────────────────────────────────────
# dirs == ''
# ─────────────────────────────────────────────────────────────────────

# ┌──────────────────────────────────────────────────────────────────────┐
# │ protocol == '' + dirs == '' + file == ''                             │
# ├───┬────────────────────────┬─────────────────────────────────────────┤
# │ 0 │                        │ ''                                      │
# │ 1 │                   file │ ''                                      │
# │ 2 │            dirs        │ ''                                      │
# │ 3 │            dirs + file │ ''                                      │
# │ 4 │ protocol               │ ''                                      │
# │ 5 │ protocol          file │ ''                                      │
# │ 6 │ protocol + dirs        │ ''                                      │
# │ 7 │ protocol + dirs + file │ ''                                      │
# └───┴────────────────────────┴─────────────────────────────────────────┘

# ┌──────────────────────────────────────────────────────────────────────┐
# │ protocol == '' + dirs == '' + file == 'name'                         │
# ├───┬────────────────────────┬─────────────────────────────────────────┤
# │ 0 │                        │ ''                                      │
# │ 1 │                   file │ 'name'                                  │
# │ 2 │            dirs        │ ''                                      │
# │ 3 │            dirs + file │ 'name'                                  │
# │ 4 │ protocol               │ ''                                      │
# │ 5 │ protocol          file │ 'name'                                  │
# │ 6 │ protocol + dirs        │ ''                                      │
# │ 7 │ protocol + dirs + file │ 'name'                                  │
# └───┴────────────────────────┴─────────────────────────────────────────┘

# ┌──────────────────────────────────────────────────────────────────────┐
# │ protocol == '' + dirs == '' + file == '.type'                        │
# ├───┬────────────────────────┬─────────────────────────────────────────┤
# │ 0 │                        │ ''                                      │
# │ 1 │                   file │ '.type'                                 │
# │ 2 │            dirs        │ ''                                      │
# │ 3 │            dirs + file │ '.type'                                 │
# │ 4 │ protocol               │ ''                                      │
# │ 5 │ protocol          file │ '.type'                                 │
# │ 6 │ protocol + dirs        │ ''                                      │
# │ 7 │ protocol + dirs + file │ '.type'                                 │
# └───┴────────────────────────┴─────────────────────────────────────────┘

# ┌──────────────────────────────────────────────────────────────────────┐
# │ protocol == '' + dirs == '' + file == 'name.type'                    │
# ├───┬────────────────────────┬─────────────────────────────────────────┤
# │ 0 │                        │ ''                                      │
# │ 1 │                   file │ 'name.type'                             │
# │ 2 │            dirs        │ ''                                      │
# │ 3 │            dirs + file │ 'name.type'                             │
# │ 4 │ protocol               │ ''                                      │
# │ 5 │ protocol          file │ 'name.type'                             │
# │ 6 │ protocol + dirs        │ ''                                      │
# │ 7 │ protocol + dirs + file │ 'name.type'                             │
# └───┴────────────────────────┴─────────────────────────────────────────┘

# ─────────────────────────────────────────────────────────────────────
# dirs == '/'
# ─────────────────────────────────────────────────────────────────────

# ┌──────────────────────────────────────────────────────────────────────┐
# │ protocol == '' + dirs == '/' + file == ''                            │
# ├───┬────────────────────────┬─────────────────────────────────────────┤
# │ 0 │                        │ ''                                      │
# │ 1 │                   file │ ''                                      │
# │ 2 │            dirs        │ '/'                                     │
# │ 3 │            dirs + file │ '/'                                     │
# │ 4 │ protocol               │ ''                                      │
# │ 5 │ protocol          file │ ''                                      │
# │ 6 │ protocol + dirs        │ '/'                                     │
# │ 7 │ protocol + dirs + file │ '/'                                     │
# └───┴────────────────────────┴─────────────────────────────────────────┘

# ┌──────────────────────────────────────────────────────────────────────┐
# │ protocol == '' + dirs == '/' + file == 'name'                        │
# ├───┬────────────────────────┬─────────────────────────────────────────┤
# │ 0 │                        │ ''                                      │
# │ 1 │                   file │ 'name'                                  │
# │ 2 │            dirs        │ '/'                                     │
# │ 3 │            dirs + file │ '/name'                                 │
# │ 4 │ protocol               │ ''                                      │
# │ 5 │ protocol          file │ 'name'                                  │
# │ 6 │ protocol + dirs        │ '/'                                     │
# │ 7 │ protocol + dirs + file │ '/name'                                 │
# └───┴────────────────────────┴─────────────────────────────────────────┘

# ┌──────────────────────────────────────────────────────────────────────┐
# │ protocol == '' + dirs == '/' + file == '.type'                       │
# ├───┬────────────────────────┬─────────────────────────────────────────┤
# │ 0 │                        │ ''                                      │
# │ 1 │                   file │ '.type'                                 │
# │ 2 │            dirs        │ '/'                                     │
# │ 3 │            dirs + file │ '/.type'                                │
# │ 4 │ protocol               │ ''                                      │
# │ 5 │ protocol          file │ '.type'                                 │
# │ 6 │ protocol + dirs        │ '/'                                     │
# │ 7 │ protocol + dirs + file │ '/.type'                                │
# └───┴────────────────────────┴─────────────────────────────────────────┘

# ┌──────────────────────────────────────────────────────────────────────┐
# │ protocol == '' + dirs == '/' + file == 'name.type'                   │
# ├───┬────────────────────────┬─────────────────────────────────────────┤
# │ 0 │                        │ ''                                      │
# │ 1 │                   file │ 'name.type'                             │
# │ 2 │            dirs        │ '/'                                     │
# │ 3 │            dirs + file │ '/name.type'                            │
# │ 4 │ protocol               │ ''                                      │
# │ 5 │ protocol          file │ 'name.type'                             │
# │ 6 │ protocol + dirs        │ '/'                                     │
# │ 7 │ protocol + dirs + file │ '/name.type'                            │
# └───┴────────────────────────┴─────────────────────────────────────────┘

# ─────────────────────────────────────────────────────────────────────
# dirs == 'dirs/'
# ─────────────────────────────────────────────────────────────────────

# ┌──────────────────────────────────────────────────────────────────────┐
# │ protocol == '' + dirs == 'dirs/' + file == ''                        │
# ├───┬────────────────────────┬─────────────────────────────────────────┤
# │ 0 │                        │ ''                                      │
# │ 1 │                   file │ ''                                      │
# │ 2 │            dirs        │ 'dirs/'                                 │
# │ 3 │            dirs + file │ 'dirs/'                                 │
# │ 4 │ protocol               │ ''                                      │
# │ 5 │ protocol          file │ ''                                      │
# │ 6 │ protocol + dirs        │ 'dirs/'                                 │
# │ 7 │ protocol + dirs + file │ 'dirs/'                                 │
# └───┴────────────────────────┴─────────────────────────────────────────┘

# ┌──────────────────────────────────────────────────────────────────────┐
# │ protocol == '' + dirs == 'dirs/' + file == 'name'                    │
# ├───┬────────────────────────┬─────────────────────────────────────────┤
# │ 0 │                        │ ''                                      │
# │ 1 │                   file │ 'name'                                  │
# │ 2 │            dirs        │ 'dirs/'                                 │
# │ 3 │            dirs + file │ 'dirs/name'                             │
# │ 4 │ protocol               │ ''                                      │
# │ 5 │ protocol          file │ 'name'                                  │
# │ 6 │ protocol + dirs        │ 'dirs/'                                 │
# │ 7 │ protocol + dirs + file │ 'dirs/name'                             │
# └───┴────────────────────────┴─────────────────────────────────────────┘

# ┌──────────────────────────────────────────────────────────────────────┐
# │ protocol == '' + dirs == 'dirs/' + file == '.type'                   │
# ├───┬────────────────────────┬─────────────────────────────────────────┤
# │ 0 │                        │ ''                                      │
# │ 1 │                   file │ '.type'                                 │
# │ 2 │            dirs        │ 'dirs/'                                 │
# │ 3 │            dirs + file │ 'dirs/.type'                            │
# │ 4 │ protocol               │ ''                                      │
# │ 5 │ protocol          file │ '.type'                                 │
# │ 6 │ protocol + dirs        │ 'dirs/'                                 │
# │ 7 │ protocol + dirs + file │ 'dirs/.type'                            │
# └───┴────────────────────────┴─────────────────────────────────────────┘

# ┌──────────────────────────────────────────────────────────────────────┐
# │ protocol == '' + dirs == 'dirs/' + file == 'name.type'               │
# ├───┬────────────────────────┬─────────────────────────────────────────┤
# │ 0 │                        │ ''                                      │
# │ 1 │                   file │ 'name.type'                             │
# │ 2 │            dirs        │ 'dirs/'                                 │
# │ 3 │            dirs + file │ 'dirs/name.type'                        │
# │ 4 │ protocol               │ ''                                      │
# │ 5 │ protocol          file │ 'name.type'                             │
# │ 6 │ protocol + dirs        │ 'dirs/'                                 │
# │ 7 │ protocol + dirs + file │ 'dirs/name.type'                        │
# └───┴────────────────────────┴─────────────────────────────────────────┘

# ─────────────────────────────────────────────────────────────────────
# dirs == '/dirs/'
# ─────────────────────────────────────────────────────────────────────

# ┌──────────────────────────────────────────────────────────────────────┐
# │ protocol == '' + dirs == '/dirs/' + file == ''                       │
# ├───┬────────────────────────┬─────────────────────────────────────────┤
# │ 0 │                        │ ''                                      │
# │ 1 │                   file │ ''                                      │
# │ 2 │            dirs        │ '/dirs/'                                │
# │ 3 │            dirs + file │ '/dirs/'                                │
# │ 4 │ protocol               │ ''                                      │
# │ 5 │ protocol          file │ ''                                      │
# │ 6 │ protocol + dirs        │ '/dirs/'                                │
# │ 7 │ protocol + dirs + file │ '/dirs/'                                │
# └───┴────────────────────────┴─────────────────────────────────────────┘

# ┌──────────────────────────────────────────────────────────────────────┐
# │ protocol == '' + dirs == '/dirs/' + file == 'name'                   │
# ├───┬────────────────────────┬─────────────────────────────────────────┤
# │ 0 │                        │ ''                                      │
# │ 1 │                   file │ 'name'                                  │
# │ 2 │            dirs        │ '/dirs/'                                │
# │ 3 │            dirs + file │ '/dirs/name'                            │
# │ 4 │ protocol               │ ''                                      │
# │ 5 │ protocol          file │ 'name'                                  │
# │ 6 │ protocol + dirs        │ '/dirs/'                                │
# │ 7 │ protocol + dirs + file │ '/dirs/name'                            │
# └───┴────────────────────────┴─────────────────────────────────────────┘

# ┌──────────────────────────────────────────────────────────────────────┐
# │ protocol == '' + dirs == '/dirs/' + file == '.type'                  │
# ├───┬────────────────────────┬─────────────────────────────────────────┤
# │ 0 │                        │ ''                                      │
# │ 1 │                   file │ '.type'                                 │
# │ 2 │            dirs        │ '/dirs/'                                │
# │ 3 │            dirs + file │ '/dirs/.type'                           │
# │ 4 │ protocol               │ ''                                      │
# │ 5 │ protocol          file │ '.type'                                 │
# │ 6 │ protocol + dirs        │ '/dirs/'                                │
# │ 7 │ protocol + dirs + file │ '/dirs/.type'                           │
# └───┴────────────────────────┴─────────────────────────────────────────┘

# ┌──────────────────────────────────────────────────────────────────────┐
# │ protocol == '' + dirs == '/dirs/' + file == 'name.type'              │
# ├───┬────────────────────────┬─────────────────────────────────────────┤
# │ 0 │                        │ ''                                      │
# │ 1 │                   file │ 'name.type'                             │
# │ 2 │            dirs        │ '/dirs/'                                │
# │ 3 │            dirs + file │ '/dirs/name.type'                       │
# │ 4 │ protocol               │ ''                                      │
# │ 5 │ protocol          file │ 'name.type'                             │
# │ 6 │ protocol + dirs        │ '/dirs/'                                │
# │ 7 │ protocol + dirs + file │ '/dirs/name.type'                       │
# └───┴────────────────────────┴─────────────────────────────────────────┘

# ─────────────────────────────────────────────────────────────────────
# dirs == '' + protocol == 'protocol://'
# ─────────────────────────────────────────────────────────────────────

# ┌──────────────────────────────────────────────────────────────────────┐
# │ protocol == 'protocol://' + dirs == '' + file == ''                  │
# ├───┬────────────────────────┬─────────────────────────────────────────┤
# │ 0 │                        │ ''                                      │
# │ 1 │                   file │ ''                                      │
# │ 2 │            dirs        │ ''                                      │
# │ 3 │            dirs + file │ ''                                      │
# │ 4 │ protocol               │ 'protocol://'                           │
# │ 5 │ protocol          file │ 'protocol://'                           │
# │ 6 │ protocol + dirs        │ 'protocol://'                           │
# │ 7 │ protocol + dirs + file │ 'protocol://'                           │
# └───┴────────────────────────┴─────────────────────────────────────────┘

# ┌──────────────────────────────────────────────────────────────────────┐
# │ protocol == 'protocol://' + dirs == '' + file == 'name'              │
# ├───┬────────────────────────┬─────────────────────────────────────────┤
# │ 0 │                        │ ''                                      │
# │ 1 │                   file │ 'name'                                  │
# │ 2 │            dirs        │ ''                                      │
# │ 3 │            dirs + file │ 'name'                                  │
# │ 4 │ protocol               │ 'protocol://'                           │
# │ 5 │ protocol          file │ 'protocol://name'                       │
# │ 6 │ protocol + dirs        │ 'protocol://'                           │
# │ 7 │ protocol + dirs + file │ 'protocol://name'                       │
# └───┴────────────────────────┴─────────────────────────────────────────┘

# ┌──────────────────────────────────────────────────────────────────────┐
# │ protocol == 'protocol://' + dirs == '' + file == '.type'             │
# ├───┬────────────────────────┬─────────────────────────────────────────┤
# │ 0 │                        │ ''                                      │
# │ 1 │                   file │ '.type'                                 │
# │ 2 │            dirs        │ ''                                      │
# │ 3 │            dirs + file │ '.type'                                 │
# │ 4 │ protocol               │ 'protocol://'                           │
# │ 5 │ protocol          file │ 'protocol://.type'                      │
# │ 6 │ protocol + dirs        │ 'protocol://'                           │
# │ 7 │ protocol + dirs + file │ 'protocol://.type'                      │
# └───┴────────────────────────┴─────────────────────────────────────────┘

# ┌──────────────────────────────────────────────────────────────────────┐
# │ protocol == 'protocol://' + dirs == '' + file == 'name.type'         │
# ├───┬────────────────────────┬─────────────────────────────────────────┤
# │ 0 │                        │ ''                                      │
# │ 1 │                   file │ 'name.type'                             │
# │ 2 │            dirs        │ ''                                      │
# │ 3 │            dirs + file │ 'name.type'                             │
# │ 4 │ protocol               │ 'protocol://'                           │
# │ 5 │ protocol          file │ 'protocol://name.type'                  │
# │ 6 │ protocol + dirs        │ 'protocol://'                           │
# │ 7 │ protocol + dirs + file │ 'protocol://name.type'                  │
# └───┴────────────────────────┴─────────────────────────────────────────┘

# ─────────────────────────────────────────────────────────────────────
# dirs == '/' + protocol == 'protocol://'
# ─────────────────────────────────────────────────────────────────────

# ┌──────────────────────────────────────────────────────────────────────┐
# │ protocol == '' + dirs == '/' + file == ''                            │
# ├───┬────────────────────────┬─────────────────────────────────────────┤
# │ 0 │                        │ ''                                      │
# │ 1 │                   file │ ''                                      │
# │ 2 │            dirs        │ '/'                                     │
# │ 3 │            dirs + file │ '/'                                     │
# │ 4 │ protocol               │ 'protocol://'                           │
# │ 5 │ protocol          file │ 'protocol://'                           │
# │ 6 │ protocol + dirs        │ 'protocol:///'                          │
# │ 7 │ protocol + dirs + file │ 'protocol:///'                          │
# └───┴────────────────────────┴─────────────────────────────────────────┘

# ┌──────────────────────────────────────────────────────────────────────┐
# │ protocol == 'protocol://' + dirs == '/' + file == 'name'             │
# ├───┬────────────────────────┬─────────────────────────────────────────┤
# │ 0 │                        │ ''                                      │
# │ 1 │                   file │ 'name'                                  │
# │ 2 │            dirs        │ '/'                                     │
# │ 3 │            dirs + file │ '/name'                                 │
# │ 4 │ protocol               │ 'protocol://'                           │
# │ 5 │ protocol          file │ 'protocol://name'                       │
# │ 6 │ protocol + dirs        │ 'protocol:///'                          │
# │ 7 │ protocol + dirs + file │ 'protocol:///name'                      │
# └───┴────────────────────────┴─────────────────────────────────────────┘

# ┌──────────────────────────────────────────────────────────────────────┐
# │ protocol == 'protocol://' + dirs == '/' + file == '.type'            │
# ├───┬────────────────────────┬─────────────────────────────────────────┤
# │ 0 │                        │ ''                                      │
# │ 1 │                   file │ '.type'                                 │
# │ 2 │            dirs        │ '/'                                     │
# │ 3 │            dirs + file │ '/.type'                                │
# │ 4 │ protocol               │ 'protocol://'                           │
# │ 5 │ protocol          file │ 'protocol://.type'                      │
# │ 6 │ protocol + dirs        │ 'protocol:///'                          │
# │ 7 │ protocol + dirs + file │ 'protocol:///.type'                     │
# └───┴────────────────────────┴─────────────────────────────────────────┘

# ┌──────────────────────────────────────────────────────────────────────┐
# │ protocol == 'protocol://' + dirs == '/' + file == 'name.type'        │
# ├───┬────────────────────────┬─────────────────────────────────────────┤
# │ 0 │                        │ ''                                      │
# │ 1 │                   file │ 'name.type'                             │
# │ 2 │            dirs        │ '/'                                     │
# │ 3 │            dirs + file │ '/name.type'                            │
# │ 4 │ protocol               │ 'protocol://'                           │
# │ 5 │ protocol          file │ 'protocol://name.type'                  │
# │ 6 │ protocol + dirs        │ 'protocol:///'                          │
# │ 7 │ protocol + dirs + file │ 'protocol:///name.type'                 │
# └───┴────────────────────────┴─────────────────────────────────────────┘

# ─────────────────────────────────────────────────────────────────────
# dirs == 'dirs/' + protocol == 'protocol://'
# ─────────────────────────────────────────────────────────────────────

# ┌──────────────────────────────────────────────────────────────────────┐
# │ protocol == 'protocol://' + dirs == 'dirs/' + file == ''             │
# ├───┬────────────────────────┬─────────────────────────────────────────┤
# │ 0 │                        │ ''                                      │
# │ 1 │                   file │ ''                                      │
# │ 2 │            dirs        │ 'dirs/'                                 │
# │ 3 │            dirs + file │ 'dirs/'                                 │
# │ 4 │ protocol               │ 'protocol://'                           │
# │ 5 │ protocol          file │ 'protocol://'                           │
# │ 6 │ protocol + dirs        │ 'protocol://dirs/'                      │
# │ 7 │ protocol + dirs + file │ 'protocol://dirs/'                      │
# └───┴────────────────────────┴─────────────────────────────────────────┘

# ┌──────────────────────────────────────────────────────────────────────┐
# │ protocol == 'protocol://' + dirs == 'dirs/' + file == 'name'         │
# ├───┬────────────────────────┬─────────────────────────────────────────┤
# │ 0 │                        │ ''                                      │
# │ 1 │                   file │ 'name'                                  │
# │ 2 │            dirs        │ 'dirs/'                                 │
# │ 3 │            dirs + file │ 'dirs/name'                             │
# │ 4 │ protocol               │ 'protocol://'                           │
# │ 5 │ protocol          file │ 'protocol://name'                       │
# │ 6 │ protocol + dirs        │ 'protocol://dirs/'                      │
# │ 7 │ protocol + dirs + file │ 'protocol://dirs/name'                  │
# └───┴────────────────────────┴─────────────────────────────────────────┘

# ┌──────────────────────────────────────────────────────────────────────┐
# │ protocol == 'protocol://' + dirs == 'dirs/' + file == '.type'        │
# ├───┬────────────────────────┬─────────────────────────────────────────┤
# │ 0 │                        │ ''                                      │
# │ 1 │                   file │ '.type'                                 │
# │ 2 │            dirs        │ 'dirs/'                                 │
# │ 3 │            dirs + file │ 'dirs/.type'                            │
# │ 4 │ protocol               │ 'protocol://'                           │
# │ 5 │ protocol          file │ 'protocol://.type'                      │
# │ 6 │ protocol + dirs        │ 'protocol://dirs/'                      │
# │ 7 │ protocol + dirs + file │ 'protocol://dirs/.type'                 │
# └───┴────────────────────────┴─────────────────────────────────────────┘

# ┌──────────────────────────────────────────────────────────────────────┐
# │ protocol == 'protocol://' + dirs == 'dirs/' + file == 'name.type'    │
# ├───┬────────────────────────┬─────────────────────────────────────────┤
# │ 0 │                        │ ''                                      │
# │ 1 │                   file │ 'name.type'                             │
# │ 2 │            dirs        │ 'dirs/'                                 │
# │ 3 │            dirs + file │ 'dirs/name.type'                        │
# │ 4 │ protocol               │ 'protocol://'                           │
# │ 5 │ protocol          file │ 'protocol://name.type'                  │
# │ 6 │ protocol + dirs        │ 'protocol://dirs/'                      │
# │ 7 │ protocol + dirs + file │ 'protocol://dirs/name.type'             │
# └───┴────────────────────────┴─────────────────────────────────────────┘

# ─────────────────────────────────────────────────────────────────────
# dirs == '/dirs/' + protocol == 'protocol://'
# ─────────────────────────────────────────────────────────────────────

# ┌──────────────────────────────────────────────────────────────────────┐
# │ protocol == '' + dirs == '/dirs/' + file == ''                       │
# ├───┬────────────────────────┬─────────────────────────────────────────┤
# │ 0 │                        │ ''                                      │
# │ 1 │                   file │ ''                                      │
# │ 2 │            dirs        │ '/dirs/'                                │
# │ 3 │            dirs + file │ '/dirs/'                                │
# │ 4 │ protocol               │ 'protocol://'                           │
# │ 5 │ protocol          file │ 'protocol://'                           │
# │ 6 │ protocol + dirs        │ 'protocol:///dirs/'                     │
# │ 7 │ protocol + dirs + file │ 'protocol:///dirs/'                     │
# └───┴────────────────────────┴─────────────────────────────────────────┘

# ┌──────────────────────────────────────────────────────────────────────┐
# │ protocol == 'protocol://' + dirs == '/dirs/' + file == 'name'        │
# ├───┬────────────────────────┬─────────────────────────────────────────┤
# │ 0 │                        │ ''                                      │
# │ 1 │                   file │ 'name'                                  │
# │ 2 │            dirs        │ '/dirs/'                                │
# │ 3 │            dirs + file │ '/dirs/name'                            │
# │ 4 │ protocol               │ 'protocol://'                           │
# │ 5 │ protocol          file │ 'protocol://name'                       │
# │ 6 │ protocol + dirs        │ 'protocol:///dirs/'                     │
# │ 7 │ protocol + dirs + file │ 'protocol:///dirs/name'                 │
# └───┴────────────────────────┴─────────────────────────────────────────┘

# ┌──────────────────────────────────────────────────────────────────────┐
# │ protocol == 'protocol://' + dirs == '/dirs/' + file == '.type'       │
# ├───┬────────────────────────┬─────────────────────────────────────────┤
# │ 0 │                        │ ''                                      │
# │ 1 │                   file │ '.type'                                 │
# │ 2 │            dirs        │ '/dirs/'                                │
# │ 3 │            dirs + file │ '/dirs/.type'                           │
# │ 4 │ protocol               │ 'protocol://'                           │
# │ 5 │ protocol          file │ 'protocol://.type'                      │
# │ 6 │ protocol + dirs        │ 'protocol:///dirs/'                     │
# │ 7 │ protocol + dirs + file │ 'protocol:///dirs/.type'                │
# └───┴────────────────────────┴─────────────────────────────────────────┘

# ┌──────────────────────────────────────────────────────────────────────┐
# │ protocol == 'protocol://' + dirs == '/dirs/' + file == 'name.type'   │
# ├───┬────────────────────────┬─────────────────────────────────────────┤
# │ 0 │                        │ ''                                      │
# │ 1 │                   file │ 'name.type'                             │
# │ 2 │            dirs        │ '/dirs/'                                │
# │ 3 │            dirs + file │ '/dirs/name.type'                       │
# │ 4 │ protocol               │ 'protocol://'                           │
# │ 5 │ protocol          file │ 'protocol://name.type'                  │
# │ 6 │ protocol + dirs        │ 'protocol:///dirs/'                     │
# │ 7 │ protocol + dirs + file │ 'protocol:///dirs/name.type'            │
# └───┴────────────────────────┴─────────────────────────────────────────┘

$test = [
    ''                           => null,
    'name'                       => ['protocol' => '',         'dirs' => '',       'name' => 'name', 'type' => ''    ],
    '.type'                      => ['protocol' => '',         'dirs' => '',       'name' => '',     'type' => 'type'],
    'name.type'                  => ['protocol' => '',         'dirs' => '',       'name' => 'name', 'type' => 'type'],
    '/'                          => null,
    '/name'                      => ['protocol' => '',         'dirs' => '/',      'name' => 'name', 'type' => ''    ],
    '/.type'                     => ['protocol' => '',         'dirs' => '/',      'name' => '',     'type' => 'type'],
    '/name.type'                 => ['protocol' => '',         'dirs' => '/',      'name' => 'name', 'type' => 'type'],
    'dirs/'                      => null,
    'dirs/name'                  => ['protocol' => '',         'dirs' => 'dirs/',  'name' => 'name', 'type' => ''    ],
    'dirs/.type'                 => ['protocol' => '',         'dirs' => 'dirs/',  'name' => '',     'type' => 'type'],
    'dirs/name.type'             => ['protocol' => '',         'dirs' => 'dirs/',  'name' => 'name', 'type' => 'type'],
    '/dirs/'                     => null,
    '/dirs/name'                 => ['protocol' => '',         'dirs' => '/dirs/', 'name' => 'name', 'type' => ''    ],
    '/dirs/.type'                => ['protocol' => '',         'dirs' => '/dirs/', 'name' => '',     'type' => 'type'],
    '/dirs/name.type'            => ['protocol' => '',         'dirs' => '/dirs/', 'name' => 'name', 'type' => 'type'],
    'protocol://'                => null,
    'protocol://name'            => ['protocol' => 'protocol', 'dirs' => '',       'name' => 'name', 'type' => ''    ],
    'protocol://.type'           => ['protocol' => 'protocol', 'dirs' => '',       'name' => '',     'type' => 'type'],
    'protocol://name.type'       => ['protocol' => 'protocol', 'dirs' => '',       'name' => 'name', 'type' => 'type'],
    'protocol:///'               => null,
    'protocol:///name'           => ['protocol' => 'protocol', 'dirs' => '/',      'name' => 'name', 'type' => ''    ],
    'protocol:///.type'          => ['protocol' => 'protocol', 'dirs' => '/',      'name' => '',     'type' => 'type'],
    'protocol:///name.type'      => ['protocol' => 'protocol', 'dirs' => '/',      'name' => 'name', 'type' => 'type'],
    'protocol://dirs/'           => null,
    'protocol://dirs/name'       => ['protocol' => 'protocol', 'dirs' => 'dirs/',  'name' => 'name', 'type' => ''    ],
    'protocol://dirs/.type'      => ['protocol' => 'protocol', 'dirs' => 'dirs/',  'name' => '',     'type' => 'type'],
    'protocol://dirs/name.type'  => ['protocol' => 'protocol', 'dirs' => 'dirs/',  'name' => 'name', 'type' => 'type'],
    'protocol:///dirs/'          => null,
    'protocol:///dirs/name'      => ['protocol' => 'protocol', 'dirs' => '/dirs/', 'name' => 'name', 'type' => ''    ],
    'protocol:///dirs/.type'     => ['protocol' => 'protocol', 'dirs' => '/dirs/', 'name' => '',     'type' => 'type'],
    'protocol:///dirs/name.type' => ['protocol' => 'protocol', 'dirs' => '/dirs/', 'name' => 'name', 'type' => 'type'],
];

# ─────────────────────────────────────────────────────────────────────
# result
# ─────────────────────────────────────────────────────────────────────

function path_parse($path, $is_ignore_name = false) {
    if (strlen((string)$path)) {
        $result = new \stdClass;
        $matches = [];
        preg_match('%^(?:(?<type>[^./]+)\.|)'.
                        '(?<name>[^/]+|)'.
                        '(?<dirs>.*?)'.
                  '(?://:(?<protocol>[a-z]{1,20})|)$%S', strrev((string)$path), $matches);
        $result->protocol = array_key_exists('protocol', $matches) ? strrev($matches['protocol']) : '';
        $result->dirs     = array_key_exists('dirs',     $matches) ? strrev($matches['dirs'    ]) : '';
        $result->name     = array_key_exists('name',     $matches) ? strrev($matches['name'    ]) : '';
        $result->type     = array_key_exists('type',     $matches) ? strrev($matches['type'    ]) : '';
        if (strlen($result->name) === 0 && strlen($result->type) === 0 && $is_ignore_name !== true) return;
        if (strlen($result->name) !== 0 && strlen($result->type) === 0 && ($result->name === '.' || $result->name === '..')) return;
        return $result;
    }
}

foreach ($test as $c_value => $c_expected) {
    $c_info = path_parse($c_value);
    $c_result = ($c_info === null && $c_expected === null) ||
                ($c_info->protocol === $c_expected['protocol'] &&
                 $c_info->dirs     === $c_expected['dirs']     &&
                 $c_info->name     === $c_expected['name']     &&
                 $c_info->type     === $c_expected['type']);
    if ($c_result)
         print 'true "' .$c_value.'" '.($c_info ? '['.$c_info->protocol.'!'.$c_info->dirs.'!'.$c_info->name.'!'.$c_info->type.']' : '').NL;
    else print 'FALSE "'.$c_value.'"'.NL;
}
