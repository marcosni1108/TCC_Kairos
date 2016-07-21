<?php

  $acesso = new funcionario();
  $login = $_SESSION['login'];
  $result = $acesso -> acessoNivel($login);
  $nivel = $result[0] -> nivel;
  if($nivel==="Operador") {
      echo "<script type='text/javascript' charset='utf-8'>alert('Voce não possui acesso a essa pagina!');"
      ."window.location='../menu_principal/menu_principal.php';</script>";
  }
