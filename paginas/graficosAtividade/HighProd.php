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
            $id =  $_POST['atividade'];
             $turno =  $_POST['turno'];
            //Muda o formato da data
            $dataDe = date("Y-m-d", strtotime(str_replace("/", "-", $dataDeTemp)));
            $dataAte = date("Y-m-d", strtotime(str_replace("/", "-", $dataAteTemp)));
            $GerarGraficos = new produtividade();
           
            //$array =  $GerarGraficos->findAtivProd($dataDe,$dataAte,$id);
            $array =  $GerarGraficos->findAtivTurno($dataDe,$dataAte,$id);
            if($array){
                foreach ($array as $key => $value) {


                  $categoria[] = $value->nomFunc;
                  $atividade[] = $value->percentProd;

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
             for($i = 0; $i<= count($categoria);$i++){
                
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
            name: 'Atividades',
            data: [<?php 
             for($i = 0; $i<= count($atividade);$i++){
                
                    $atividadeV .= "".$atividade[$i].",";     
                
             }
            
                    echo  str_replace(",,"," ",$atividadeV);
                    ?>]
        }, {
            name: 'Parada direta',
            data: [1002, 200, 300,1000]
        }, {
            name: 'Parada indereta',
            data: [300, 400, 200,100]
        }]
    });
});
    </script>
    

</html>
