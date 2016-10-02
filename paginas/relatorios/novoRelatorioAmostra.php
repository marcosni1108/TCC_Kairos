<html>
    <head>
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
       // include "../menu_principal/menu_lateral.php";
        include "../header/header.php";
        include "../../classes/model/validaOperario.php";
        include "../../classes/model/validaLider.php";
//        include '../include/include_classes.php';
        ?>   
        
        <meta charset="UTF-8">
        <script type="text/javascript" src="../../js/validadores.js"></script>
    </head>
    <body>
      <form method="post" action="novoRelatorioAmostra.php">
                    <div>
                        <table id="tbl_Amostra" class="table table-bordered">
                            <thead>
                                <tr>

                                    <th>Hora Inicial</th>
                                    <th>Hora Final</th>
                                    <th>Quantidade</th>

                                </tr>

                            </thead>

                        </table>
                    </div>     
      </form>  
    </body>
<?php include_once '../include/include_js.php'; ?>
    <script src="../../js/relatorioJs/populaComboRelAmostra.js"></script>
</html>

