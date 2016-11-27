<?php

error_reporting(0);
echo'<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
set_include_path(dirname(__FILE__) . "/../model");
require_once 'produtividade.php';
if (isset($_POST["Import"])) {
    //First we need to make a connection with the database
    $produtividade = new Produtividade();
    $filename = $_FILES["file"]["tmp_name"];
    if ($_FILES["file"]["size"] > 0) {
        $file = fopen($filename, "r");
        $count = 0;                                         // add this line
        while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
            $count++;                                      // add this line
            if ($count > 1) {
                $result = $produtividade->insertCvs($emapData[1], $emapData[2], $emapData[3], $emapData[4], $emapData[5], $emapData[6], $emapData[7], $emapData[8], $emapData[9], $emapData[10], $emapData[11], $emapData[12]); // add this lin
            }                                              // add this line
        }
        fclose($file);
        if ($result) {
            echo "<script>alert('Dados incluidos com sucesso!');"
            . "window.location='../../paginas/administrativo/adm.php'</script>";
        } else {
            echo "<script>alert('Não foi possivel incluir os dados!');"
            . "window.location='../../paginas/administrativo/adm.php'</script>";
        }
    } else{
        echo 'Arquivo Inválido';
    }
}