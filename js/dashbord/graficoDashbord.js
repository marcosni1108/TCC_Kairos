    $(function () {
                $('#container').highcharts({
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Produtividade por Semana',
                        fontSize: '10px'
                    },
                    credits: {
                        enabled: false
                    },
                    xAxis: {
                        categories: ['Ricardo Santana', 'Eduardo Bortolossi', 'Marcos Batista', 'Wesley Souza', 'Anderson Paes']
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Total'
                        }
                    },
                    tooltip: {
                        pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
                        shared: true
                    },
                    plotOptions: {
                        column: {
                            stacking: 'percent'
                        }
                    },
                    series: [{
                            name: 'Para Indireta',
                            data: [5, 3, 4, 7, 2],
                            color: 'red'
                        }, {
                            name: 'Parada Direta',
                            data: [2, 2, 3, 2, 1],
                            color: '#95D1FF'
                        }, {
                            name: 'Produtividade',
                            data: [3, 4, 4, 2, 5],
                            color: '#1E90FF'
                        }]
                });
            });

     // Create the chart
            $(function () {
                $('#char1').highcharts({
                    title: {
                        text: 'Planejamento Estimado /  Limpeza de Documentos',
                        x: -20 //center,
                        ,
                        fontSize: '10px'
                    },
                    xAxis: {
                        categories: ['Jan', 'Fev', 'Mar', 'Abr', 'Mar', 'Jun',
                            'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
                    },
                    yAxis: {
                        title: {
                            text: 'Documentos por Minuto'
                        },
                        plotLines: [{
                                value: 0,
                                width: 1,
                                color: '#808080'
                            }]
                    },
                    tooltip: {
                        valueSuffix: 'Doc'
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle',
                        borderWidth: 0
                    },
                    series: [{
                            name: 'Planejado',
                            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
                        }, {
                            name: 'Executado',
                            data: [2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
                        }]
                });
            });
