 $(function () {
   var chart;
   var options = {
        chart: {
            renderTo: 'chart',
            type: 'column'
        },
        title: {
            text: 'Produtividade por atividade'
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
                 $.getJSON("http://localhost/Kairos/js/dataGrafico/dataAtivProd.json", function(json) {
                    options.xAxis.categories = json[0]['data']; //xAxis: {categories: []}
                    options.series[0] = json[1];
                    options.series[0].name=json[0]['data'];
                    chart = new Highcharts.Chart(options);
                });
    
//fim script
});