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
        <div id="page-wrapper" style="overflow-x: hidden; padding-left: 250px; height:100%; padding-top: 0px;">
            <!-- Primeira linha do wrapper -->
            <div class="row" >
                <div class="col-lg-12">
                    <h1 class="page-header">Relatório de Amostra</h1>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-3">
                    <label for="cnpj">CNPJ</label>
                    <select  class="form-control" name="cnpj" id="cnpj" required>                                                  

                    </select>
                </div>
                <div class="form-group col-lg-3">
                    <label for="departamento">Departamento</label>
                    <select  class="form-control" name="departamento" id="cmbDepartamento" required>                                                  

                    </select>
                </div>      
                <div class="form-group col-lg-3">
                    <label for="atividade">Atividade</label>
                    <select  class="form-control" name="atividade" id="cmbAtividade" required>                                                  

                    </select>
                </div>
                <div class="form-group col-lg-2">
                    <input id="btnPesquisar" type="button" name="pesquisar" class="btn btn-info" value="Pesquisar" style="margin-top:25px;">
                </div>                
            </div>  
            <div style="padding-bottom:0px; height:0%">
                    <table id="tbl_Amostra" class="table table-bordered">
                        <thead>
                            <tr>

                                <th>Hora Inicial</th>
                                <th>Hora Final</th>
                                <th>Quantidade</th>
                                <th>Indice</th>

                            </tr>

                        </thead>
                        <tbody id="corpo">
                            
                        </tbody>

                    </table>
                </div> 
            </div>
                 
          </form>  
    </body>
<?php include_once '../include/include_js.php'; ?>
    <script src="../../js/relatorioJs/populaComboRelAmostra.js"></script>
    <script src="../../js/relatorioJs/populaTable.js"></script>
</html>

