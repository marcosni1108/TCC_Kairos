
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <?php
        include "../header/header.php";
        include "../include/include_css.php";
        include "menu_lateral.php";
        
        
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
                                Bem vindo! <?php echo $logado ?>
                            </h1>

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
