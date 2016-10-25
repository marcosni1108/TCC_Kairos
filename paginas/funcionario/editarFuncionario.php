<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
        include "../header/header.php";
        include "../../classes/model/validaOperario.php";
        ?>    
        <script type="text/javascript" src="../../js/validadores.js"></script>
    </head>
    <body>
        <?php
        $id = (int) $_GET[md5('id')];
        $funcionario = new Funcionario();
        if (isset($_POST['atualizar'])):
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $login = $_POST['login'];
            $nivel = $_POST['nivel'];
            $funcionario->setNome($nome);
            $funcionario->setEmail($email);
            $funcionario->setLogin($login);
            $funcionario->setNivel($nivel);
            $update = $funcionario->update($id);
            if ($update === "OK") {
                echo "<script>alert('Funcionário alterado com sucesso.')</script>";
            } else {
                echo "<script> alert('{$update}')</script>";
            }
        endif;
        ?>
        <main class="mdl-layout__content">
            <div class="col-lg-12">
                <!-- Primeira linha do wrapper -->
                <div class="row" >
                    <div class="col-lg-12">
                        <h1 class="page-header text-center">Editar Funcionário</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <!-- Conteudo dentro de wrapper -->
                            <div class="panel-body">
                                <div id="chart">
                                    <?php $resultado = $funcionario->find($id); ?>
                                    <form method="post" action="">
                                        <div class="input-prepend">
                                            <div class="row">
                                                <div class="form-group col-lg-4">
                                                    <label for="matricula">Matricula</label>
                                                    <input disabled="true"type="text" class="form-control" id="matricula" value="<?php echo $resultado->matricula; ?>" onkeypress="javascript: mascara(this, soNumeros);" name="matricula" placeholder="Matricula" required>
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label for="nome">Nome</label>
                                                    <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $resultado->nome; ?>" onkeypress="javascript: mascara(this, soLetras);" placeholder="Nome" required>
                                                </div>      
                                                <div class="form-group col-lg-4">
                                                    <label for="cpf">CPF</label>
                                                    <input type="text"  disabled="true"class="form-control" name="cpf" id="cpf" value="<?php echo $resultado->cpf; ?>" maxlength="14" onblur="javascript: validarCPF(this.value);" onkeypress="javascript: mascara(this, cpf_mask);" placeholder="CPF" required>
                                                </div>                                          
                                            </div>    
                                            <div class="row">
                                                <div class="form-group col-lg-4">
                                                    <label for="email">E-mail</label>
                                                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $resultado->email; ?>" placeholder="E-mail">
                                                </div>    
                                                <div class="form-group col-lg-4">
                                                    <label for="nivel">Nivel</label>
                                                    <select type="nivel" class="form-control" name="nivel" id="nivel">
                                                        <option value="<?php echo $resultado->nivel; ?>" selected><?php echo $resultado->nivel; ?></option>
                                                        <option value="Gerente">Gerente</option>
                                                        <option value="Lider">Lider</option>
                                                        <option value="Operador">Operador</option>
                                                    </select>
                                                </div>                                             
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-4">
                                                    <label for="login">Login</label>
                                                    <input type="text" class="form-control" name="login" id="login" value="<?php echo $resultado->login; ?>" placeholder="Login" required>
                                                </div>  
                                            </div>    
                                            <div class="row">
                                                <div class="form-group col-lg-4">
                                                </div>
                                                <div class="form-group col-lg-4 text-center">
                                                    <input type="submit" name="atualizar" class="btn btn-success" value="Atualizar Dados">
                                                </div>    
                                            </div>
                                        </div>
                                    </form>                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        </main>
    </body>
    <?php include_once '../include/include_js.php'; ?>
</html>
