
<html>
    <head>
        <title>Kairos</title>
        <?php
          include "../include/include_css.php";
          include "../header/header.php";
          include "../../classes/model/validaOperario.php";
        ?>
        <meta charset="UTF-8">
        <script type="text/javascript" src="../../js/validadores.js"></script>
    </head>
    <body>
        <?php
          $id = (int) $_GET[md5('id')];
          $atividade = new atividade();
          if(isset($_POST['atualizar'])):
              $nome = $_POST['nome_ativ'];
              $descricao = $_POST['descricao'];
              $idDepartamentoFK = $_POST['departamento'];
              $cnpj = $_POST['cnpj'];
              $unid_med = $_POST['unid_med'];
              $idDepartamentoOld = $_POST['departamento'];
              $atividade = new atividade();
              $atividade -> setNome($nome);
              $atividade -> setDescricao($descricao);
              $atividade -> setIdDepartamentoFK($idDepartamentoFK);
              $atividade -> setUnid_med($unid_med);
              # Insert
              if($atividade -> update($id)) {
                  echo "<script> alert('Atividade alterada com sucesso.')</script>";
              }

          endif;
        ?>
        <!-- Wrapper da pagina -->
        <main class="mdl-layout__content">
            <div class="col-lg-12">
                <!-- Primeira linha do wrapper -->
                <div class="row" >
                    <div class="col-lg-12">
                        <h1 class="page-header">Editar Atividade</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="panel panel-default">
                            <!-- Conteudo dentro de wrapper -->
                            <div class="panel-body">
                                <div id="chart">
                                    <?php $resultado = $atividade -> find($id); ?>
                                    <form method="post" action="">
                                        <div class="input-prepend">
                                            <div class="row">
                                                <div class="form-group col-lg-4">
                                                    <label for="nome_ativ">Nome da Atividade</label>
                                                    <input type="text" class="form-control" value="<?php echo $resultado -> nome; ?>" onkeypress="javascript: mascara(this, soLetras);" id="nome_ativ" name="nome_ativ" placeholder="Nome Atividade" required>
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label for="unid_med">Tipo da Unidade de Medida</label>
                                                    <select  class="form-control" name="unid_med" id="unid_med">
                                                        <option value="<?php echo $resultado -> unid_med; ?>" selcted><?php echo $resultado -> unid_med; ?></option>
                                                        <option value="Caixa">Caixa</option>
                                                        <option value="Documento">Documento</option>
                                                        <option value="Regua">Regua</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-4">
                                                    <label for="cnpj">Filial</label>
                                                    <select  class="form-control" name="cnpj" id="cnpjEdit" required>
                                                        <?php
                                                          $departamento1 = new departamento();
                                                          $deptCnpj = $departamento1 -> findEndDept($resultado -> idDepartamentoFK);
                                                        ?>
                                                        <option value="<?php echo $deptCnpj -> id ?>">
                                                            <?php echo $deptCnpj -> nomeFilial ?>
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label for="departamento">Departamento</label>
                                                    <select  class="form-control" name="departamento" id="cmbDepartamentoEdit" required>
                                                        <option value="<?php echo $resultado -> idDepartamentoFK; ?>"><?php
                                                              $departamento = new departamento();
                                                              $detp = $departamento -> find($resultado -> idDepartamentoFK);
                                                              echo $detp -> nome
                                                            ?></option>
                                                    </select>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-lg-8">
                                                        <label for="descricao">Descri&ccedil;&atilde;o</label><br>
                                                        <textarea id="descricao"  name="descricao" rows="4" cols="50"><?php echo $resultado -> descricao; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-4">
                                                </div>
                                                <div class="form-group col-lg-4 text-center">
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
        </main>
    </body>
    <?php include_once '../include/include_js.php'; ?>
    <script src="../../js/populaComboAtividade.js"></script>
</html>
