<html>
    <head>

        <meta charset="UTF-8">
    </head> 
    <?php
    include '../include/include_classes.php';
    $departamento = new Departamento();
    $idDepartament = $_GET[md5('idDept')];
    $deletar = $departamento->delete($idDepartament);
    if ($deletar === '1451') {
        echo "<script>alert('Não foi possivel deletar, verifique se existem associações com esse departamento!');"
        . "window.location='./consultaDepartamento.php'</script>";
    } else if ($deletar === true) {
        echo "<script>alert('Deletado com sucesso!');"
        . "window.location='./consultaDepartamento.php'</script>";
    }
    ?>
</html>