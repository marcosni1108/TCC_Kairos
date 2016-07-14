<?php
session_start();

if( isset( $_POST['acao'] ) && $_POST['acao'] == "add" ){
  $_SESSION["CNPJ"] = $_POST['CNPJ'];
  $_SESSION["idCNPJ"] = $_POST['idCNPJ'];
}else if( isset( $_POST['acao'] ) && $_POST['acao'] == "del" ){
  unset($_SESSION["idCNPJ"]);
}	
?>