  <?php include "../../classes/model/valida_nivel.php";  ?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kairos</title>

    <!-- addbox to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="../../images/android-desktop.png">

    <!-- addbox to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="../../images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="../../images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="../../images/favicon.png">

    <link href="../../fonts/icon.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/material.min.css">
	<link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/styles.css">
  
  </head>
  <?php 
          include '../include/include_classes.php';
          $acesso = new Funcionario();
          $login = $_SESSION['login'];
          $result = $acesso->acessoNivel($login);
          $nivel = $result[0]->nivel;
            if($nivel === "Operador"){
              include "../menu_principal/menu_lateral_operador.php";
            }elseif ($nivel === "Lider") {   
                include "../menu_principal/menu_lateral_lider.php";
            }else{
                include "../menu_principal/menu_lateral.php";
            }
?>