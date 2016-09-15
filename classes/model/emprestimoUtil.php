<?php
require 'funcionario.php';


$opcao = isset($_GET['opcao']) ? $_GET['opcao'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$funcs = isset($_POST['func']) ? $_POST['func'] : '';
$dept = isset($_POST['dept']) ? $_POST['dept'] : '';
if (! empty($opcao)){	
    	switch ($opcao)
	{
		case 'funcDept':
			{
				echo departamentoFunc($id);
				break;
			}
                case 'update':
			{
				echo departamentoUpdate($funcs,$dept);
				break;
			}  
                        
	}
}
function departamentoFunc($id){
   
        $funcionario = new funcionario();
        $result = $funcionario->departamentoFunc($id);
	return json_encode($result);
	
}
function departamentoUpdate($funcs,$dept){
        $array = explode(',', $funcs);
        $funcionario = new funcionario();
        for($i=0;$i<sizeof($array);$i++){
            $result = $funcionario->updateDepartamento($array[$i],$dept);
        }
        
	return json_encode($result);
	
}
?>


