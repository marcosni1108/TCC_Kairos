<?php

require 'endereco.php';
$opcao = isset($_GET['opcao']) ? $_GET['opcao'] : '';
$valor = isset($_GET['valor']) ? $_GET['valor'] : '';
if (! empty($opcao)){	
    
    switch ($opcao)
	{
		case 'find':
			{
				echo getAllEnd($valor);
				break;
			}
        }
    
}

function getAllEnd($id){
        $endereco = new endereco();
        $teste = $endereco->find($id);
        $JSON = json_encode($teste);
        echo $JSON;
	
}

