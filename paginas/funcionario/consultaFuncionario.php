
<html>


    
    <head>
        <meta charset="UTF-8">
        <title>Kairos</title>
        <?php 
        include "../include/include_css.php";
        include "../menu_principal/menu_lateral.php";
        include "../header/header.php";
        include '../include/include_classes.php';
        
        $funcionario = new funcionario();
        ?>
        



    </head>
    
    <body >
       
        <div id="page-wrapper" style="overflow-x: hidden; padding-left: 250px; height:100%; padding-top: 30px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Alterar Funcionario</h1>
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
                                            <td>Matricula</td>
                                            <td>Nome</td>
                                            <td>CPF</td>
                                            <td>Email</td>
                                            <td>Login</td>
                                            <td>Senha</td>
                                            <td>Nivel</td>
                                            <td>A&ccedil;&otilde;es</td>
                                        </tr>
                                    </thead>
                                    <?php foreach ($funcionario->findAll() as $key => $value): ?>
                                    <tbody>
                                       <tr>
                                            <td><?php echo $value->matricula; ?></td>
                                            <td><?php echo $value->nome; ?></td>
                                            <td><?php echo $value->cpf; ?></td>
                                            <td><?php echo $value->email; ?></td>
                                            <td><?php echo $value->login; ?></td>
                                            <td><?php echo $value->senha; ?></td>
                                            <td><?php echo $value->nivel; ?></td>

                                            <td>
                                                <?php echo "<a href='editarFuncionario.php?acao=editar&id=" . $value->id . "'>Editar</a>"; ?>
                                                <?php echo "<a href='inativarFuncionario.php?acao=deletar&id=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
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
