<?php
$servidor = $_SERVER['SERVER_NAME'];
if($servidor=='localhost'){
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'kairos');
    define('DB_USER', 'root');
    define('DB_PASS', '');
}else{
    define('DB_HOST', 'mysql.hostinger.com.br');
    define('DB_NAME', 'u825403659_kairo');
    define('DB_USER', 'u825403659_root');
    define('DB_PASS', 'ricardo13');
}

