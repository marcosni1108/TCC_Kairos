<?php
set_include_path(dirname(__FILE__)."/../model");
require_once 'tipo_parada.php';
$parada = new tipo_parada();

$i = 0;
foreach ($parada->findAll() as $key => $value){
        
    $departamento = new departamento();
    $dep = $departamento->find($value->IdDeptoFK);
    
    
         $fields = array($value->Nome,$value->TipoParada,$value->Descricao,$dep->nome,  
              "<a href='editarParada.php?".md5('id')."=" . $value->Id . "'><input type='submit' name='editar' class='btn btn-primary' value='Editar' style='margin-right:8px;margin-left:10px;'></a><a href='inativarParada.php?".md5('id')."=" . $value->Id . "' onclick='return confirm(\"Deseja realmente deletar?\")'><input type='submit' name='deletar' class='btn btn-danger' value='Deletar'></a>");
$json_result["data"] [ ] =  $fields;


}
$JSON = json_encode($json_result);

$fp = fopen("../../js/dataTable/dataTipoParada.txt", "w");

// Escreve "exemplo de escrita" no bloco1.txt
$escreve = fwrite($fp, $JSON);

// Fecha o arquivo
fclose($fp);

