<?php
set_include_path(dirname(__FILE__)."/../model");
require_once 'departamento.php';
$departamento = new Departamento();
foreach ($departamento->BuscaTable() as $key => $value) {
    //monta JSON para fazer a table
    $fields = array($value->Departamento, $value->Endereco, $value->nomeFilial, $value->Lider,
        $value->Gerente, "<a href='editarDepartamento.php?".md5('idDept')."=" . $value->id . "'>"
        . "<input type='submit' name='editar' class='btn btn-primary' value='Editar' style='margin-right:20px;margin-left:20px;'></a>"
        . "<a href='inativarDepartamento.php?".md5('idDept')."=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'>"
        . "<input type='submit' name='deletar' class='btn btn-danger' value='Excluir' style='margin-right:-20px;'></a>");
         $json_result["data"] [] = $fields;
}
$JSON = json_encode($json_result);

$fp = fopen("../../js/dataTable/dataDept.txt", "w");

// Escreve "exemplo de escrita" no bloco1.txt
$escreve = fwrite($fp, $JSON);

// Fecha o arquivo
fclose($fp);

