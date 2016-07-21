<?php

  function __autoload($class_name) {
      require_once '../../classes/model/'.$class_name.'.php';
  }
  