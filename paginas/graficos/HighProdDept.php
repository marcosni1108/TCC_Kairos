<html>
    <head>
        <title>Kairos</title>
        <?php
          include "../include/include_css.php";
          include "../header/header.php";
          include "../../classes/model/validaOperario.php";
          include "../../classes/model/validaLider.php";
        ?>
        <?php
          if(isset($_POST['GerarGrafico'])):
              $dataDeTemp = $_POST['dataDe'];
              $dataAteTemp = $_POST['dataAte'];
              $idCnpj = $_POST['CNPJ'];
              //Muda o formato da data
              $dataDe = date("Y-m-d", strtotime(str_replace("/", "-", $dataDeTemp)));
              $dataAte = date("Y-m-d", strtotime(str_replace("/", "-", $dataAteTemp)));
              $GerarGraficos = new GerarGraficos();
              if($GerarGraficos -> prodDeptHigh($dataDe, $dataAte, $idCnpj)) {
                  echo "<script>"
                  ."window.location='./HighGraficoDept.php'</script>";
              } else {
                  echo "<script> alert('Departamento sem produtividade no periodo selecionado');</script>";
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
                                <select  class="form-control" name="CNPJ" id="cmbCNPJ" required>
                                </select>
                            </div>
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
                                <input id="btnGerar"  type="submit" name="GerarGrafico" class="btn btn-success" value="Gerar Grafico">
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </body>
    <script src="../../js/populaComboGraficos.js"></script>
</html>
