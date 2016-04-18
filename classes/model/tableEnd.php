<?php

require 'endereco.php';

$endereco = new endereco();
$endereco->findAll();


$i = 0;
foreach ($endereco->findAll() as $key => $value) {
    
    $fields = array($value->cep, $value->endereco, $value->cnpj,
        $value->numero, "<a href='editarEndereco.php?".md5('id')."=" . $value->id . "'><input type='submit' name='editar' class='btn btn-primary' value='Editar' style='margin-right:30px;margin-left:50px;'></a><a href='inativarEndereco.php?".md5('id')."=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'><input type='submit' name='deletar' class='btn btn-danger' value='Deletar' style='margin-right:-100px;'></a>");
    $json_result["data"] [] = $fields;
}
$JSON = json_encode($json_result);

$fp = fopen("../../js/dataTable/dataEnd.txt", "w");

// Escreve "exemplo de escrita" no bloco1.txt
$escreve = fwrite($fp, $JSON);

// Fecha o arquivo
fclose($fp);

