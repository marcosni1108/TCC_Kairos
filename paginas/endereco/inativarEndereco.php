<?php

       include '../include/include_classes.php';
                     $endereco = new endereco(); 

                $id = $_GET['id'];
                
                    if ($endereco->delete($id)) {
                    echo "<script>alert('Deletado com sucesso!')</script>";
                    header("location:consultaEndereco.php");
                }



