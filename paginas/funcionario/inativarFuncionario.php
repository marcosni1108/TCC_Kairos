<html>
    <head>

        <meta charset="UTF-8">
    </head>
    <?php
      include '../include/include_classes.php';
      $funcionario = new Funcionario();
      $id = $_GET[md5('id')];
      $inativar = $funcionario -> status($id, 'I');
      if($inativar===true) {
          echo "<script type='text/javascript' charset='utf-8'>alert('Inativado com sucesso!');"
          ."window.location='./consultaFuncionario.php';</script>";
      } else if($deletar==='1451') {
          echo "<script type='text/javascript' charset='utf-8'>alert('Não foi possivel inativar, verifique se existem associações com esse funcionário!');"
          ."window.location='./consultaFuncionario.php';</script>";
      }
    ?>
</html>
