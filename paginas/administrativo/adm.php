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
        <!-- Wrapper da pagina -->
       <main class="mdl-layout__content">
            <div class="col-lg-8">
                <!-- Primeira linha do wrapper -->
                <div class="row" >
                    <div class="col-md-8 col-md-offset-5">
                        <h1 class="page-header text-center">Administrativo</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-5">
                        <div class="alert alert-info alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Ajuda:</strong>
                            Faça o download do Modelo!<br>
                            <strong><a href="Modelo.csv">Modelo CSV</a></strong></div>
                    </div>
                    <div class="col-md-8 col-md-offset-5">
                        <div class="panel panel-default">
                            <!-- Conteudo dentro de wrapper -->

                            <div class="panel-body">
                                <form enctype="multipart/form-data" method="post" role="form" action="../../classes/importCVS/ImportCvs.php">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Produtividade não lançada.</label>
                                        <input type="file" name="file" id="file" size="150">
                                        <p class="help-block">Arquivos Excel/CSV</p>
                                    </div>
                                    <button type="submit" class="btn btn-default" name="Import" value="Import">Enviar</button>
                                </form>
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
