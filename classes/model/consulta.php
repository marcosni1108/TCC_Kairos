<?php
require 'endereco.php';
require 'departamento.php';
$opcao = isset($_GET['opcao']) ? $_GET['opcao'] : '';
$valor = isset($_GET['valor']) ? $_GET['valor'] : ''; 
$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : ''; 
if (! empty($opcao)){	
	switch ($opcao)
	{
		case 'endereco':
			{
				echo getAllEnd();
				break;
			}
		case 'cnpj':
			{
				echo getCnpj($valor,$tipo);
				break;
			}
		case 'departamento':
			{
				echo getDepartamento();
				break;
			}
	}
}

function getAllEnd(){
        $endereco = new endereco();
        $end = $endereco->findAll();
	
	echo json_encode($end);
	
}

function getCnpj($id,$tipo){
    if($tipo=='endereco'){
        
        $endereco = new endereco();
        $end = $endereco->find($id);
	
	echo json_encode($end);
    }else{
        $departamento = new departamento();
        $dept = $departamento->find($id);
	echo json_encode($dept);
        
    }
	
	
}

function getDepartamento(){
	$departamento = new departamento();
        $dept = $departamento->findAll();
	echo json_encode($dept);
		
}
?>


