
<html>
    <head>
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
        include "../menu_principal/menu_lateral.php";
        include "../header/header.php";
        include '../include/include_classes.php';
        ?>   
        <meta charset="UTF-8">
        <script type="text/javascript" src="../../js/validadores.js"></script>
    </head>
    <?php
    if (isset($_POST['cadastrar'])):

        $nome = $_POST['nome_ativ'];
        $descricao = $_POST['descricao'];
        $idDepartamentoFK = $_POST['departamento'];
        $cnpj = $_POST['cnpj'];
        $unid_med = $_POST['unid_med'];



        $atividade = new atividade();
        $atividade->setNome($nome);
        $atividade->setDescricao($descricao);
        $atividade->setCnpj($cnpj);
        $atividade->setIdDepartamentoFK($idDepartamentoFK);
        $atividade->setUnid_med($unid_med);



        # Insert
        if ($atividade->insert()) {
            echo "<script> alert('Atividade Cadastrado com sucesso')</script>";
        }

    endif;
    ?> 

    <body >

        <!-- Wrapper da pagina -->
        <div id="page-wrapper" style="overflow-x: hidden; padding-left: 250px; height:100%; padding-top: 30px;">
            <!-- Primeira linha do wrapper -->
            <div class="row" >
                <div class="col-lg-12">
                    <h1 class="page-header">Cadastro de Atividade</h1>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <!-- Conteudo dentro de wrapper -->
                        <div class="panel-body">
                            <div id="chart">

                                <form method="post" action="">
                                    <div class="input-prepend">

                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <label for="nome_ativ">Nome da Atividade</label>
                                                <input type="text" class="form-control" onkeypress="javascript: mascara(this, soLetras);" id="nome_ativ" name="nome_ativ" placeholder="Nome Atividade" required>

                                            </div>


                                            <div class="form-group col-lg-3">
                                                <label for="unid_med">Tipo da Unidade de Medida</label>
                                                <select  class="form-control" name="unid_med" id="unid_med">
                                                    <option value="--" selcted>--</option>  
                                                    <option value="Caixa">Caixa</option>
                                                    <option value="Documento">Documento</option>
                                                    <option value="Regua">Regua</option>                                                      
                                                </select>
                                            </div> 

                                        </div>    

                                        <div class="row">

                                            <div class="form-group col-lg-8">
                                                <label for="descricao">Descri&ccedil;&atilde;o</label><br>
                                                <textarea id="descricao" name="descricao" rows="4" cols="80"></textarea>
                                            </div>                                          
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <label for="departamento">Departamento</label>
                                                <select  class="form-control" name="departamento" id="departamento">                                                  
                                                    <?php
                                                    $departamento = new departamento();
                                                    foreach ($departamento->findAll() as $key => $value):   ?>
                                                    <option value="<?php echo $value->id; ?>" selcted><?php echo $value->nome; ?></option> 
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>     

                                            <div class="form-group col-lg-3">
                                                <label for="gerente">CNPJ</label>
                                                <select  class="form-control" name="cnpj" id="cnpj">
                                                    <option value="--" selcted>--</option>  
                                                    <option value="0525815">0525815</option>
                                                    <option value="808080880">808080880</option>
                                                    <option value="9950959">9950959</option>
                                                    <option value="70707007">70707007</option>
                                                </select>
                                            </div>                                             
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <input type="submit" name="cadastrar" class="btn btn-success" value="Cadastrar dados">
                                            </div>    
                                        </div>


                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        ...
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
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
