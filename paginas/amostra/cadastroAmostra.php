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
             
        <div id="wrapper" >
            <div class="container-fluid">
                <form method="post" action="novaAmostra.php">
                    <div class="input-prepend">
                        <h1 class="page-header">
                            Registro de Amostra
                        </h1>          
                        <div class="alert alert-info alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>ERRO!</strong> Usuario ou Senha invalidos! </div>
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
                                <select  class="form-control" name="atividade" id="atividade">                                                  
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
                            <div class="form-group col-lg-4"></div>
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
