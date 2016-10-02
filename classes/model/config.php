<?php
$servidor = $_SERVER['SERVER_NAME'];
if($servidor=='localhost' || $servidor=='127.0.0.1'){
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'kairos');
    define('DB_USER', 'root');
    define('DB_PASS', '');
}else{
    define('DB_HOST', 'mysql.hostinger.com.br');
    define('DB_NAME', 'u649562998_kairo');
    define('DB_USER', 'u649562998_root');
    define('DB_PASS', 'kairos');
}

