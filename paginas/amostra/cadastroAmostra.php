<html>
    <head>
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
        include "../header/header.php";
        include "../menu_principal/menu_lateral.php";
        include '../include/include_classes.php';
        ?>   
        <link href="../../css/sb-admin.css" rel="stylesheet">
        <meta charset="UTF-8">
    </head>
    <body >
        <?php
        if (isset($_POST['cadastrar'])):

//            $cnpj = $_POST['cnpj'];
//            $departamento = $_POST['departamento'];
//            $atividade = $_POST['atividade'];
//            $hora_inicial = $_POST['hora_inicial'];
//            $hora_final = $_POST['hora_final'];
//            $quantidade = $_POST['quantidade'];
//
//            $funcionario = new amostra();
//            $funcionario->setMatricula($cnpj);
//            $funcionario->setNome($departamento);
//            $funcionario->setCpf($atividade);
//            $funcionario->setEmail($hora_inicial);
//            $funcionario->setL($hora_final);
//            $funcionario->setSenha($quantidade);
//
//
//            # Insert
//            if ($funcionario->insert()) {
//                echo "<script> alert('Usuario Cadastrado com sucesso')</script>";
//            }

        endif;
        ?>        
        <div id="wrapper" >
            <div class="container-fluid">
                <form method="post" action="">
                    <div class="input-prepend">
                        <h1 class="page-header">
                            Registro de Amostra
                        </h1>                     
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label for="cnpj">CNPJ</label>
                                <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="CNPJ" required>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="departamento">Departamento</label>
                                <select  class="form-control" name="departamento" id="departamento">                                                  
                                    <?php
                                    $departamento = new departamento();
                                    foreach ($departamento->findAll() as $key => $value):
                                        ?>
                                        <option value="<?php echo $value->id; ?>" selected><?php echo $value->nome; ?></option> 
                                    <?php endforeach; ?>
                                </select>
                            </div>      
                            <div class="form-group col-lg-4">
                                <label for="atividade">Atividade</label>
                                <select  class="form-control" name="departamento" id="departamento">                                                  
                                    <?php
                                    $atividade = new atividade();
                                    foreach ($atividade->findAll() as $key => $value):
                                        ?>
                                        <option value="<?php echo $value->id; ?>" selected><?php echo $value->nome; ?></option> 
                                     <?php endforeach; ?>
                                </select>
                            </div>                                          
                        </div>    
                        <div class="row"><hr width=95%></div>
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label for="hora_inicial">Hora Incial</label>
                                <input type="text" class="form-control" name="hora_inicial"  id="hora_inicial" placeholder="Hora Incial" required>
                            </div> 
                            <div class="form-group col-lg-4">
                                <label for="hora_final">Hora Final</label>
                                <input type="text" class="form-control" name="hora_final" id="hora_final" placeholder="Hora Final" required>
                            </div> 
                            <div class="form-group col-lg-4">
                                <label for="quantidade">Quantidade</label>
                                <input type="text" class="form-control" name="quantidade" id="quantidade" placeholder="Quantidade" required>
                            </div>                             
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-4">
                            </div>
                            <div class="form-group col-lg-4">
                                <input type="submit" name="cadastrar" class="btn btn-success" value="Cadastrar dados">
                            </div>    
                        </div>                        
                </form>  
            </div> 
        </div>
    </body>
<?php include_once '../include/include_js.php'; ?>
</html>
