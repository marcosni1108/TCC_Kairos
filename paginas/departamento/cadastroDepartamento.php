
<html>
    <head>
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
        include "../header/header.php";
        include "../../classes/model/validaOperario.php";
        include "../../classes/model/validaLider.php";
        ?>   
        <meta charset="UTF-8">
        <script type="text/javascript" src="../../js/validadores.js"></script>
    </head>
    <?php
    if (isset($_POST['cadastrar'])):
        $nome_dept = $_POST['nome_dept'];
        $cnpj = $_POST['cnpj'];
        $lider = $_POST['lider'];
        $gerente = $_POST['gerente'];
        $endereco = $_POST['endereco'];
        $departamento = new departamento();
        $departamento->construtor($id, $nome, $cnpj, $lider, $gerente, $idEnderecoFK);
        # Insert
        if ($departamento->insert()) {
            echo "<script> alert('Departamento cadastrado com sucesso.')</script>";
        }else{
             echo "<script> alert('Não foi possível cadastrar a departamento.')</script>";
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
                        <h1 class="page-header text-center">Cadastro de Departamento</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <!-- Conteudo dentro de wrapper -->
                            <div class="panel-body">
                                <div id="chart">
                                    <form method="post" action="">
                                        <div class="input-prepend">
                                            <div class="row">
                                                <div class="form-group col-lg-4">
                                                    <label for="nome_dept">Nome Departamento</label>
                                                    <input type="text" class="form-control" id="nome_dept" name="nome_dept" onkeypress="javascript: mascara(this, soLetras);" placeholder="Nome Departamento" required>
                                                </div>
                                                <div class="form-group col-lg-8">
                                                    <label for="endereco">Endere&ccedil;o</label>
                                                    <select  class="form-control" name="endereco" id="endereco" required="true">
                                                        <option value="">Selecione o Endereço</option>
                                                    </select>
                                                </div> 
                                                <div class="form-group col-lg-4">
                                                    <label for="cnpj">CNPJ</label>
                                                    <input type="text" class="form-control" name="cnpj" id="cnpj" value="" onkeypress="javascript: mascara(this, cnpj_mask);"  maxlength="18" placeholder="CNPJ" readonly="true">
                                                </div>              
                                                <div class="form-group col-lg-6">
                                                    <a href="../endereco/consultaEndereco.php">Clique aqui caso endereço não esteja cadastrado.</a>
                                                </div>
                                            </div>    
                                            <div class="row">
                                                <div class="form-group col-lg-4">
                                                    <label for="lider">Lider</label>
                                                    <select  class="form-control" name="lider" id="lider" required>
                                                        <option value="">Selecione o Lider</option>
                                                    </select>
                                                </div>     
                                                <div class="form-group col-lg-4">
                                                    <label for="gerente">Gerente</label>
                                                    <select  class="form-control" name="gerente" id="gerente" required>
                                                        <option value="">Selecione o Gerente</option>
                                                    </select>
                                                </div>                                             
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-4">
                                                </div>
                                                <div class="form-group col-lg-4 text-center">
                                                    <input id="btnCadastrar" type="submit" name="cadastrar" class="btn btn-success" value="Cadastrar dados">
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
        </main>
    </body>
    <?php include_once '../include/include_js.php'; ?>
    <script src="../../js/populaCombo.js"></script>
</html>