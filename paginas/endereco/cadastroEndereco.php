
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
        
          if (isset($_POST['cadastrar'])):

            $cep = $_POST['cep'];
            $rua = $_POST['rua'];
            $cnpj = $_POST['cnpj'];
            $numero = $_POST['numero'];
            
                
            $endereco = new endereco();
            $endereco->setCep($cep);
            $endereco->setRua($rua);
            $endereco->setNumero($numero);
            $endereco->setCnpj($cnpj);

            # Insert
            if ($endereco->insert()) {
                echo "<script> alert('Cadastrado com sucesso')</script>";
            }else{
                echo "<script> alert('Não foi possivel cadastrar esse endereço, esse CNPJ já esta cadastrado.')</script>";
            }
            
        endif;
        ?>        
      
     
        
        
        
        

        <!-- Wrapper da pagina -->
        <div id="page-wrapper" style="overflow-x: hidden; padding-left: 250px; height:100%; padding-top: 30px;">
            <!-- Primeira linha do wrapper -->
            <div class="row" >
                <div class="col-lg-12">
                    <h1 class="page-header">Cadastro de Endere&ccedil;o</h1>
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
                                                  <label for="cep">CEP</label>
                                                  <input type="text" class="form-control" id="nome_dept" onkeypress="javascript: mascara(this, cep_mask);" maxlength="9" name="cep" placeholder="CEP" required>

                                                </div>

                                                
                                                <div class="form-group col-lg-8">
                                                  <label for="endereco">Endere&ccedil;o</label>
                                                  <input type="text" class="form-control" name="rua" id="endereco" placeholder="Endereco" required>
                                                </div> 
     

                                                <div class="form-group col-lg-4">
                                                  <label for="numero">Numero</label>
                                                  <input type="text" class="form-control" name="numero" id="numero"onkeypress="javascript: mascara(this, soNumeros);" placeholder="Numero" required>
                                                </div>              
                                                <div class="form-group col-lg-4">
                                                  <label for="cnpj">CNPJ</label>
                                                  <input type="text" class="form-control" name="cnpj" id="cnpj" onblur="javascript: validarCNPJ(this.value);" onkeypress="javascript: mascara(this, cnpj_mask);"  maxlength="18" placeholder="CNPJ" required>
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
