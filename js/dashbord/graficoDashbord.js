/* Dashbord*/

$(function () {

    $('#from').val(dataAtualFormatada(true));
    $('#to').val(dataAtualFormatada(true));
    $('#mes').val(dataAtualFormatada(false));
    chamaGrafico();
    graficoFiliais(dataAtualFormatada(false));
    chamaAtividadeDept();
    
});
function dataAtualFormatada(dataCompleta) {
    if(dataCompleta){
        var data = new Date();
        var dia = data.getDate();
        if (dia.toString().length === 1)
            dia = "0" + dia;
        var mes = data.getMonth() + 1;
        if (mes.toString().length === 1)
            mes = "0" + mes;
        var ano = data.getFullYear();
        return dia + "/" + mes + "/" + ano;
        
    }else{
        var data = new Date();
        var mes = data.getMonth() + 1;
        if (mes.toString().length === 1)
            mes = "0" + mes;
        return mes; 
    }
    
}
function chamaGrafico() {
    var de = $('#from').val();
    var ate = $('#to').val();
    graficoParada(de, ate);
    graficoAtividadeDept();
    //  graficoAtividade(de, ate);
    graficoProdutividade(de, ate, window.idDepartamento );
}

function chamaFilial(){
     var mes = $('#mes').val();
     graficoFiliais(mes);
}
function chamaAtividadeDept(){
     var mydate = new Date();
     var year = mydate.getFullYear();    
     var ano = year;
     var mes = $('#mes').val();
     graficoAtividadeDept(window.idDepartamento,mes,ano);
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
    $.getJSON("../../classes/graficos/dashGrafico.php?opcao=parada&de=" + de + "&ate=" + ate, function (json) {
        options.xAxis.categories = json[1]['data'];//xAxis: {categories: []}
        options.series[0] = json[0];
        chart = new Highcharts.Chart(options);
    })
    .fail(function () {
       console.log("sem dados");
        $("#chart").html("<img class='responsivo' id='theImg' src='../../imagens/filtro.jpg' />");
    });;
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
    $.getJSON("../../classes/graficos/dashGrafico.php?opcao=atividade&de=" + de + "&ate=" + ate, function (json) {
        options.xAxis.categories = json[1]['data'];//xAxis: {categories: []}
        options.series[0] = json[0];
        chart = new Highcharts.Chart(options);
    });
}

function graficoProdutividade(de, ate, idDepartamento ) {
    var chart;
    var options = {
        chart: {
            renderTo: 'container',
            type: 'column'
        },
        title: {
            text: 'Dia:' + de + ' Até:' + ate
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
                data: []
            },
            {
                name: 'Parada Direta',
                data: []
            },
            {
                name: 'Parada Indireta',
                data: []
            }
        ]
    };
    $.getJSON("../../classes/graficos/dashGrafico.php?opcao=produtividade&de=" + de + "&ate=" + ate+"&id="+idDepartamento, function (json) {
        var key;
        for (key in json[3]) {

            options.series[0]['data'].push(json[0].produtividade[key]);
            options.series[1]['data'].push(json[1].paradaDireta[key]);
            options.series[2]['data'].push(json[2].paradaIndireta[key]);



        }
        options.xAxis.categories = json[3];
        chart = new Highcharts.Chart(options);
    }).fail(function () {
        console.log("sem dados");
        $("#container").html('<img style="display: block; margin-left: auto; margin-right: auto;"class="responsivo" id="theImg" src="../../imagens/filtro.jpg" />');
    });
}

function graficoFiliais(mes) {
    
    var arrayMes = new Array(13);
    arrayMes[0] = "";
    arrayMes[1] = "Janeiro";
    arrayMes[2] = "Fevereiro";
    arrayMes[3] = "Março";
    arrayMes[4] = "Abril";
    arrayMes[5] = "Maio";
    arrayMes[6] = "Junho";
    arrayMes[7] = "Julho";
    arrayMes[8] = "Agosto";
    arrayMes[9] = "Setembro";
    arrayMes[10] = "Outubro";
    arrayMes[11] = "Novembro";
    arrayMes[12] = "Dezembro";
    
    var chart;
    var options = {
        chart: {
            renderTo: 'produtividade',
            type: 'column'
        },
        title: {
            text: 'Comparativo mensal entre as filiais'
        },
        xAxis: {
            categories: [
                arrayMes[parseInt(mes)]
            ]
        },
        
        yAxis: {
            min: 0,
            title: {
                text: "Percentual de produtividade"
            }
        },
        tooltip: {
            headerFormat: '<b>{point.x}</b><br/>',
            pointFormat: '{series.name}: {point.y} %'
        },
        credits: {
            enabled: false
        },
        series: []
    };
    $.getJSON("../../classes/graficos/dashGrafico.php?opcao=filiais&mes="+mes, function (json) {
        options.series = json;
        chart = new Highcharts.Chart(options);
    }).fail(function () {
        console.log("sem dados");
        $("#produtividade").html('<img style="display: block; margin-left: auto; margin-right: auto;" class="responsivo" id="theImg" src="../../imagens/filtro.jpg" />');
    });
}
function graficoAtividadeDept(idDepartamento,mes,ano) {
    var arrayMes = new Array(13);
    arrayMes[0] = "";
    arrayMes[1] = "Janeiro";
    arrayMes[2] = "Fevereiro";
    arrayMes[3] = "Março";
    arrayMes[4] = "Abril";
    arrayMes[5] = "Maio";
    arrayMes[6] = "Junho";
    arrayMes[7] = "Julho";
    arrayMes[8] = "Agosto";
    arrayMes[9] = "Setembro";
    arrayMes[10] = "Outubro";
    arrayMes[11] = "Novembro";
    arrayMes[12] = "Dezembro";
    
    var chart;
    var options = {
        chart: {
            renderTo: 'atividadeDept',
            type: 'column'
        },
        title: {
            text: 'Produtividade das Atividades'
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
                text: 'Produtividade (Porcentagem)'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'Produtividade:{point.y:.1f} %</b>'
        },
        credits: {
            enabled: false
        },
        series: [{
                name: 'Atividades',
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
    $.getJSON("../../classes/graficos/dashGrafico.php?opcao=atvidadeDept&id=" + idDepartamento + "&mes=" + mes + "&ano=" + ano, function (json) {
                    options.xAxis.categories = json[0]['data']; //xAxis: {categories: []}
                    options.series[0] = json[1];
                    chart = new Highcharts.Chart(options);
    })
    .fail(function () {
       console.log("sem dados");
        $("#atividadeDept").html("<img style='display: block; margin-left: auto; margin-right: auto;' class='responsivo' id='theImg' src='../../imagens/filtro.jpg' />");
    });;
}
