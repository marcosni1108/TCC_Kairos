<html>
    <head>
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
        include "../header/header.php";
        ?>        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../../css/jquery-ui.css" rel="stylesheet">
    </head>
    <body>
        <main class="mdl-layout__content">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header text-center">Informa&ccedil;&otilde;es Gerencias 
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 dash-bord text-center">Filtro:                                      
                    </div>
                    <div class="col-lg-2">
                        <input pattern="dd/MM/yyyy" class="form-control" onchange="chamaGrafico()" id="from" name="dataDe" placeholder="Data de" autocomplete="off" required>                                
                    </div>

                    <div class="col-lg-2">
                        <input pattern="dd/MM/yyyy" class="form-control" onchange="chamaGrafico()" id="to" name="dataAte" placeholder="Data até" autocomplete="off" required>                                
                    </div>
                </div>
                <br>
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
        </main>
        <?php
        include "../include/include_js.php";
        ?>        
        <script src="../../js/jquery-1.12.0.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/highcharts.js"></script>
        <script src="../../js/exporting.js"></script>
        <script src="../../js/datapicker/jquery-ui.js"></script>
        <script src="../../js/dashbord/configDate.js"></script>
        <script src="../../js/dashbord/graficoDashbord.js"></script>
    </body>
</html>
