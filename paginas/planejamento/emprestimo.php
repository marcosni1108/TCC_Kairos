<html>
    <head>
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
     //   include "../menu_principal/menu_lateral.php";
        include "../header/header.php";
        include "../../classes/model/validaOperario.php";
//        include '../include/include_classes.php';
        
   
        
        ?>   

        <link href="emprestimo_css.css" rel="stylesheet">
        <script type="text/javascript" src="../../js/validadores.js"></script>
    </head>
    <body >
        <meta charset="UTF-8">
        <?php
        session_start();
        $departamento = new departamento(); 
        $id = $_SESSION['departamento'];
        $departamento->setId($id);
        $resultado = $departamento->find($id);
        ?>  
        <script>
            window.end = <?=$id?>;
        </script>
        <div id="wrapper">
           <div class="col-lg-12">
                <form method="post" action="">
                    <div class="input-prepend">
            <div class="container-fluid">
                
                    <div class="input-prepend">
                        <h1 class="page-header">
                            Emprestimo de Funcionário
                        </h1>                     
                        <div class="row">
                            <div class="col-md-6">
                                <h4><?php echo '<label for="expdicao">Departamento: '.$resultado->nome.'</label>'; ?></h4>
                            </div>
                                
                        </div>    
                        </div>
                        <div class="row">
                            <div class="col-lg-6"></div>
                            <div class="form-group col-lg-5">
                                <label for="cnpj">CNPJ</label>
                                <select  class="form-control" name="cnpj" id="cnpj" required>                                                  
                                   <option value="">Selecione o CNPJ</option>
                                </select> 
                                <label for="departamento">Departamento</label>
                                <select  class="form-control" name="departamento" id="cmbDepartamento" required>                                                  
                                   <option value="">Selecione o Departamento</option>
                                </select>
                            </div> 
                        </div>
                        <div class="row">
			<div class="container">
			<div class="row">

			<div class="col-sm-4 col-sm-offset-0">
								
                          <div class="list-group" id="list1">
                              <a href="#" class="list-group-item active">Departamento de:  <input title="toggle all" type="checkbox" class="all pull-right"></a>
                          </div>
		        </div>
                            <div class="col-md-2" style=" min-height:200px;display: flex;justify-content:center;flex-flow: column wrap;">
                                <button type="button" title="Emprestar" class="btn btn-default center-block add"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                    <button type="button" title="Remover" class="btn btn-default center-block remove"><i class="glyphicon glyphicon-chevron-left"></i></button>
                            </div>
                            <div class="col-sm-4">

                              <div class="list-group" id="list2">
                              <a href="#" class="list-group-item active">Departamento para: <input title="toggle all" type="checkbox" class="all pull-right"></a>
                             
                              </div>
                            </div>
                          </div>
                        </div>  
                        </div>    
                        <div class="row">
                            <div class="form-group col-lg-4">
                            </div>
                            <div class="form-group col-lg-2">
                                <input type="button" id="emprestar" name="cadastrar" class="btn btn-success" value="Finalizar">
                            </div>    
                        </div>
                    </div>
                
            </div> 
        </div>
      </form>    
     </div>   
</div>            
    </body>
     
    <?php include_once '../include/include_js.php'; ?>
    <script type="text/javascript" src="emprestimo.js"></script>
    <script src="../../js/populaComboAtividade.js"></script>
    <script src="../../js/emprestimo/populaGrid.js"></script>
</html>
	