<html>
    <head>
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
        include "../header/header.php";
        include "../../classes/model/validaOperario.php";
        include "../../classes/model/validaLider.php";
        session_start();
        $departamento = new departamento();
        $id = $_SESSION['departamento'];
        $departamento->setId($id);
        $resultado = $departamento->find($id);

        if (isset($_POST['GerarGrafico'])):
            require '../../classes/graficos/GerarGraficos.php';
            $mes = $_POST['mes'];
            $ano = $_POST['ano'];
            $_SESSION['mes'] = $mes;
            $_SESSION['ano'] = $ano;
            $GerarGraficos = new GerarGraficos();
            if ($GerarGraficos->totParadaTipoParada($_SESSION['departamento'], $mes, $ano,'Direta')) {
                echo "<script>"
                . "window.location='./GraficoTotParadaDept.php'</script>";
            } else {
                echo "<script> window.location='./GraficoDiretaDept.php'</script>";
            }


        endif;
        ?>
        <link href="../../css/jquery-ui.css" rel="stylesheet">

        <meta charset="UTF-8">
    </head>
    <body >

        <main class="mdl-layout__content">
            <div class="col-lg-12">
                <form method="post" >
                    <div class="input-prepend">
                        <h1 class="page-header">
                            Total de Parada Indiretas do Departamento
                        </h1>          
                        <div class="row">
                            <div class="col-md-7">
                                <h4><?php echo '<label for="expdicao">Departamento: ' . $resultado->nome . '</label>'; ?></h4>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-lg-2">
                                    <label for="mes">Mes</label>
                                    <select type="mes" class="form-control" name="mes" id="mes">
                                        <option value="1">Janeiro</option>
                                        <option value="2">Fevereiro</option>
                                        <option value="3">Março</option>
                                        <option value="4">Abril</option>
                                        <option value="5">Maio</option>                                    
                                        <option value="6">Junho</option>
                                        <option value="7">Julho</option>
                                        <option value="8">Agosto</option>
                                        <option value="9">Setembro</option>
                                        <option value="10">Outubro</option>
                                        <option value="11">Novembro</option>
                                        <option value="12">Dezembro</option>
                                    </select>                                
                                </div>
                                <div class="col-lg-2">
                                    <label for="ano">Ano</label>
                                    <select type="ano" class="form-control" name="ano" id="ano">
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>                                    
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                    </select>                                
                                </div>                       
                            </div>  
                        </div> 
                        <div class="row"><hr width=95%></div>   
                        <div class="row">    
                            <div class="form-group col-lg-4"></div>
                            <div class="form-group col-lg-4 text-center">
                                <input id="btnGerar"  type="submit" name="GerarGrafico" class="btn btn-success" value="Gerar Grafico">

                            </div>    
                        </div>   

                </form>  
            </div>

        </div>
    </main>

</body>
<script src="../../js/jquery-1.12.0.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
</html>
