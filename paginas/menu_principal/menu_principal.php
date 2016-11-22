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
                        <input pattern="dd/MM/yyyy" class="form-control readdata" onchange="chamaGrafico()" id="from" name="dataDe" placeholder="Data de" autocomplete="off" readonly>                                
                    <br>
                    </div>

                    <div class="col-lg-2">
                        <input pattern="dd/MM/yyyy" class="form-control readdata" onchange="chamaGrafico()" id="to" name="dataAte" placeholder="Data até" autocomplete="off" readonly>                                
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            </div>
                            <div class="panel-body">
                                <div id="chart"></div>
                            </div>
                        </div>
                    </div>   
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            </div>
                            <div class="panel-body">
                                <div id="container" width="200" ></div>
                            </div>
                        </div>
                    </div>  
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header text-center">Filiais
                        </h1>
                    </div>
               </div>
                    <div class="row">   
                        <div class="col-lg-4 dash-bord text-center">
                                Filtro:                                      
                        </div>
                        <div class="col-lg-2 text-center">
                            <select class="form-control"  onchange="chamaFilial()" name="ano" id="mes">
                                <option value="01">Janeiro</option>
                                <option value="02">Fevereiro</option>
                                <option value="03">Março</option>
                                <option value="04">Abril</option>
                                <option value="05">Maio</option>                                    
                                <option value="06">Junho</option>
                                <option value="07">Julho</option>
                                <option value="08">Agosto</option>
                                <option value="09">Setembro</option>
                                <option value="10">Outubro</option>
                                <option value="11">Novembro</option>
                                <option value="12">Dezembro</option>
                            </select>                                
                        </div>
                    </div>
                <br>
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            </div>
                            <div class="panel-body">
                                <div id="produtividade"></div>
                            </div>
                        </div>
                    </div>   
                </div>
        </main>
        <?php
        include "../include/include_js.php";
        ?>  
        <script type="text/javascript">
            window.idDepartamento = "<?php echo $_SESSION['departamento'] ?>";
        </script>
        <script src="../../js/jquery-1.12.0.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/highcharts.js"></script>
        <script src="../../js/exporting.js"></script>
        <script src="../../js/datapicker/jquery-ui.js"></script>
        <script src="../../js/dashbord/configDate.js"></script>
        <script src="../../js/dashbord/graficoDashbord.js"></script>
    </body>
</html>
