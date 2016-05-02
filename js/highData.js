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
            pointFormat: 'Produtividade em maio/2016: <b>{point.y:.1f} millions</b>'
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
    $.getJSON("../../classes/model/jsonTeste.php?opcao=findProd", function(json) {
               for (i = 0; i <= json.length; i++) {
                    options.xAxis.categories = json[i]['nome']; //xAxis: {categories: []}
                    options.series[0] = json[i]['prod'];
                    chart = new Highcharts.Chart(options);
                };
                });
    
//fim script
});