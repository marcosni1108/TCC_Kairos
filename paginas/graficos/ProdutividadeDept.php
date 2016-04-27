<html>
    <head>
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
        include "../header/header.php";
        include "../menu_principal/menu_lateral.php";
        include '../include/include_classes.php';
        ?>   
        <?php
        if (isset($_POST['GerarGrafico'])):
            $id = $_POST['funcionario'];
            $dataSFormat = $_POST['data'];
            $dataSFormat = str_replace('/', '-', $dataSFormat);

            $data = date('Y-m-d', strtotime($dataSFormat));

            $GerarGraficos = new GerarGraficos();
            if ($GerarGraficos->prodFunc($id, $data)) {
                echo "<script>"
                . "window.location='./GraficoFunc.php'</script>";
            } else {

                echo "<script> alert('Usuário sem produtividade');</script>";
            }


        endif;
        ?>



        <link href="../../css/sb-admin.css" rel="stylesheet">
        <link href="../../css/jquery-ui.css" rel="stylesheet">
        <script src="../../js/datapicker/jquery-1.10.2.js"></script>
        <script src="../../js/datapicker/jquery-ui.js"></script>
        <script src="../../js/datapicker/configDate.js"></script>
        <script src="../../js/bootstrap.min.js"></script>


        <meta charset="UTF-8">
    </head>
    <body >

        <div id="wrapper" >
            <div class="container-fluid" style="width:100%; top:10%; position:absolute;">
                <form method="post" >
                    <div class="input-prepend">
                        <h1 class="page-header">
                            Produtividade de Funcionários
                        </h1>          

                        <div class="row">

                            <div class="form-group col-lg-3">
                                <label for="CNPJ">CNPJ</label>
                                <select  class="form-control" name="funcionario" id="cmbCNPJ" required>                                                  

                                </select>

                            </div>
<!--                            <div class="form-group col-lg-2">
                                <label for="data">Data</label>
                                <input type="text" class="form-control" id="datepicker" name="data" placeholder="Data" required>                                
                            </div>-->
                             <div class="form-group col-lg-2">
                                <label for="data">De</label>
                                <input type="text" class="form-control" id="from" name="data" placeholder="Data" required>                                
                            </div>
                             <div class="form-group col-lg-2">
                                <label for="data">Ate</label>
                                <input type="text" class="form-control" id="to" name="data" placeholder="Data" required>                                
                            </div>
                        </div>    
                        <div class="row"><hr width=95%></div>   
                        <div class="row">    
                            <div class="form-group col-lg-4"></div>
                            <div class="form-group col-lg-4">
                                <input id="btnGerar"  type="submit" name="GerarGrafico" class="btn btn-success" value="Gerar Grafico">

                            </div>    
                        </div>   

                </form>  
            </div>

        </div>
            

    </body>

    <script src="../../js/populaCombo.js"></script>



</html>
