<html>
    <head>
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
        include "../header/header.php";
        // include "../menu_principal/menu_lateral.php";
        // include '../include/include_classes.php';
        ?>   

        <link href="../../css/sb-admin.css" rel="stylesheet">
        <meta charset="UTF-8">
    </head>
    <body > 
        <?php
        date_default_timezone_set('America/Sao_Paulo');
        $data_produtividade = date('Y-m-d');
        $produtividade = new produtividade;
        $idfunc = (int) $_GET[md5(idFunc)];
        $idAtividade = (int) $_GET[md5(idAtividade)];
        $idDep = (int) $_GET[md5(idDepartamento)];
        $cnpj = $_GET[md5(cnpj)];
        $id = $_GET[md5(id)];
        if ($_POST['cancelarAtiv']==='true') {

            $verificaAtividade = $produtividade->findAtividadeIniciadas($idfunc);
            $id = $verificaAtividade[0]->id;
            
            if($produtividade->delete($id)){
                echo "<script>alert('Atividade Cancelada.');"
            . "window.location='./cadastraProdutividade.php';</script>";
            }else{
                 echo "<script>alert('Não foi possivel cancelar a atividade.');"
            . "</script>";
            }
        } else if (isset($_POST['parar'])) {

            date_default_timezone_set('America/Sao_Paulo');
            $quantidade = $_POST['quantidade'];
            $funcionario = new funcionario();
            $func = $funcionario->whereNome($_SESSION['nome']);
            $meta = new meta();
            $result_meta = $meta->findMeta($idDep, $idAtividade);

            $acrescimo_meta = $result_meta[0]->AcrescimoMeta;
            $capacidade_turno = 3600 / $acrescimo_meta;
            $percent_prod = $quantidade / $capacidade_turno;
            $tempo_prod_efetivo = ($percent_prod * 3600) / 100;
            $tempo_prod_efetivo = $tempo_prod_efetivo * 100;
            $capacidade_turno = number_format($capacidade_turno, 2, ".", "");
            $percent_prod = $percent_prod * 100;
            $percent_prod = number_format($percent_prod, 2, ".", "");
            $hora_final = date('H:i');
            $status = 'finalizado';
            //verifica turno
            $turnoObj = new turno();
            $turno = $turnoObj->verificaTurno($hora_final);
            $IdFuncionario = $func[0]->id;
            $produtividade->setTurno($turno);
            $produtividade->setQuantidade($quantidade);
            $produtividade->setPercentProd($percent_prod);
            $produtividade->setTempoProdEfetivo($tempo_prod_efetivo);
            $produtividade->setCapacidadeTurno($capacidade_turno);
            $produtividade->setTempofinal($hora_final);
            $produtividade->setStatus($status);

            if ($produtividade->update($id)) {
                echo "<script>alert('Atividade Finalizada!');"
                . "window.location='./cadastraProdutividade.php';</script>";
            }
        }
        ?>        

        <div id="wrapper" >
            <div class="container-fluid">
                <form method="post" action="">
                    <div class="input-prepend">
                        <h1 class="page-header">
                            Finalizar Produtividade

                        </h1>   
                        <?php
                        $departamentoclass = new departamento();
                        $atividadeclass = new atividade();
                        $endereco = new endereco();
                        $idEnd = $departamentoclass->find($idDep);
                        $idEnd1 = $idEnd->idEnderecoFK;
                        $enderecoConsulta = $endereco->find($idEnd1);
                        $cnpj = $enderecoConsulta->cnpj;
                        ?>


                        <form id="form" method="post" action="">
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="cnpj">CNPJ</label>
                                    <input type="text" class="form-control" id="cnpj" name="cnpj" value="<?php echo $cnpj ?>" placeholder="CNPJ" readonly>
                                </div>

                                <div class="form-group col-lg-4">
                                    <label for="departamento">Departamento</label>                                                                                
                                    <input type="text" class="form-control" id="departamentoNone" name="departamentoNone" value="<?php
                                    $nameDept = $departamentoclass->find($idDep);
                                    echo $nameDept->nome;
                                    ?>" placeholder="Departamento" readonly="readonly">   
                                    <input style="display: none" type="text" class="form-control" id="departamento" name="departamento" value="<?php echo $idDep; ?>" placeholder="Departamento" readonly="readonly">   

                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="atividade">Atividade</label>                                
                                    <input type="text" class="form-control" id="AtividadeNone" name="AtividadeNone" value="<?php
                                           $name = $atividadeclass->find($idAtividade);
                                           echo $name->nome;
                                           ?>" placeholder="Atividade" readonly="readonly">
                                    <input style="display: none" type="text" class="form-control" id="atividade" name="atividade" value="<?php echo $atividade; ?>" placeholder="Departamento" readonly="readonly">    

                                </div>        
                                <div class="form-group col-lg-4">
                                    <label for="unid_med">Unidade de Medida</label>
                                    <input type="text" class="form-control" id="unid_med" name="unid_med" value="<?php echo $name->unid_med ?>" placeholder="CNPJ" readonly>
                                </div>  
                                <div class="form-group col-lg-4">
                                    <label for="cnpj">Quantidade</label>
                                    <input type="text" class="form-control" id="quantidade" name="quantidade" maxlength="5" onkeypress="javascript: mascara(this, soNumeros);" placeholder="Quantidade" required="true">
                                </div>
                            </div>    
                            <div class="row"><hr width=95%></div>



                            <div class="row"> 
                                <div class="form-group col-lg-4"></div>                       
                                <div class="form-group col-lg-2">
                                    <input type="submit" id="btnParar" name="parar" class="btn btn-success" value="Registrar">
                                </div> 
                                                  
                                <div class="form-group col-lg-2">
                                <input type="button" id="btnCancelar" name="cancelar" class="btn btn-danger" value="Cancelar">
                                <input style="display: none" type="text" id="cancelar" name="cancelarAtiv" class="btn btn-danger" value="false">
                                </div>
                            </div> 
                            
                    </div>    
                </form> 
<!--                        <form  method="post" action="" style="position: absolute; top:52%; left: 51%">
                    <div class="form-group col-lg-6"></div> 
                    <div class="form-group col-lg-2">
                       
                    </div>
                </form>-->
                </body>

<?php include_once '../include/include_js.php'; ?>
                <script src="../../js/validadores.js"></script>
                <script src="../../js/produtividade.js"></script>
                </html>
