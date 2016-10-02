<html>
    <head>
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
        include "../header/header.php";
        include "../../classes/model/validaOperario.php";
        ?> 
        <meta charset="UTF-8">
    </head>
    <body >
        <?php
        $cMeta = new meta();
        if (isset($_POST['cadastrar'])):
            $departamento = $_POST['departamento'];
            $cnpj = $_POST['cnpj'];
            $atividade = $_POST['atividade'];
            $meta_porcent = $_POST['meta'];
            $resultado = $cMeta->findMeta($departamento, $atividade);
            $meta_antiga = $resultado[0]->Meta;
            //verifica se a meta nova é maior que a antiga
            if ($meta_porcent > $meta_antiga) {
                //inclusão da nova meta
                $MediaIndice = $resultado[0]->MediaIndice;
                $meta = $meta_porcent / 100;
                $resultado_indice = $MediaIndice * $meta;
                $AcrescimoMeta = $MediaIndice + $resultado_indice;
                $cMeta->setMeta($meta_porcent);
                $cMeta->setResultado($resultado_indice);
                $cMeta->setAcrescimoMeta($AcrescimoMeta);
                $cMeta->setIdDeptoFK($departamento);
                $cMeta->setIdAtividadeFK($atividade);
                if ($cMeta->update()) {
                    echo "<script> alert('Meta Cadastrada com sucesso')</script>";
                }
            } else {
                echo "<script> alert('A nova meta deve ser maior que a atual')</script>";
            }
        endif;
        ?>
        <!-- Wrapper da pagina -->
        <main class="mdl-layout__content">
            <div class="col-lg-12">
                <!-- Primeira linha do wrapper -->
                <div class="row" >
                    <div class="col-lg-12">
                        <h1 class="page-header text-center">Cadastro de Meta</h1>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-8">
                        <div class="panel panel-default">
                            <!-- Conteudo dentro de wrapper -->
                            <div class="panel-body">

                                <form method="post" action="">
                                    <div class="input-prepend">

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
                                                <label for="atividade">Atividade</label>
                                                <select  class="form-control" name="atividade" id="cmbAtividade" required>                                                  
                                                    <option value="">Selecione a Atividade</option>
                                                </select>
                                            </div>             
                                            <div class="form-group col-lg-4">
                                                <label for="meta">Porcentagem de Meta</label>
                                                <input type="number" class="form-control" onkeypress="javascript: mascara(this, soNumeros);" name="meta" id="meta" placeholder="%" required>
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
        </main>        
    </body>
    <?php include_once '../include/include_js.php'; ?>
    <script src="../../js/populaComboMeta.js"></script>
</html>
