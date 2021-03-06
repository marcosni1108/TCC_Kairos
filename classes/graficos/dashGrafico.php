<?php

require 'GerarGraficos.php';
set_include_path(dirname(__FILE__) . "/../model");

$opcao = isset($_GET['opcao']) ? $_GET['opcao'] : '';
$de = isset($_GET['de']) ? $_GET['de'] : '';
$ate = isset($_GET['ate']) ? $_GET['ate'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$mes = isset($_GET['mes']) ? $_GET['mes'] : '';
$ano = isset($_GET['ano']) ? $_GET['ano'] : '';
$de = fomartaData($de);
$ate = fomartaData($ate);

if (!empty($opcao)) {
    switch ($opcao) {
        case 'parada': {
                echo Parada($de, $ate, $id);
                break;
            }
        case 'atividade': {
                echo Atividade($de, $ate);
                break;
            }
        case 'produtividade': {
                echo produtividadeAtividade($de, $ate, $id);
                break;
            }
        case 'filiais': {
                echo produtividadeFiliais($mes);
                break;
            }    
        case 'atvidadeDept': {
                echo ativiGraficoDept($id,$mes,$ano);
                break;
            }              
    }
}

function parada($de, $ate, $id) {
    require_once 'parada.php';
    $parada = new Parada();
    $arrayFunc = $parada->ParadaDept($de, $ate, $id);
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

function atividade($de, $ate) {
    require_once 'atividade.php';
    $atividade = new Atividade();
    $arrayFunc = $atividade->dashProdTotalAtividade($de, $ate);
    $bln['name'] = 'Atividade';
    $rows['name'] = 'Departamento';
    $rows2['name'] = 'Produtividade';
    if ($arrayFunc) {
        foreach ($arrayFunc as $key => $value) {
            $bln['data'][] = $value->nome_departamento;
            $rows2['data'][] = intval($value->prod);
        }
        $rslt = array();
        array_push($rslt, $rows2);
        array_push($rslt, $bln);
        array_push($rslt, $rows);
        return json_encode($rslt);
    }
}

function produtividadeAtividade($de, $ate,$id) {
    require_once 'produtividade.php';
    $GerarGraficos = new Produtividade();
    $array = $GerarGraficos->findAtivTurno($de, $ate, $id);
    $cont = count($array);
    if ($array && $cont>0) {
        foreach ($array as $key => $value) {
            $turnos = $value->Turnos;
            $produtividadeFinal = $value->PercentProd / $turnos;
            $diretaFinal = $value->PercentParadaDireta / $turnos;
            $indiretaFinal = $value->PercentParadaIndireta / $turnos;
            $categoria[] = $value->NOME;
            $produtividadeFomart = number_format($produtividadeFinal, 2, '.', '');
            $diretaFomart = number_format($diretaFinal, 2, '.', '');
            $indiretaFomart = number_format($indiretaFinal, 2, '.', '');
            $produtividade['produtividade'][] = floatval($produtividadeFomart);
            $paradaDireta['paradaDireta'][] = floatval($diretaFomart);
            $paradaIndireta['paradaIndireta'][] = floatval($indiretaFomart);
        }
   
            $rslt = array();
            array_push($rslt, $produtividade);
            array_push($rslt, $paradaDireta);
            array_push($rslt, $paradaIndireta);
            array_push($rslt, $categoria);
            return json_encode($rslt);
         }
}
function produtividadeFiliais($de) {
    require_once 'produtividade.php';
    $GerarGraficos = new Produtividade();
    $array = $GerarGraficos->produtividadeFiliais($de);
    $cont = count($array);
    $i =0;
    if ($array && $cont>0) {
        foreach ($array as $key => $value) {
            
            $turnos = $value->Turnos;
            $produtividadeFinal = $value->PercentProd / $turnos;
            $produtividade[$i]['name'] = $value->nomeFilial;
            $produtividadeFomart = number_format($produtividadeFinal, 2, '.', '');
            $produtividade[$i]['data'][] = floatval($produtividadeFomart);
            $i++;
        }
   
            $rslt = array();
            array_push($rslt, $produtividade);
            return json_encode($produtividade);
         }
}

function fomartaData($data) {
    $date = str_replace('/', '-', $data);
    return date('Y-m-d', strtotime($date));
}
function ativiGraficoDept($id, $mes, $ano) {

        set_include_path(dirname(__FILE__) . "/../model");
        require_once 'atividade.php';
        $atividade = new atividade();
        $arrayFunc = $atividade->findProdTotalAtividade($id, $mes, $ano);
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
            return json_encode($rslt, JSON_NUMERIC_CHECK);
            //return true;
        }
        return false;
    }
