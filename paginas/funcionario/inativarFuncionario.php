<?php

       include '../include/include_classes.php';
                     $funcionario = new funcionario(); 

                $matricula = $_GET['id'];
                $deletar = $funcionario->delete($matricula);
                    if ($deletar===true) {
                    echo "<script type='text/javascript' charset='utf-8'>alert('Deletado com sucesso!');"
                         .  "window.location='./consultaFuncionario.php';</script>";
                   // header("location:consultaFuncionario.php");
                }
                 else if ($deletar==='1451') {
                    echo "<script type='text/javascript' charset='utf-8'>alert('Não foi possivel deletar, verifique se existem associações com esse funcionário!');"
                      .  "window.location='./consultaFuncionario.php';</script>";
                    //header("location:consultaEndereco.php");
                }



