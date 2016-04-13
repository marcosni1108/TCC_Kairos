
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
            $departamento->setIdEnderecoFK($endereco);
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
                                                    <select  class="form-control" name="endereco" id="enderecoEdit">
                                                      <option value="<?php $endereco = new endereco; $end = $resultado->idEnderecoFK; $ender = $endereco->find($end); echo $resultado->idEnderecoFK; ?>" selected><?php echo $ender->endereco." Nº: ".$ender->numero; ?></option>  
                                                        <?php foreach ($endereco->whereSelectedEnd($end) as $key => $value): ?>
                                                        <option value="<?php echo $value->id; ?>">
                                                        <?php echo $value->endereco."Nº: ".$value->numero; ?></option> 
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div> 
     

                                                <div class="form-group col-lg-4">
                                                  <label for="cnpj">CNPJ</label>
                                                  <input type="text" class="form-control" name="cnpj"  value=" <?php echo $resultado->cnpj; ?>" id="cnpjEdit" placeholder="CNPJ" readonly>
                                                </div>     
                                            
                                                <div class="form-group col-lg-6">
                                                    <a href="../endereco/consultaEndereco.php">Clique aqui caso endereço não esteja cadastrado.</a>
                                                </div>
                                              
                                            
                                        </div>    
                                        
                                        <div class="row">
                                             
                                        
                                                <div class="form-group col-lg-4">
                                                  <label for="lider">Lider</label>
                                                    <select  class="form-control" name="lider" id="liderEdit">
                                                        <option value="<?php $usuario = new funcionario(); $lider = $usuario->find($resultado->lider); echo $lider->id; ?>" selected><?php echo $lider->nome; ?></option>  
                                                        
                                                        <?php foreach ($usuario->whereSelected('lider',$resultado->lider) as $key => $value): ?>
                                                        <option value="<?php echo $value->id; ?>">
                                                        <?php echo $value->nome; ?></option> 
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>     
                                            
                                                <div class="form-group col-lg-4">
                                                  <label for="gerente">Gerente</label>
                                                    <select  class="form-control" name="gerente" id="gerenteEdit">
                                                       <option value="<?php $usuario = new funcionario(); $gerente = $usuario->find($resultado->gerente); echo $lider->id; ?>" selected><?php echo $gerente->nome; ?></option>  
                                                        
                                                        <?php foreach ($usuario->whereSelected('Gerente',$resultado->gerente) as $key => $value): ?>
                                                        <option value="<?php echo $value->id; ?>">
                                                        <?php echo $value->nome; ?></option> 
                                                        <?php endforeach; ?>
                                                      
                                                    </select>
                                                </div>                                             
                                        </div>
    
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <input id="btnCadastrar" type="submit" name="atualizar" class="btn btn-success" value="Atualizar Dados">
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
      <script src="../../js/populaCombo.js"></script>
</html>
