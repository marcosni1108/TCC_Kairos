<?php

  set_include_path(dirname(__FILE__)."/../model");
  require_once 'funcionario.php';
  $funcionario = new Funcionario();
  $i = 0;
  foreach($funcionario -> findAllAtivos() as $key => $value) {

      $fields = array($value -> nome, $value -> cpf, $value -> email, $value -> nivel,
          $value -> login, $value -> matricula, $value -> departamento, "<a href='editarFuncionario.php?".md5('id')."=".$value -> id."'><input type='submit' name='editar' class='btn btn-primary' value='Editar' style='margin-right:8px;margin-left:10px;'></a><a href='inativarFuncionario.php?".md5('id')."=".$value -> id."' onclick='return confirm(\"Deseja realmente inativar?\")'><input type='submit' name='deletar' class='btn btn-danger' value='Inativar'></a>");
      $json_result["data"] [] = $fields;
  }
  $JSON = json_encode($json_result);

  $fp = fopen("../../js/dataTable/dataFunc.txt", "w");

// Escreve "exemplo de escrita" no bloco1.txt
  $escreve = fwrite($fp, $JSON);

// Fecha o arquivo
  fclose($fp);

