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
                <form method="post" >
                    <div class="input-prepend">
         
                       
              
                         <h3 class="text-primary text-center">Produtividade Geral</h3>
                </form>  
            </div>
                    
        </div>
            <div style="top: 100px; left: 100px;width:1000px" id="chartFunc">   
             </div>
    </body>
     <script src="../../js/plugins/morris/raphael.min.js"></script>
    <script src="../../js/jquery-1.12.0.min.js"></script>
    <script src="../../js/plugins/morris/morris.min.js"></script>
    <script src="../../js/plugins/morris/morris-data.js"></script>
     <script src="../../js/dataTable/dataFuncGrafico.js"></script>
     
    <?php include_once '../include/include_js.php'; ?>
    <script src="../../js/populaCombo.js"></script>
</html>
