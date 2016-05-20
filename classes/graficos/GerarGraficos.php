<?php

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
class GerarGraficos {

    //put your code here
    public function prodFunc($id, $data) {

        $produtividade = new produtividade();
        $fun = new funcionario();


        $dataGrafico .= "[";
        $arrayFunc = $produtividade->findIdFunc($id, $data);

        if ($arrayFunc) {

            foreach ($arrayFunc as $key => $value) {

                $data = $value->data;

                $quantidade = $value->quantidade;
                $tempoFinal = $value->tempoFinal;



                $dataGrafico.= "{ y: '" . date("d-m-Y", strtotime($data)) . ' ' . $tempoFinal . "', a: " . $quantidade . " },";
            }
            $dataGrafico.= "]";
            $nomeFun = $fun->find($id);
            $dataGrafico1 .= "Morris.Area({ element: 'chartFunc',data: " . $dataGrafico . ", xkey: 'y', ykeys: ['a'], labels: ['Produtividade de " . $nomeFun->nome . " ']});";

            $fp = fopen("../../js/dataGrafico/dataFuncGrafico.js", "w");

            // Escreve "exemplo de escrita" no bloco1.txt
            $escreve = fwrite($fp, $dataGrafico1);
            fclose($fp);
            return true;
        } else {

            $fp = fopen("../../js/dataGrafico/dataFuncGrafico.js", "w");

            // Escreve "exemplo de escrita" no bloco1.txt
            $escreve = fwrite($fp, " ");
            fclose($fp);
            return false;
        }
    }

    public function prodDept($dataDe, $dataAte, $idCnpj) {

        $produtividade = new produtividade();
        $fun = new funcionario();


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

            $fp = fopen("../../js/dataGrafico/dataDeptProd.js", "w");

            // Escreve "exemplo de escrita" no bloco1.txt
            $escreve = fwrite($fp, $dataGrafico1);
            fclose($fp);
            return true;
        } else {

            $fp = fopen("../../js/dataGrafico/dataDeptProd.js", "w");

            // Escreve "exemplo de escrita" no bloco1.txt
            $escreve = fwrite($fp, " ");
            fclose($fp);
            return false;
        }
    }

    public function prodDeptHigh($dataDe, $dataAte, $idCnpj) {

        $produtividade = new produtividade();
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

}
