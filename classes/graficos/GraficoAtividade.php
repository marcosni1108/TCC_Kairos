<?php
session_start();
set_include_path(dirname(__FILE__)."/../model");
require_once 'atividade.php';
$atividade = new atividade();
$arrayFunc = $atividade->findProdTotalAtividade($_SESSION['departamento']);
$bln = array();
$bln['name'] = 'Atividade';
$rows['name'] = 'Produção';
if ($arrayFunc) {

    foreach ($arrayFunc as $key => $value) {


        $bln['data'][] = $value->nome_atividade;
        $rows['data'][] = $value->prod;
    }
    
$rslt = array();
array_push($rslt, $bln);
array_push($rslt, $rows);
echo json_encode($rslt, JSON_NUMERIC_CHECK);

}