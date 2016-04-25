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
    public function produtividadeFunc($id,$data){
        
        $produtividade = new produtividade();
        $fun = new funcionario();
        
      
        $dataGrafico .= "[";
        $arrayFunc = $produtividade->findIdFunc($id,$data);
        
        if($arrayFunc){
            
                foreach ($arrayFunc as $key => $value){

                $data = $value->data;

                    $quantidade = $value->quantidade;
                    $tempoFinal = $value->tempoFinal;



                    $dataGrafico.= "{ y: '" .date("d-m-Y", strtotime($data))  .' '.$tempoFinal ."', a: " . $quantidade . " },";
                }
                    $dataGrafico.= "]";
                    $nomeFun = $fun->find($id);
                    $dataGrafico1 .= "Morris.Area({ element: 'chartFunc',data: ".$dataGrafico.", xkey: 'y', ykeys: ['a'], labels: ['Produtividade de ".$nomeFun->nome." ']});";

                    $fp = fopen("../../js/dataTable/dataFuncGrafico.js", "w");

                    // Escreve "exemplo de escrita" no bloco1.txt
                    $escreve = fwrite($fp, $dataGrafico1);
                    fclose($fp);
                    return true;
        }
        else{
            
                    $fp = fopen("../../js/dataTable/dataFuncGrafico.js", "w");

                    // Escreve "exemplo de escrita" no bloco1.txt
                    $escreve = fwrite($fp, " ");
                    fclose($fp);
                    return false;
        }
        
}
    }

