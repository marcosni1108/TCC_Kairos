
<html>
    <head>
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
        include "../menu_principal/menu_lateral.php";
        include "../header/header.php";
        include '../include/include_classes.php';
        ?>   
        <meta charset="UTF-8">
       
    </head>
    
    
    <body >
        
            <?php
            
            
                $id = (int) $_GET['matricula'];
              $funcionario = new funcionario(); 
            
            if (isset($_POST['atualizar'])):

                
                $matricula = $_POST['matricula'];
                $nome = $_POST['nome'];
                $cpf = $_POST['cpf'];
                $email = $_POST['email'];
                $login = $_POST['login'];
                $senha = $_POST['senha'];
                $nivel = $_POST['nivel'];



                $funcionario->setMatricula($matricula);
                $funcionario->setNome($nome);
                $funcionario->setCpf($cpf);
                $funcionario->setEmail($email);
                $funcionario->setLogin($login);
                $funcionario->setSenha($senha);
                $funcionario->setNivel($nivel);


                if ($funcionario->update($matricula)) {
                    echo "Atualizado com sucesso!";
                }

            endif;
            ?>       
        
        
        
        

        <!-- Wrapper da pagina -->
        <div id="page-wrapper" style="overflow-x: hidden; padding-left: 250px; height:100%; padding-top: 30px;">
            <!-- Primeira linha do wrapper -->
            <div class="row" >
                <div class="col-lg-12">
                    <h1 class="page-header">Editar Endere&ccedil;o</h1>
                </div>
            </div>
           
            <div class="row">
                
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <!-- Conteudo dentro de wrapper -->
                        <div class="panel-body">
                            <div id="chart">
                            <?php $resultado = $funcionario->find($id);  ?>           
                                <form method="post" action="">
                                    <div class="input-prepend">
                                        
                                        <div class="row">
                                                <div class="form-group col-lg-4">
                                                  <label for="cep">CEP</label>
                                                  <input type="text" class="form-control" value="<?php echo $resultado->nome; ?>" id="nome_dept" name="cep" placeholder="CEP" required>

                                                </div>

                                                
                                                <div class="form-group col-lg-8">
                                                  <label for="endereco">Endere&ccedil;o</label>
                                                  <input type="text" class="form-control" value="<?php echo $resultado->nome; ?>" name="endereco" id="cnpj" placeholder="Endereco" required>
                                                </div> 
     

                                                <div class="form-group col-lg-4">
                                                  <label for="numero">Numero</label>
                                                  <input type="text" class="form-control" value="<?php echo $resultado->nome; ?>" name="numero" id="cnpj" placeholder="Numero" required>
                                                </div>              
                                                <div class="form-group col-lg-4">
                                                  <label for="cnpj">CNPJ</label>
                                                  <input type="text" class="form-control" value="<?php echo $resultado->nome; ?>" name="cnpj" id="cnpj" placeholder="CNPJ" required>
                                                </div>  
                                           
                                        </div>
    
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <input type="submit" name="cadastrar" class="btn btn-success" value="Cadastrar dados">
                                            </div>    
                                        </div>

                                        
                                            <!-- Modal -->
                                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                                                  </div>
                                                  <div class="modal-body">
                                                    ...
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>                                        
                                        
                                        
                                        
                                        
                                    </div>
                                    					
                                </form>                                
                                
                            </div>
                        </div>
                    </div>
                  
                </div>
               
            </div>
        
        </div>         

    </body>
            <?php include_once '../include/include_js.php'; ?>
</html>
