<meta charset="UTF-8">
<?php
set_include_path(dirname(__FILE__)."/../model");
require_once 'funcionario.php';
 if (isset($_POST['cadastrar'])){
            
            $matricula = $_POST['matricula'];
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $email = $_POST['email'];
            $login = $_POST['login'];
            $senha = 'kairos';
            $nivel = $_POST['nivel'];
            $funcionario = new funcionario();
            $funcionario->setMatricula($matricula);
            $funcionario->setNome($nome);
            $funcionario->setCpf($cpf);
            $funcionario->setEmail($email);
            $funcionario->setLogin($login);
            $funcionario->setSenha(md5($senha));
            $funcionario->setNivel($nivel);
            $funcionario->setStatus("A");
            $insert = $funcionario->insert();
            # Insert
            if ($insert==="OK") {
                echo "<script type='text/javascript' charset='utf-8'>alert('Funcionário cadastrado com sucesso.');"
                         .  "window.location='/Kairos/paginas/funcionario/cadastroFuncionario.php';</script>";
                
                
            }else{
                
                echo  "<script type='text/javascript' charset='utf-8'> alert('{$insert}');"
                . "window.location='/Kairos/paginas/funcionario/cadastroFuncionario.php';</script>";
                
            }
            
        } 
            if (isset($_POST['atualizar'])):
                $funcionario = new funcionario(); 
                $id = (int) $_POST['id'];
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $login = $_POST['login'];
                $nivel = $_POST['nivel'];
                $funcionario->setNome($nome);
                //$funcionario->setCpf($cpf);
                $funcionario->setEmail($email);
                $funcionario->setLogin($login);
                $funcionario->setNivel($nivel);
                //$funcionario->setSenha(md5($senha));
                $update = $funcionario->update($id);
                if($update==="OK"){
                   echo "<script>alert('Funcionário alterado com sucesso.');"
                         .  "window.location='/Kairos/paginas/funcionario/consultaFuncionario.php';"
                         . "</script>";
                
                }else{
                     echo  "<script> alert('{$update}');"
                        .  "window.location='/Kairos/paginas/funcionario/consultaFuncionario.php';"
                        .  "</script>";
                }

            endif;

        
