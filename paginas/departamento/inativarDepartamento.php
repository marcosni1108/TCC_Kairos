<?php

       include '../include/include_classes.php';
                     $departamento = new departamento(); 

                $idDepartament = $_GET['idDept'];
                $deletar =  $departamento->delete($idDepartament);
                    if ($deletar === '1451') {
                   echo "<script>alert('Não foi possivel deletar, verifique se existem associações com esse departamento!');"
                        . "window.location='./consultaDepartamento.php'</script>";
                     
                   //header("location:consultaDepartamento.php");
                }
                  else if ($deletar === true) {
                   echo "<script>alert('Deletado Com sucesso!');"
                        . "window.location='./consultaDepartamento.php'</script>";
                    //header("location:consultaDepartamento.php");
                }


