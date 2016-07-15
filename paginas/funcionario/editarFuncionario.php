
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
       // include "../menu_principal/menu_lateral.php";
        include "../header/header.php";
        include "../../classes/model/validaOperario.php";
//        include '../include/include_classes.php';
        ?>    
                <script type="text/javascript" src="../../js/validadores.js"></script>
    </head>
    <body>
            <?php
              $id = (int) $_GET[md5('id')];             
              $funcionario = new funcionario(); 
            ?>
        
        <div id="page-wrapper" style="overflow-x: hidden; padding-left: 250px; height:100%; padding-top: 30px;">
            <!-- Primeira linha do wrapper -->
            <div class="row" >
                <div class="col-lg-12">
                    <h1 class="page-header">Editar Funcionário</h1>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <!-- Conteudo dentro de wrapper -->
                        <div class="panel-body">
                            <div id="chart">
                                    <?php $resultado = $funcionario->find($id);  ?>
                                <form method="post" action="../../classes/controller/ControllerFunc.php">
                                    <div class="input-prepend">

                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <input style="display: none"type="text" class="form-control" id="id" value="<?php echo $id; ?>" name="id">
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
                                            <div class="form-group col-lg-4">
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

    </body>
   
    <?php include_once '../include/include_js.php'; ?>
    
    
</html>
