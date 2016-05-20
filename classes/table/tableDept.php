<?php
set_include_path(dirname(__FILE__)."/../model");
require_once 'departamento.php';
require_once 'endereco.php';
$departamento = new departamento();
$departamento->findAll();
$endereco = new endereco();
$usuario = new funcionario();

$i = 0;
foreach ($departamento->findAll() as $key => $value) {
    $idEnd = $value->idEnderecoFK;
    $end = $endereco->find($idEnd);
    $lider = $usuario->find($value->lider);
    $gerente = $usuario->find($value->gerente);
    $fields = array($value->nome, $end->endereco." Nº ".$end->numero, $value->cnpj, $lider->nome,
        $gerente->nome, "<a href='editarDepartamento.php?".md5('idDept')."=" . $value->id . "'>"
        . "<input type='submit' name='editar' class='btn btn-primary' value='Editar' style='margin-right:20px;margin-left:20px;'></a>"
        . "<a href='inativarDepartamento.php?".md5('idDept')."=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'>"
        . "<input type='submit' name='deletar' class='btn btn-danger' value='Deletar' style='margin-right:-20px;'></a>");
         $json_result["data"] [] = $fields;
}
$JSON = json_encode($json_result);

$fp = fopen("../../js/dataTable/dataDept.txt", "w");

// Escreve "exemplo de escrita" no bloco1.txt
$escreve = fwrite($fp, $JSON);

// Fecha o arquivo
fclose($fp);

