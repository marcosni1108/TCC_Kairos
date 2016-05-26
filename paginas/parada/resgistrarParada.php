<html>
    <head>
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
   //     Teste Ricardoinclude "../menu_principal/menu_lateral.php";
        include "../header/header.php";
        include "../../classes/model/validaOperario.php";
  //      include '../include/include_classes.php';
        ?>   
        <link href="../../css/sb-admin.css" rel="stylesheet">
        <meta charset="UTF-8">
    </head>
    <body >
        <?php
        if (isset($_POST['cadastrar'])):

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
                echo "<script> alert('Usuario Cadastrado com sucesso')</script>";
            }
            
        endif;
        ?>        
        <div id="wrapper" >
            <div class="container-fluid">
                <form method="post" action="">
                    <div class="input-prepend">
                        <h1 class="page-header">
                            Registro de Parada
                        </h1>                     
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label for="nome_parada">Nome da Parada</label>
                                <input type="text" class="form-control" id="nome_parada" name="nome_parada" placeholder="Nome da Parada" required>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="tipo_parada">Tipo da Parada</label>
                                <select class="form-control" name="tipo_parada" id="tipo_parada">
                                    <option value="Expedicao">Expedição</option>
                                    <option value="Logistica">Logistica</option>
                                </select>
                            </div>      
                            <div class="form-group col-lg-4">
                                <label for="departamento">Departamento</label>
                                <select class="form-control" name="departamento" id="departamento">
                                    <option value="Expedicao">Expedição</option>
                                    <option value="Logistica">Logistica</option>
                                </select>
                            </div>  
                            <div class="form-group col-lg-4">
                                <label for="cnpj">CNPJ</label>
                                <select class="form-control" name="cnpj" id="cnpj">
                                    <option value="Expedicao">Expedição</option>
                                    <option value="Logistica">Logistica</option>
                                </select>
                            </div> 
                            <div class="form-group col-lg-4">
                                <label for="descricao">Descrição</label>
                                <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição" required>
                            </div>                            
                        </div>    
                        <div class="row"><hr width=95%></div>
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label for="hora_inicial">Hora Incial</label>
                                <input type="text" class="form-control" name="hora_inicial" id="hora_inicial" placeholder="Hora Incial" required>
                            </div> 
                            <div class="form-group col-lg-4">
                                <label for="hora_final">Hora Final</label>
                                <input type="text" class="form-control" name="hora_final" id="hora_final" placeholder="Hora Final" required>
                            </div>                              
                    </div>
                </form>  
            </div> 
        </div>
    </body>
    <?php include_once '../include/include_js.php'; ?>
</html>
