<html>
    <head>
        <meta charset="UTF-8">
    </head>  
    <?php
    include '../include/include_classes.php';
    $atividade = new atividade();
    $id = $_GET[md5('id')];
    $deletar = $atividade->delete($id);
    if ($deletar === '1451') {
        echo "<script>alert('Não foi possivel deletar, verifique se existem associações com essa atividade!');"
        . "window.location='./consultaAtividade.php'</script>";
    } else if ($deletar === true) {
        echo "<script>alert('Deletado com sucesso!');"
        . "window.location='./consultaAtividade.php'</script>";
    }
    ?>
</html>

