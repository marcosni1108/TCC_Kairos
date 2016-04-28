<html>
    <head>
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
        include "../header/header.php";
        include "../../classes/model/validaOperario.php";
        include "../../classes/model/validaLider.php";
      //  include "../menu_principal/menu_lateral.php";
       // include '../include/include_classes.php';
        ?>   
 
        <link href="../../css/sb-admin.css" rel="stylesheet">
        
        <meta charset="UTF-8">
    </head>
    <body> 
        <?php
          
         ?>        
       <h3 class="text-primary text-center">Produtividade Geral</h3>
        <div id="chart" style="top: 100px; left: 300px;width:1000px"></div>
           
               
    </body>
     <?php include_once '../include/include_js.php'; ?>
   
    <script src="../../js/plugins/morris/raphael.min.js"></script>
    <script src="../../js/jquery-1.12.0.min.js"></script>
    <script src="../../js/plugins/morris/morris.min.js"></script>
    <script src="../../js/plugins/morris/morris-data.js"></script>
    <script src="../../js/dataGrafico/dataFuncGrafico.js"></script>

     <?php include_once '../../classes/model/Graficos.php'; ?>
</html>
