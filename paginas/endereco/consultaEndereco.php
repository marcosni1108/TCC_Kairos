
<html>


    
    <head>
        <meta charset="UTF-8">
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
       // include "../menu_principal/menu_lateral.php";
        include "../header/header.php";
        include "../../classes/model/validaOperario.php";
        include "../../classes/model/validaLider.php";
//        include '../include/include_classes.php';
        include '../../classes/model/tableEnd.php';
        
//              $endereco = new endereco();
//              ?> 




    </head>
    
    <body>
       
        <div id="page-wrapper" style="overflow-x: hidden; padding-left: 250px; height:100%; padding-top: 30px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Endere&ccedil;o</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">

                        <div class="panel-body">
                             
                            <div class="row">
      
                                    <div class="form-group col-lg-4">
    
                                            <div class="form-group col-lg-4">
                                                <a href="cadastroEndereco.php"><input type="button" name="incluir" class="btn btn-primary" value="Incluir Novo Endere&ccedil;o"></a>
                                            </div> 
                                    </div>                                  
                            </div>
                            
                            <div class="row">
                                <table id="tbl_Endereco" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>CEP</th>
                                            <th>Endere&ccedil;o</th>
                                            <th>CNPJ</th>
                                            <th>Numero</th>
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
