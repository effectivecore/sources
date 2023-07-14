<?php

namespace effcore;

abstract class core {

    static function class_invoke_up($method_name, $class_name = null) {
        $class_name =  $class_name ?: get_called_class();
        $call_stack = [$class_name];
        # collect stack
        foreach (static::get_classes_map() as $c_class_name => $c_class_info) {
            if (isset($c_class_info->parents[$class_name])) {
                $c_reflection = new \ReflectionMethod($c_class_name, $method_name);
                if ($c_reflection->getDeclaringClass()->name == $c_class_name) {
                    $call_stack[] = $c_class_name;
                }
            }
        }
        # call stack
        $return = [];
        foreach ($call_stack as $c_class_name) {
            $return[$c_class_name] = call_user_func($c_class_name.'::'.$method_name);
        }
        return $return;
    }

}
