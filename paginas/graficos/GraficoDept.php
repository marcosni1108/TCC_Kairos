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
        <main class="mdl-layout__content">
            <div class="container-fluid">
                <div class="input-prepend">
                    <h3 class="text-primary text-center">Departamentos</h3>
                </div>
            </div>
            <div style="top: 100px; left: 100px;width:1000px" id="barDept">   
            </div>
         </main>   
    </body>
    <script src="../../js/plugins/morris/raphael.min.js"></script>
    <script src="../../js/jquery-1.12.0.min.js"></script>
    <script src="../../js/plugins/morris/morris.min.js"></script>
    <script src="../../js/plugins/morris/morris-data.js"></script>
    <script src="../../js/dataGrafico/dataDeptProd.js"></script>

    <?php include_once '../include/include_js.php'; ?>
    <script src="../../js/populaCombo.js"></script>
</html>
