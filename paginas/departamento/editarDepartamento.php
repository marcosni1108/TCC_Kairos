
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
    
    
    <body >
        
            <?php
            
                $id = (int) $_GET['idDept'];
                           
            
              $departamento = new departamento(); 
            if (isset($_POST['atualizar'])):

                
            $nome_dept = $_POST['nome_dept'];
            $cnpj = $_POST['cnpj'];
            $lider = $_POST['lider'];
            $gerente = $_POST['gerente'];
            $endereco = $_POST['endereco'];
          
         
            $departamento->setNome($nome_dept);
            $departamento->setCnpj($cnpj);
           
            $departamento->setLider($lider);
            $departamento->setGerente($gerente);
            $departamento->getIdEnderecoFK($endereco);
            $departamento->setId($id);

                if ($departamento->update($id)) {
                    echo "<script>alert('Departamento Atualizado!')</script>";
                }

            endif;
            ?>  

        <!-- Wrapper da pagina -->
        <div id="page-wrapper" style="overflow-x: hidden; padding-left: 250px; height:100%; padding-top: 30px;">
            <!-- Primeira linha do wrapper -->
            <div class="row" >
                <div class="col-lg-12">
                    <h1 class="page-header">Editar Departamento</h1>
                </div>
            </div>
           
            <div class="row">
                
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <!-- Conteudo dentro de wrapper -->
                        <div class="panel-body">
                            <div id="chart">
                                <?php $resultado = $departamento->find($id);  ?> 
                                <form method="post" action="">
                                    <div class="input-prepend">
                                        
                                        <div class="row">
                                                <div class="form-group col-lg-4">
                                                  <label for="nome_dept">Nome Departamento</label>
                                                  <input type="text" class="form-control" id="nome_dept" value="<?php echo $resultado->nome; ?>" name="nome_dept" onkeypress="javascript: mascara(this, soLetras);" placeholder="Nome Departamento" required>

                                                </div>

                                                
                                                <div class="form-group col-lg-8">
                                                  <label for="endereco">Endere&ccedil;o</label>
                                                    <select  class="form-control" name="endereco" id="endereco">
                                                      <option value="<?php echo $resultado->idEnderecoFK; ?>" selcted><?php echo $resultado->idEnderecoFK; ?></option>  
                                                      <option value="1">Rua Barcelona, 631, São Paulo</option>
                                                      <option value="2">Avenida Otavio Mesquita, 550, Osasco</option>
                                                    </select>
                                                </div> 
     

                                                <div class="form-group col-lg-4">
                                                  <label for="cnpj">CNPJ</label>
                                                  <input type="text" class="form-control" name="cnpj" onkeypress="javascript: mascara(this, cnpj_mask);" value=" <?php echo $resultado->cnpj; ?>" id="cnpj" placeholder="CNPJ" required>
                                                </div>     
                                            
                                                <div class="form-group col-lg-6">
                                                    <a href="../endereco/consultaEndereco.php">Clique aqui caso endereço não esteja cadastrado.</a>
                                                </div>
                                              
                                            
                                        </div>    
                                        
                                        <div class="row">
                                             
                                        
                                                <div class="form-group col-lg-4">
                                                  <label for="lider">Lider</label>
                                                    <select  class="form-control" name="lider" id="lider">
                                                      <option value="<?php echo $resultado->lider; ?>" selcted><?php echo $resultado->lider; ?></option>  
                                                      <option value="Administrador">Eduardo</option>
                                                      <option value="Gerente">Ricardo</option>
                                                      <option value="Supervisor">Marcos</option>
                                                      <option value="Operador">Anderson</option>
                                                    </select>
                                                </div>     
                                            
                                                <div class="form-group col-lg-4">
                                                  <label for="gerente">Gerente</label>
                                                    <select  class="form-control" name="gerente" id="gerente">
                                                      <option value="<?php echo $resultado->gerente; ?>" selcted><?php echo $resultado->gerente; ?></option>  
                                                      <option value="Administrador">Ricardo</option>
                                                      <option value="Gerente">Eduardo</option>
                                                      <option value="Supervisor">Marcos</option>
                                                      <option value="Operador">Anderson</option>
                                                    </select>
                                                </div>                                             
                                        </div>
    
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <input type="submit" name="atualizar" class="btn btn-success" value="atualizar dados">
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
