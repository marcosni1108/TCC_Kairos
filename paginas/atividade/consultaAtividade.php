
<html>


    
    <head>
        <meta charset="UTF-8">
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
        include "../menu_principal/menu_lateral.php";
        include "../header/header.php";
        include '../include/include_classes.php'; 
        include '../../classes/model/tableAtivi.php';
//              $atividade = new atividade();
//              ?> 




    </head>
    
    <body>
       
        <div id="page-wrapper" style="overflow-x: hidden; padding-left: 250px; height:100%; padding-top: 30px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Alterar Atividade</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">

                        <div class="panel-body">
                             
                           
                            
                            <div class="row">
                                <table id="tbl_Atividade" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Departamento</th>
                                            <th>CNPJ</th>
                                            <th>Unidade de Medida</th>
                                            <th>A&ccedil;&otilde;es</th>
                                        </tr>
                                    </thead>
                                    
                                </table>
                                
                            </div>
                            
                            
                            
                        </div>
                    </div>
                  
                </div>
               
            </div>
        
        </div>

            
        

    </body>
            <?php include_once '../include/include_js.php'; ?>
</html>
