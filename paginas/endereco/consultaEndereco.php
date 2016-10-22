<html>
    <head>
        <meta charset="UTF-8">
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
        include "../header/header.php";
        include "../../classes/model/validaOperario.php";
        include "../../classes/model/validaLider.php";
        include '../../classes/table/tableEnd.php';
        ?> 
    </head>
    <body>
        <main class="mdl-layout__content">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header text-center">Endere&ccedil;o</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <div class="form-group col-lg-4">
                                            <a href="cadastroEndereco.php"><input type="button" name="incluir" class="btn btn-primary" value="Incluir Novo Endere&ccedil;o"></a>
                                        </div> 
                                    </div>                                  
                                </div>
                                <div class="row">
                                    <table id="tbl_Endereco" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>CNPJ</th>
                                                <th>Nome Filial</th>
                                                <th>Endere&ccedil;o</th>
                                                <th>Numero</th>
                                                 <th>CEP</th>
                                                <th>A&ccedil;&otilde;es</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
    <?php include_once '../include/include_js.php'; ?>
    <script src="../../js/data.js"></script>
</html>
