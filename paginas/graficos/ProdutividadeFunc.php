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
            require '../../classes/graficos/GerarGraficos.php';
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
                                <label for="funcionario">Funcionário</label>
                                <select  class="form-control" name="funcionario" id="cmbfuncionario" required>                                                  
                                    <option value="">Selecione o Funcionário</option>
                                </select>

                            </div>
                            <div class="form-group col-lg-2">
                                <label for="data">Data</label>
                                <input type="text" class="form-control" id="datepicker" name="data" placeholder="Data" required>                                
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

    <script src="../../js/populaComboGraficoFunc.js"></script>



</html>
