<?php

require 'atividade.php';
require 'departamento.php';
require 'endereco.php';

$atividade = new atividade();
$departamento = new departamento();
$endereco = new endereco();
$atividade->findAll();


$i = 0;
foreach ($atividade->findAll() as $key => $value) {
    $dept = $departamento->find($value->idDepartamentoFK);
    
    $end = $endereco->find($dept->idEnderecoFK);
    $fields = array($value->nome, $dept->nome, $end->cnpj,
        $value->unid_med, "<a href='editarAtividade.php?acao=editar&id=" . $value->id . "'><input type='submit' name='editar' class='btn btn-primary' value='Editar' style='margin-right:30px;margin-left:50px;'></a><a href='inativarAtividade.php?acao=deletar&id=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'><input type='submit' name='deletar' class='btn btn-danger' value='Deletar' style='margin-right:-60px;'></a>");
    $json_result["data"] [] = $fields;
}
$JSON = json_encode($json_result);

$fp = fopen("../../js/dataTable/dataAtiv.txt", "w");

// Escreve "exemplo de escrita" no bloco1.txt
$escreve = fwrite($fp, $JSON);

// Fecha o arquivo
fclose($fp);

