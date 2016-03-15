<?php

       include '../include/include_classes.php';
                     $departamento = new departamento(); 

                $idDepartament = $_GET['idDept'];
                
                    if ($departamento->delete($idDepartament)) {
                    echo "<script>alert('Deletado com sucesso!')</script>";
                    header("location:consultaDepartamento.php");
                }



