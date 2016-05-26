<html>
    <head>
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
        include "../header/header.php";
        include "../../classes/model/validaOperario.php";
        include "../../classes/model/validaLider.php";
        ?>   

        <link href="../../css/sb-admin.css" rel="stylesheet">

        <meta charset="UTF-8">
    </head>
    <body> 

        <div id="page-wrapper" style="overflow-x: hidden; padding-left: 250px; height:100%; padding-top: 30px;">
            <div id="chart"></div>
        </div>

    </body>
    <?php include_once '../../paginas/include/include_js.php'; ?>
    <script src="../../js/jquery-1.12.0.min.js"></script>
    <script src="../../js/highcharts.js"></script>
    <script src="../../js/graficosAtiv/highData.js"></script>
    <script src="../../js/exporting.js"></script>
    <script src="../../js/dataGrafico/dataAtivProd.json"></script>
    

</html>
