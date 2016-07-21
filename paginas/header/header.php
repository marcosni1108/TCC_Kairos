<?php include "../../classes/model/valida_nivel.php"; ?>
<nav class="navbar navbar-inverse navbar-fixed-top" id="header-nav" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../../paginas/menu_principal/menu_principal.php"></a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $logado ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="../../paginas/login/mudarSenha.php"><i class="fa fa-lock"></i> Mudar Senha</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="../../classes/model/logout.php"><i class="fa fa-fw fa-power-off"></i> Sair</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<?php
  include '../include/include_classes.php';
  $acesso = new funcionario();
  $login = $_SESSION['login'];
  $result = $acesso -> acessoNivel($login);
  $nivel = $result[0] -> nivel;
  if($nivel==="Operador") {
      include "../menu_principal/menu_lateral_operador.php";
  } elseif($nivel==="Lider") {
      include "../menu_principal/menu_lateral_lider.php";
  } else {
      include "../menu_principal/menu_lateral.php";
  }
?>