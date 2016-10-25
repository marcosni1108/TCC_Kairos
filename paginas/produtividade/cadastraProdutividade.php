<html>
    <head>
        <title>Kairos</title>
        <?php
          include "../include/include_css.php";
          include "../header/header.php";
        ?>
        <meta charset="UTF-8">
    </head>
    <body >
        <?php
          date_default_timezone_set('America/Sao_Paulo');
          $data_produtividade = date('Y-m-d');
          $funcionario = new Funcionario();
          $produtividade = new Produtividade;
          $func = $funcionario -> whereNome($_SESSION['nome']);
          $IdFuncionario = $func[0] -> id;
          $verificaAtividade = $produtividade -> findAtividadeIniciadas($IdFuncionario);
          $status = $verificaAtividade[0] -> status;
          if($status==null) {
              if(isset($_POST['iniciar'])) {
                  date_default_timezone_set('America/Sao_Paulo');
                  $hora_inicial = date('H:i');
                  $idDepartamento = $_POST['departamento'];
                  $idAtividade = $_POST['atividade'];
                  $cnpj = $_POST['cnpj'];
                  $quantidade = 1;
                  $hora_final = "00:00";
                  $status = 'iniciado';
                  $produtividade -> setData($data_produtividade);
                  $produtividade -> setTempoinicial($hora_inicial);
                  $produtividade -> setTempofinal($hora_final);
                  $produtividade -> setIdDepartamento($idDepartamento);
                  $produtividade -> setIdFuncionario($IdFuncionario);
                  $produtividade -> setIdAtividade($idAtividade);
                  $produtividade -> setQuantidade($quantidade);
                  $produtividade -> setStatus($status);
                  $produtividade -> setTurno(1);
                  $produtividade -> setPercentProd(0);
                  $produtividade -> setTempoProdEfetivo(0);
                  $produtividade -> setCapacidadeTurno(0);

                  if($produtividade -> insert()) {
                      $verificaAtividade = $produtividade -> findAtividadeIniciadas($IdFuncionario);
                      $id = $verificaAtividade[0] -> id;
                      $teste = "produtividadeFinalizar.php?".md5(idFunc)."=".
                              $IdFuncionario."&".md5(idAtividade)."=".$idAtividade.""
                              ."&".md5(idDepartamento)."=".$idDepartamento.""
                              ."&".md5(cnpj)."=".$cnpj.""
                              ."&".md5(id)."=".$id."";
                      echo "<script>alert('Atividade iniciada com sucesso!');"
                      ."window.location='./".$teste."';</script>";
                  }
              }
          } else {
              $idAtividade = $verificaAtividade[0] -> IdAtividade;
              $idDepartamento = $verificaAtividade[0] -> IdDepartamento;
              $IdFuncionario = $verificaAtividade[0] -> IdFuncionario;
              $id = $verificaAtividade[0] -> id;
              $cnpj = 0;
              $teste = "produtividadeFinalizar.php?".md5(idFunc)."=".
                      $IdFuncionario."&".md5(idAtividade)."=".$idAtividade.""
                      ."&".md5(idDepartamento)."=".$idDepartamento.""
                      ."&".md5(cnpj)."=".$cnpj.""
                      ."&".md5(id)."=".$id."";
              echo "<script>alert('Já existe uma atividade iniciada');"
              ."window.location='./".$teste."';</script>";
          }
        ?>
        <main class="mdl-layout__content">
            <div class="col-lg-12">
                <form method="post" action="">
                    <h1 class="page-header text-center">
                        Produtividade
                    </h1>
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="cnpj">Filial</label>
                            <select  class="form-control" name="cnpj" id="cnpj" required>

                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="departamento">Departamento</label>
                            <select  class="form-control" name="departamento" id="cmbDepartamento" required>

                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="atividade">Atividade</label>
                            <select  class="form-control" name="atividade" id="cmbAtividade" required>

                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-4"></div>
                        <div class="form-group col-lg-4 text-center">
                            <input id="btnIniciar"type="submit" name="iniciar" class="btn btn-success" value="Iniciar">
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </body>
    <?php include_once '../include/include_js.php'; ?>
    <script src="cronometro.js"></script>
    <script src="../../js/populaComboProdutiviade.js"></script>
</html>
