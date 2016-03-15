<?php

       include '../include/include_classes.php';
                     $funcionario = new funcionario(); 

                $matricula = $_GET['id'];
                
                    if ($funcionario->delete($matricula)) {
                    echo "Deletado com sucesso!";
                    header("location:consultaFuncionario.php");
                }



