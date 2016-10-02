<html>
    <head>
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
        include "../header/header.php";
        include "../../classes/model/validaOperario.php";
        include "../../classes/model/validaLider.php";
        ?>   

        <link href="../../css/sb-admin.css" rel="stylesheet">

        <meta charset="UTF-8">
    </head>
    <body> 

        <div id="page-wrapper" style="overflow-x: hidden; padding-left: 250px; height:100%; padding-top: 30px;">
            <div id="chart"></div>
        </div>

    </body>
    <?php include_once '../../paginas/include/include_js.php'; ?>
    <script src="../../js/jquery-1.12.0.min.js"></script>
    <script src="../../js/highcharts.js"></script>
   
    <script src="../../js/exporting.js"></script>
   <?php 
      if (isset($_POST['GerarGrafico'])){
            require_once '../../classes/model/produtividade.php';
            $dataDeTemp = $_POST['dataDe'];
            $dataAteTemp = $_POST['dataAte'];
            $id =  $_POST['departamento'];
             $turno =  $_POST['turno'];
            //Muda o formato da data
            $dataDe = date("Y-m-d", strtotime(str_replace("/", "-", $dataDeTemp)));
            $dataAte = date("Y-m-d", strtotime(str_replace("/", "-", $dataAteTemp)));
            $GerarGraficos = new produtividade();
           
            //$array =  $GerarGraficos->findAtivProd($dataDe,$dataAte,$id);
            $array =  $GerarGraficos->findAtivTurno($dataDe,$dataAte,$id);
            if($array){
                foreach ($array as $key => $value) {
                 
                  $turnos = $value->Turnos;
                  $produtividadeFinal = $value->PercentProd/$turnos;
                  $diretaFinal = $value->PercentParadaDireta/$turnos;
                  $indiretaFinal = $value->PercentParadaIndireta/$turnos;
                  $categoria[] = $value->NOME;
                  $produtividade[] = number_format($produtividadeFinal, 2, '.', '');
                  $paradaDireta[] = number_format($diretaFinal, 2, '.', '');
                  $paradaIndireta[] = number_format($indiretaFinal, 2, '.', '');

               }
            } else{
                echo "<script> alert('Departamento sem produtividade no periodo selecionado');"
                . "window.location='./ProdutividadeAtiv.php';</script>";
            }    
//                $categoria[] = $array[$i]->nomFunc;
                
            
               }
   ?>
    <script>
        
    $(function () {
    $('#chart').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: '<?php echo "Dia :".  $dataDeTemp." até dia :". $dataAteTemp?>'
        },
        xAxis: {
            categories: [<?php 
             for($i = 0; $i<= count($categoria)-1;$i++){
                
                    $categoriaV .= "'".$categoria[$i]."',";     
                
             }
            
                    echo  str_replace(",'',"," ",$categoriaV);
                    ?>]
        },
        yAxis: {
            min: 0,
            title: {
                text: "Percentual"
            }
        },
                tooltip: {
            headerFormat: '<b>{point.x}</b><br/>',
            pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: true,
                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                    style: {
                        textShadow: '0 0 3px black'
                       	
                    }
                }
            }
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Produtividade',
            data: [<?php 
             for($i = 0; $i< count($produtividade);$i++){
                
                 
                    $produtividadeV .= "".$produtividade[$i].",";     
                 
             }
            
                    echo $produtividadeV;
                    ?>]
        }, {
            name: 'Parada Direta',
            data: [
               <?php 
             for($i = 0; $i<= count($paradaIndireta)-1;$i++){
                if($paradaIndireta[$i]===null){
                    $paradaIndiretaV .= "0,";  
                }else{
                    $paradaIndiretaV .= "".$paradaIndireta[$i].",";     
                }
             }
            
                    echo  str_replace(",,"," ",$paradaIndiretaV);
                    ?>
            ]
        }, {
            name: 'Parada Indireta',
            data: [
               <?php 
             for($i = 0; $i<= count($paradaDireta)-1;$i++){
                if($paradaDireta[$i]===null){
                    $paradaDiretaV .= "0,";  
                }else{
                    $paradaDiretaV .= "".$paradaDireta[$i].",";     
                }
             }
            
                    echo  str_replace(",,"," ",$paradaDiretaV);
                    ?>
            ]
        }]
    });
});
    </script>
    

</html>
