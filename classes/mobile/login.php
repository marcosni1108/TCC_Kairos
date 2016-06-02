<?php
require 'funcionario.php';

$user = $_POST['login'];
$senha= $_POST['senha'];
$opcao= $_POST['opcao'];
if (! empty($opcao)){	
	switch ($opcao)
	{
		case 'Login':
			{
				echo Login($user,$senha);
				break;
			}
		       
	}
}

function Login($user,$senha){
   
       $funcionario = new funcionario();
       $result = $funcionario->verificaLogin($user,md5($senha));
       if(count($result) == 1 ){
           return 'true';
       }else{
           return 'false';
       }
}


