<?php

function __autoload($class_name) {
   //  $controller = file_exists('../../classes/controller/' . $class_name . '.php');
     //$model = file_exists('../../classes/model/' . $class_name . '.php');
     
       
   // if ($model) {
        require_once '../../classes/model/' . $class_name . '.php';
  //  }
   
}
