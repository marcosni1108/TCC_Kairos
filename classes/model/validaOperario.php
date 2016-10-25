<?php
set_include_path(dirname(__FILE__)."/../model");
require_once 'funcionario.php';

          $acesso = new Funcionario();
          $login = $_SESSION['login'];
          $result = $acesso->acessoNivel($login);
          $nivel = $result[0]->nivel;
            if($nivel === "Operador"){
                echo "<script type='text/javascript' charset='utf-8'>alert('Voce não possui acesso a essa pagina!');"
                      .  "window.location='../paginas/produtividade/cadastraProdutividade.php';</script>";
            }   
