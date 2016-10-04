<html>
    <head>
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
        include "../header/header.php";
        ?>        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <main class="mdl-layout__content">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header text-center">Informa&ccedil;&otilde;es Gerencias 
                            <a href="../administrativo/configDashbord.php"><img class="ajuda_home" data-toggle="tooltip" title="Ajustes os graficos em configurações" src="../../imagens/ajuda.png" alt="Smiley face" height="22" width="22"> </a>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            </div>
                            <div class="panel-body">
                                <div id="chart"></div>
                            </div>
                        </div>
                    </div>   
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            </div>
                            <div class="panel-body">
                                <div id="container" width="200" ></div>
                            </div>
                        </div>
                    </div>  
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            </div>
                            <div class="panel-body">
                                <div id="char1"></div>
                            </div>
                        </div>
                    </div>  
                </div>
                <div class="row">
                </div>
            </div>
            <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Ajuda</h4>
                      </div>
                      <div class="modal-body">
                        Para Alterar o periodo de amostra dos graficos, va em configurações faça a alteração.
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                      </div>
                    </div>
                  </div>
                </div>
        </main>
        <?php
      //  include "../include/include_js.php";
        ?>        
   
        <script src="../../js/jquery-1.12.0.min.js"></script>
        <script src="../../js/jsHome/jsHome.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/highcharts.js"></script>
        <script src="../../js/exporting.js"></script>
        <script src="../../js/highData.js"></script>
        <script src="../../js/dashbord/graficoDashbord.js"></script>
        <script>
            function trigerModal(){
               $('#myModal').modal('show');
                
            }
        </script>
    </body>
</html>
