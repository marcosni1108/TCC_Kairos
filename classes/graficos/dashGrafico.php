<?php

require 'GerarGraficos.php';

$opcao = isset($_GET['opcao']) ? $_GET['opcao'] : '';
$de = isset($_GET['de']) ? $_GET['de'] : '';
$ate = isset($_GET['ate']) ? $_GET['ate'] : '';
$de = fomartaData($de);
$ate = fomartaData($ate);
if (!empty($opcao)) {
    switch ($opcao) {
        case 'parada': {
                echo parada($de, $ate);
                break;
            }
    }
}

function parada($de, $ate) {
    set_include_path(dirname(__FILE__) . "/../model");
    require_once 'parada.php';
    $parada = new parada();
    $arrayFunc = $parada->ParadaDept($de, $ate);
    $bln = array();
    $bln['name'] = 'Atividade';
    $rows['name'] = 'Parada';
    if ($arrayFunc) {
        foreach ($arrayFunc as $key => $value) {
            $bln['data'][] = ($value->totParada / 60) / 60;
            $rows['data'][] = $value->nome_parada;
        }
        $rslt = array();
        array_push($rslt, $bln);
        array_push($rslt, $rows);
        return json_encode($rslt);
    }
}

function fomartaData($data) {
    $date = str_replace('/', '-', $data);
    return date('Y-m-d', strtotime($date));
}
