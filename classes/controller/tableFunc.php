<?php

require 'funcionario.php';
$funcionario = new funcionario();
$funcionario->findAll();
$i = 0;
foreach ($funcionario->findAll() as $key => $value){

         $fields = array($value->nome,$value->cpf,$value->email,$value->nivel,  
             $value->login,$value->matricula, "<a href='editarFuncionario.php?acao=editar&id=" . $value->id . "'><input type='submit' name='editar' class='btn btn-primary' value='Editar' style='margin-right:30px;margin-left:20px;'></a><a href='inativarFuncionario.php?acao=deletar&id=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'><input type='submit' name='deletar' class='btn btn-danger' value='Deletar'></a>");
$json_result["data"] [ ] =  $fields;


}
$JSON = json_encode($json_result);

$fp = fopen("../../js/dataTable/dataFunc.txt", "w");

// Escreve "exemplo de escrita" no bloco1.txt
$escreve = fwrite($fp, $JSON);

// Fecha o arquivo
fclose($fp);

