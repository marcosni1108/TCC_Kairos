<html>
    <head>
        <title>Kairos</title>
        <?php
          include "../include/include_css.php";
          include "../header/header.php";
          include "../../classes/model/validaOperario.php";
        ?>
        <link href="../../css/sb-admin.css" rel="stylesheet">
        <meta charset="UTF-8">
    </head>
    <body >
        <?php
          if(isset($_POST['cadastrar'])):
              $nome = $_POST['nome_parada'];
              $tipo_parada = $_POST['tipo_parada'];
              $descricao = $_POST['descricao'];
              $IdDeptoFK = $_POST['departamento'];
              $parada = new tipo_parada();
              $parada -> setNome($nome);
              $parada -> setTipoParada($tipo_parada);
              $parada -> setDescricao($descricao);
              $parada -> setIdDeptoFK($IdDeptoFK);
              # Insert
              if($parada -> insert()) {
                  echo "<script> alert('Tipo de Parada cadastrada com sucesso')</script>";
              }
          endif;
        ?>
        <div id="wrapper" >
            <div class="container-fluid">
                <form method="post" action="">
                    <div class="input-prepend">
                        <h1 class="page-header">
                            Cadastro de Parada
                        </h1>
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label for="nome_parada">Nome da Parada</label>
                                <input type="text" class="form-control" id="nome_parada" name="nome_parada" placeholder="Nome da Parada" required>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="tipo_parada">Tipo da Parada</label>
                                <select class="form-control" name="tipo_parada" id="tipo_parada">
                                    <option value="Direta">Direta</option>
                                    <option value="Indireta">Indireta</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label for="cnpj">CNPJ</label>
                                <select  class="form-control" name="cnpj" id="cnpj" required>
                                    <option value="">Selecione o CNPJ</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="departamento">Departamento</label>
                                <select  class="form-control" name="departamento" id="cmbDepartamento" required>
                                    <option value="">Selecione o Departamento</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-8">
                                <label for="descricao">Descrição</label>
                                <textarea type="text" class="form-control" id="descricao" rows="4" cols="550" name="descricao" placeholder="Descrição" required></textarea>
                            </div>
                        </div>
                        <div class="form-group col-lg-3"></div>
                        <div class="form-group col-lg-4">
                            <input id="cadastrar"type="submit" name="cadastrar" class="btn btn-success" value="Cadastrar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
    <?php include_once '../include/include_js.php'; ?>
    <script src="../../js/populaComboParada.js"></script>
</html>
