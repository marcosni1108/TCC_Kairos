<?php

  include_once './funcionario.php';
  session_start();
// as variáveis login e senha recebem os dados digitados na página anterior
  $funcionario = new funcionario();
  $login = $_POST['login'];
  $senha = $_POST['senha'];

// as próximas 3 linhas são responsáveis em se conectar com o bando de dados.

  $result = $funcionario -> verificaLogin($login, md5($senha));

// A vriavel $result pega as varias $login e $senha, faz uma pesquisa na tabela de usuarios
  $test = count($result);
  /* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi bem sucedida, ou seja se ela estiver encontrado algum registro idêntico o seu valor será igual a 1, se não, se não tiver registros seu valor será 0. Dependendo do resultado ele redirecionará para a pagina site.php ou retornara  para a pagina do formulário inicial para que se possa tentar novamente realizar o login */
  if(count($result)==1) {
      $senhaAcesso = $result[0] -> senha;
      //verifica se é o primeiro login
      if($senhaAcesso===md5("kairos")) {
          //redireciona para pagina de mudanda de senha.
          header('location:../../paginas/login/primeiroAcesso.php?'.md5(login).'='.$login.'');
      } else {
          $_SESSION['login'] = $login;
          $_SESSION['senha'] = md5($senha);

          $nome = $result[0] -> nome;
          $_SESSION['nome'] = $nome;

          header('location:../../paginas/menu_principal/menu_principal.php');
      }
  } else {
      unset($_SESSION['login']);
      unset($_SESSION['senha']);

      $_SESSION['erro'] = true;
      header('location:../../index.php');
      return $_SESSION['erro'];
  }
?>
