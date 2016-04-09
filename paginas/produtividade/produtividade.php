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
                <form method="post" action="">
                    <div class="input-prepend">
                        <h1 class="page-header">
                            Produtividade
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
                                <input type="submit" name="iniciar" class="btn btn-success" value="&nbsp;&nbsp;&nbsp;Iniciar&nbsp;&nbsp;&nbsp;">
                            </div>
                            <div class="form-group col-lg-4">
                                <input type="submit" name="pausar" class="btn btn-warning" value="&nbsp;&nbsp;&nbsp;Pausar&nbsp;&nbsp;&nbsp;">
                            </div>                               
                            <div class="form-group col-lg-4">
                                <input type="submit" name="parar" class="btn btn-danger" value="&nbsp;&nbsp;&nbsp;Parar&nbsp;&nbsp;&nbsp;">
                            </div>    
                        </div>
                </form>
<!--                        <div class="row">
                            <div class="form-group col-lg-4"></div>
                            <div class="form-group col-lg-4">
                                    <div id="cronometro">
                                      <div id="reloj">
                                              0 00 00 00
                                      </div>
                                      <form name="cron" action="#">
                                        <input type="button" value="Empezar" name="boton1"   />
                                        <input type="button" value="Parar" name="boton2"  /><br/>
                                      </form>
                                    </div>   
                            </div>    
                  
                        </div> -->
        </div>
    </body>
    
<?php include_once '../include/include_js.php'; ?>
    <script src="cronometro.js"></script>
</html>
