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
         <link href="../../css/jquery-ui.css" rel="stylesheet">
        <script type="text/javascript" src="../../js/validadores.js"></script>
    </head>
    <body >
        <!-- Wrapper da pagina -->
        <main class="mdl-layout__content">
            <div class="col-lg-8">
                <!-- Primeira linha do wrapper -->
                <div class="row" >
                    <div class="col-md-8 col-md-offset-5">
                        <h1 class="page-header text-center">Configuração </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-5">
                        <div class="panel panel-default">
                            <!-- Conteudo dentro de wrapper -->

                            <div class="panel-body">
                                <form enctype="multipart/form-data" method="post" role="form" action="../../classes/importCVS/ImportCvs.php">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <label for="data">De</label>
                                                <input type="text" class="form-control" id="from" name="dataDe" placeholder="Data" required>                                
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="data">Ate</label>
                                                <input type="text" class="form-control" id="to" name="dataAte" placeholder="Data" required>                                
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-4"></div>
                                        <div class="form-group col-lg-4 text-center">
                                            <input id="btnIniciar"type="submit" name="GerarGrafico" class="btn btn-success" value="Salvar">
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
    <script src="../../js/datapicker/jquery-ui.js"></script>
    <script src="../../js/datapicker/configDate.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
</html>
