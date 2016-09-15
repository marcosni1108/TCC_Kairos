<?php
set_include_path(dirname(__FILE__)."/../model");
require_once 'produtividade.php';
if (isset($_POST["Import"])) {
    //First we need to make a connection with the database
    $produtividade = new produtividade(); 
    $filename = $_FILES["file"]["tmp_name"];
    if ($_FILES["file"]["size"] > 0) {
        $file = fopen($filename, "r");
//$sql_data = "SELECT * FROM prod_list_1 ";

        $count = 0;                                         // add this line
        while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
            //print_r($emapData);
            //exit();
            $count++;                                      // add this line

            if ($count > 1) {  
                $produtividade->insertCvs($emapData[1],$emapData[2],$emapData[3],$emapData[4],
                        $emapData[5],$emapData[6],$emapData[7],$emapData[8],$emapData[9],$emapData[10],$emapData[11],$emapData[12]);// add this lin
            }                                              // add this line
        }
        fclose($file);
        echo "<script>alert('Dados incluidos com sucesso!');"
                        . "window.location='/Kairos/paginas/administrativo/adm.php'</script>";
      
    } else
        echo 'Invalid File:Please Upload CSV File';
}