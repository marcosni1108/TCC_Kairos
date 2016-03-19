
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
        <script type="text/javascript" src="../../js/validadores.js"></script>
    </head>
     <?php
        if (isset($_POST['cadastrar'])):

            
            $nome_dept = $_POST['nome_dept'];
            $cnpj = $_POST['cnpj'];
            $lider = $_POST['lider'];
            $gerente = $_POST['gerente'];
            $endereco = $_POST['endereco'];
            
            $departamento = new departamento();
            $departamento->setNome($nome_dept);
            $departamento->setCnpj($cnpj);
            $departamento->setLider($lider);
            $departamento->setGerente($gerente);
            $departamento->setIdEnderecoFK($endereco);
          
            # Insert
            if ($departamento->insert()) {
                echo "<script> alert('Departamento Cadastrado com sucesso')</script>";
            }
            
        endif;
        ?> 
    
    
    <body >
        
 
        <!-- Wrapper da pagina -->
        <div id="page-wrapper" style="overflow-x: hidden; padding-left: 250px; height:100%; padding-top: 30px;">
            <!-- Primeira linha do wrapper -->
            <div class="row" >
                <div class="col-lg-12">
                    <h1 class="page-header">Cadastro de Departamento</h1>
                </div>
            </div>
           
            <div class="row">
                
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <!-- Conteudo dentro de wrapper -->
                        <div class="panel-body">
                            <div id="chart">

                                <form method="post" action="">
                                    <div class="input-prepend">
                                        
                                        <div class="row">
                                                <div class="form-group col-lg-4">
                                                  <label for="nome_dept">Nome Departamento</label>
                                                  <input type="text" class="form-control" id="nome_dept" name="nome_dept" onkeypress="javascript: mascara(this, soLetras);" placeholder="Nome Departamento" required>

                                                </div>

                                                
                                                <div class="form-group col-lg-8">
                                                  <label for="endereco">Endere&ccedil;o</label>
                                                    <select  class="form-control" name="endereco" id="endereco">
                                                      <option value="--" selcted>--</option>  
                                                      <option value="1">Rua Barcelona, 631, São Paulo</option>
                                                      <option value="2">Avenida Otavio Mesquita, 550, Osasco</option>
                                                    </select>
                                                </div> 
                                            
     

                                                <div class="form-group col-lg-4">
                                                  <label for="cnpj">CNPJ</label>
                                                  <input type="text" class="form-control" name="cnpj" id="cnpj" onkeypress="javascript: mascara(this, cnpj_mask);"  maxlength="18" placeholder="CNPJ" required>
                                                </div>              
                                                <div class="form-group col-lg-6">
                                                    <a href="../endereco/consultaEndereco.php">Clique aqui caso endereço não esteja cadastrado.</a>
                                                </div>
                                        </div>    
                                            
                                        <div class="row">
                                                <div class="form-group col-lg-4">
                                                  <label for="lider">Lider</label>
                                                    <select  class="form-control" name="lider" id="lider">
                                                      <option value="--" selcted>--</option>  
                                                      <option value="Eduardo">Eduardo</option>
                                                      <option value="Ricardo">Ricardo</option>
                                                      <option value="Marcos">Marcos</option>
                                                      <option value="Anderson">Anderson</option>
                                                    </select>
                                                </div>     
                                            
                                                <div class="form-group col-lg-4">
                                                  <label for="gerente">Gerente</label>
                                                    <select  class="form-control" name="gerente" id="gerente">
                                                      <option value="--" selcted>--</option>  
                                                      <option value="Ricardo">Ricardo</option>
                                                      <option value="Eduardo">Eduardo</option>
                                                      <option value="Marcos">Marcos</option>
                                                      <option value="Anderson">Anderson</option>
                                                    </select>
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
