
<html>


    
    <head>
        <meta charset="UTF-8">
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
        include "../menu_principal/menu_lateral.php";
        include "../header/header.php";
        include '../include/include_classes.php';  
          
              $departamento = new departamento();
              ?> 




    </head>
    
    <body>
       
        <div id="page-wrapper" style="overflow-x: hidden; padding-left: 250px; height:100%; padding-top: 30px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Alterar Departamento</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">

                        <div class="panel-body">
                             
                            <div class="row">
                                    <div class="form-group col-lg-6">

                                            <input type="pesquisar" class="form-control" id="pesquisar" placeholder="Pesquisar">
                                    </div>       
                                    <div class="form-group col-lg-4">
                                            <div class="form-group col-lg-4">
                                                <input type="submit" name="pesquisar" class="btn btn-success" value="Pesquisar">
                                            </div> 
                                    </div>                                 
                            </div>
                            
                            <div class="row">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td>Nome</td>
                                            <td>Endere&ccedil;o</td>
                                            <td>CNPJ</td>
                                            <td>Lider</td>
                                            <td>Gerente</td>
                                            
                                        </tr>
                                    </thead>
                                    <?php foreach ($departamento->findAll() as $key => $value): ?>
                                    <tbody>
                                       <tr>
                                            <td><?php echo $value->nome; ?></td>
                                             <td><?php echo $value->idEnderecoFK; ?></td>
                                            <td><?php echo $value->cnpj; ?></td>
                                            <td><?php echo $value->lider; ?></td>
                                            <td><?php echo $value->gerente; ?></td>
                                            

                                            <td>
                                                <?php echo "<a href='editarDepartamento.php?acao=editar&idDept=" . $value->id . "'>Editar</a>"; ?>
                                                <?php echo "<a href='inativarDepartamento.php?acao=deletar&idDept=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php endforeach; ?>
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
