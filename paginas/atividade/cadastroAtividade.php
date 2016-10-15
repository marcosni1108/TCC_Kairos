
<html>
    <head>
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
        include "../header/header.php";
        include "../../classes/model/validaOperario.php";
        ?>   
        <meta charset="UTF-8">
        <script type="text/javascript" src="../../js/validadores.js"></script>
    </head>
    <?php
    if (isset($_POST['cadastrar'])):
        $nome = $_POST['nome_ativ'];
        $descricao = $_POST['descricao'];
        $idDepartamentoFK = $_POST['departamento'];
        $unid_med = $_POST['unid_med'];
        $atividade = new atividade();
        $atividade->construtor($nome, $descricao, $idDepartamentoFK,$unid_med);
        # Insert
        if ($atividade->insert()) {
            echo "<script> alert('Atividade cadastrada com sucesso.')</script>";
        }else{
            echo "<script> alert('Não foi possível cadastradar a atividade.')</script>";
        }

    endif;
    ?> 
    <body >
        <!-- Wrapper da pagina -->
        <main class="mdl-layout__content">
            <div class="col-lg-12">
                <!-- Primeira linha do wrapper -->
                <div class="row" >
                    <div class="col-lg-12">
                        <h1 class="page-header text-center">Cadastro de Atividade</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
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
                                                <div class="form-group col-lg-5">
                                                    <label for="unid_med">Tipo da Unidade de Medida</label>
                                                    <select  class="form-control" name="unid_med" id="unid_med" required>
                                                        <option value="">Selecione o Unidade de Medida</option>
                                                        <option value="Caixa">Caixa</option>
                                                        <option value="Documento">Documento</option>
                                                        <option value="Regua">Regua</option>                                                      
                                                    </select>
                                                </div> 
                                            </div>    
                                            <div class="row">
                                                <div class="form-group col-lg-8">
                                                    <label for="descricao">Descri&ccedil;&atilde;o</label><br>
                                                    <textarea id="descricao" name="descricao" rows="4" cols="50"></textarea>
                                                </div>                                          
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-4">
                                                    <label for="cnpj">CNPJ</label>
                                                    <select  class="form-control" name="cnpj" id="cnpj" required>                                                  
                                                        <option value="">Selecione o CNPJ</option>
                                                    </select>
                                                </div>
                                                    <div class="form-group col-lg-4">
                                                        <label for="departamento">Departamento</label>
                                                        <select  class="form-control" name="departamento" id="cmbDepartamento" required>                                                  
                                                            <option value="">Selecione o Departamento</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-4">
                                                    </div>                                              
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-lg-4">
                                                    </div>
                                                    <div class="form-group col-lg-4 text-center">
                                                        <input id="btnCadastrar" type="submit" name="cadastrar" class="btn btn-success" value="Cadastrar dados">
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
        </div>
    </main>  

</body>
<?php include_once '../include/include_js.php'; ?>
<script src="../../js/populaComboAtividade.js"></script>
</html>
