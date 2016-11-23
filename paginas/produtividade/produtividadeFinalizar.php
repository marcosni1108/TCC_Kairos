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
          $produtividade = new Produtividade;
          $idfunc = (int) $_GET[md5(idFunc)];
          $idAtividade = (int) $_GET[md5(idAtividade)];
          $idDep = (int) $_GET[md5(idDepartamento)];
          $cnpj = $_GET[md5(cnpj)];
          $id = $_GET[md5(id)];
          if($_POST['cancelarAtiv']==='true') {
              $verificaAtividade = $produtividade -> findAtividadeIniciadas($idfunc);
              $id = $verificaAtividade[0] -> id;
              if($produtividade -> delete($id)) {
                  echo "<script>alert('Atividade Cancelada.');"
                  ."window.location='./cadastraProdutividade.php';</script>";
              } else {
                  echo "<script>alert('Não foi possivel cancelar a atividade.');"
                  ."</script>";
              }
          } else if(isset($_POST['parar'])) {
              date_default_timezone_set('America/Sao_Paulo');
              $quantidade = $_POST['quantidade'];
              $funcionario = new Funcionario();
              $func = $funcionario -> whereNome($_SESSION['nome']);
              $meta = new Meta();
              $result_meta = $meta -> findMeta($idDep, $idAtividade);
              $acrescimo_meta = $result_meta[0] -> AcrescimoMeta;
              $capacidade_turno = 3600/$acrescimo_meta;
              $percent_prod = $quantidade/$capacidade_turno;
              $tempo_prod_efetivo = ($percent_prod*3600)/100;
              $tempo_prod_efetivo = $tempo_prod_efetivo*100;
              $capacidade_turno = number_format($capacidade_turno, 2, ".", "");
              $percent_prod = $percent_prod*100;
              $percent_prod = number_format($percent_prod, 2, ".", "");
              $hora_final = date('H:i');
              $status = 'finalizado';
              //verifica turno
              $turnoObj = new Turno();
              $turno = $turnoObj -> verificaTurno($hora_final);
              $IdFuncionario = $func[0] -> id;
              $produtividade -> setTurno($turno);
              $produtividade -> setQuantidade($quantidade);
              $produtividade -> setPercentProd($percent_prod);
              $produtividade -> setTempoProdEfetivo($tempo_prod_efetivo);
              $produtividade -> setCapacidadeTurno($capacidade_turno);
              $produtividade -> setTempofinal($hora_final);
              $produtividade -> setStatus($status);

              if($produtividade -> update($id)) {
                  echo "<script>alert('Atividade Finalizada!');"
                  ."window.location='./cadastraProdutividade.php';</script>";
              }
          }
        ?>
        <main class="mdl-layout__content">
            <div class="col-lg-12">
                <div class="container-fluid">
                    <form method="post" action="">
                        <div class="input-prepend">
                            <h1 class="page-header text-center">
                                Finalizar Produtividade
                            </h1>
                            <?php
                              $departamentoclass = new Departamento();
                              $atividadeclass = new Atividade();
                              $endereco = new Endereco();
                              $idEnd = $departamentoclass -> find($idDep);
                              $idEnd1 = $idEnd -> idEnderecoFK;
                              $enderecoConsulta = $endereco -> find($idEnd1);
                              $cnpj = $enderecoConsulta -> cnpj;
                            ?>
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="cnpj">Filial</label>
                                    <input type="text" class="form-control" id="cnpj" name="cnpj" value="<?php echo $cnpj ?>" placeholder="Filial" readonly>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="departamento">Departamento</label>
                                    <input type="text" class="form-control" id="departamentoNone" name="departamentoNone" value="<?php
                                      $nameDept = $departamentoclass -> find($idDep);
                                      echo $nameDept -> nome;
                                    ?>" placeholder="Departamento" readonly="readonly">
                                    <input style="display: none" type="text" class="form-control" id="departamento" name="departamento" value="<?php echo $idDep; ?>" placeholder="Departamento" readonly="readonly">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="atividade">Atividade</label>
                                    <input type="text" class="form-control" id="AtividadeNone" name="AtividadeNone" value="<?php
                                      $name = $atividadeclass -> find($idAtividade);
                                      echo $name -> nome;
                                    ?>" placeholder="Atividade" readonly="readonly">
                                    <input style="display: none" type="text" class="form-control" id="atividade" name="atividade" value="<?php echo $atividade; ?>" placeholder="Departamento" readonly="readonly">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="unid_med">Unidade de Medida</label>
                                    <input type="text" class="form-control" id="unid_med" name="unid_med" value="<?php echo $name -> unid_med ?>" placeholder="CNPJ" readonly>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="cnpj">Quantidade</label>
                                    <input type="number" class="form-control" id="quantidade" name="quantidade" maxlength="5" onkeypress="javascript: mascara(this, soNumeros);" placeholder="Quantidade" required="true">
                                </div>
                            </div>
                            <div class="row"><hr width=95%></div>
                            <div class="row">
                                <div class="form-group col-lg-4"></div>
                                <div class="form-group col-lg-2 text-center">
                                    <input type="submit" id="btnParar" name="parar" class="btn btn-success" value="Registrar">
                                </div>
                                <div class="form-group col-lg-2 text-center">
                                    <input type="button" id="btnCancelar" name="cancelar" class="btn btn-danger" value="Cancelar">
                                    <input style="display: none" type="text" id="cancelar" name="cancelarAtiv" class="btn btn-danger" value="false">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </body>
    <?php include_once '../include/include_js.php'; ?>
    <script src="../../js/validadores.js"></script>
    <script src="../../js/produtividade.js"></script>
</html>
