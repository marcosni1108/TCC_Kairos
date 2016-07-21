
<?php
  error_reporting(0);
?>
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li class="active">
            <a href="../menu_principal/menu_principal.php"><i class="fa fa-tachometer"></i> Home</a>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#operação"><i class="glyphicon glyphicon-check"></i> Operação <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="operação" class="collapse">
                <li>
                    <a href="../produtividade/cadastraProdutividade.php">Registrar Produtividade</a>
                </li>
                <li>
                    <a href="../parada/resgistrarParada.php">Registrar Parada</a>
                </li>
            </ul>
        </li>
    </ul>
</div>