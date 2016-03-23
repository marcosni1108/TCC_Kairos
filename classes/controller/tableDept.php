<?php

require 'departamento.php';
require 'endereco.php';
$departamento = new departamento();
$departamento->findAll();
$endereco = new endereco();

$i = 0;
foreach ($departamento->findAll() as $key => $value) {
    $idEnd = $value->idEnderecoFK;
    $endereco->find($idEnd);
    $fields = array($value->nome, $value->idEnderecoFK, $value->cnpj, $value->lider,
        $value->gerente, "<a href='editarDepartamento.php?acao=editar&idDept=" . $value->id . "'><input type='submit' name='editar' class='btn btn-primary' value='Editar' style='margin-right:30px;margin-left:50px;'></a><a href='inativarDepartamento.php?acao=deletar&idDept=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'><input type='submit' name='deletar' class='btn btn-danger' value='Deletar' style='margin-right:-50px;'></a>");
    $json_result["data"] [] = $fields;
}
$JSON = json_encode($json_result);

$fp = fopen("../../js/dataTable/dataDept.txt", "w");

// Escreve "exemplo de escrita" no bloco1.txt
$escreve = fwrite($fp, $JSON);

// Fecha o arquivo
fclose($fp);

