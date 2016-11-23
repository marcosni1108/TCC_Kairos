<?php
require 'endereco.php';
require 'departamento.php';
require 'atividade.php';
require 'funcionario.php';
require 'amostra.php';
require 'meta.php';
require 'tipoparada.php';
require 'produtividade.php';
require 'turno.php';

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
                 case 'FindFunc':
			{
				echo findUser();
				break;
			}  
                 case 'allCNPJ':
			{
				echo findAllCnpj();
				break;
			} 
                case 'FindDeptCnpj':
			{
				echo findDeptCnpj($valor);
				break;
			}
                case 'FindAllAmostras':
			{
				echo findAmostrasRel($valor,$tipo);
				break;
			}
                case 'findMeta':
			{
				echo findMeta($valor,$tipo);
				break;
			}
                case 'AtividadeMeta':
			{
				echo buscaAtividadeMeta($valor);
				break;
			}
                 case 'BuscaTipoParada':
			{
				echo buscaTipoPara($valor);
				break;
			}
                 case 'turno':
			{
				echo Turno();
				break;
			}       
	}
}
function turno(){
   
        $turno = new Turno();
        $result = $turno->findAll();
	echo json_encode($result);
	
}
function buscaTipoPara($id){
   
        $parada = new TipoParada();
        $result = $parada->findDepParada($id);
	echo json_encode($result);
	
}
function buscaAtividadeMeta($idDepartamento){
   
        $produtividade = new Produtividade();
        $result = $produtividade->buscaAtividadeMeta($idDepartamento);
	echo json_encode($result);
	
}
function getAllEnd(){
        $endereco = new Endereco();
        $end = $endereco->findEndereco();
	
	echo json_encode($end);
	
}

function getCnpj($id,$tipo){
    if($tipo=='endereco'){
        
        $endereco = new Endereco();
        $end = $endereco->find($id);
	
	echo json_encode($end);
    }else{
        $departamento = new Departamento();
        $dept = $departamento->find($id);
	echo json_encode($dept);
        
    }
	
	
}

function getDepartamento(){
	$departamento = new Departamento();
        $dept = $departamento->findAll();
	echo json_encode($dept);
		
}

function getAtividade($id){
	$atividade = new Atividade();
        $ativ = $atividade->findDept($id);
	echo json_encode($ativ);
		
}

function getUser($nivel){
	$user = new Funcionario();
        $usuario = $user->whereNivel($nivel);
	echo json_encode($usuario);
		
}
function findUser(){
	$user = new Funcionario();
        $usuario = $user->findAll();
	echo json_encode($usuario);
		
}

function getEditFunc($nivel,$id){
	$user = new Funcionario();
        $usuario = $user->whereSelected($nivel,$id);
	echo json_encode($usuario);
		
}

function findAllCnpj(){
    
	$endereco = new Endereco();
        $end = $endereco->findAll();
	echo json_encode($end);
		
}

function findDeptCnpj($idEnd){
    
	$departamento = new Departamento();
        $dept = $departamento->findDeptCnpj($idEnd);
	echo json_encode($dept);
        
		
}

function findAmostrasRel($departamento, $atividade){
    
	$amostras = new Amostra();
        $amostrasAll = $amostras->findAmostrasRel($departamento, $atividade);
	echo json_encode($amostrasAll);
        
		
}

function findMeta($departamento, $atividade){
    
	$meta = new Meta();
        $metaResult = $meta->findMeta($departamento, $atividade);
	echo json_encode($metaResult);
        
		
}


?>


