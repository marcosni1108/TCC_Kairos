<?php
require 'endereco.php';
require 'departamento.php';
require 'atividade.php';
require 'funcionario.php';
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
                case 'atividade':
			{
				echo getAtividade($valor);
				break;
			}
                 case 'user':
			{
				echo getUser($valor);
				break;
			}
                 case 'editFunc':
			{
				echo whereSelected($valor,$tipo);
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

function getAtividade($id){
	$atividade = new atividade();
        $ativ = $atividade->findDept($id);
	echo json_encode($ativ);
		
}

function getUser($nivel){
	$user = new funcionario();
        $usuario = $user->whereNivel($nivel);
	echo json_encode($usuario);
		
}

function getEditFunc($nivel,$id){
	$user = new funcionario();
        $usuario = $user->whereSelected($nivel,$id);
	echo json_encode($usuario);
		
}
?>


