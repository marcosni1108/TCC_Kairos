<html>
    <head>

        <title>Kairos</title>

        <?php
        include "../include/include_css.php";
        include "../header/header.php";
        ?>        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>

        <main class="mdl-layout__content">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header text-center">Informa&ccedil;&otilde;es Gerencias</h1>
                    </div>
                    <!-- /.col-lg-12 -->

                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">

                            </div>
                            <div class="panel-body">
                                <div id="chart"></div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                    </div>   
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">

                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div id="container" width="200" ></div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                    </div>  
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">

                            </div>
                            <div class="panel-body">
                                <div id="char1"></div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                    </div>  
                </div>

                <div class="row">


                    <!-- /.col-lg-8 -->

                    <!-- /.col-lg-8 -->
                </div>
                <!-- /.row -->
            </div>
        </main>
        <?php
        include "../include/include_js.php";
        ?>        
        <script src="../../js/jsHome/jsHome.js"></script>
        <script src="../../js/jquery-1.12.0.min.js"></script>
        <script src="../../js/highcharts.js"></script>
        <script src="../../js/exporting.js"></script>
        <script src="../../js/highData.js"></script>
        <script>
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
        </script>
        <script>
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
        </script>
    </body>
</html>
