<?php namespace Hwj;

function my_class_exists(&$class_name, $autoload = true) {
    $hw2_class=strpos(strtolower($class_name), "hwj\\") !== 0 ? 'Hwj\\'.$class_name : $class_name;
    
    if(!class_exists($hw2_class,$autoload) || !class_exists($hw2_class,false)) //[workaround] double check, but works 
        return class_exists ($class_name, $autoload);
            
    $class_name=$hw2_class; // replace class name for pointer
    return true;
}

function my_define($name, $value, $case_insensitive = false) {
    define("Hwj\\".$name, $value,$case_insensitive);
}

function my_defined($name) {
    return defined("Hwj\\".$name);
}

?>
