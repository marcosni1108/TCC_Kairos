<?php

  class BarChart /* extends TSWObject */ {

      private $container;
      private $title;
      private $subtitle;
      private $yAxis;
      private $series;

      /**
       * Construtor da classe.
       * @param array $conf Array com as configurações para que o gráfico funcione.
       * As chaves desse array deve ser iguais aos nomes dos atributos internos dessa classe.
       * Perceba que o índice title pode ter mais de um índice, equivalentes a título e subtítulo respectivamente.
       * @return void
       */
      function __construct($conf) {
          $this -> title = $conf['title'][0];
          $this -> subtitle = $conf['title'][1];
          $this -> container = $conf['container'];
          $this -> series = $conf['series'];
          $this -> yAxis = $conf['y'];
      }

      /**
       * Método que gera os dados e os retorna para implementação na página.
       * @return string
       */
      function render($array) {
          foreach($array as $key => $value) {
              $categoria[] = $value -> nomFunc;
              $atividade[] = $value -> percentProd;
          }
          for($i = 0; $i<=count($categoria); $i++) {
              $categoriaV .= "'".$categoria[$i]."',";
          }
          $categoriaFinal = str_replace(",'',", " ", $categoriaV);
          for($i = 0; $i<=count($atividade); $i++) {
              $atividadeV .= "".$atividade[$i].",";
          }
          $data = str_replace(",,", " ", $atividadeV);
          $str = "chart = new Highcharts.Chart({
               chart: {
                  renderTo: '{$this -> container}',
                  defaultSeriesType: 'column',
                  marginRight: 130,
                  marginBottom: 25
               },
               title: {
                  text: '{$this -> title}',
                  x: -20 //center
               },
               subtitle: {
                  text: '{$this -> subtitle}',
                  x: -20
               },
               xAxis: {
                  categories: [{$categoriaFinal}]
               },
               yAxis: {
                  title: {
                     text: '{$this -> yAxis['title']}'
                  },
                  plotLines: [{
                     value: 0,
                     width: 1,
                     color: '#808080'
                  }]
               },
               tooltip: {
            pointFormat: '<span style=\"color:{series.color}\">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
            shared: true

               },
               legend: {

                  align: 'center',
                  verticalAlign: 'bottom',
                  borderWidth: 0
               },  plotOptions: {
            column: {
                stacking: 'percent'
            }
        },
               series: [{
                     name:'Produtividade',
                     data : [{$data}]
                         },
                         {
                     name:'Parada',
                     data : [{$data}]
                         }]
            });
      ";
          //Lembra que falei do LiveScript?
          //Header::addLiveScript( $str );
          return $str;
      }

  }

?>