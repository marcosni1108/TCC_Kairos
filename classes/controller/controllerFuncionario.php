<?php
  
    $matricula = $_POST['matricula'];
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $email = $_POST['email'];
            $login = $_POST['login'];
            $senha = $_POST['senha'];
            $nivel = $_POST['nivel'];
            $funcionario = new funcionario();
            $funcionario->setMatricula($matricula);
            $funcionario->setNome($nome);
            $funcionario->setCpf($cpf);
            $funcionario->setEmail($email);
            $funcionario->setLogin($login);
            $funcionario->setSenha($senha);
            $funcionario->setNivel($nivel);

            # Insert
            if ($funcionario->insert()) {
                return  "<script> alert('Usuario Cadastrado com sucesso')</script>";
                
            }
                
           
        
