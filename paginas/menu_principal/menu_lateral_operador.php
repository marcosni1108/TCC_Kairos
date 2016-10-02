
<?php 
   error_reporting(0);
?>

        <?php
error_reporting(0);
?>

<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
    <header class="demo-header mdl-layout__header mdl-color--blue-700">
        <div class="mdl-layout__header-row">
            <span class="mdl-layout-title">Home</span>
            <div class="mdl-layout-spacer"></div>

            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
                <i class="material-icons">person</i>
            </button>
            <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">

                <a href="../../classes/model/logout.php">
                   <li class="mdl-menu__item">Sair
                    </li>
                </a>
                <a href="../login/mudarSenha.php">
                    <li class="mdl-menu__item">Mudar de Senha</li>
                </a>

            </ul>
        </div>
    </header>

    <div class="demo-drawer mdl-layout__drawer mdl-color--blue-700 mdl-color-text--white">
        <header class="demo-drawer-header">
            <img src="../../images/logo.png" class="demo-avatar">

            <div class="demo-avatar-dropdown">
                <span>Kairos System</span>
                <div class="mdl-layout-spacer"></div>
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--white">
            <a id="operacao" class="mdl-navigation__link mdl-color-text--black" href="#"><i class="mdl-color-text--black material-icons" role="presentation">build</i>Operação</a>
        </nav>
        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-color--blue"
            for="funcionario">
            <a href="../funcionario/cadastroFuncionario.php">
                <li class="mdl-menu__item">Cadastrar<i class="mdl-color-text--black material-icons" role="presentation">add</i>
                </li>
            </a>
            <a href="../funcionario/consultaFuncionario.php"> 
                <li class="mdl-menu__item">Alterar
                    <i class="mdl-color-text--black material-icons" role="presentation">create
                    </i> 
                </li>
            </a>
        </ul>
        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-color--blue"
            for="departamento">
            <a  href="../departamento/cadastroDepartamento.php">
                <li class="mdl-menu__item">Cadastrar<i class="mdl-color-text--black material-icons" role="presentation">add</i>
                </li>
            </a>
            <a href="../departamento/consultaDepartamento.php"> 
                <li class="mdl-menu__item">Alterar
                    <i class="mdl-color-text--black material-icons" role="presentation">create
                    </i> 
                </li>
            </a>
        </ul>
        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-color--blue"
            for="atividades">

            <a  href="../atividade/cadastroAtividade.php">
                <li class="mdl-menu__item">Cadastrar<i class="mdl-color-text--black material-icons" role="presentation">add</i>
                </li>
            </a>
            <a  href="../atividade/consultaAtividade.php"> 
                <li class="mdl-menu__item">Alterar
                    <i class="mdl-color-text--black material-icons" role="presentation">create
                    </i> 
                </li>
            </a>
            <a  href="../amostra/cadastroAmostra.php"> 
                <li class="mdl-menu__item">Registrar Amostra
                    <i class="mdl-color-text--black material-icons" role="presentation">create
                    </i> 
                </li>
            </a>
            <a  href="../meta/cadastroMeta.php"> 
                <li class="mdl-menu__item">Cadastrar Meta
                    <i class="mdl-color-text--black material-icons" role="presentation">create
                    </i> 
                </li>
            </a>
            <a  href="../parada/cadastrarParada.php"> 
                <li class="mdl-menu__item">Cadastrar Parada
                    <i class="mdl-color-text--black material-icons" role="presentation">create
                    </i> 
                </li>
            </a>
            <a  href="../parada/consultarParada.php"> 
                <li class="mdl-menu__item">Alterar Parada
                    <i class="mdl-color-text--black material-icons" role="presentation">create
                    </i> 
                </li>
            </a>
        </ul>
        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-color--blue"
            for="operacao">

            <a href="../produtividade/cadastraProdutividade.php">
                <li class="mdl-menu__item">Registrar Produtividade<i class="mdl-color-text--black material-icons" role="presentation">add</i>
                </li>
            </a>
            <a href="../parada/resgistrarParada.php"> 
                <li class="mdl-menu__item">Registrar Parada
                    <i class="mdl-color-text--black material-icons" role="presentation">create
                    </i> 
                </li>
            </a>
        </ul>
        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-color--blue"
            for="planejamento">

            <a href="../planejamento/PlanEquipe.php">
                <li class="mdl-menu__item">Planejamento de Equipe<i class="mdl-color-text--black material-icons" role="presentation">add</i>
                </li>
            </a>
            <a href="../planejamento/emprestimo.php"> 
                <li class="mdl-menu__item">Emprestimo
                    <i class="mdl-color-text--black material-icons" role="presentation">create
                    </i> 
                </li>
            </a>
        </ul>
        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-color--blue"
            for="grafico">

            <a href="../graficos/HighProd.php">
                <li class="mdl-menu__item">Prod. de Departamento<i class="mdl-color-text--black material-icons" role="presentation">add</i>
                </li>
            </a>
            <a href="../graficos/ProdutividadeFunc.php"> 
                <li class="mdl-menu__item">Prod. Funcion&aacute;rio
                    <i class="mdl-color-text--black material-icons" role="presentation">create
                    </i> 
                </li>
            </a>
            <a href="../graficosAtividade/ProdutividadeAtiv.php"> 
                <li class="mdl-menu__item">Prod. por Per&iacute;odo
                    <i class="mdl-color-text--black material-icons" role="presentation">create
                    </i> 
                </li>
            </a>
            <a href="../graficos/GraficoParada.php"> 
                <li class="mdl-menu__item">Tempo Perdido
                    <i class="mdl-color-text--black material-icons" role="presentation">create
                    </i> s
                </li>
            </a>
        </ul>
        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-color--blue"
            for="administrativo">
            <a href="../administrativo/adm.php"> 
                <li class="mdl-menu__item">Produtividade Perdida
                    <i class="mdl-color-text--black material-icons" role="presentation">create
                    </i> 
                </li>
            </a>
        </ul>

    </div>

