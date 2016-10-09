$(function () {
    var chart;
    var options = {
        chart: {
            renderTo: 'chart',
            type: 'column'
        },
        title: {
            text: 'Paradas Indiretas'
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
            pointFormat: 'Total em horas: <b>{point.y:.1f} </b>'
        },
        credits: {
            enabled: false
        },
        colors: [
            '#80699B',
            '#3D96AE',
            '#DB843D',
            '#92A8CD',
            '#A47D7C',
            '#B5CA92'
        ],
        plotOptions: {
            column: {
                colorByPoint: true
            }
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
    $.getJSON("../../js/dataGrafico/paradaTipoParada.json", function (json) {
        options.xAxis.categories = json[1]['data'];//xAxis: {categories: []}
        options.series[0] = json[0];
        chart = new Highcharts.Chart(options);

    });

//fim script
});