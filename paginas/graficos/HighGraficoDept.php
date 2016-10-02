<html>
    <head>
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
        include "../header/header.php";
        include "../../classes/model/validaOperario.php";
        include "../../classes/model/validaLider.php";
        ?>  
        <meta charset="UTF-8">
    </head>
    <body>
       <main class="mdl-layout__content">
            <div id="chart">   
            </div>
        </main>
    </body>
    <script src="../../js/highcharts.js"></script>
    <script src="../../js/exporting.js"></script>
    <script src="../../js/jquery-1.12.0.min.js"></script>
    <script>
        $(function () {
            var chart;
            var options = {
                chart: {
                    renderTo: 'chart',
                    type: 'column'
                },
                title: {
                    text: 'Produtividade dos departamentos'
                },
                xAxis: {
                    type: 'category',
                    labels: {
                        rotation: -45,
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Produtividade (documentos)'
                    }
                },
                legend: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: 'Produtividade: <b>{point.y:.1f} Documentos</b>'
                },
                credits: {
                    enabled: false
                },
                series: [{
                        name: 'Produtividade',
                        dataLabels: {
                            enabled: true,
                            rotation: -90,
                            color: '#FFFFFF',
                            align: 'right',
                            format: '{point.y:.1f}', // one decimal
                            y: 10, // 10 pixels down from the top
                            style: {
                                fontSize: '13px',
                                fontFamily: 'Verdana, sans-serif'
                            }
                        }
                    }]
            }
//     $.getJSON('../../classes/model/jsonTeste.php?opcao=findProd', function(data) {
//        options.series[0].data = data;
//         chart = new Highcharts.Chart(options);
//         chart;
//    });
            $.getJSON("http://localhost/Kairos/js/dataGrafico/dataDeptHigh.json", function (json) {
                options.xAxis.categories = json[0]['data']; //xAxis: {categories: []}
                options.series[0] = json[1];
                chart = new Highcharts.Chart(options);
            });

//fim script
        });
    </script>
    <?php include_once '../include/include_js.php'; ?>
</html>
