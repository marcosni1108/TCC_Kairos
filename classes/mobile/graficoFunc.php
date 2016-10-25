<?php
require_once '../model/produtividade.php';
require_once '../model/funcionario.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GerarGraficos
 *
 * @author Ricardo
 */
class GerarGraficosM{

    //put your code here
    public function prodFuncJson($id, $data) {
        $produtividade = new Produtividade();
        return $produtividade->findIdFunc($id, $data);
    }
    public function prodFunc($id, $data) {
        $produtividade = new Produtividade();
        $fun = new Funcionario();
        $arrayFunc = $produtividade->findIdFunc($id, $data);
        if ($arrayFunc) {
                $tempoFinal = $this->categorias($arrayFunc, "HoraFinal");
                $quantidade = $this->series($arrayFunc, "quantidade");
            $nomeFun = $fun->find($id);
            $dataGrafico1 = "$(function () {
                        $('#ChartFunc').highcharts({
                            chart: {
                                type: 'area'
                            },
                            title: {
                                text: 'Produtividade Diaria'
                            },
                            xAxis: {
                                categories: [{$tempoFinal}],
                                tickmarkPlacement: 'on',
                                title: {
                                    enabled: false
                                }
                            },
                            credits: {
                                enabled: false
                            },
                            yAxis: {
                                title: {
                                    text: 'Produtividade Diaria'
                                },
                                labels: {
                                    formatter: function () {
                                        return this.value / 1;
                                    }
                                }
                            },
                            tooltip: {
                                shared: true,
                                valueSuffix: ' Documentos'
                            },
                            plotOptions: {
                                area: {
                                    stacking: 'normal',
                                    lineColor: '#666666',
                                    lineWidth: 1,
                                    marker: {
                                        lineWidth: 1,
                                        lineColor: '#666666'
                                    }
                                }
                            },
                            series: [{
                                name: '{$nomeFun->nome}',
                                data: [{$quantidade}]
                            }]
                        });
                    });";

            $fp = fopen("../../js/mobileCharts/graficoFunc.js", "w");

            // Escreve "exemplo de escrita" no bloco1.txt
            $escreve = fwrite($fp, $dataGrafico1);
            fclose($fp);
            return true;
        } else {

            $fp = fopen("../../js/mobileCharts/graficoFunc.js", "w");

            // Escreve "exemplo de escrita" no bloco1.txt
            $escreve = fwrite($fp, " ");
            fclose($fp);
            return false;
        }
    }

    public function prodDept($dataDe, $dataAte, $idCnpj) {

        $produtividade = new Produtividade();
        $fun = new Funcionario();


        $dataGrafico .= "[";
        $arrayFunc = $produtividade->findProdDept($dataDe, $dataAte, $idCnpj);

        if ($arrayFunc) {

            foreach ($arrayFunc as $key => $value) {



                $prod = $value->prod;
                $nomeDpt = $value->nome;



                $dataGrafico.= "{ y: '" . $nomeDpt . "', a: " . $prod . " },";
            }
            $dataGrafico.= "]";

            $dataGrafico1 .= "Morris.Bar({ element: 'barDept',data: " . $dataGrafico . ", xkey: 'y', ykeys: ['a'], labels: ['Produtividade do Departamento ']});";

            $fp = fopen("../../js/mobileCharts/dataDeptProd.js", "w");

            // Escreve "exemplo de escrita" no bloco1.txt
            $escreve = fwrite($fp, $dataGrafico1);
            fclose($fp);
            return true;
        } else {

            $fp = fopen("../../js/mobileCharts/dataDeptProd.js", "w");

            // Escreve "exemplo de escrita" no bloco1.txt
            $escreve = fwrite($fp, " ");
            fclose($fp);
            return false;
        }
    }

    public function prodDeptHigh($dataDe, $dataAte, $idCnpj) {

        $produtividade = new Produtividade();
        $bln = array();
        $bln['name'] = 'Departamentos';
        $rows['name'] = 'Produção';
        $arrayFunc = $produtividade->findProdDept($dataDe, $dataAte, $idCnpj);
        if ($arrayFunc) {

            foreach ($arrayFunc as $key => $value) {


                $bln['data'][] = $value->nome;
                $rows['data'][] = $value->prod;
            }

            $rslt = array();
            array_push($rslt, $bln);
            array_push($rslt, $rows);
            $dataGrafico1 = json_encode($rslt, JSON_NUMERIC_CHECK);
        }

        $fp = fopen("../../js/dataGrafico/dataDeptHigh.json", "w");

        // Escreve "exemplo de escrita" no bloco1.txt
        $escreve = fwrite($fp, $dataGrafico1);
        fclose($fp);
        return true;
    }

    public function ativiGrafico($dataDe, $dataAte, $id) {

        $produtividade = new Produtividade();
        $bln = array();
        $bln['name'] = 'Funcionario';
        $rows['name'] = 'Produção';
        $arrayFunc = $produtividade->findAtivProd($dataDe, $dataAte, $id);
        if ($arrayFunc) {

            foreach ($arrayFunc as $key => $value) {


                $bln['data'][] = $value->nomFunc;
                $rows['data'][] = $value->percentProd;
            }

            $rslt = array();
            array_push($rslt, $bln);
            array_push($rslt, $rows);
            $dataGrafico1 = json_encode($rslt, JSON_NUMERIC_CHECK);
        }

        $fp = fopen("../../js/dataGrafico/dataAtivProd.json", "w");

        // Escreve "exemplo de escrita" no bloco1.txt
        $escreve = fwrite($fp, $dataGrafico1);
        fclose($fp);
        return true;
    }
       public function categorias($array, $nome) {
        $categoriaV = "";
        foreach ($array as $key => $value) {
            $categoria[] = $value->$nome;
        }
        for ($i = 0; $i < count($categoria); $i++) {
            if($i == count($categoria)-1){
                $categoriaV .= "'" . $categoria[$i] . "'";
            }else{
                
                $categoriaV .= "'" . $categoria[$i] . "',";
            }
            
        }
        $categoriaFinal = str_replace(",'',", " ", $categoriaV);
  
        return $categoriaFinal;
    }

    public function series($array, $nome) {
        $seriesVal="";
        foreach ($array as $key => $value) {
            $series[] = $value->$nome;
        }
        for ($i = 0; $i < count($series); $i++) {

            
             if($i == count($series)-1){
                $seriesVal .= "" . $series[$i] . "";
            }else{
                
               $seriesVal .= "" . $series[$i] . ",";
            }
        }
        $atividadeFinal = str_replace(",,", " ", $seriesVal);
        return $atividadeFinal;
    }

}
