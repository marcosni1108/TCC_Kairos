<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControllerAmostra
 *
 * @author Ricardo
 */
class ControllerAmostra {

    public function gravaAmostra($departamento, $atividade, $hora_inicial, $hora_final, $quantidade, $indice) {

        $filds1["departamento"] = $departamento;
        $filds1["atividade"] = $atividade;
        $filds1["hora_inicial"] = $hora_inicial;
        $filds1["hora_final"] = $hora_final;
        $filds1["quantidade"] = $quantidade;
        $filds1["indice"] = $indice;


        $json_result["amostra"] [] = $filds1;
        $JSON = json_encode($json_result);

        $fp = fopen("../../js/dataAmostra/dataAmostra" . $_SESSION["jcount"] ++ . ".json", "w") or die('Cannot open file:');


        // Escreve "exemplo de escrita" no bloco1.txt

        $escreve = fwrite($fp, $JSON);
        // Fecha o arquivo
        fclose($fp);
    }

    //put your code here
}
