<?php 
include_once './funcionario.php';
session_start();
// as vari�veis login e senha recebem os dados digitados na p�gina anterior
$funcionario = new funcionario();
$login = $_POST['login'];
$senha= $_POST['senha'];

// as pr�ximas 3 linhas s�o respons�veis em se conectar com o bando de dados.

$result = $funcionario->verificaLogin($login,md5($senha));

// A vriavel $result pega as varias $login e $senha, faz uma pesquisa na tabela de usuarios
$test=count($result);
/* Logo abaixo temos um bloco com if e else, verificando se a vari�vel $result foi bem sucedida, ou seja se ela estiver encontrado algum registro id�ntico o seu valor ser� igual a 1, se n�o, se n�o tiver registros seu valor ser� 0. Dependendo do resultado ele redirecionar� para a pagina site.php ou retornara  para a pagina do formul�rio inicial para que se possa tentar novamente realizar o login */
if(count($result) == 1 ){
    $senhaAcesso =$result[0]->senha;
    //verifica se � o primeiro login
    if($senhaAcesso=== md5("kairos")){
        //redireciona para pagina de mudanda de senha.
        header('location:../../paginas/login/primeiroAcesso.php?'.md5(login).'='.$login.'');
    }else{
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = md5($senha);

        $nome = $result[0]->nome;
        $idDepartamento = $result[0]->IdDepartamentoFk;
        $_SESSION['nome'] = $nome;
        $_SESSION['departamento'] = $idDepartamento;
        header('location:../../paginas/menu_principal/menu_principal.php');  
    }
    
}
else{
	unset ($_SESSION['login']);
	unset ($_SESSION['senha']);
        
        $_SESSION['erro'] = true;
	header('location:../../index.php');
	return $_SESSION['erro'];
	}

?>
