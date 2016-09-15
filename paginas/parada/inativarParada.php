<html>
    <head>

        <meta charset="UTF-8">
    </head>  
    <?php
    include '../include/include_classes.php';
    $parada = new tipo_parada();
    $id = $_GET[md5('id')];
    $deletar = $parada->delete($id);
    if ($deletar === '1451') {
        echo "<script>alert('Não foi possivel deletar, verifique se existem associações com essa atividade!');"
        . "window.location='./consultarParada.php'</script>";
    } else if ($deletar === true) {
        echo "<script>alert('Deletado com sucesso!');"
        . "window.location='./consultarParada.php'</script>";
    }
    ?>
</html>

