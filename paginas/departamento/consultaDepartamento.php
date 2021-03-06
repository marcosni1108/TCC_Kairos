<html>
    <head>
        <meta charset="UTF-8">
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
        include "../header/header.php";
        include "../../classes/model/validaOperario.php";
        include '../../classes/table/tableDept.php';
        include "../../classes/model/validaLider.php";        
        ?>
    </head>
    <body>
        <main class="mdl-layout__content">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header text-center">Alterar Departamento</h1>
                    </div>
                </div>
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <table id="tbl_Dept" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="2%">Nome</td>
                                                <td width="15%">Endere&ccedil;o</td>
                                                <td width="15%">Nome Filial</td>
                                                <td>Lider</td>
                                                <td>Gerente</td>
                                                <td style="width: 190px;">A&ccedil;&otilde;es</td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </main>
    </body>
    <?php include_once '../include/include_js.php'; ?>
    <script src="../../js/data.js"></script>
</html>
