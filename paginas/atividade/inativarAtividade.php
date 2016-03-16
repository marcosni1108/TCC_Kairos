<?php

       include '../include/include_classes.php';
                     $atividade = new atividade(); 

                $id = $_GET['id'];
                
                    if ($atividade->delete($id)) {
                    echo "<script>alert('Deletado com sucesso!')</script>";
                    header("location:consultaAtividade.php");
                }



