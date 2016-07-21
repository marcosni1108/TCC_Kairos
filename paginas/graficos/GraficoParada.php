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
    <body >
        <div id="wrapper" >
            <div class="container-fluid">
                <div class="input-prepend">
                    <h3 class="text-primary text-center">Tempo Perdido</h3>
                </div>
            </div>
            <div style="top: 150px; left: 290px;width:500px;position: absolute" id="barDept">
            </div>
            <div style="top: 150px; left: 790px;width:500px;position: absolute" id="barDept1">
            </div>
    </body>
    <script src="../../js/plugins/morris/raphael.min.js"></script>
    <script src="../../js/jquery-1.12.0.min.js"></script>
    <script src="../../js/plugins/morris/morris.min.js"></script>
    <script src="../../js/plugins/morris/morris-data.js"></script>
    <script src="../../js/dataTable/dataFuncGrafico.js"></script>
    <script>
        Morris.Bar({element: 'barDept',
            data: [
                {y: 'Café', a: 200},
                {y: 'Banheiro', a: 300},
                {y: 'Almoço', a: 500},
            ],
            xkey: 'y',
            ykeys: ['a'],
            labels: ['Tempo Perdido'],
        });
        Morris.Line({
            element: 'barDept1',
            data: [
                {y: '2016-02', a: 100, b: 90, c: 50},
                {y: '2016-03', a: 75, b: 80, c: 60},
                {y: '2016-04', a: 60, b: 80, c: 70},
                {y: '2016-05', a: 10, b: 40, c: 80},
                {y: '2016-06', a: 75, b: 80, c: 90},
                {y: '2016-07', a: 30, b: 80, c: 50},
            ],
            xkey: 'y',
            ykeys: ['a', 'b', 'c'],
            labels: ['Café', 'Almoço', 'Banheiro'],
            behaveLikeLine: true,
            hideHover: true,
            fillOpacity: 0.6,
            lineColors: ['blue', 'red', 'green'],
            pointStrokeColors: ['black'],
            pointFillColors: ['#ffffff']
        });
    </script>
    <?php include_once '../include/include_js.php'; ?>
</html>
