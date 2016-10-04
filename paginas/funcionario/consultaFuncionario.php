<html>
    <head>
        <meta charset="UTF-8">
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
        include "../header/header.php";
        include "../../classes/model/validaOperario.php";
        include '../../classes/table/tableFunc.php';
        ?>
    </head>
    <body >
        <main class="mdl-layout__content">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header text-center">Alterar Funcionário</h1>
                    </div>
                </div>
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <table id="func" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th width="1%">CPF</th>
                                                <th width="1%">Email</th>
                                                <th>Nivel</th>
                                                <th>Login</th>
                                                <th>Matricula</th> 
                                                <th>Departamento</th>
                                                <th>A&ccedil;&otilde;es</th>
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
</html>