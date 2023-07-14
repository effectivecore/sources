<?php

namespace effcore;

class core {

    final static function get_map() {
        # …
        # find other parents
        foreach ($classes_map as $c_class_name => $c_class_info) {
            if ($c_class_info->parents) {
                while (($last_parent = end($c_class_info->parents)) && $classes_map[$last_parent]->parents) {
                    $c_class_info->parents[] = reset($classes_map[$last_parent]->parents);
                }
            }
            # …
        }
    }

}
