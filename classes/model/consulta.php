<?php
require 'endereco.php';
$opcao = isset($_GET['opcao']) ? $_GET['opcao'] : '';
$valor = isset($_GET['valor']) ? $_GET['valor'] : ''; 
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
				echo getCnpj($valor);
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

function getCnpj($id){
	$endereco = new endereco();
        $end = $endereco->find($id);
	
	echo json_encode($end);
	
}

function getDepartamento(){
	$departamento = new departamento();
        $dept = $endereco->findAll();
	echo json_encode($dept);
		
}
?>


