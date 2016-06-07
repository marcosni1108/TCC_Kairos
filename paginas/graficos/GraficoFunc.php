<html>
    <head>
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
        include "../header/header.php";
        include "../../classes/model/validaOperario.php";
        include "../../classes/model/validaLider.php";
        //include "../menu_principal/menu_lateral.php";
//        include '../include/include_classes.php';
        ?>   


        <link href="../../css/sb-admin.css" rel="stylesheet">
        <meta charset="UTF-8">
    </head>
    <body >

        <div id="wrapper" >
            <div class="container-fluid">
                <form method="post" >
                    <div class="input-prepend">
                </form>  
            </div>

        </div>
        <div id="chartFunc">   
        </div>
    </body>

    <?php include_once '../include/include_js.php'; ?>
    <script src="../../js/populaCombo.js"></script>
    <script src="../../js/jquery-1.12.0.min.js"></script>
    <script src="../../js/highcharts.js"></script>
    <script src="../../js/exporting.js"></script>
    <script src="../../js/dataGrafico/dataFuncGrafico.js"></script>
</html>
