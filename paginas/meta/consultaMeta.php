<html>    
    <head>
        <meta charset="UTF-8">
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
        include "../header/header.php";
        include "../../classes/model/validaOperario.php";
        $funcionario = new funcionario();
        ?> 
    </head>
    <body>
         <main class="mdl-layout__content">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Metas</h1>
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

                                        <div class="form-group col-lg-4">
                                            <a href="cadastroMeta.php"><input type="button" name="incluir" class="btn btn-primary" value="Incluir"></a>
                                        </div> 
                                    </div>                                  
                                </div>
                                <div class="row">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <td>Qtd. Amostra</td>
                                                <td>Resultado da Metrica</td>
                                                <td>Acrescimo</td>
                                                <td>Meta</td>
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
                                                    <td>
                                                        <?php echo "<a href='editarMeta.php?acao=editar&matricula=" . $value->matricula . "'>Editar</a>"; ?>
                                                        <?php echo "<a href='inativarDepartamento.php?acao=deletar&matricula=" . $value->matricula . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
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
        </main>
    </body>
    <?php include_once '../include/include_js.php'; ?>
</html>
