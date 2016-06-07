<?php

require '../mobile/graficoFunc.php';

$opcao = isset($_GET['opcao']) ? $_GET['opcao'] : '';
$valor = isset($_GET['valor']) ? $_GET['valor'] : '';
$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : '';
if (!empty($opcao)) {
    switch ($opcao) {
        case 'funcionario': {
                echo funcGrafico($valor,$tipo);
                break;
            }
            case 'func': {
                echo func($valor,$tipo);
                break;
            }
    }
}

function funcGrafico($id,$data) {

    $func = new GerarGraficosM();
    $result = $func->prodFunc($id, $data);
    echo $result;
}
function func($id,$data) {

    $func = new GerarGraficosM();
    $result = $func->prodFuncJson($id, $data);
    echo json_encode($result);
}
