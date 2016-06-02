
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <?php
        include "../header/header.php";
        include "../include/include_css.php";
       // include "menu_lateral_administrador.php";
        
        
        ?>        

    </head>
    <body>

        <div id="wrapper">

            <div id="page-wrapper">
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12" style="height:98%;">
                            <h1 class="page-header">
                              <div >
                                <h1 class="text-center"><?php echo 'Bem vindo(a):'?> <?php echo $logado ?></h1>
                             </div>
                            </h1>
                            <img src="../../imagens/indice.jpg"  height="200" width="200" style="position: absolute; 
                                left: 400px; /* posiciona a 90px para a esquerda */ 
                                top: 300px; /* posiciona a 70px para baixo */"> 

                        </div>
                        
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>        

        <?php
        include "../include/include_js.php";
        ?>        

    </body>
</html>
