<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php
          session_start();
          include "../include/include_css.php";
          $login = $_GET[md5('login')];
          include '../include/include_classes.php';
          if(isset($_POST['mudar'])) {
              $senha1 = $_POST['senha1'];
              $senha = $_POST['senha'];
              //verifica se as senhas estão iguais
              if($senha1===$senha) {
                  $funcionario = new funcionario();
                  $funcionario -> setSenha(md5($senha));
                  if($funcionario -> updateSenha($login)) {
                      echo "<script type='text/javascript' charset='utf-8'>alert('Senha alterada com sucesso!');"
                      ."window.location='./login.php';</script>";
                  }
              } else {
                  echo "<script type='text/javascript' charset='utf-8'>alert('Senhas não conferem!');</script>";
              }
          }
        ?>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <?php
                      if(isset($_SESSION['erro'])) {
                          if($_SESSION['erro']==true) {
                              echo '<div class="alert alert-warning alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>ERRO!</strong> Usuario ou Senha invalidos! </div>';
                              $_SESSION['erro'] = false;
                          }
                      } else {
                          $_SESSION['erro'] = false;
                      }
                    ?>
                    <div class="login-panel panel panel-default" >
                        <div class="panel-heading">
                            <h3 class="panel-title">Alterar Senha</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Nova Senha" name="senha" type="password" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Repita a Senha" name="senha1" type="password" value="" required>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input type="submit" class="btn btn-lg btn-success btn-block" name="mudar" value="Mudar"></input>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <?php include_once '../include/include_js.php'; ?>
</html>
