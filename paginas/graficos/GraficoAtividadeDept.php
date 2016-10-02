<html>
    <head>
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
        include "../header/header.php";
        include "../../classes/model/validaOperario.php";
        include "../../classes/model/validaLider.php";
        ?>
        <meta charset="UTF-8">
    </head>
    <body> 
       <main class="mdl-layout__content">
            <div class="col-lg-12">
            <div id="chart"></div>
            </div>
       </main>   
    </body>
    <?php include_once '../include/include_js.php'; ?>
    <script src="../../js/jquery-1.12.0.min.js"></script>
    <script src="../../js/highcharts.js"></script>
    <script src="../../js/exporting.js"></script>
    <script src="../../js/highdataAtiv.js"></script>
    

</html>