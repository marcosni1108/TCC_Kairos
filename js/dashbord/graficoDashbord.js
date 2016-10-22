/* global Highcharts */

$(function () {
    $('#from').val(dataAtualFormatada());
    $('#to').val(dataAtualFormatada());
    var de = $('#from').val();
    var ate = $('#to').val();
    chamaGrafico(de, ate);
});
function dataAtualFormatada() {
    var data = new Date();
    var dia = data.getDate();
    if (dia.toString().length === 1)
        dia = "0" + dia;
    var mes = data.getMonth() + 1;
    if (mes.toString().length === 1)
        mes = "0" + mes;
    var ano = data.getFullYear();
    return dia + "/" + mes + "/" + ano;
}
function chamaGrafico() {
    var de = $('#from').val();
    var ate = $('#to').val();
    graficoParada(de, ate);
    graficoAtividade(de, ate);
}
function graficoParada(de, ate) {
    var chart;
    var options = {
        chart: {
            renderTo: 'chart',
            type: 'column'
        },
        title: {
            text: 'Parada dos departamentos'
        },
        colors: [
            '#AA4643',
            '#89A54E',
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
                name: 'Parada',
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
    };
    $.getJSON("../../classes/graficos/dashGrafico.php?opcao=parada&de=" +de+ "&ate="+ate, function (json) {
        options.xAxis.categories = json[1]['data'];//xAxis: {categories: []}
        options.series[0] = json[0];
        chart = new Highcharts.Chart(options);
    });
}

function graficoAtividade(de, ate) {
    var chart;
    var options = {
        chart: {
            renderTo: 'char1',
            type: 'column'
        },
        title: {
            text: 'Departamentos Produtividade'
        },
        colors: [
            '#AA4643',
            '#89A54E',
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
        legend: {
            enabled: false
        },
        credits: {
            enabled: false
        },
        series: [{
                name: 'Departamento',
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
    };
    $.getJSON("../../classes/graficos/dashGrafico.php?opcao=atividade&de=" +de+ "&ate="+ate, function (json) {
        options.xAxis.categories = json[1]['data'];//xAxis: {categories: []}
        options.series[0] = json[0];
        chart = new Highcharts.Chart(options);
    });
}
