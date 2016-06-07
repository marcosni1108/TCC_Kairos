<html>
    <head>
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
     //   include "../menu_principal/menu_lateral.php";
        include "../header/header.php";
        include "../../classes/model/validaOperario.php";
//        include '../include/include_classes.php';
        
   
        
        ?>   
        <link href="../../css/sb-admin.css" rel="stylesheet">
        <script type="text/javascript" src="../../js/validadores.js"></script>
    </head>
    <body >
        <meta charset="UTF-8">
        <?php
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
            $insert = $funcionario->insert();
            # Insert
            if ($insert==="OK") {
                echo  "<script> alert('Usuario Cadastrado com sucesso')</script>";
                
            }else{
                
                echo  "<script> alert('{$insert}')</script>";
                
            }
            
        }

        
        ?>        
        <div id="page-wrapper" style="overflow-x: hidden; padding-left: 250px; height:100%; padding-top: 30px;">
            <div class="container-fluid">
                <form method="post" action="">
                    <div class="input-prepend">
                        <h1 class="page-header">
                            Cadastro de Funcionario
                        </h1>                     
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label for="matricula">Matricula</label>
                                <input type="text" class="form-control" id="matricula" onkeypress="javascript: mascara(this, soNumeros);" maxlength="11" name="matricula" placeholder="Matricula" required>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" name="nome" id="nome" onkeypress="javascript: mascara(this, soLetras);" placeholder="Nome" required>
                            </div>      
                            <div class="form-group col-lg-4">
                                <label for="cpf">CPF</label>
                                <input type="text" class="form-control" name="cpf" id="cpf" onblur="javascript: validarCPF(this.value);" onkeypress="javascript: mascara(this, cpf_mask);"  maxlength="14" placeholder="CPF" required>
                            </div>                                          
                        </div>    
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="E-mail">
                            </div>    
                            <div class="form-group col-lg-4">
                                <label for="nivel">Nivel</label>
                                <select type="nivel" class="form-control" name="nivel" id="nivel">
                                    <option value="Administrador">Administrador</option>
                                    <option value="Gerente">Gerente</option>
                                    <option value="Lider">Lider</option>
                                    <option value="Operador">Operador</option>
                                </select>
                            </div>                                             
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label for="login">Login</label>
                                <input type="text" class="form-control" name="login" id="login" placeholder="Login" required>
                            </div>  
<!--                            <div class="form-group col-lg-4">
                                <label for="senha">Senha</label>
                                <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" required>
                            </div>      -->
                        </div>    
                        <div class="row">
                            <div class="form-group col-lg-4">
                            </div>
                            <div class="form-group col-lg-4">
                                <input type="submit" name="cadastrar" class="btn btn-success" value="Cadastrar dados">
                            </div>    
                        </div>
                    </div>
                </form>  
            </div> 
        </div>
    </body>
    <?php include_once '../include/include_js.php'; ?>
</html>
