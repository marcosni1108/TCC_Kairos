<?php

function __autoload($class) {
    $$class_name = strtolower($class);
    require_once '../../classes/model/' . $class_name . '.php';
}
