<html>
    <head>
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
        include "../header/header.php";
        include "../../classes/model/validaOperario.php";
        include "../../classes/model/validaLider.php";
      //  include "../menu_principal/menu_lateral.php";
//        include '../include/include_classes.php';
        ?>
        <?php
        if (isset($_POST['GerarGrafico'])):
            require_once '../../classes/graficos/GerarGraficos.php';
            $dataDeTemp = $_POST['dataDe'];
            $dataAteTemp = $_POST['dataAte'];
            $id =  $_POST['atividade'];
            //Muda o formato da data
            $dataDe = date("Y-m-d", strtotime(str_replace("/", "-", $dataDeTemp)));
            $dataAte = date("Y-m-d", strtotime(str_replace("/", "-", $dataAteTemp)));
            $GerarGraficos = new GerarGraficos();
                if ($GerarGraficos->ativiGrafico($dataDe,$dataAte,$id)) {
                echo "<script>"
                . "window.location='./HighProd.php'</script>";
            } else {

                echo "<script> alert('Departamento sem produtividade no periodo selecionado');</script>";
            }


        endif;
        ?>


        <link href="../../css/sb-admin.css" rel="stylesheet">
        <link href="../../css/jquery-ui.css" rel="stylesheet">

        <meta charset="UTF-8">
    </head>
    <body >
<div id="wrapper" >
            <div class="container-fluid" style="width:80%; top:10%; position:absolute;">
                <form method="post" action="./HighProd_1.php">
                    <div class="input-prepend">
                        <h1 class="page-header">
                            Produtividade por Atividade

                        </h1>   

                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label for="cnpj">CNPJ</label>
                                <select  class="form-control" name="cnpj" id="cnpj" required>                                                  

                                </select>
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="departamento">Departamento</label>
                                <select  class="form-control" name="departamento" id="cmbDepartamento" required>                                                  

                                </select>
                            </div>      
                            <div class="form-group col-lg-3">
                                <label for="atividade">Atividade</label>
                                <select  class="form-control" name="atividade" id="cmbAtividade" required>                                                  

                                </select>
                            </div>       
                        </div>  
                        <div class="row">
                            <div class="form-group col-lg-2">
                                <label for="data">De</label>
                                <input type="text" class="form-control" id="from" name="dataDe" placeholder="Data" required>                                
                            </div>
                             <div class="form-group col-lg-2">
                                <label for="data">Ate</label>
                                <input type="text" class="form-control" id="to" name="dataAte" placeholder="Data" required>                                
                            </div>                        
                        </div>
                            
                        <div class="row"><hr width=95%></div>
                        <div class="row">
                            <div class="form-group col-lg-4"></div>
                            <div class="form-group col-lg-4">
                                <input id="btnIniciar"type="submit" name="GerarGrafico" class="btn btn-success" value="Gerar Grafico">
                            </div>


                        </div>
               
                
            </div>
                     </form>
    </body>
    <?php include_once '../include/include_js.php'; ?>
    <script src="../../js/graficosAtiv/populaComboProdutiviade.js"></script>
       
        <script src="../../js/datapicker/jquery-ui.js"></script>
        <script src="../../js/datapicker/configDate.js"></script>
        <script src="../../js/bootstrap.min.js"></script>

</html>
