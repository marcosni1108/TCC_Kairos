<?php
session_start();
set_include_path(dirname(__FILE__)."/../model");
require_once 'parada.php';
$parada = new parada();
$arrayFunc = $parada->findtotParadaDept($_SESSION['departamento'],$_SESSION['mes'],$_SESSION['ano']);
$bln = array();
$bln['name'] = 'Atividade';
$rows['name'] = 'Produção';
if ($arrayFunc) {

    foreach ($arrayFunc as $key => $value) {


        $bln['data'][] = $value->totParada;
        $rows['data'][] = $value->nome_parada;
    }
    
$rslt = array();
array_push($rslt, $bln);
array_push($rslt, $rows);
echo json_encode($rslt, JSON_NUMERIC_CHECK);

}