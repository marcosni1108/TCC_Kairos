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
            <a id="home" class="mdl-navigation__link mdl-color-text--black" onclick="goToHome();" href="#"><i  class="mdl-color-text--black material-icons" role="presentation"><span >home</span></i>Inicio</a>
            <a id="funcionario" class="mdl-navigation__link mdl-color-text--black" href="#"><i  class="mdl-color-text--black material-icons" role="presentation"><span >group</span></i>Funcionário</a>
            <a id="departamento" class="mdl-navigation__link mdl-color-text--black" href="#"><i class="mdl-color-text--black material-icons" role="presentation">business</i>Departamento</a>
            <a id="atividades" class="mdl-navigation__link mdl-color-text--black" href="#"><i class="mdl-color-text--black material-icons" role="presentation">gavel</i>Atividades</a>
<!--            <a id="planejamento" class="mdl-navigation__link mdl-color-text--black" href="#"><i class="mdl-color-text--black material-icons" role="presentation">format_list_numbered</i>Planajamento</a>-->
            <a id="operacao" class="mdl-navigation__link mdl-color-text--black" href="#"><i class="mdl-color-text--black material-icons" role="presentation">build</i>Operação</a>
            <a id="grafico" class="mdl-navigation__link mdl-color-text--black" href="#"><i class="mdl-color-text--black material-icons" role="presentation">equalizer</i>Gráfico</a>
            <a id="administrativo" class="mdl-navigation__link mdl-color-text--black" href="#"><i class="mdl-color-text--black material-icons" role="presentation">account_circle</i>Administrativo</a>
        </nav>
        <!-- <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header"> -->
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

            <a href="../graficos/GraficoAtividade.php">
                <li class="mdl-menu__item">Prod. de Atividades<i class="mdl-color-text--black material-icons" role="presentation"></i>
                </li>
            </a>
            <a href="../graficosAtividade/ProdutividadeAtiv.php">
                <li class="mdl-menu__item">Prod. dos Func. por Período <i class="mdl-color-text--black material-icons" role="presentation"></i>
                </li>
            </a>
            <a href="../graficos/HighProd.php">
                <li class="mdl-menu__item">Prod. de Departamento<i class="mdl-color-text--black material-icons" role="presentation"></i>
                </li>
            </a>
            <a href="../graficos/ProdutividadeFunc.php"> 
                <li class="mdl-menu__item">Prod. Funcion&aacute;rio
                    <i class="mdl-color-text--black material-icons" role="presentation">
                    </i> 
                </li>
            </a>
            <a href="../graficos/GraficoTotParada.php"> 
                <li class="mdl-menu__item">Total de Tempo de Parada
                    <i class="mdl-color-text--black material-icons" role="presentation">
                    </i> 
                </li>
            </a>
            <a href="../graficos/GraficoTipoParada.php"> 
                <li class="mdl-menu__item">Total de Parada
                    <i class="mdl-color-text--black material-icons" role="presentation">
                    </i> 
                </li>
            </a>
            <a href="../graficos/GraficoProdPorHoraAtiv.php"> 
                <li class="mdl-menu__item">Prod. por Hora da Atividade
                    <i class="mdl-color-text--black material-icons" role="presentation">
                    </i> 
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
            <script>
                function goToHome(){
                    if(window.location.hostname==='tcckairos.esy.es'){
                        window.location='http://tcckairos.esy.es/'
                    }else{
                       window.location='/TCC_Kairos/' 
                    }
                }
            </script>
