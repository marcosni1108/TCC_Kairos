<?php 
   error_reporting(0);
?>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="../menu_principal/menu_principal.php"><i class="fa fa-tachometer"></i> Home</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#funcionario"><i class="glyphicon glyphicon-user"></i> Funcion&aacute;rio <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="funcionario" class="collapse">
                            <li>
                                <a href="../funcionario/cadastroFuncionario.php">Cadastrar</a>
                            </li>
                            <li>
                                <a href="../funcionario/consultaFuncionario.php">Alterar</a>
                            </li>                          
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#departamento"><i class="glyphicon glyphicon-lock"></i> Departamentos <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="departamento" class="collapse">
                            <li>
                                <a href="../departamento/cadastroDepartamento.php">Cadastrar</a>
                            </li>
                            <li>
                                <a href="../departamento/consultaDepartamento.php">Alterar</a>
                            </li>                          
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#atividades"><i class="glyphicon glyphicon-check"></i> Atividades <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="atividades" class="collapse">
                            <li>
                                <a href="../atividade/cadastroAtividade.php">Cadastrar</a>
                            </li>
                            <li>
                                <a href="../atividade/consultaAtividade.php">Alterar</a>
                            </li>    
                            <li>
                                <a href="../amostra/cadastroAmostra.php">Registrar Amostra</a>
                            </li>                
                            <li>
                                <a href="../meta/cadastroMeta.php">Cadastrar Meta</a>
                            </li>                            
                            <li>
                                <a href="../parada/cadastrarParada.php">Cadastrar Parada</a>
                            </li> 
                            <li>
                                <a href="../parada/consultarParada.php">Alterar Parada</a>
                            </li>                             
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#planejamento"><i class="glyphicon glyphicon-lock"></i> Planejamento <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="planejamento" class="collapse">
                            <li>
                                <a href="../planejamento/PlanEquipe.php">Planejamento de Equipe</a>
                            </li>
                            <li>
                                <a href="../planejamento/emprestimo.php">Emprestimo</a>
                            </li>                          
                        </ul>
                    </li>                      
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#operação"><i class="glyphicon glyphicon-check"></i> Opera&ccedil;&atilde;o <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="operação" class="collapse">
                            <li>
                                <a href="../produtividade/cadastraProdutividade.php">Registrar Produtividade</a>
                            </li>
                            <li>
                                <a href="../parada/resgistrarParada.php">Registrar Parada</a>
                            </li>                            
                        </ul>                    
                    </li>                    
                    <!--<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#relatorio"><i class="glyphicon glyphicon-list-alt"></i> Relat&oacute;rios <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="relatorio" class="collapse">
                            <li>
                                <a href="../relatorios/relatorioAmostra.php">Relatório de Amostras</a> 
                            </li>
                                                       
                        </ul>
                    </li> !-->
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#grafico"><i class="fa fa-bar-chart"></i> Gr&aacute;ficos <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="grafico" class="collapse">
                            <li>
                                <a href="../graficos/HighProd.php">Produtividade de Departamento</a>
                            </li>
                            <li>
                                <a href="../graficos/ProdutividadeFunc.php">Produtividade Funcion&aacute;rio</a>
                            </li>
                             <li>
                                 <a href="../graficosAtividade/ProdutividadeAtiv.php">Produtividade por Per&iacute;odo</a>
                            </li>
<!--                            <li>
                                <a href="../graficos/ProdutividadeDept.php">Produtividade de Departamento</a>
                            </li>-->
                            <li>
                                <a href="../graficos/GraficoParada.php">Tempo Perdido</a>
                            </li>    
                            <li>
                                <a href="#">Gráficos</a>
                            </li>                            
                        </ul>
                    </li>
<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#adm"><i class="glyphicon glyphicon-list-alt"></i> Administrativo <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="adm" class="collapse">
                            <li>
                                <a href="../administrativo/adm.php">Produtividade Perdida</a>
                            </li>
                                                       
                        </ul>
                    </li>
                </ul>
            </div>