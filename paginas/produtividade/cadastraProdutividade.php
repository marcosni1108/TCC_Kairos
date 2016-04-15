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
            $data_produtividade = date('Y-m-d');
        
        if (isset($_POST['iniciar'])){
            date_default_timezone_set('America/Sao_Paulo');
            $produtividade = new produtividade;
            $funcionario = new funcionario();
            $func = $funcionario->whereNome($_SESSION['nome']);
            $hora_inicial = date('H:i');
            $idDepartamento = $_POST['departamento'];
            $idAtividade = $_POST['atividade'];
            $quantidade = 0;
            $hora_final="00:00";
            $IdFuncionario = $func[0]->id;
            $produtividade->setData($data_produtividade);
            $produtividade->setTempoinicial($hora_inicial);
            $produtividade->setTempofinal($hora_final);
            $produtividade->setIdDepartamento($idDepartamento);
            $produtividade->setIdFuncionario($IdFuncionario);
            $produtividade->setIdAtividade($idAtividade);
            $produtividade->setQuantidade($quantidade);
  
            if($produtividade->insert())
            {
               echo "<script> alert('Atividade Iniciada com sucesso')</script>";
            }
            
            
            
           
        }
         else if (isset($_POST['Parar'])){
            date_default_timezone_set('America/Sao_Paulo');
            $produtividade = new produtividade;
            $hora_final = date('H:i');
            $idDepartamento = $_POST['departamento'];
            $idAtividade = $_POST['atividade'];  
            $quantidade = $_POST['quantidade'];           
        }
         ?>        
        
        <div id="wrapper" >
            <div class="container-fluid">
                <form method="post" action="">
                    <div class="input-prepend">
                        <h1 class="page-header">
                            Produtividade
                             
                        </h1>   
                       <?php echo $data_produtividade; ?>
                       <div class="row">
                            <div class="form-group col-lg-4">
                                <label for="cnpj">CNPJ</label>
                                <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="CNPJ" readonly>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="departamento">Departamento</label>
                                <select  class="form-control" name="departamento" id="cmbDepartamento" required>                                                  
                                   
                                </select>
                            </div>      
                            <div class="form-group col-lg-4">
                                <label for="atividade">Atividade</label>
                                <select  class="form-control" name="atividade" id="cmbAtividade" required>                                                  
                                   
                                </select>
                            </div>                                          
                        </div>    
                        <div class="row"><hr width=95%></div>
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <input id="btnIniciar"type="submit" name="iniciar" class="btn btn-success" value="Iniciar">
                            </div>
                            <div class="form-group col-lg-4">
                                <input id="btnPausar" type="submit" name="pausar" class="btn btn-warning" value="&nbsp;&nbsp;&nbsp;Pausar&nbsp;&nbsp;&nbsp;">
                            </div>                               
                            <div class="form-group col-lg-4">
                                <input id="btnParar" name="parar" class="btn btn-danger" value="&nbsp;&nbsp;&nbsp;Parar&nbsp;&nbsp;&nbsp;">
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
     <script src="../../js/populaComboProdutiviade.js"></script>
</html>
