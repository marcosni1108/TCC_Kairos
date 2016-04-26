<html>
    <head>
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
        include "../header/header.php";
        include "../menu_principal/menu_lateral.php";
        include '../include/include_classes.php';
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
            <div style="top: 150px; left: 290px;width:1000px;position: absolute" id="donut-example">   
            </div>
    </body>
    <script src="../../js/plugins/morris/raphael.min.js"></script>
    <script src="../../js/jquery-1.12.0.min.js"></script>
    <script src="../../js/plugins/morris/morris.min.js"></script>
    <script src="../../js/plugins/morris/morris-data.js"></script>
    <script src="../../js/dataTable/dataFuncGrafico.js"></script>
    <script>
        Morris.Donut({
            element: 'donut-example',
            data: [
                {label: "Banheiro", value: 20},
                {label: "Solicitar Equipamentos", value: 30},
                {label: "Café", value: 30},
                {label: "Indefinido", value: 20}
            ]
        });
    </script>
    <?php include_once '../include/include_js.php'; ?>

</html>
