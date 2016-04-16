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
        <link href="cronometro.css" rel="stylesheet">
        <script language="JavaScript" src="cronometro.js"></script>
        <meta charset="UTF-8">
    </head>
    <body > 
        <?php
            $data_produtividade = date('Y-m-d');
            $produtividade = new produtividade;
            $idfunc = (int) $_GET[md5(idFunc)];
            $idAtividade = (int) $_GET[md5(idAtividade)];
            $idDep = (int) $_GET[md5(idDepartamento)];
            $cnpj = $_GET[md5(cnpj)];
            $id = $_GET[md5(id)];
         if (isset($_POST['parar'])){
             
            date_default_timezone_set('America/Sao_Paulo');
            
            $funcionario = new funcionario();
            $func = $funcionario->whereNome($_SESSION['nome']);
            $idDepartamento = $_POST['departamento'];
            $idAtividade = $_POST['atividade'];
            $quantidade = $_POST['quantidade'];
            $hora_final=date('H:i');
            $status = 'finalizado';
            $IdFuncionario = $func[0]->id;
            $produtividade->setTempofinal($hora_final);
            $produtividade->setQuantidade($quantidade);
            $produtividade->setStatus($status);
  
            if($produtividade->update($id))
            {
              echo "<script>alert('Atividade Finalizada');"
                    . "window.location='./cadastraProdutividade.php';</script>";
            }     
        }
         ?>        
        
        <div id="wrapper" >
            <div class="container-fluid">
                <form method="post" action="">
                    <div class="input-prepend">
                        <h1 class="page-header">
                            Finalizar Atividade
                             
                        </h1>   
                       <?php $departamentoclass = new departamento(); 
                             $atividadeclass = new atividade();
                             $endereco = new endereco();
                             $idEnd = $departamentoclass->find($idDep);
                             $idEnd1 = $idEnd->idEnderecoFK;
                             $enderecoConsulta = $endereco->find($idEnd1);
                             $cnpj = $enderecoConsulta->cnpj;
                       ?>
                        
                       
                     <form method="post" action="">
                       <div class="row">
                            <div class="form-group col-lg-4">
                                <label for="cnpj">CNPJ</label>
                                <input type="text" class="form-control" id="cnpj" name="cnpj" value="<?php echo  $cnpj ?>" placeholder="CNPJ" readonly>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="departamento">Departamento</label>                                                                                
                                <input type="text" class="form-control" id="departamentoNone" name="departamentoNone" value="<?php  $nameDept = $departamentoclass->find($idDep);echo $nameDept->nome; ?>" placeholder="Departamento" readonly="readonly">   
                                <input style="display: none" type="text" class="form-control" id="departamento" name="departamento" value="<?php echo $idDep; ?>" placeholder="Departamento" readonly="readonly">   
                               
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="atividade">Atividade</label>                                
                                <input type="text" class="form-control" id="AtividadeNone" name="AtividadeNone" value="<?php  $name = $atividadeclass->find($idAtividade); echo $name->nome; ?>" placeholder="Atividade" readonly="readonly">
                                <input style="display: none" type="text" class="form-control" id="atividade" name="atividade" value="<?php echo $atividade; ?>" placeholder="Departamento" readonly="readonly">    
                                
                            </div>        
                            
                           <div class="form-group col-lg-4">
                                <label for="cnpj">Quantidade</label>
                                <input type="text" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade" requerid>
                            </div>
                        </div>    
                        <div class="row"><hr width=95%></div>
                        
                        <div class="row">
                            <div class="form-group col-lg-4"></div>
                            <div class="form-group col-lg-4">
                                <div class="codigo">
                                        <span id="hora">00:</span><span id="minuto">00:</span><span id="segundo">00</span><br>
                                </div>
                            </div>
                        </div>
                        
                    <div class="row"> 
                            <div class="form-group col-lg-4"></div>                       
                            <div class="form-group col-lg-4">
                                <input type="submit" style="margin-left:100px;" id="btnParar" name="parar" class="btn btn-danger" value="Parar">
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
