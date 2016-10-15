<?php
session_start();
set_include_path(dirname(__FILE__) . "/../model");
require_once 'parada.php';
$produtividade = new produtividade();
$arrayFunc = $produtividade->findtotProdPorHora($id, $mes, $ano);
$bln = array();
$bln['name'] = 'Atividade';
$rows['name'] = 'Produtividade Hora';
if ($arrayFunc) {
foreach ($arrayFunc as $key => $value) {
    $bln['data'][] =  $value->nome_atividade;
    $rows['data'][] = $value->prod_hora;
}
$rslt = array();
array_push($rslt, $bln);
array_push($rslt, $rows);
echo json_encode($rslt, JSON_NUMERIC_CHECK);
//$produtividade = json_encode($rslt);
//$fp = fopen("../../js/dataGrafico/ProdutividadeHora.json", "w");
//$escreve = fwrite($fp, $produtividade);
var_dump($produtividade);
fclose($fp);
return true;
}else{
return false;
}