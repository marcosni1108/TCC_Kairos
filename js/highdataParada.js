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
                text: 'Parada por hora'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'Tempo de parada por hora: <b>{point.y:.1f} </b>'
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
     $.getJSON("../../js/dataGrafico/paradaDepartamento1.json", function(json) {
                    options.xAxis.categories =  json[1]['data'];//xAxis: {categories: []}
                    options.series[0] =json[0]; 
                    chart = new Highcharts.Chart(options);
                });
    
//fim script
});