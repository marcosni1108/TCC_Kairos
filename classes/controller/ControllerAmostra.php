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
        



        //$indice = intval(10);
        $teste = str_replace(" ", "", $hora_inicial);

        $hora_inicial = strtotime(str_replace(" ", "", $hora_inicial));
        $hora_final = strtotime(str_replace(" ", "", $hora_final));

        $tempoTotal = ($hora_final - $hora_inicial);
        $tempoTotalMinutos = $tempoTotal / 60;

        $indice =   60/ ($tempoTotalMinutos/$quantidade);
        $filds1["departamento"] = $departamento;
        $filds1["atividade"] = $atividade;
        $filds1["hora_inicial"] = $hora_inicial;
        $filds1["hora_final"] = $hora_final;
        $filds1["hora_inicial_1"] = $_POST['hora_inicial'];
        $filds1["hora_final_1"] = $_POST['hora_final'];
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

    public function verificaMedia() {
        for ($e = 0; $e <= $_SESSION["jcount"]-1; $e++) {
            //ler todoas as amostras que estão armazenadas em json no diretorio
            $arquivo = "../../js/dataAmostra/dataAmostra" . $e . ".json";
            $info = file_get_contents($arquivo);
            $lendo = json_decode($info);
            $sessionCount = $_SESSION["jcount"];
            //verifica o indice da amostra atual
            foreach ($lendo->amostra as $campo) {
                $indice_autal = $campo->indice;
            }
           
                //chama o metodo calculaMedia
                $result = $this->CalculoMedia($indice_autal,$result);
            
            
        }
        return $result;
    }

    public function gravaMedia() {
        for ($e = 0; $e < $_SESSION["jcount"]; $e++) {
            $arquivo = "../../js/dataAmostra/dataAmostra" . $e . ".json";
            $info = file_get_contents($arquivo);
            $lendo = json_decode($info);
            $amostra = new amostra();

            foreach ($lendo->amostra as $campo) {

                $amostra->setDepartamento($campo->departamento);
                $amostra->setAtividade($campo->atividade);
                $amostra->setTempoinicial($campo->hora_inicial);
                $amostra->setTempofinal($campo->hora_final);
                $amostra->setQuantidade($campo->quantidade);
                $amostra->setIndice($campo->indice);

                if ($amostra->insert()) {
                    console . log($arg);
                }
            }
        }
    }

    public function vProximaAmostra($indice_autal, $indice_proximo,$w,$sessionCount) {
        if ($indice_autal == $indice_proximo && $w <> $sessionCount) {

           
            $contModa = $contModa + 1;
            return $media = false;
        } elseif ($contModa == 0) {
            
            return $media = true;
        }
    }

    public function CalculoMedia($indice_autal,$indice_final_media) {
            //joga o indice atual em na varial indice provisorio
            $indice_provisorio = $indice_final_media;
            //soma o indice provisorio + o atual
            $indice_final_media = $indice_provisorio + $indice_autal;
            return $indice_final_media;
        
    }
    
    public function AlertMedia($indice_final_media) {
        
            $format_numberMedia = number_format($indice_final_media, 2, ',', '');
             $format_numberMedia1 = $indice_final_media/60;
             $format_numberMedia = number_format($format_numberMedia1, 2, ',', '');
             
                 echo "<script> 
                    alert('Amostra cadastrada com sucesso, o indice é:  " . $format_numberMedia. "  unidade(s) por hora');
                    location.href='cadastroAmostra.php';</script>";
        
    }
    
    public function insertAmostraDB() {
        for ($e = 0; $e < $_SESSION["jcount"]; $e++) {
            //insere todos os json no banco de dados
                    $arquivo = "../../js/dataAmostra/dataAmostra" . $e . ".json";
                    $info = file_get_contents($arquivo);
                    $lendo = json_decode($info);
                    $amostra = new amostra();
                    // le o json e popula a os campos
                    foreach ($lendo->amostra as $campo) {

                        $amostra->setDepartamento($campo->departamento);
                        $amostra->setAtividade($campo->atividade);
                        $amostra->setTempoinicial($campo->hora_inicial_1);
                        $amostra->setTempofinal($campo->hora_final_1);
                        $amostra->setQuantidade($campo->quantidade);
                        $amostra->setIndice($campo->indice);

                        if ($amostra->insert()) {
                            console . log($arg);
                        }
                    }
                    
                }
    }
    
    public function alertHora() {
        
        echo "<script>alert('Hora inicial não pode ser maior que hora final!');"
                . "</script>";
                $cnpj = $_POST['cnpj'];
                $departamento = $_POST['departamento'];
                $atividade = $_POST['atividade'];
                $hora_inicial = $_POST['hora_inicial'];
                $hora_final = $_POST['hora_final'];
                $quantidade = $_POST['quantidade'];
        
    }
    
    public function verificarIndiceAtiv($param) {
        
        $amostra = new amostra;
            $count = $amostra->findAllAmostras($atividade);
            if ($count) {
                echo "<script>alert('Já existe um indece para essa atividade por favor selecione outra atividade');"
                . "window.location='./cadastroAmostra.php'</script>";
            }
        
    }

    //put your code here
}
