<html>
    <head>
        <meta charset="UTF-8">
    </head> 
    <?php
    include '../include/include_classes.php';
    $endereco = new endereco();
    $id = $_GET[md5('id')];
    $deletar = $endereco->delete($id);
    if ($deletar === true) {
        echo "<script type='text/javascript' charset='utf-8'>alert('Deletado com sucesso!');"
        . "window.location='./consultaEndereco.php';</script>";
    } else if ($deletar === '1451') {
        echo "<script type='text/javascript' charset='utf-8'>alert('Não foi possivel deletar, verifique se existem associações com esse endereço!');"
        . "window.location='./consultaEndereco.php';</script>";
    }
    ?>
</html>

