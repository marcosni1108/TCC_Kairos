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
            $funcionario = new funcionario();
            $produtividade = new produtividade;
            $func = $funcionario->whereNome($_SESSION['nome']);
            $IdFuncionario = $func[0]->id;
            $verificaAtividade = $produtividade->findAtividadeIniciadas($IdFuncionario);
            $status = $verificaAtividade[0]->status;
            if($status==null){
                if (isset($_POST['iniciar'])){
                    date_default_timezone_set('America/Sao_Paulo');
                    $hora_inicial = date('H:i');
                    $idDepartamento = $_POST['departamento'];
                    $idAtividade = $_POST['atividade'];
                    $cnpj = $_POST['cnpj'];
                    $quantidade = 0;
                    $hora_final="00:00";
                    $status = 'iniciado';
                    $produtividade->setData($data_produtividade);
                    $produtividade->setTempoinicial($hora_inicial);
                    $produtividade->setTempofinal($hora_final);
                    $produtividade->setIdDepartamento($idDepartamento);
                    $produtividade->setIdFuncionario($IdFuncionario);
                    $produtividade->setIdAtividade($idAtividade);
                    $produtividade->setQuantidade($quantidade);
                    $produtividade->setStatus($status);

                        if($produtividade->insert())
                        {
                             $verificaAtividade = $produtividade->findAtividadeIniciadas($IdFuncionario);
                             $id = $verificaAtividade[0]->IdProdutividade;    
                             $teste = "produtividadeFinalizar.php?".md5(idFunc)."=".
                                    $IdFuncionario."&".md5(idAtividade)."=".$idAtividade.""
                                    . "&".md5(idDepartamento)."=".$idDepartamento.""
                                    . "&".md5(cnpj)."=".$cnpj.""
                                    . "&".md5(id)."=".$id."";
                                     echo "<script>alert('Atividade Iniciada Com sucesso!');"
                                    . "window.location='./".$teste."';</script>";
                        }


          }       
        }else{
           $idAtividade = $verificaAtividade[0]->IdAtividade;
           $idDepartamento = $verificaAtividade[0]->IdDepartamento;
           $IdFuncionario = $verificaAtividade[0]->IdFuncionario;
           $id = $verificaAtividade[0]->IdProdutividade;
           $cnpj = 0;
                    $teste = "produtividadeFinalizar.php?".md5(idFunc)."=".
                    $IdFuncionario."&".md5(idAtividade)."=".$idAtividade.""
                    . "&".md5(idDepartamento)."=".$idDepartamento.""
                    . "&".md5(cnpj)."=".$cnpj.""
                    . "&".md5(id)."=".$id."";
                    echo "<script>alert('Já existe uma atividade iniciada');"
                    . "window.location='./".$teste."';</script>";
            
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
                            <div class="form-group col-lg-4"></div>
                            <div class="form-group col-lg-4">
                                <input id="btnIniciar"type="submit" name="iniciar" class="btn btn-success" value="Iniciar">
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
