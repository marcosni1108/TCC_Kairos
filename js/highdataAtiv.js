$(function () {
   var chart;
   var options = {
        chart: {
            renderTo: 'chart',
            type: 'column'
        },
        title: {
            text: 'Produtividade por Atividade'
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
                color: '#0033cc',
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
                 $.getJSON("../../classes/graficos/GraficoAtividade.php", function(json) {
                    options.xAxis.categories = json[0]['data']; //xAxis: {categories: []}
                    options.series[0] = json[1];
                    chart = new Highcharts.Chart(options);
                });
    
//fim script
});