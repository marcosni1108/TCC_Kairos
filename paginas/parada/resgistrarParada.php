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
          if(isset($_POST['registrar'])):
              date_default_timezone_set('America/Sao_Paulo');
              $tempoInicial = $_SESSION['tempoInicial'];
              $tempoFinal = date('H:i');
              $turnoObj = new turno();
              $turno = $turnoObj -> verificaTurno($tempoFinal);
              $entradaTempo = $_POST['tempo_parada'];
              //cal
              $tempConvertSegun = $_POST['tempo_parada']*60;
              //cal
              $percentParada = ($tempConvertSegun/3600)*100;

              $data = date('Y-m-d');
              $funcionario = new funcionario();
              $func = $funcionario -> whereNome($_SESSION['nome']);
              $idFuncionarioFK = $func[0] -> id;
              $idDepartamentoFK = $_POST['departamento'];
              $idParadaFK = $_POST['parada'];
              $status = 'finalizado';
              $parada = new parada();
              $parada -> construtor($tempoInicial, $tempoFinal, $turno, $entradaTempo, $tempConvertSegun, $percentParada, $data, $idFuncionarioFK, $idDepartamentoFK, $idParadaFK, $status);
              # Insert
              if($parada -> insert()) {
                  echo "<script> alert('Parada cadastrada com sucesso.')</script>";
              } else {
                  echo "<script> alert('Não foi possivel cadastrar a parada.')</script>";
              }

          endif;
          date_default_timezone_set('America/Sao_Paulo');
          $_SESSION['tempoInicial'] = date('H:i');
        ?>
        <main class="mdl-layout__content">
            <div class="col-lg-12">
                <div class="container-fluid">
                    <form method="post" action="">
                        <div class="input-prepend">
                            <h1 class="page-header text-center">
                                Registro de Parada
                            </h1>
                            <div class="row">
                                <div class="form-group col-lg-3">
                                    <label for="cnpj">Filial</label>
                                    <select  class="form-control" name="cnpj" id="cnpj" required>
                                    </select>
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="departamento">Departamento</label>
                                    <select  class="form-control" name="departamento" id="cmbDepartamento" required>

                                    </select>
                                </div>

                                <div class="form-group col-lg-3">
                                    <label for="parada">Parada</label>
                                    <select  class="form-control" name="parada" id="cmbParada" required>
                                    </select>
                                </div>

                            </div>
                            <div class="row"><hr width=95%></div>
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="tempo_parada">Tempo de Parada (Minutos)</label>
                                    <input type="text" class="form-control" maxlength="2" name="tempo_parada" onkeypress="javascript: mascara(this, soNumeros);" id="tempo_parada" placeholder="Tempo Parada" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-5"></div>
                                <div class="form-group col-lg-4 text-center">
                                    <input id="cadastrar"type="submit" name="registrar" class="btn btn-success" value="Registrar">
                                </div>
                            </div>
                            <img id="img" src="../../imagens/loading.gif"  height="120" width="120" style="position: absolute;
                                 left: 703px; /* posiciona a 90px para a esquerda */
                                 top: 300px;
                                 display: none;/* posiciona a 70px para baixo */">
                            </form>
                        </div>
                </div>
            </div>
        </main>
    </body>

    <?php include_once '../include/include_js.php'; ?>
    <script src="../../js/populaComboTipoParada.js"></script>
    <script src="../../js/validadores.js"></script>
</html>
