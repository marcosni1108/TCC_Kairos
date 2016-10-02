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
    <body >
        <?php
        $id = (int) $_GET[md5('id')];
        $endereco = new endereco();
        if (isset($_POST['atualizar'])):
            $cep = $_POST['cep'];
            $rua = $_POST['endereco'];
            $numero = $_POST['numero'];
            $endereco->setCep($cep);
            $endereco->setRua($rua);
            $endereco->setNumero($numero);
            if ($endereco->update($id)) {
                echo "Endereço alterado com sucesso.!";
            }
        endif;
        ?>
        <!-- Wrapper da pagina -->
        <main class="mdl-layout__content">
            <div class="col-lg-12">
                <!-- Primeira linha do wrapper -->
                <div class="row" >
                    <div class="col-lg-12">
                        <h1 class="page-header">Editar Endere&ccedil;o</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="panel panel-default">
                            <!-- Conteudo dentro de wrapper -->
                            <div class="panel-body">
                                <div id="chart">
                                     <?php $resultado = $endereco->find($id); ?>           
                                    <form method="post" action="">
                                        <div class="input-prepend">
                                            <div class="row">
                                                <div class="form-group col-lg-4">
                                                    <label for="cep">CEP</label>
                                                    <input type="text" class="form-control" value="<?php echo $resultado->cep; ?>" id="cep" name="cep" onkeypress="javascript: mascara(this, cep_mask);" placeholder="CEP" required>
                                                </div>
                                                <div class="form-group col-lg-8">
                                                    <label for="endereco">Endere&ccedil;o</label>
                                                    <input type="text" class="form-control" value="<?php echo $resultado->endereco; ?>" name="endereco" id="endereco" placeholder="Endereco" required>
                                                </div> 
                                                <div class="form-group col-lg-4">
                                                    <label for="numero">Numero</label>
                                                    <input type="text" class="form-control" value="<?php echo $resultado->numero; ?>" name="numero" id="numero" onkeypress="javascript: mascara(this, soNumeros);" placeholder="Numero" required>
                                                </div>              
                                                <div class="form-group col-lg-4">
                                                    <label for="cnpj">CNPJ</label>
                                                    <input type="text" class="form-control" value="<?php echo $resultado->cnpj; ?>" name="cnpj" id="cnpj" onblur="javascript: validarCNPJ(this.value);" onkeypress="javascript: mascara(this, cnpj_mask);" maxlength="18"placeholder="CNPJ" readonly="true">
                                                </div>  
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-4">
                                                </div>
                                                <div class="form-group col-lg-4 text-center">
                                                    <input type="submit" name="atualizar" class="btn btn-success" value="Atualizar">
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
</html>
