<html>
    <head>
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
   //     include "../menu_principal/menu_lateral.php";
        include "../header/header.php";
        include "../../classes/model/validaOperario.php";
  //      include '../include/include_classes.php';
        ?>   
        <link href="../../css/sb-admin.css" rel="stylesheet">
        <meta charset="UTF-8">
    </head>
    <body >
        <?php
        $id = (int) $_GET[md5('id')];
        
        $parada = new tipo_parada();
        
        if (isset($_POST['atualizar'])):


            $nome = $_POST['nome_parada'];
            $tipo_parada = $_POST['tipo_parada'];
            $descricao = $_POST['descricao'];
            $IdDeptoFK = $_POST['departamento'];

           
            $parada->setNome($nome);
            $parada->setTipoParada($tipo_parada);
            $parada->setDescricao($descricao);
            $parada->setIdDeptoFK($IdDeptoFK);


            # Insert
                if ($parada->update($id)) {
                    echo "<script>alert('Parada Atualizada!')</script>";
                }else{
                     echo "<script>alert('Não foi possivel atualizar a parada!')</script>";
                }
            
        endif;
        ?>        
        <div id="wrapper" >
            <div class="container-fluid">
                <?php $resultado = $parada->find($id);  ?>
                <form method="post" action="">
                    <div class="input-prepend">
                        <h1 class="page-header">
                            Editar Parada
                        </h1>                     
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label for="nome_parada">Nome da Parada</label>
                                <input type="text" class="form-control" id="nome_parada" name="nome_parada" value="<?php echo $resultado->Nome; ?>"placeholder="Nome da Parada" required>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="tipo_parada">Tipo da Parada</label>
                                <select class="form-control" name="tipo_parada" id="tipo_parada">
                                    <option value="<?php echo $resultado->TipoParada; ?>"><?php echo $resultado->TipoParada; ?></option>
                                    <option value="Direta">Direta</option>
                                    <option value="Indireta">Indireta</option>
                                </select>
                            </div>      
                                      
                        </div>
                        <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="departamento">Departamento</label>
                            <select  class="form-control" name="departamento" id="departamentoEditAtividade">
                                <option value="<?php $departamento = new departamento;
                                    $dept = $departamento->find($resultado->IdDeptoFK); echo $dept->id; ?>" selected>
                                    <?php echo $dept->nome; ?></option>  
                                 <?php
                                foreach ($departamento->whereSelectedEnd($dept->id) as $key => $value):   ?>
                                <option value="<?php echo $value->id; ?>" selcted><?php echo $value->nome; ?></option> 

                                <?php endforeach; ?>
                            </select>
                        </div>     

                        <div class="form-group col-lg-4">
                              <label for="cnpj">CNPJ</label>
                              <input type="text" class="form-control" name="cnpj"  value="<?php 
                                $endereco = new endereco; $cnpj = $endereco->find($dept->idEnderecoFK); 
                                echo $cnpj->cnpj; ?>" id="cnpjEditAtividade" placeholder="CNPJ" readonly>
                            </div>                             
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-8">
                                    <label for="descricao">Descrição</label>
                                    <textarea type="text" class="form-control" id="descricao" rows="4"  cols="550" name="descricao" placeholder="Descrição" required><?php echo $resultado->Descricao; ?></textarea>
                            </div>  
                        </div>
    
                        <div class="form-group col-lg-3"></div>
                        <div class="form-group col-lg-4">
                            <input id="cadastrar"type="submit" name="atualizar" class="btn btn-success" value="Atualizar Dados">
                        </div>                        
                    </div>
                </form>  
            </div> 
        </div>
    </body>
    <?php 
    
    include_once '../include/include_js.php'; ?>
        <script src="../../js/populaComboParada.js"></script>
</html>
